<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function booking()
    {
        $user = Auth::guard('admin')->user();
        return view('customer.rooms.order', compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:booking',
            'phone' => 'required',
            'birthday' => 'required',
            'sex' => 'required',
            'address' => 'required',
        ]);
        $birthday = date('Y-m-d H:i:s');
//        dd($birthday);

        $booking = new Booking();
        $booking->name = $validated_data['name'];
        $booking->email = $validated_data['email'];
        $booking->phone = $validated_data['phone'];
        $booking->birthday = $birthday;
        $booking->sex = $validated_data['sex'];
        $booking->address = $validated_data['address'];
        $booking->save();

        return redirect()->route('customer.rooms.payment', compact('user'));

    }

    public function payment()
    {
        $user = Auth::guard('admin')->user();
        return view('customer.rooms.payment', compact('user'));
    }
}
