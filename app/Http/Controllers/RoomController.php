<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.rooms.create', compact('user', 'room_category'));
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
        <button type="button" class="btn btn-link " id="' . $image->image_path . '">Xóa</button>
        </div>
        ';
            }
            $output .= '</div>';
            echo "$output";
        }
    }

    public function store(Request $request)
    {

        $user = Auth::guard('admin')->user();
        $room_category = RoomCategory::all();

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'room_type_id' => 'required',
            'cost' => 'required'
        ]);



        $room = new Room();
        $room->name = $data['name'];
        $room->description = $data['description'];
        $room->room_type_id = $data['room_type_id'];
        $room->cost = $data['cost'];
        $room->save();

        $room_id = $room->id;

        if (($request->has('bep')) or ($request->has('maylanh')) or($request->has('gac')))
        {
            $service = new Service();
            $service->room_id = $room_id;
            if ($request->has('bep')){
                $service->bep= 1;
            }
            if ($request->has('maylanh')){
                $service->maylanh= 1;
            }
            if ($request->has('gac')){
                $service->gac = 1;
            }
            $service->save();
        }



        return redirect()->route('admin.rooms.index', compact('user', 'room', 'room_category'))->with('success', 'Thêm phòng thành công!');
    }

    public function show($id)
    {
        $user = Auth::guard('admin')->user();
        $room = Room::find($id);
        $categories= RoomCategory::all();
        $service_room='';
        $services = Service::all();
        $room_category='';
        foreach ($categories as $category)
        {
            if($category->id == $room->room_type_id)
            {
                $room_category = $category->name;
            }
        }
        $service = Service::where('room_id', $id)->get();
//        dd($service->id);
        foreach ($services as $service)
        {
            if($service->room_id == $room->id)
            {
                $service_room = $service;
            }
        }
//        dd($service_room);

        $images = Image::where('room_id', $id)->get();
        return view('admin.rooms.show', compact('user', 'room_category', 'room', 'images', 'service_room'));
    }

    public function edit($id)
    {
        $user = Auth::guard('admin')->user();
        $categories = RoomCategory::all();
        $room = Room::find($id);
        return view('admin.rooms.edit', compact('user', 'categories', 'room'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('admin')->user();
        $room_category = RoomCategory::all();
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'room_type_id' => 'required',
        ]);


        $room = Room::find($id);

        $room->name = $validated_data['name'];
        $room->description = $validated_data['description'];
        $room->food_category_id = $validated_data['room_type_id'];
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
        $rooms = Room::where('name', 'LIKE', '%' . $search . '%')->get();
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



}
