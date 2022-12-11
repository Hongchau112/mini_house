<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Customer;
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
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class CustomerController extends Controller
{
    public function customer_login()
    {
        $user = '';
        $room_categories = RoomCategory::all();
        $post_categories = PostCategory::all();
        return view('customer.login.login_auth', compact('post_categories', 'room_categories', 'user'));
    }

    public function login(Request $request)
    {
        $user = '';
        $room_categories = RoomCategory::all();
        $post_categories = PostCategory::all();
        $credentials = $request->only('email', 'password');
        $user = Admin::where('email', $request->email)->first();
//        dd($user->password);
        if (Auth::guard('web')->attempt($credentials)) {
//            dd(1);
            Session::put('user_id', $user->id);
            if ($user->status == 0) {
                return redirect()->route('customer.customer_login')->with('message', 'Tài khoản đã bị khóa!');
            } else {
                if ($request->has('rememberme')) {
                    Cookie::queue('adminuser', $request->email, 1440);
                    Cookie::queue('adminpwd', $request->password, 1440);

                }
//                dd(1);
                if ($user->account == 'user') {
                    return redirect()->route('customer.index', 'user');
                }
            }

            }else{
                return redirect()->route('customer.customer_login')->with('error', 'Email hoặc mật khẩu không đúng! Vui lòng thử lại.');
            }
    }

    public function customer_register()
    {
        $user = '';
        $room_categories = RoomCategory::all();
        $post_categories = PostCategory::all();
        return view('customer.login.register_auth', compact('post_categories', 'room_categories', 'user'));
    }

    public function store_customer(Request $request)
    {
//        dd($request->all());
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
            'phone' => 'required | between: 10,12',
            'sex' => 'required',
            'address' => 'required',
            'avatar' => 'required',
            'birthday' => 'required'
        ]);
//        dd(1);

//        dd($validated_data['sex']);
//dd(1);
        $validated_data['password'] = Hash::make($request->new_password);
        $customer = new Admin();
        $customer->name = $validated_data['name'];
        $customer->email = $validated_data['email'];
        $customer->password = $validated_data['password'];
        $customer->phone = $validated_data['phone'];
        $customer->sex = $validated_data['sex'];
        $customer->account = 'user';
        $customer->address = $validated_data['address'];
        $customer->birthday = $validated_data['birthday'];


        //save avatar
        if($request->hasFile('avatar')){
            $filename = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('images'), $filename);
//            dd($filename);
            $customer->avatar = $filename;
        }
        $customer->save();

        return redirect()->route('customer.customer_login')->with('success', 'Tạo tài khoản thành công!');
    }

    public function index()

    {
        $user = '';
        $room_categories = RoomCategory::all();
        $rooms = Room::orderBy('created_at', 'desc')->limit(10)->get();
        $images = Image::all();
        $user = Auth::guard('web')->user();
        $post_categories = PostCategory::all();
        $posts = Post::orderBy('created_at', 'desc')->limit(6)->get();
//        dd($posts);
//        dd(Auth::guard('admin')->user());
        return view('customer.login.index', compact('user', 'post_categories','images', 'rooms', 'room_categories', 'posts'));
    }

//    public function chatify()
//    {
//        return ;
//    }

    public function edit_profile($id)
    {

        $user = Auth::guard('web')->user();
        $post_categories = PostCategory::all();
        $room_categories = RoomCategory::all();

        $user_find = Admin::find($id);
        return view('customer.login.edit_profile', compact('user', 'user_find', 'post_categories', 'room_categories'));
    }

    public function update_profile(Request $request, $id)
    {
        $user = Auth::guard('web')->user();
        $post_categories = PostCategory::all();
        $room_categories = RoomCategory::all();
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$id,
            'phone' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'birthday' => 'required'
        ]);
//dd(1);
        $user = User::find($id);
        $user->name = $validated_data['name'];
        $user->email = $validated_data['email'];
        $user->phone = $validated_data['phone'];
        $user->sex = $validated_data['sex'];
        $user->address = $validated_data['address'];
        $user->birthday = $validated_data['birthday'];


        if($request->hasFile('avatar')){
            $filename = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('images'), $filename);
//            dd($filename);
            $user->avatar = $filename;
        }
        $user->save();

        return redirect()->back()->with('success', 'Sửa thông tin tài khoản thành công!');

    }

    public function listing()
    {
        $user = Auth::guard('web')->user();
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
        $user = Auth::guard('web')->user();
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
        $room_category = $request->get('room_category_id');
        $images = Image::all();
        $user = Auth::guard('web')->user();
        $services = Service::all();
        $room_categories = RoomCategory::all();
//        $rooms = Room::all();
        $filter_search = $request->get('filter');
//        var_dump($filter_search);
        if($filter_search==0)
        {
            $rooms = Room::where('cost', '<', 1000000)->where('room_type_id', $room_category)->get();
//            dd($rooms);
        }
        elseif ($filter_search==1)
        {
            $rooms = DB::table('rooms')->where('room_type_id', $room_category)->whereBetween('cost',[1000000, 2000000])->get();

        }
        elseif ($filter_search==2)
        {
            $rooms = DB::table('rooms')->where('room_type_id', $room_category)->whereBetween('cost',[2000001, 3000000])->get();
//dd($rooms);
        }
        else{
            $rooms = Room::where('cost', '>', 3000000)->where('room_type_id', $room_category)->get();
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

    public function filter_area(Request $request)
    {
        $images = Image::all();
        $user = Auth::guard('web')->user();
        $services = Service::all();
        $room_categories = RoomCategory::all();
//        $rooms = Room::all();
        $filter_area = $request->get('filter');
//        dd($request->get('room_category_id'));
        $room_category = $request->get('room_category_id');
        if ($filter_area == 20) {
            $rooms = Room::where('area', '<', 20)->get();
        } elseif ($filter_area == 30) {
            $rooms = DB::table('rooms')->whereBetween('area', [20, 30])->get();

        } elseif ($filter_area == 40) {
            $rooms = DB::table('rooms')->whereBetween('area', [30, 50])->get();
//            dd($rooms);
        } else {
            $rooms = Room::where('area', '>', 50)->get();
        }
//dd($rooms);
        if (count($rooms) > 0) {
            return view('customer.rooms.filter_result', compact('rooms', 'user', 'images', 'services', 'room_categories'));

        } else {
            return view('customer.rooms.not_found', compact('user'));
        }
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
        $user = Auth::guard('web')->user();
        return view('customer.rooms.show_category', compact('user', 'services', 'post_categories','rooms', 'room_categories' , 'images', 'room_selected', 'category'));

    }

    public function global_search(Request $request)
    {
        $rooms=0;
        $data = $request->all();
        $user = Auth::guard('web')->user();
        $services = Service::all();
        $room_categories = RoomCategory::all();
        $post_categories = PostCategory::all();
        $images = Image::all();
//        dd($data);
        $rooms = Room::where('name', 'LIKE', '%' .$data['search'].'%')->orWhere('cost', 'LIKE', '%' .$data['search'].'%')->orWhere('room_sku', 'LIKE', '%' .$data['search'].'%')->get();
        $room_count = count($rooms);
        $output = '<ul class="dropdown-search"><li style=";padding: 5px; width: 256px; font-size: 14px; color: black; border-bottom: 1px solid black;" class="list-group-item search_room_ajax hover"><p>Có '.$room_count.' kết quả</p></li>';
        foreach ($rooms as $room)
        {
            $output.='
            <li style=";padding: 11px; width: 256px; font-size: 14px; color: black; border-bottom: 1px solid black;" class="list-group-item search_room_ajax hover"><a style="color: black;" href ="/customer/rooms/details/'.$room->id.'">'.$room->name.'</a>
            </li>';
        }
         $output.= '</ul>';
        echo $output;
    }

    public function search(Request $request)
    {
        $user = Auth::guard('web')->user();
        $data = $request->all();
//        dd($data);
        $room_categories = RoomCategory::all();
        $images = Image::all();
        $rooms = Room::where('name', 'LIKE', '%' .$data['key-submit'].'%')->orWhere('cost', 'LIKE', '%' .$data['key-submit'].'%')->get();
        return view('customer.rooms.show_category', compact('rooms', 'room_categories', 'images', 'user'));
    }


    public function booking_history($id)
    {
        $user = Auth::guard('web')->user();
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
        $user = Auth::guard('web')->user();
        $customers = Customer::where('booking_id', $booking->id)->get();
//        dd($customer->name);
        $room_categories = RoomCategory::all();
        $post_categories = PostCategory::all();

        $services = Service::all();

        $serviceRooms = ServiceRoom::where('room_id', $room->id)->get();
        return view('customer.login.booking_details', compact('booking', 'post_categories','serviceRooms','customers', 'booking_detail', 'services','get_category', 'image','room', 'room_categories', 'images', 'user'));
    }


    public function logout()
    {
        Auth::guard('web')->logout();
        Session::forget('user_id');
        return redirect()->route('customer.index');
    }





}
