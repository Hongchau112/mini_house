<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Image;
use App\Models\Post;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function listing()
    {
        $user = Auth::guard('admin')->user();
        $rooms = Room::all();
        $posts = Post::all();
        $categories = RoomCategory::where('parent_category_id', 0)->get();
        $post_infos = Post::where('post_type_id', 2)->get();
        $images = Image::all();
        return view('customer.posts.listing', compact('user', 'rooms', 'posts', 'images', 'categories', 'post_infos'));

    }

    public function index ()
    {
        $user = Auth::guard('admin')->user();
        $rooms = Room::all();
        $posts = Post::paginate(10);
        $images = Image::all();
        return view ('admin.posts.index', compact('user', 'rooms', 'posts', 'images'));
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
        $categories = RoomCategory::all();
        $post_infos = Post::where('post_type_id', 2)->get();
        return view('customer.posts.detail', compact('rooms', 'images', 'post', 'categories', 'user', 'post_infos'));

    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Xóa bài đăng thành công!');

    }

    public function search(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $images = Image::all();
        $rooms = Room::all();
        $categories = RoomCategory::all();
        $search = $request->get('search');
//        dd($search);
//        dd($search);
        $posts = Post::where('title', 'LIKE', '%' . $search . '%')->get();
        if (count($posts)>0)

            return view('customer.posts.search', compact('posts', 'user', 'images', 'rooms', 'categories'));
        else
            return view('customer.posts.not_found', compact('user'));
    }



}
