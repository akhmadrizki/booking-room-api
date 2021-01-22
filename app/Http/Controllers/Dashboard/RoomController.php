<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CategoryRoom;
use App\Models\Peminjam;
use App\Models\Room;
use App\Models\User;
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
        $categories = CategoryRoom::all();
        return view('interfaces.dashboard.addRoom')->withCategories($categories);
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
            'status_ruangan'    => $request->status_ruangan,
            'category_id'       => $request->category_id,
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
        $categories = CategoryRoom::all();
        return view('interfaces.dashboard.editRoom')->withRooms($rooms)->withCategories($categories);
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
            'status_ruangan'    => $request->status_ruangan,
            'category_id'       => $request->category_id,
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
        $user = User::all();
        $peminjam = Peminjam::latest()->get();
        $rooms = Room::all();
        return view('interfaces.dashboard.listBooked')
            ->withUser($user)
            ->withPeminjam($peminjam)
            ->withRooms($rooms);
        // return redirect()->route('index.room')->with('success', 'Ruangan berhasil dihapus');
    }

    public function editPeminjam($id)
    {
        $peminjam = Peminjam::find($id);
        $rooms = Room::all();
        $user = User::all();

        return view('interfaces.dashboard.editBooked')
            ->withPeminjam($peminjam)
            ->withRooms($rooms)
            ->withUser($user);
    }

    public function updatePeminjam(Request $request, $id)
    {
        $peminjam = Peminjam::find($id);
        $getUser  = User::where('id', $peminjam->user_id)->first();
        $getRoom  = Room::where('id', $peminjam->room_id)->first();

        $field = [
            'status' => $request->status,
        ];
        $peminjam->update($field);

        // notification
        $channelName = 'notification';
        $recipient   = $getUser->notification_token;
        $expo = \ExponentPhpSDK\Expo::normalSetup();
        $expo->subscribe($channelName, $recipient);

        // Build the notification data
        if ($request->status == 'pending') {
            $notification = ['body' => 'Hey!' . $getRoom->nama_ruangan . 'yang kamu mau pinjam sedang ditinjau, tunggu notifikasi selanjutnya'];
        }
        $notification = ['body' => 'Selamat' . $getRoom->nama_ruangan . 'yang kamu mau pinjam sudah di setujui'];
        // Notify an interest with a notification
        $expo->notify([$channelName], $notification);

        return redirect()->route('index.list')->with('success', 'Berhasil update status');
    }
}
