<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Comment;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Image;
use App\Models\Service;
use App\Models\ServiceRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Collection\Collection;

class RoomController extends Controller
{
    public function index ()
    {
        $user = Auth::guard('admin')->user();
        $room_category = RoomCategory::all();
        $rooms = Room::paginate(10);
        return view ('admin.rooms.index', compact('user', 'rooms', 'room_category'));
    }

    public function create()
    {
        $user = Auth::guard('admin')->user();
        $room_category = RoomCategory::all();
        $services = Service::all();
        return view('admin.rooms.create', compact('user', 'room_category', 'services'));
    }

    public function upload_images($id)
    {
        $user = Auth::guard('admin')->user();
        $room = Room::find($id);
        return view('admin.rooms.test', compact('user', 'room'));
    }

    public function save_images(Request $request, $id)
    {
        $user = Auth::guard('admin')->user();
        $room = Room::find($id);
        $get_image = $request->file('file');
        if($get_image){
            $room_image = new Image();
            $room_image->room_id = $room->id;
            $imageName = time().'.'.$get_image->extension();
            $get_image->move('images',$imageName);
            $imagePath = $imageName;
            $room_image->image_path = $imagePath;
            $room_image->save();

        }
        return "done";

    }

    public function load_images(Request $request)
    {
//        $images = Image::all();
        $id = $request->get('room_id');
        $images = Image::where('room_id', $id)->get();
//        dd($images);
        $output='';
        if ($images) {
            foreach ($images as $image) {
                $output .= '
        <div class="col-md-2" style="margin-bottom:16px;">
        <img src="' . asset('images/' . $image->image_path) . '" class="img-thumbnail" width="175px" height="175"style="height: 175px;"/>
        <div><button type="button" class="btn btn-link " id="' . $image->image_path . '" style="margin-left:27px;"> <a class="btn btn-danger"  href="'.route('admin.rooms.delete_image',['id'=>$image->id]) .'">Xóa</a></button></div>
        </div>
        ';
            }
            $output .= '</div>';
            echo "$output";
        }
    }

    public function delete_image($id)
    {
//        dd($id);
        Image::where('id', $id)->delete();
        return back()->with('success', 'Xóa ảnh thành công!');
    }

    public function store(Request $request)
    {

        $user = Auth::guard('admin')->user();
        $room_category = RoomCategory::all();

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'room_type_id' => 'required',
            'cost' => 'required',
            'short_intro' => 'required',
            'services' => 'required',
            'width' => 'required',
            'length' => 'required'
        ]);
      $room = new Room();
        $room->name = $data['name'];
        $room->description = $data['description'];
        $room->room_type_id = $data['room_type_id'];
        $room->cost = $data['cost'];
        $room->short_intro = $data['short_intro'];
        $room->width =  $data['width'];
        $room->length =  $data['length'];
        $room->save();
        //luu servicedd
        $services = $request->services;
//        dd($services = $request->services);
        foreach ($services as $service)
        {
            $serviceRoom = new ServiceRoom();
            $serviceRoom->room_id = $room->id;
            $serviceRoom->service_id = $service;
            $serviceRoom->save();
        }

        $room_id = $room->id;
        return redirect()->route('admin.rooms.upload_images',['id' => $room_id])->with('success', 'Thêm phòng thành công, bạn vui lòng thêm hình ảnh cho phòng trọ!');
    }

    public function show($id)
    {
        $user = Auth::guard('admin')->user();
        $room = Room::find($id);
        $categories= RoomCategory::all();
        $room_category='';
        foreach ($categories as $category)
        {
            if($category->id == $room->room_type_id)
            {
                $room_category = $category->name;
            }
        }
//dd($id);
        $serviceRooms = ServiceRoom::where('room_id', $id)->get();
//        dd($serviceRooms);
        $services = Service::all();
        $images = Image::where('room_id', $id)->get();

        return view('admin.rooms.show', compact('user', 'room_category','serviceRooms', 'room', 'images', 'services'));
    }

    public function edit($id)
    {
        $user = Auth::guard('admin')->user();
        $categories = RoomCategory::all();
        $room = Room::find($id);
        $serviceRooms = ServiceRoom::where('room_id', $id)->get();
        $services = Service::all();
        return view('admin.rooms.edit', compact('user', 'categories', 'room', 'serviceRooms', 'services'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('admin')->user();
        $room_category = RoomCategory::all();
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'room_type_id' => 'required',
            'cost' => 'required',
            'short_intro' => 'required',
            'length' => 'required',
            'width' => 'required'

        ]);


        $room = Room::find($id);

        $room->name = $data['name'];
        $room->description = $data['description'];
        $room->room_type_id = $data['room_type_id'];
        $room->cost = $data['cost'];
        $room->short_intro = $data['short_intro'];
        $room->width =  $data['width'];
        $room->length =  $data['length'];
        $room->save();
        return redirect()->route('admin.rooms.index', compact('user', 'room_category'))->with('success', 'Sửa thông tin thành công!');
    }

    public function delete($id)
    {
        Room::where('id', $id)->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Xóa thành công!');
    }

    public function room_card()
    {
        $user = Auth::guard('admin')->user();
        $room_category = RoomCategory::all();
        $rooms = Room::all();
        $images = Image::all();
        $image_path='';
        return view('admin.rooms.room-card', compact('user', 'rooms', 'room_category', 'images', 'image_path'));
    }

    public function room_search(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $room_category = RoomCategory::all();
        $search = $request->get('search');
//        dd($search);
        $rooms = Room::where('name', 'LIKE', '%' . $search . '%')->orWhere('cost', 'LIKE', '%' . $search . '%')->get();
        if (count($rooms)>0)

            return view('admin.rooms.search', compact('rooms', 'user', 'room_category'));
        else
            return view('admin.rooms.not_found', compact('user'));
    }

    public function filter_search(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $rooms = Room::all();
        $room_category = RoomCategory::all();
        $filter_search = $request->get('filter');
        if($filter_search=='all')
            return view('admin.rooms.search' ,compact('rooms', 'user', 'room_category'));
        else
        {
            $room_results = Room::where('status', $filter_search)->get();
//        dd($room_results);
            if(count($room_results) > 0)
                $rooms = $room_results;
            return view('admin.rooms.search' ,compact('rooms', 'user', 'room_category'));

        }
//        dd($filter_search);
    }

    public function filter_service(Request $request)
    {
        $services = $request->services;
//        dd($services);
        $user = Auth::guard('admin')->user();
//        $rooms = Room::all();
        $room_categories = RoomCategory::all();
        $room_filters = '';
        $images = Image::all();
        $getRoom = Room::query();
        foreach ($services as $service)
        {
            $getRoom->where($service, 1);

//            dd($service);
        }
        $rooms = $getRoom->get();

        return view('customer.rooms.filter_result' ,compact('rooms', 'user', 'images', 'services', 'room_categories'));

    }

    public function send_comment(Request $request)
    {
//        var_dump($request);
//        dd($request);
//        dd($request->all());
        $comment = new Comment();
        $comment->name = $request['name'];
        $comment->content = $request['content'];
        $comment->room_id = $request['room_id'];
        $comment->date = now();
        $comment->phone = $request['phone'];
        $comment->comment_parent_id = 0;
        $comment->user_id = $request['user_id'];
        $comment->post_id=null;
        $comment->save();
    }

    public function load_comment(Request $request)
    {
        $room_id = $request->room_id;
        $comments = Comment::where('room_id', $room_id)->where('status', 1)->where('comment_parent_id','=',0)->get();

//        $comments = Comment::with('post')->where('post_id', $post_id)->get();
        $cmt_reps = Comment::with('room')->where('comment_parent_id','>',0)->get();
//        dd($food_id);
        $output='';
        if (count($comments)==0)
        {
            $output.='<div><p>Chưa có bình luận nào cho bài đăng này</p></div>';
        }
        else{
            foreach ($comments as $key => $comment){
                $user = \App\Models\Admin::find($comment->user_id);
//                dd($user->avatar);
                $output.= '<div class="media review-item"> <img src="/images/'.$user->avatar.'" class="mr-3" width="70px" height="70px" alt="...">
                  <div class="media-body">
                    <h5 class="mt-0">'.$comment->name.'<span>'.$comment->date.' - <a href=""></a></span></h5>
                    <p class="mb-0">'.$comment->content.'</p>
                  </div>
                </div>
 ';
                foreach ($cmt_reps as $key => $reply_cmt){
                    if($reply_cmt->comment_parent_id==$comment->id)
                    {
                        $output.= '<div class="media review-item"> <img src="/images/'.$user->avatar.'" class="mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">'.$reply_cmt->name.' <span>'.$reply_cmt->date.' <a href=""></a></span></h5>
                    <p class="mb-0">'.$reply_cmt->content.'</p>
                </div>
            </div>';
                    }
                }
            }
        }
        echo $output;

    }





}
