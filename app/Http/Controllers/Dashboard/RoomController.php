<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexRoom()
    {
        return view('interfaces.dashboard.listRoom');
    }

    public function addRoom()
    {
        return view('interfaces.dashboard.addRoom');
    }

    public function indexList()
    {
        return view('interfaces.dashboard.listBooked');
    }
}
