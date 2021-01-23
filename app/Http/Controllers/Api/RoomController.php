<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function indexMeeting()
    {
        $rooms = Room::select('id', 'image_ruangan', 'nama_ruangan', 'kapasitas_ruangan', 'kapasitas_ruangan', 'proyektor', 'panggung', 'status_ruangan', 'category_id')
            ->where('category_id', '=', '3')
            ->latest()
            ->get()
            ->toArray();

        $results = array_map(
            function ($element) {
                $images = $element['image_ruangan'];
                $element['image_ruangan'] = 'http://localhost:8000/img/' . $images;
                return $element;
            },
            $rooms
        );

        return response()->json($results);
    }

    public function indexSeminar()
    {
        $rooms = Room::select('id', 'image_ruangan', 'nama_ruangan', 'kapasitas_ruangan', 'kapasitas_ruangan', 'proyektor', 'panggung', 'status_ruangan', 'category_id')
            ->where('category_id', '=', '1')
            ->latest()
            ->get()
            ->toArray();

        $results = array_map(
            function ($element) {
                $images = $element['image_ruangan'];
                $element['image_ruangan'] = 'http://localhost:8000/img/' . $images;
                return $element;
            },
            $rooms
        );

        return response()->json($results);
    }

    public function indexWorkshop()
    {
        $rooms = Room::select('id', 'image_ruangan', 'nama_ruangan', 'kapasitas_ruangan', 'kapasitas_ruangan', 'proyektor', 'panggung', 'status_ruangan', 'category_id')
            ->where('category_id', '=', '2')
            ->latest()
            ->get()
            ->toArray();

        $results = array_map(
            function ($element) {
                $images = $element['image_ruangan'];
                $element['image_ruangan'] = 'http://localhost:8000/img/' . $images;
                return $element;
            },
            $rooms
        );

        return response()->json($results);
    }

    public function roomDetail($id)
    {
        $room = Room::select('id', 'image_ruangan', 'nama_ruangan', 'kapasitas_ruangan', 'kapasitas_ruangan', 'proyektor', 'panggung', 'category_id')
            ->with(['peminjam' => function ($query) {
                $query->select('id', 'room_id', 'tujuan', 'tgl_pinjam', 'tambahan', 'tgl_selesai', 'status', 'user_id')
                    ->orderBy('tgl_pinjam', 'asc')
                    ->take(4)
                    ->with(['user' => function ($query) {
                        $query->select('id', 'name');
                    }]);
            }])
            ->where('id', $id)
            ->get()
            ->toArray();

        $results = array_map(
            function ($element) {
                $images = $element['image_ruangan'];
                $element['image_ruangan'] = 'http://localhost:8000/img/' . $images;
                return $element;
            },
            $room
        );
        return response()->json($results);
    }
}
