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
        $user = Auth::guard('web')->user();
        $users = \App\Models\User::where('account', 'user')->get()->count();
        $posts = Post::all()->count();
        $rooms = Room::all()->count();
        $bookings = Booking::all()->count();
        $new_bookings = Booking::where('booking_status', 'new')->get()->count();
        $pending_bookings = Booking::where('booking_status', 'pending')->get()->count();
        $success_bookings = Booking::where('booking_status', 'success')->get()->count();
        $cancel_bookings = Booking::where('booking_status', 'cancel')->get()->count();
//        $new_bookings = Booking::all();
        $booking_details = BookingDetail::all();
//        dd($booking_details);
        $total = 0;
        $all_bookings = Booking::all();
        $all= Booking::all()->count();

        foreach ($all_bookings as $get_price)
        {
            $booking_detail_p = BookingDetail::where('booking_id', $get_price->id)->get()->first();
            $total += $booking_detail_p->total_cost;
        }

        return view('admin.dashboard.room_dashboard', compact('user','all','total','booking_details', 'new_bookings','users', 'posts', 'rooms', 'bookings', 'new_bookings', 'pending_bookings', 'success_bookings', 'cancel_bookings'));
    }

    public function statistic_order(Request $request)
    {
        $data = '';
        $user = Auth::guard('web')->user();
        $thoigian = $request->thoigian;
//        dd($thoigian);
        $subdays = Carbon::now()->subDays(7)->toDateString();
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

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $new_bookings = Booking::whereBetween('created_at',[$subdays, $now])->get();
//        dd($new_bookings);
//        $user = Auth::guard('web')->user();
        $users = \App\Models\User::where('account', 'user')->get()->count();
        $posts = Post::all()->count();
        $rooms = Room::all()->count();
        $bookings = Booking::all()->count();
        $new_bookings = Booking::where('booking_status', 'new')->whereBetween('created_at', [$subdays, $now])->get()->count();
        $pending_bookings = Booking::where('booking_status', 'pending')->whereBetween('created_at', [$subdays, $now])->get()->count();
        $success_bookings = Booking::where('booking_status', 'success')->whereBetween('created_at', [$subdays, $now])->get()->count();
        $cancel_bookings = Booking::where('booking_status', 'cancel')->whereBetween('created_at', [$subdays, $now])->get()->count();
        $booking_details = BookingDetail::all();
        $total = 0;
        $all= Booking::whereBetween('created_at', [$subdays, $now])->get()->count();

//        foreach ($new_bookings as $get_price)
//        {
//            $booking_detail_p = BookingDetail::where('booking_id', $get_price->id)->get()->first();
//            $total += $booking_detail_p->total_cost;
//        }

        return view('admin.dashboard.result', compact('user', 'all','total','booking_details', 'new_bookings','users', 'posts', 'rooms', 'bookings', 'new_bookings', 'pending_bookings', 'success_bookings', 'cancel_bookings'));
        //get array

    }


}
