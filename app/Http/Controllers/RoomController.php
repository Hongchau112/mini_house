<?php

namespace App\Http\Controllers;

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

    public function test(Request $request)
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

        $insertedId = $room->id;

        $get_image = $request->file('file');
//        dd($get_image);
        $imageName = time().'.'.$get_image->extension();
        $get_image->move(public_path('images'),$imageName);

        if($get_image){
            foreach($get_image as $image) {
                $room_image = new Image();
                $room_image->room_id = $insertedId;
                $room_image->image_path = $image->move('storage', $image->getClientOriginalName());
                $room_image->save();

            }
        }
//        return redirect()->route('admin.rooms.index', ['rooms'])->with('success', 'Thêm phòng thành công!');
        return response()->json(['success' => $imageName]);
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

        //Lay id cua san pham
        $insertedId = $room->id;

        //Luu hinh anh vao bang images
        $get_image = $request->file('file');
//        dd($get_image);
        $imageName = time().'.'.$get_image->extension();
        $get_image->move(public_path('images'),$imageName);

        if($get_image){
            foreach($get_image as $image) {
                $room_image = new Image();
                $room_image->room_id = $insertedId;
                $room_image->image_path = $image->move('storage', $image->getClientOriginalName());
                $room_image->save();

            }
        }

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

}
