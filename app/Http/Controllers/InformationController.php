<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function about_us()
    {
        $room_categories = RoomCategory::all();
        $rooms = Room::all();
        $images = Image::all();
        $user = Auth::guard('admin')->user();
        $post_categories = PostCategory::all();
        $posts = Post::all();
        $user = Auth::guard('admin')->user();
        return view('customer.introduce.about_us', compact('user', 'room_categories', 'post_categories'));
    }

    public function categories()
    {
        $user = Auth::guard('admin')->user();
        $categories = RoomCategory::where('parent_category_id', 0)->get();
        return view('customer.introduce.categories', compact('user', 'categories'));
    }
}
