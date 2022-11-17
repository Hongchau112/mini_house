<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Service;
use App\Models\ServiceRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class CustomerController extends Controller
{
    public function index()

    {
        $user = '';
        $room_categories = RoomCategory::all();
        $rooms = Room::all();
        $images = Image::all();
        $user = Auth::guard('admin')->user();
        $post_categories = PostCategory::all();
        $posts = Post::all();
        return view('customer.login.index', compact('user', 'post_categories','images', 'rooms', 'room_categories', 'posts'));
    }

    public function edit_profile($id)
    {

        $user = Auth::guard('admin')->user();
        $post_categories = PostCategory::all();
        $room_categories = RoomCategory::all();

        $user_find = Admin::find($id);
        return view('customer.login.edit_profile', compact('user', 'user_find', 'post_categories', 'room_categories'));
    }

    public function update_profile(Request $request, $id)
    {
        $user = Auth::guard('admin')->user();
        $post_categories = PostCategory::all();
        $room_categories = RoomCategory::all();
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
        $post_categories = PostCategory::all();
        $rooms = Room::paginate(5);
        $room_categories = RoomCategory::all();
        $images = Image::all();
        $services = Service::all();
//        $serviceRooms = ServiceRoom::all();
        return view('customer.rooms.listing', compact('rooms', 'post_categories','room_categories', 'images', 'user', 'services'));
    }

    public function details($id)
    {
        $user = Auth::guard('admin')->user();
        $room = Room::find($id);
        $images = Image::all();
        $services = Service::all();
        $room_categories = RoomCategory::all();
        $services = Service::all();
        $serviceRooms = ServiceRoom::where('room_id', $id)->get();
        $roomSameCategory = Room::where('room_type_id', $room->room_type_id)->get();
        $room_category = RoomCategory::find($room->room_type_id);
        $post_categories = PostCategory::all();

        return view('customer.rooms.detail', compact('room','post_categories','room_category', 'roomSameCategory','serviceRooms','images', 'services', 'room_categories', 'user'));
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
        $post_categories = PostCategory::all();
        $services = Service::all();
        $user = Auth::guard('admin')->user();
        return view('customer.rooms.show_category', compact('user', 'services', 'post_categories','rooms', 'room_categories' , 'images', 'room_selected', 'category'));

    }

    public function global_search(Request $request)
    {
        $data = $request->all();
        $user = Auth::guard('admin')->user();
        $services = Service::all();
        $room_categories = RoomCategory::all();
        $post_categories = PostCategory::all();
        $images = Image::all();
//        dd($data);
        $rooms = Room::where('name', 'LIKE', '%' .$data['search'].'%')->orWhere('cost', 'LIKE', '%' .$data['search'].'%')->get();
        $output = '<ul class="dropdown-menu" style="display: block; position: relative; ">';
        foreach ($rooms as $room)
        {
            $output.='
            <li style="padding: 5px; width: 300px; color: black; border: #0a0f18" class="list-group-item search_room_ajax"><a href ="/customer/rooms/details/'.$room->id.'">'.$room->name.'</a>
            </li>';
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


    public function booking_history($id)
    {
        $user = Auth::guard('admin')->user();
        $rooms = Room::all();
        $customer_id = Session::get('user_id');
        $room_categories = RoomCategory::all();
$post_categories = PostCategory::all();
        $images = Image::all();
        if (!$customer_id)
        {
            return redirect()->route('admin.login_auth')->with('message', 'Vui lòng đăng nhập');
        }
        else{
            $booking_rooms = Booking::where('user_id', $customer_id)->orderby('id', 'DESC')->get();
//            dd($booking_rooms);
            return view('customer.login.booking_history', compact('user', 'room_categories','post_categories', 'rooms', 'booking_rooms', 'images'));
        }

    }

    public function booking_details($id)
    {
        $images = Image::all();
        $booking = Booking::find($id);
        $booking_detail = BookingDetail::where('booking_id', $id)->get()->first();
        $room = Room::where('id', $booking->booking_room_id)->get()->first();
        $get_category = RoomCategory::where('id', $room->room_type_id)->get()->first();
        $image = Image::where('room_id', $room->id)->get()->first();
        $user = Auth::guard('admin')->user();
        $customers = User::where('room_id', $room->id)->get();
//        dd($customer->name);
        $room_categories = RoomCategory::all();
        $post_categories = PostCategory::all();

        $services = Service::all();

        $serviceRooms = ServiceRoom::where('room_id', $room->id)->get();
        return view('customer.login.booking_details', compact('booking', 'post_categories','serviceRooms','customers', 'booking_detail', 'services','get_category', 'image','room', 'room_categories', 'images', 'user'));
    }

    public function test_modal()
    {
        return view('customer.rooms.test_modal');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::forget('user_id');
        return redirect()->route('customer.index');
    }



}
