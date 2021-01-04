<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::select('id', 'nama_ruangan', 'image_ruangan')
            ->latest()
            ->get();

        return response()->json($rooms);
    }
}
