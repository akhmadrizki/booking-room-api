<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $getUser = Auth::user()->id;

        $profile = User::select('id', 'name', 'nim')
            ->with(['peminjam' => function ($query) {
                $query->select('id', 'room_id', 'user_id', 'tujuan', 'tgl_pinjam', 'tgl_selesai', 'status')
                    ->orderBy('tgl_pinjam', 'asc')
                    ->with(['room' => function ($query) {
                        $query->select('id', 'image_ruangan', 'nama_ruangan');
                    }]);
            }])
            ->where('id', $getUser)
            ->get()
            ->toArray();



        $results = array_map(
            function ($element) {
                $images = $element['peminjam'][0]['room']['image_ruangan'];
                $element['image_ruangan'] = 'http://localhost:8000/img/' . $images;
                return $element;
            },
            $profile
        );

        return response()->json($results);
    }
}
