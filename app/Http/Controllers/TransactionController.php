<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $users = Admin::all();
        $user = Auth::guard('admin')->user();
        $bookings = Booking::paginate(10);
        $booking_details = BookingDetail::all();
        return view('admin.transaction.index', compact('user', 'bookings', 'users', 'booking_details'));

    }

    public  function show($id)
    {
        $user = Auth::guard('admin')->user();
        $booking = Booking::find($id);
        $customer = User::where('room_id', $booking->booking_room_id)->get();
        $user_booked = Admin::where('id', $booking->user_id)->get();
        $booking_detail = BookingDetail::where('booking_id', $booking->id)->get()->first();
        return view('admin.transaction.show', compact('customer', 'user','booking', 'user_booked', 'booking_detail'));

    }

    public function edit($id)
    {

    }
}
