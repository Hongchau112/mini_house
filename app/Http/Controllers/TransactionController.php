<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Image;
use App\Models\Payment;
use App\Models\Room;
use App\Models\RoomCategory;
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
        $user_booked = Admin::where('id', $booking->user_id)->get()->first();
        $room = Room::find($booking->booking_room_id);
        $booking_detail = BookingDetail::where('booking_id', $booking->id)->get()->first();
        $image = Image::where('room_id', $room->id)->get()->first();
        $room_category = RoomCategory::where('id', $room->room_type_id)->get()->first();
//        return view('admin.transaction.show_details', compact('customer', 'user','booking', 'user_booked', 'booking_detail'));
        return view('admin.transaction.show_details', compact('user','room_category', 'image','booking', 'room','user_booked', 'booking_detail', 'customer'));

    }

    public function update_status(Request $request, $id)
    {
        $booking=Booking::find($id);
//        dd($booking->id);
//        dd($request->booking_status);
        $booking->booking_status = $request->booking_status;
        $booking->save();
        $booking_detail = BookingDetail::where('booking_id', $booking->id)->get()->first();
        $booking_detail->booking_status =$request->booking_status;
        $booking_detail->save();
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');

    }

    public function customer_profile($id)
    {
        $user = Auth::guard('admin')->user();
        $user_show = User::find($id);
        return view('admin.transaction.customer_profile', compact('user', 'user_show'));
    }
}
