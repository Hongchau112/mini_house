<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Room;
use App\Models\Wistlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WistListController extends Controller
{
    public function add_wistlist($room_id)
    {
        $id = Auth::guard('admin')->user()->id;
        $wish = Wistlist::where('room_id', $room_id)->where('user_id', $id)->first();
        if(isset($wish))
        {
            Session::flash('message', 'Phòng đã được thêm vào yêu thích!');
            return back();
        }
//        dd($room_id);
        else{
            Wistlist::insert([
                'user_id' => $id,
                'room_id' => $room_id
            ]);
            Session::flash('message', 'Phòng đã được thêm vào yêu thích!');
            return back();
        }

    }

    public function count_wistlist($id)
    {
        $wish_count = Wistlist::count($id);
        return view('customer.rooms.listing', compact('wish_count'));
    }

    public function show_wishlist($id)
    {
        $rooms = Room::all();
        $images = Image::all();
        $user = Auth::guard('admin')->user();
        $wishlists = Wistlist::where('user_id', $id)->get();
//        dd($wishlist);
        return view('customer.rooms.wishlist', compact('wishlists', 'user', 'rooms', 'images'));
    }

    public function wish_list(Request $request)
    {
        dd($request->get('room_id'));

    }

}
