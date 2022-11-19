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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function key_search(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $booking_details = BookingDetail::all();
        $search = $request->get('key_search');
        $users = Admin::all();
//        dd($search);
        $bookings = Booking::where('user_name', 'LIKE', '%' . $search . '%')->orWhere('user_phone','LIKE', '%' . $search . '%')->orWhere('date','LIKE', '%' . $search . '%')->get();
        if (count($bookings)>0)

            return view('admin.transaction.search', compact('bookings', 'user', 'users', 'booking_details'));
        else
            return view('admin.transaction.not_found', compact('user'));
    }

    public function payment_search(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $booking_details = BookingDetail::all();
        $bookings = Booking::all();
        $users = Admin::all();
        $filter_search = $request->get('filter');
        if($filter_search=='all')
            return view('admin.transaction.search' ,compact('bookings', 'user', 'booking_details', 'users'));
        else
        {
            $booking_filters = Booking::where('payment', $filter_search)->get();
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
        $customers = Admin::all();
        $get_bookings = Booking::where('payment', 'no')->get();
        $now = Carbon::now()->toDateString();

        $date_remind =date_format(new \DateTime($now), 'd-m-Y');
        $title_mail = "Nhắc nhở thanh toán trọ" .' '.$date_remind;
        foreach ($get_bookings as $booking)
        {
            foreach ($customers as $cus)
                {
                    $remind_date = (Carbon::parse($booking->date))->addDay(8)->toDateString();

                    if(($booking->user_id==$cus->id) && ($remind_date=$now))
                    {
                        $booking_detail = BookingDetail::where('booking_id', $booking->id)->get()->first();
                        $data['email'][] =  $cus->email;
                        $date_expired = (Carbon::parse($booking->date))->addDay(10)->toDateString();
                        $room_name = Room::find($booking->booking_room_id)->name;
                        $user_name = $cus->name;
                        $cost = $booking_detail->total_cost;
                        Mail::send('admin.transaction.mail_reminder',
                            ['room_name' => $room_name,
                            'date_booking' => $booking->date,
                            'user_name' => $user_name,
                            'cost' => $cost,
                            'date_expire' => $date_expired],
                            function ($message) use ($title_mail, $data){
                                $message->to($data['email'])->subject($title_mail);
                                $message->from($data['email'], $title_mail);
                            });
                    }
                }
        }

//        dd($data);
//        Mail::send('admin.transaction.mail_reminder',
//            compact('room', 'cost', 'date_expired'),
//            function ($message) use ($title_mail, $data){
//            $message->to($data['email'])->subject($title_mail);
//            $message->from($data['email'], $title_mail);
//        });
        return redirect()->back()->with('message', 'Gửi email thành công!');
    }
}
