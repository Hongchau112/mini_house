<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index ()
    {
        $user = Auth::guard('admin')->user();
        $rooms = Room::all();
        $posts = Post::paginate(10);
        return view ('admin.posts.index', compact('user', 'rooms', 'posts'));
    }

    public function create()
    {
        $user = Auth::guard('admin')->user();
        $room_category = RoomCategory::all();
        $rooms = Room::all();
        return view('admin.posts.create', compact('user', 'room_category', 'rooms'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('admin')->user();

        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'room_id' => 'required',
        ]);

        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->room_id = $data['room_id'];
        $post->save();

        return redirect()->route('admin.posts.index', compact('user'))->with('success', 'Thêm phòng thành công!');

    }

    public function detail($id)
    {
        $user = Auth::guard('admin')->user();

        $post = Post::find($id);
        $images = Image::all();
        $rooms = Room::all();
        $room_categories = RoomCategory::all();

        return view('customer.posts.detail', compact('rooms', 'images', 'post', 'room_categories', 'user'));

    }



}
