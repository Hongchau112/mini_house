<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Jobs\SendEmail;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Image;
use App\Models\Payment;
use App\Models\PostCategory;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Service;
use App\Models\ServiceRoom;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function booking($id)
    {
//        dd(1);
//        dd(Session::get('user_id'));
        if(Session::get('user_id')==null)
            return redirect()->back()->with('error', 'Bạn vui lòng đăng nhập để thực hiện chức năng đặt phòng');
        else{
            $room_categories = RoomCategory::all();
            $post_categories = PostCategory::all();
            $room = Room::find($id);
//            dd($room->room_type_id);
            $room_category = RoomCategory::find($room->room_type_id);
            $total_cost = $room->cost;
            //tinh tien dich vu
            $services = Service::all();
            $serviceRooms = ServiceRoom::where('room_id', $id)->get();
//            dd($serviceRooms);
            foreach ($serviceRooms as $serviceRoom)
            {
                foreach ($services as $service)
                {
                    if($serviceRoom->service_id==$service->id)
                    {
                        $total_cost+=$service->getCost();
                    }
                }
            }
//            dd($total_cost);

            $user = Auth::guard('admin')->user();
            return view('customer.rooms.order', compact('user', 'post_categories','serviceRooms','room', 'room_categories', 'room_category', 'total_cost', 'services'));
        }

    }

    public function store(Request $request)
    {
        $user = Auth::guard('admin')->user();

        $booking_check = Booking::where('booking_room_id', '=' , $request->room_id)->exists();

        if($booking_check)
        {
            return redirect()->route('customer.rooms.listing', compact('user'))->with('error', 'Phòng đã được đặt, bạn không thể đặt thêm nữa');
        }
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'birthday' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'payment_method' => 'required',
            'title' => 'required',
            'identified_no' => 'required|string|min:9|max:12'
        ]);
//        dd(1);

        $customer = new User();
        $customer->name = $validated_data['name'];
        $customer->email = $validated_data['email'];
        $customer->phone = $validated_data['phone'];
        $customer->birthday = date('Y-m-d',strtotime($validated_data['birthday']));
        $customer->sex = $validated_data['sex'];
        $customer->address = $validated_data['address'];
        $customer->title = $validated_data['title'];
        $customer->identified_no = $validated_data['identified_no'];
        $customer->room_id = $request->room_id;
        $customer->save();

//        dd($request->payment_method);
        $images = Image::all();
        $services = Service::all();
        $room = Room::find($request->room_id);
//        dd($room->id);
        $user_email = $user->email;
        $user_name = $user->name;

//        dd(1);
        if($booking_check)
        {
            return redirect()->route('customer.rooms.listing', compact('user'))->with('error', 'Phòng đã được đặt, bạn không thể đặt thêm nữa');
        }
        else {

//dd(1);
            $dataBooking = [
                'user_id' => $user->id,
                'user_name' => $validated_data['name'],
                'user_email' => $validated_data['email'],
                'user_phone' => $validated_data['phone'],
                'user_birthday' => date('Y-m-d H:i', strtotime($validated_data['birthday'])),
                'user_sex' => $validated_data['sex'],
                'booking_room_id' => $request->room_id,
                'user_address' => $validated_data['address'],
                'booking_status' => 'pending',
                'payment_method' => $validated_data['payment_method'],
                'payment' => 'no',
                'date'=> now()

            ];

            //luu thong tin nguoi dat phong
            $booking = Booking::insert($dataBooking);
            $booking_inserted = Booking::where('booking_room_id', $room->id)->first();
            //luu thong tin bookking details
            $booking_detail = new BookingDetail();
            $booking_detail->payment_method = $dataBooking['payment_method'];
            $booking_detail->booking_id = $booking_inserted->id;
            $booking_detail->room_id = $dataBooking['booking_room_id'];
            $booking_detail->total_cost = $request->total_cost;
            $booking_detail->date = now();
            $booking_detail->booking_status = "pending";
            $booking_detail->save();
            if($booking_inserted)
            {
                $room->status = 1;
                $room->save();
            }

            if($validated_data['payment_method']=='cash')
            {


                //gui email xac nhan dat hang thanh cong
                Mail::send('customer.email.booking_room', [
                    'user_name' => $user_name,
                    'booking' => $booking_inserted,
                    'room_id' => $room->id,
                    'total_cost' => $booking_detail->total_cost,
                    'room_name' => $room->name,
                    'method' => $booking_detail->payment_method
                ], function ($mail) use ($user_email, $user_name, $request){
                    $mail->to($user_email, $user_name);
                    $mail->from('hongchau2000st@gmail.com');
                    $mail->subject("Đặt phòng trọ thành công");
                });

                ///doi status cua phong sau khi dat

                return redirect()->route('customer.rooms.listing', ['id'=>$booking_inserted->id])->with('success', 'Đặt phòng thành công, bạn vui lòng kiểm tra email để biết thêm chi tiết!');
            }
            elseif ($validated_data['payment_method']=='vnpay')
            {
                Session::put('booking_id', $booking_inserted->id);
//                Booking::insert($dataBooking);
//                dd(1);
                return redirect()->route('customer.payment.vnpay_online', ['id'=>$booking_inserted->id]);
            }

        }

    }

    public function payment_success(Request $request)
    {
//        dd($request->toArray());
        /// luu thong tin thanh toan o day ne nha
        $booking_id = Session::get('booking_id');
        $user_id = Session::get('user_id');
        $user = \App\Models\Admin::find($user_id);
//        dd($user)
        $user_name = $user->name;
        $user_email = $user->email;
        $booking= Booking::find($booking_id);
//        dd($booking->id);
        $room = Room::where('id', $booking->booking_room_id)->get()->first();
//        dd($room);
        $booking_detail = BookingDetail::where('booking_id', $booking_id)->get()->first();
//        dd($booking_detail);
        if($request->vnp_ResponseCode =='00' and ($request->vnp_TransactionStatus=='00'))
        {
            //thanh toan thanh cong
            $booking->payment = 'yes';
            $booking->save();
            $booking_detail->vnp_code ='00';
            $booking_detail->save();

            Mail::send('customer.email.booking_room', [
                'user_name' => $user_name,
                'booking' => $booking,
                'room_id' => $room->id,
                'total_cost' => $booking_detail->total_cost,
                'room_name' => $room->name,
                'method' => $booking_detail->payment_method
            ], function ($mail) use ($user, $booking, $room, $booking_detail, $user_name){
                $mail->to($user->email, $user_name, $user, $room);
                $mail->from('hongchau2000st@gmail.com');
                $mail->subject("Đặt phòng trọ thành công");
            });


            return redirect()->route('customer.rooms.listing')->with('success', 'Đặt phòng thành công, bạn vui lòng kiểm tra email để biết thêm chi tiết!');
        }
        else{
            $booking_detail->vnp_code ='error';
            $booking_detail->save();
            return redirect()->route('customer.rooms.listing')->with('error', 'Có lỗi khi thanh toán, vui lòng thực hiện lại sau');
        }

    }


    public function vnpay_online($id)
    {
        $user = Auth::guard('admin')->user();
        $booking = Booking::find($id);
//        dd($booking->id);
        $booking_detail = BookingDetail::where('booking_id', $booking->id)->get()->first();
        $room = Room::where('id', $booking->booking_room_id)->first();
        $total_cost= $booking_detail->total_cost;
        Session::put('booking_id', $booking->id);
        return view('customer.vnpay.vnpay_index', compact('user', 'total_cost', 'booking', 'room'));
    }

    public function vnpay_payment(Request $request)
    {
        $data = $request->all();
        $code_vnpay = rand(00, 9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/customer/payment/success"; //thanh toan thanh cong se tra ve
        $vnp_TmnCode = "ZRTWFNN6";//Mã website tại VNPAY
        $vnp_HashSecret = "UCAIBLHEMJCGUVGHFPGURNAJCXYFXGHZ"; //Chuỗi bí mật

        $vnp_TxnRef = $code_vnpay; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->cost * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
//            "vnp_room_id" => $room_id,
//            "vnp_booking_id" => $booking_id

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

//var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }


        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);

        //luu vao db


        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        return redirect($vnp_Url);
    }



}
