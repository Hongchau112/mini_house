<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Image;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()

    {
        $user = '';
        $room_categories = RoomCategory::all();
        $rooms = Room::all();
        $images = Image::all();
        $user = Auth::guard('admin')->user();
        return view('customer.login.index', compact('user', 'images', 'rooms', 'room_categories'));
    }

    public function edit_profile($id)
    {
        $user = Auth::guard('admin')->user();
        $user_find = Admin::find($id);
        return view('customer.login.edit_profile', compact('user', 'user_find'));
    }

    public function update_profile(Request $request, $id)
    {
        $user = Auth::guard('admin')->user();
//dd($request);
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$id,
//            'email' => 'required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('admins')->ignore($id),
            'phone' => 'required',
            'sex' => 'required',
            'address' => 'nullable',
            'subject' => 'nullable'
        ]);
//dd(1);
        $user = Admin::find($id);
        $user->name = $validated_data['name'];
        $user->email = $validated_data['email'];
        $user->phone = $validated_data['phone'];
        $user->sex = $validated_data['sex'];
        $user->address = $validated_data['address'];
        $user->subject = $validated_data['subject'];


        if($request->hasFile('avatar')){
            $filename = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('images'), $filename);
//            dd($filename);
            $user->avatar = $filename;
        }
        $user->save();

        return redirect()->route('customer.index')->with('success', 'Sửa thông tin tài khoản thành công!');

    }

    public function listing()
    {
        $user = Auth::guard('admin')->user();

        $rooms = Room::all();
        $room_categories = RoomCategory::all();
        $images = Image::all();
        $services = Service::all();
        return view('customer.rooms.listing', compact('rooms', 'room_categories', 'images', 'user', 'services'));
    }

    public function details($id)
    {
        $user = Auth::guard('admin')->user();
        $room = Room::find($id);
        $images = Image::all();
        $services = Service::all();
        $room_categories = RoomCategory::all();

        return view('customer.rooms.detail', compact('room', 'images', 'services', 'room_categories', 'user'));
    }

    public function filter_price(Request $request)
    {
        $images = Image::all();
        $user = Auth::guard('admin')->user();
        $services = Service::all();
        $room_categories = RoomCategory::all();
//        $rooms = Room::all();
        $filter_search = $request->get('filter');
//        var_dump($filter_search);
        if($filter_search==0)
        {
            $rooms = Room::where('cost', '<', 1000000)->get();
//            dd($rooms);
        }
        elseif ($filter_search==1)
        {
            $rooms = DB::table('rooms')->whereBetween('cost',[1000000, 2000000])->get();

        }
        elseif ($filter_search==2)
        {
            $rooms = DB::table('rooms')->whereBetween('cost',[2000001, 3000000])->get();
//dd($rooms);
        }
        else{
            $rooms = Room::where('cost', '>', 3000000)->get();
        }
//dd($rooms);
        if(count($rooms)>0)
        {
            return view('customer.rooms.filter_result' ,compact('rooms', 'user', 'images', 'services', 'room_categories'));

        }
        else
            {
                return view('customer.rooms.not_found', compact('user'));
            }

// dd($filter_search);


    }

    public function show_category($id)
    {
        $room_selected = DB::select(
            'SELECT * FROM rooms WHERE rooms.room_type_id IN
            (SELECT category.id FROM room_categories as category WHERE (category.parent_category_id = ? ) OR (category.id=?))',[$id, $id]);

        for($i = 0 ; $i <count($room_selected);$i++){
            $room_selected[$i] = [$room_selected[$i]->id];
            // dd($test);
        }

        $rooms = Room::whereIn('id',$room_selected)->paginate(5);

        $category = RoomCategory::find($id);
        $room_categories = RoomCategory::all();
        $images = Image::all();

        $user = Auth::guard('admin')->user();
        if ($user)
        {
            return view('customer.rooms.show_category', compact('user','rooms', 'room_categories' , 'images', 'room_selected', 'category'));
        }

    }

    public function global_search(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $not_found = '<p>Không có kết quả nào</p>';
        $rooms = Room::where('name', 'LIKE', '%' .$data['search'].'%')->orWhere('cost', 'LIKE', '%' .$data['search'].'%')->get();
        $output = '<ul class="dropdown-menu" style="display: block; position: relative">';
        foreach ($rooms as $room)
        {
            $output.='
            <li class="search_room_ajax"><a href ="#">'.$room->name.'</a>
            <p>'.$room->cost.'</p></li>';
        }
         $output.= '</ul>';
        echo $output;
    }

    public function search(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $data = $request->all();
//        dd($data);
        $room_categories = RoomCategory::all();
        $images = Image::all();
        $rooms = Room::where('name', 'LIKE', '%' .$data['key-submit'].'%')->orWhere('cost', 'LIKE', '%' .$data['key-submit'].'%')->get();
        return view('customer.rooms.show_category', compact('rooms', 'room_categories', 'images', 'user'));
    }



}
