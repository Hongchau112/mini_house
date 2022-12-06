<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Post;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $user = Auth::guard('admin')->user();
        $users = \App\Models\Admin::where('account', 'user')->get()->count();
        $posts = Post::all()->count();
        $rooms = Room::all()->count();
        $bookings = Booking::all()->count();
        $booking_new = Booking::where('booking_status', 'new')->get()->count();
        $booking_pending = Booking::where('booking_status', 'pending')->get()->count();
        $booking_success = Booking::where('booking_status', 'success')->get()->count();
        $booking_cancel = Booking::where('booking_status', 'cancel')->get()->count();
        $new_bookings = Booking::where('booking_status', 'new')->get();
        $booking_details = BookingDetail::all();
//        dd($booking_details);
        return view('admin.dashboard.room_dashboard', compact('user','booking_details', 'new_bookings','users', 'posts', 'rooms', 'bookings', 'booking_new', 'booking_pending', 'booking_success', 'booking_cancel'));
    }

    public function statistic_order(Request $request)
    {
        $data = '';
        $user = Auth::guard('admin')->user();
        $thoigian = $request->thoigian;
//        dd($thoigian);
        $subdays = Carbon::now()->subDays(365)->toDateString();
        //xu ly ngay
        if ($thoigian=='7ngay')
        {
            $subdays = Carbon::now()->subDays(7)->toDateString();
        }
        elseif ($thoigian=='30ngay')
        {
            $subdays = Carbon::now()->subDays(30)->toDateString();
        }
        elseif ($thoigian=='365ngay')
        {
            $subdays = Carbon::now()->subDays(365)->toDateString();
        }
        $get_bookings=[];
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $new_bookings = Booking::whereBetween('date',[$subdays, $now])->get();
        $user = Auth::guard('admin')->user();
        $users = \App\Models\Admin::where('account', 'user')->get()->count();
        $posts = Post::all()->count();
        $rooms = Room::all()->count();
        $bookings = Booking::all()->count();
        $booking_new = Booking::where('booking_status', 'new')->get()->count();
        $booking_pending = Booking::where('booking_status', 'pending')->get()->count();
        $booking_success = Booking::where('booking_status', 'success')->get()->count();
        $booking_cancel = Booking::where('booking_status', 'cancel')->get()->count();
        $booking_details = BookingDetail::all();

        return view('admin.dashboard.result', compact('user','booking_details', 'new_bookings','users', 'posts', 'rooms', 'bookings', 'booking_new', 'booking_pending', 'booking_success', 'booking_cancel'));
        //get array

    }


}
