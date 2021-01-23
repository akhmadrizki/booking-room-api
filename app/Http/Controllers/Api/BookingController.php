<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Makassar");

        $getUserId = Auth::user()->id;

        $fields = [
            'room_id'     => $request->room_id,
            'user_id'     => $getUserId,
            'tujuan'      => $request->tujuan,
            'tgl_pinjam'  => $request->tgl_pinjam,
            'tgl_selesai' => $request->tgl_selesai,
            'tambahan'    => $request->tambahn,
            'status'      => 'belum disetujui',
        ];

        Peminjam::create($fields);
        return response()->json([
            'statusCode' => 200,
            'message'    => 'Room successfully booked'
        ], 200);
    }
}
