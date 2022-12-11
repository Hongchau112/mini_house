<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Customer;
use App\Models\Image;
use App\Models\Payment;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function index()
    {
        if (Session::get('user_id')==null)
        {
            return redirect()->route('admin.login');
        }
        $users = Admin::all();
        $user = Auth::guard('web')->user();
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);
        $booking_details = BookingDetail::all();
        return view('admin.transaction.listing', compact('user', 'bookings', 'users', 'booking_details'));

    }

    public  function show($id)
    {
        $user = Auth::guard('web')->user();
        $booking = Booking::find($id);
        $customers = Customer::where('booking_id', $booking->id)->get();
        $user_booked = User::where('id', $booking->user_id)->get()->first();
        $room = Room::find($booking->booking_room_id);
        $booking_detail = BookingDetail::where('booking_id', $booking->id)->get()->first();
        $image = Image::where('room_id', $room->id)->get()->first();
        $room_category = RoomCategory::where('id', $room->room_type_id)->get()->first();
//        return view('admin.transaction.show_details', compact('customer', 'user','booking', 'user_booked', 'booking_detail'));
        return view('admin.transaction.booking_details', compact('user','customers','room_category', 'image','booking', 'room','user_booked', 'booking_detail'));

    }

    public function update_status(Request $request, $id)
    {

        $booking=Booking::find($id);
        $booked_user = User::where('id', $booking->user_id)->get()->first();
        $booked_email = $booked_user->email;
        $booking->booking_status = $request->booking_status;
        $booking->save();
        $booking_detail = BookingDetail::where('booking_id', $booking->id)->get()->first();
        $title_mail = 'Hủy đặt phòng';
        $title_success = "Xác nhận hoàn tất giao dịch đặt phòng";
        if ($booking->booking_status=='cancel'){
            $room = Room::where('id', $booking->booking_room_id)->get()->first();
            $room->status=0;
            $room->save();
            Customer::where('booking_id', $booking->id)->delete();
            Mail::send('admin.transaction.cancel_booking',
                ['room_name' => $room->name,
                    'date_booking' => $booking->date,
                    'user_name' => $booked_user->name,
                    'cost' => $booking_detail->total_cost,
                    'date_cancel' => Carbon::now()],
                function ($message) use ($title_mail, $booked_email){
                    $message->to($booked_email)->subject($title_mail);
                    $message->from($booked_email, $title_mail);
                });

        }
        if ($booking->booking_status=='success'){
            $booking->payment = 'yes';
            $booking->save();
            $room = Room::where('id', $booking->booking_room_id)->get()->first();
            $room->status=1;
            $room->save();

            Mail::send('admin.transaction.booking_success',
                ['room_name' => $room->name,
                    'date_booking' => $booking->date,
                    'user_name' => $booked_user->name,
                    'cost' => $booking_detail->total_cost,
                    'date_cancel' => Carbon::now()],
                function ($message) use ($title_success, $booked_email){
                    $message->to($booked_email)->subject($title_success);
                    $message->from($booked_email, $title_success);
                });

        }
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');

    }

    public function cancel_booking($id){
        $booking=Booking::find($id);
        $booked_user = User::where('id', $booking->user_id)->get()->first();
        $booked_email = $booked_user->email;
        $booking->booking_status = 'cancel';
        $booking->save();
        $booking_detail = BookingDetail::where('booking_id', $booking->id)->get()->first();
        $booking_detail->booking_status ='cancel';
        $booking_detail->save();
        $title_mail = 'Hủy đặt phòng';
        $room = Room::where('id', $booking->booking_room_id)->get()->first();
        $room->status=0;
        $room->save();
        Customer::where('booking_id', $booking->id)->delete();
        Mail::send('admin.transaction.cancel_booking',
            ['room_name' => $room->name,
                'date_booking' => $booking->date,
                'user_name' => $booked_user->name,
                'cost' => $booking_detail->total_cost,
                'date_cancel' => Carbon::now()],
            function ($message) use ($title_mail, $booked_email){
                $message->to($booked_email)->subject($title_mail);
                $message->from($booked_email, $title_mail);
            });
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');

    }

    public function customer_profile($id)
    {
        $user = Auth::guard('web')->user();
        $user_show = Customer::find($id);
        return view('admin.transaction.customer_profile', compact('user', 'user_show'));
    }

    public function key_search(Request $request)
    {
//        dd($request->get('key_search'));
        $user = Auth::guard('web')->user();
        $booking_details = BookingDetail::all();
        $search = $request->get('key_search');
        $users = User::all();
//        dd($search);
        $bookings = Booking::orderBy('created_at', 'desc')->where('user_name', 'LIKE', '%' . $search . '%')->orWhere('created_at', 'LIKE', '%' . $search . '%')->orWhere('room_sku', 'LIKE', '%' . $search . '%')->get();
//dd($bookings);
        if (count($bookings)>0)

            return view('admin.transaction.search', compact('bookings', 'user', 'users', 'booking_details'));
        else
            return view('admin.transaction.not_found', compact('user'));
    }

    public function payment_search(Request $request)
    {
        $user = Auth::guard('web')->user();
        $booking_details = BookingDetail::all();
        $bookings = Booking::all();
        $users = User::all();
        $filter_search = $request->get('filter');
        if($filter_search=='all')
            return view('admin.transaction.search' ,compact('bookings', 'user', 'booking_details', 'users'));
        else
        {
            $booking_filters = Booking::orderBy('created_at', 'desc')->where('payment', $filter_search)->get();
//        dd($user_list);
//            dd($booking_filters);
            if(count($booking_filters) > 0){
                $bookings = $booking_filters;
//                dd($booking_filters);
                return view('admin.transaction.search', compact('bookings', 'user', 'users', 'booking_details'));
            }
            else{
                return view('admin.transaction.not_found', compact('user'));

            }

        }
    }
    //gui mail nhac nho dong tien tro
    public function mail_reminder()
    {
        $customers = User::all();
        $get_bookings = Booking::where('payment', 'no')->get();
        $date_remind =Carbon::now()->format('d-m-Y H:m:s');
        $title_mail = "Nhắc nhở thanh toán trọ";
        foreach ($get_bookings as $booking)
        {
            foreach ($customers as $cus)
                {
//                    $remind_date = (Carbon::parse($booking->date))->addDay(4)->toDateString();

                    if(($booking->user_id==$cus->id) && ($booking->date_expire=$date_remind))
                    {
                        $booking_detail = BookingDetail::where('booking_id', $booking->id)->get()->first();
                        $data['email'][] =  $cus->email;
                        $room_name = Room::find($booking->booking_room_id)->name;
                        $user_name = $cus->name;
                        $cost = $booking_detail->total_cost;
                        Mail::send('admin.transaction.mail_reminder',
                            ['room_name' => $room_name,
                            'date_booking' => $booking->date,
                            'user_name' => $user_name,
                            'cost' => $cost,
                            'date_expire' => $booking->date_expire],
                            function ($message) use ($title_mail, $data){
                                $message->to($data['email'])->subject($title_mail);
                                $message->from($data['email'], $title_mail);
                            });
                    }
                }
        }
        return redirect()->back()->with('success', 'Gửi email nhắc nhở thanh toán đến người dùng thành công!');
    }
}
