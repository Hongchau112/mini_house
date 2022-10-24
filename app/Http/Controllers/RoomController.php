<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Image;
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
        return view('admin.rooms.test', compact('user', 'room_category'));
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
        if ($images) {
            foreach ($images as $image) {
                $output .= '
        <div class="col-md-2" style="margin-bottom:16px;" align="center">
        <img src="' . asset('images/' . $image->image_path) . '" class="img-thumbnail" width="175px" height="175"style="height: 175px;"/>
        <button type="button" class="btn btn-link " id="' . $image->image_path . '">Xóa</button>
        </div>
        ';
            }
            $output .= '<div>';
            echo "$output";
        }
    }

    public function store_1()
    {
        dd(1);
    }


    public function store(Request $request)
    {
//        dd($request);
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

        return redirect()->route('admin.rooms.index', ['rooms'])->with('success', 'Thêm món thành công!');
    }

    public function show($id)
    {
        $user = Auth::guard('admin')->user();
        $categories = RoomCategory::all();
        $room = Room::find($id);
        $images = Image::all();

        return view('admin.rooms.show', compact('user', 'categories', 'room', 'images'));
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
        $food = Room::find($id);
        Room::where('id', $id)->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Xóa thành công!');
    }

    public function room_card()
    {
        $user = Auth::guard('admin')->user();
        $room_category = RoomCategory::all();
        $rooms = Room::all();
        return view('admin.rooms.room-card', compact('user', 'rooms', 'room_category'));
    }

    public function room_search(Request $request)
    {
        $user = Auth::guard('admin')->user();

        $search = $request->get('search');
//        dd($search);
        $rooms = Room::where('name', 'LIKE', '%' . $search . '%')->get();
        if (count($rooms)>0)

            return view('admin.users.search', compact('rooms', 'user'));
        else
            return view('admin.users.not_found', compact('user'));
    }

}
