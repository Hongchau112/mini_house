<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\PostCategory;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Wistlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WistListController extends Controller
{
    public function add_wistlist($room_id)
    {
        $getUser = Session::get('user_id');
        if($getUser==null)
        {
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để thêm phòng vào danh sách yêu thích!');
        }
        else{
            $id = Auth::guard('web')->user()->id;
            $wish = Wistlist::where('room_id', $room_id)->where('user_id', $id)->first();
            if(isset($wish))
            {
                return redirect()->back()->with('error', 'Phòng đã nằm trong danh sách yêu thích, không thêm được nữa!');
            }
//        dd($room_id);
            else{
                Wistlist::insert([
                    'user_id' => $id,
                    'room_id' => $room_id
                ]);
                return redirect()->back()->with('success', 'Thêm vào yêu thích thành công!');
            }

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
        $room_categories = RoomCategory::all();
        $post_categories = PostCategory::all();
        $images = Image::all();
        $user = Auth::guard('web')->user();
        $wishlists = Wistlist::where('user_id', $id)->get();
//        dd($wishlists);
//        dd($wishlist);
        return view('customer.rooms.wishlist', compact('post_categories','wishlists', 'user', 'rooms', 'images', 'room_categories'));
    }

    public function wish_list(Request $request)
    {
        dd($request->get('room_id'));

    }

    public function delete($id)
    {
        $user_id = Auth::guard('web')->user()->id;
        Wistlist::where('id', $id)->where('user_id', $user_id)->delete();
//        return redirect()->route('customer.show_wishlist', ['id'=>$user_id])->with('success', 'Xóa yêu thích thành công!');
        return redirect()->back()->with('alert', 'Xóa mục phòng yêu thích thành công!');
    }

}
