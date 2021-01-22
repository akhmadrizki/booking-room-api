<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Image;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexRoom()
    {
        $rooms = Room::latest()->get();
        return view('interfaces.dashboard.listRoom')
            ->withRooms($rooms);
    }

    public function addRoom()
    {
        return view('interfaces.dashboard.addRoom');
    }

    public function storeRoom(Request $request)
    {
        // validate the data
        $this->validate($request, [
            'image_ruangan'  => 'mimes:jpg,png,jpeg|max:5000'
        ]);

        $fields = [
            'nama_ruangan'      => $request->nama_ruangan,
            'kapasitas_ruangan' => $request->kapasitas_ruangan,
            'proyektor'         => $request->proyektor,
            'panggung'          => $request->panggung,
        ];

        if ($request->hasFile('image_ruangan')) {
            $image = $request->file('image_ruangan');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->save($location);
            $fields['image_ruangan'] = $filename;
        }

        Room::create($fields);
        return redirect()->route('index.room')->with('success', 'Ruangan berhasil ditambahkan');
    }

    public function editRoom($id)
    {
        $rooms = Room::find($id);
        return view('interfaces.dashboard.editRoom')->withRooms($rooms);
    }

    public function updateRoom(Request $request, $id)
    {
        $rooms = Room::find($id);

        // validate the data
        $this->validate($request, [
            'image_ruangan'  => 'mimes:jpg,png,jpeg|max:5000'
        ]);

        $fields = [
            'nama_ruangan'      => $request->nama_ruangan,
            'kapasitas_ruangan' => $request->kapasitas_ruangan,
            'proyektor'         => $request->proyektor,
            'panggung'          => $request->panggung,
        ];

        if ($request->hasFile('image_ruangan')) {
            $image = $request->file('image_ruangan');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->save($location);
            $fields['image_ruangan'] = $filename;
        }

        $rooms->update($fields);
        return redirect()->route('index.room')->with('success', 'Ruangan berhasil diupdate');
    }

    public function destroyRoom($id)
    {
        $rooms = Room::find($id);
        $rooms->delete();

        return redirect()->route('index.room')->with('success', 'Ruangan berhasil dihapus');
    }

    public function indexList()
    {
        return view('interfaces.dashboard.listBooked');
        return redirect()->route('index.room')->with('success', 'Ruangan berhasil dihapus');
    }
}
