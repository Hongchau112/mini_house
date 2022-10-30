<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Service;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.login.index');
    }

    public function test()
    {
        return view('customer.test');
    }

    public function listing()
    {
        $rooms = Room::all();
        $room_categories = RoomCategory::all();
        $images = Image::all();
        $services = Service::all();
        return view('customer.rooms.listing', compact('rooms', 'room_categories', 'images', 'services'));
    }

    public function details($id)
    {
        $room = Room::find($id);
        $images = Image::all();
        $services = Service::all();
        $room_categories = RoomCategory::all();

        return view('customer.rooms.detail', compact('room', 'images', 'services', 'room_categories'));
    }
}
