<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
class PostController extends Controller
{
    public function listing()
    {
//        Session::get('user_id');
//        dd(Session::get('user_id'));
        $user = Auth::guard('admin')->user();
        $rooms = Room::all();
        $posts = Post::all();
        $categories = RoomCategory::where('parent_category_id', 0)->get();
        $subdays = Carbon::now()->subDays(7)->toDateString();
        $now = Carbon::now()->toDateString();
        $post_infos = Post::whereBetween('created_at',[$subdays, $now])->get();
//        dd($post_infos);
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
        $post_category = PostCategory::all();
        return view('admin.posts.create', compact('user', 'room_category', 'rooms', 'post_category'));
    }

    public function edit($id)
    {
        $user = Auth::guard('admin')->user();
        $room_category = RoomCategory::all();
        $post = Post::find($id);
        $post_category = PostCategory::all();
        return view('admin.posts.edit', compact('user', 'room_category', 'post', 'post_category'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('admin')->user();

        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'post_type_id' => 'required',
            'image' => 'required'

        ]);
        $post = Post::find($id);
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->post_type_id = $data['post_type_id'];
        if($request->hasFile('image')){
            $filename = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/posts'), $filename);
//            dd($filename);
            $post->image = $filename;
        }
        $post->save();


        return redirect()->route('admin.posts.index', compact('user'))->with('success', 'Cập nhật bài đăng thành công!');

    }

    public function detail($id)
    {
        $user = '';

        $user = Auth::guard('admin')->user();

        $post = Post::find($id);
        $images = Image::all();
        $rooms = Room::all();
        $room_categories = RoomCategory::all();
        $post_categories = PostCategory::all();
        $post_infos = Post::where('post_type_id', $post->post_type_id)->get();
        return view('customer.posts.detail', compact('rooms', 'post_categories','images', 'post', 'room_categories', 'user', 'post_infos'));

    }

    public function store(Request $request)
    {
//        dd($request->all());
        $user = Auth::guard('admin')->user();

        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'room_id' => 'nullable',
            'post_type_id' => 'required',
            'image' => 'required'

        ]);
        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->post_type_id = $data['post_type_id'];
        if($request->hasFile('image')){
            $filename = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/posts'), $filename);
//            dd($filename);
            $post->image = $filename;
        }
        $post->save();


        return redirect()->route('admin.posts.index', compact('user'))->with('success', 'Thêm bài đăng thành công!');

    }

//    public function detail($id)
//    {
//        $user = Auth::guard('admin')->user();
//
//        $post = Post::find($id);
//        $images = Image::all();
//        $rooms = Room::all();
//        $room_categories = RoomCategory::all();
//        $post_categories = PostCategory::all();
//        $post_infos = Post::where('post_type_id', 2)->get();
//        return view('customer.posts.detail', compact('rooms', 'post_categories','images', 'post', 'room_categories', 'user', 'post_infos'));
//
//    }

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

    public function post_category($id)
    {
        $post_selected = DB::select(
            'SELECT * FROM posts WHERE posts.post_type_id IN
            (SELECT category.id FROM post_types as category WHERE (category.parent_category_id = ? ) OR (category.id=?))',[$id, $id]);

        for($i = 0 ; $i <count($post_selected);$i++){
            $post_selected[$i] = [$post_selected[$i]->id];
            // dd($test);
        }

        $posts = Post::whereIn('id',$post_selected)->paginate(5);
//dd($posts);
        $category = PostCategory::find($id);
        $post_categories = PostCategory::all();
        $room_categories = RoomCategory::all();
        $images = Image::all();
        $services = Service::all();
        $user = Auth::guard('admin')->user();
        $subdays = Carbon::now()->subDays(7)->toDateString();
        $now = Carbon::now()->toDateString();
        $post_infos = Post::whereBetween('created_at',[$subdays, $now])->get();
//        dd($post_infos);
        return view('customer.posts.post_category', compact('user', 'post_infos', 'room_categories','services', 'post_categories','posts' , 'images', 'post_selected', 'category'));

    }



}
