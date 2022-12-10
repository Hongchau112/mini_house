<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Jobs\SendEmail;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Customer;
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
    public function load_user(Request $request)
    {
        $user_infos = Customer::where('booking_id', '=', null)->where('booking_people_id', '=', $request->user_id)->get();
//        dd($user_infos);
        $output='';
        if (count($user_infos)==0)
        {
            $output.='<div><p>Vui lòng thêm thông tin cho người thuê trọ</p></div>';
        }
        else {
            foreach ($user_infos as $user_info)

            {
                $output .= '<div class="card-body p-4" style="background-color: lightcyan;">
                    <div class="row pt-1">
                    <h6 class="col-6 mb-3">Thông tin người ở</h6>
                    <div class="col-6 mb-3">
                            <a class="btn btn-danger" href="'.route('customer.delete_user', ['id' =>$user_info->id]) .'">Xóa</a>
                        </div>
                    </div>
                    <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                        <div class="col-6 mb-3">
                            <h6>Họ tên</h6>
                            <p class="text-muted">'.$user_info->name.'</p>
                        </div>
                        <div class="col-6 mb-3">
                            <h6>Số điện thoại</h6>
                            <p class="text-muted">'.$user_info->phone.'</p>
                        </div>
                        <div class="col-6 mb-3">
                            <h6>CCCD/CMND</h6>
                            <p class="text-muted">'.$user_info->identified_no.'</p>
                        </div>
                        <div class="col-6 mb-3">
                            <h6>Email</h6>
                            <p class="text-muted">'.$user_info->email.'</p>
                        </div>
                        <div class="col-6 mb-3">
                            <h6>Ngày sinh</h6>
                            <p class="text-muted">'.$user_info->birthday.'</p>
                        </div>
                        <div class="col-6 mb-3">
                            <h6>Giới tính</h6>
                            <p class="text-muted">'.$user_info->sex.'</p>
                        </div>
                        <input type="hidden" name="customer_id" value="'.$user_info->id.'">
                    </div>
                </div> <br>';
    }
    echo $output;
        }
    }

    public function delete_user($id)
    {
        Customer::where('id', $id)->delete();
        return back()->with('success', 'Xóa thông tin thành công!');
    }


    public function customer_order(Request $request)
    {
//        dd($request->all());
        $output = '';
        $user_infos = Customer::where('booking_id', '=', null)->where('booking_people_id', '=', $request->user_id)->get();
        if (count($user_infos)>=$request->room_limit)
        {
//            dd(1);
            return redirect()->back()->with('error', 'Số người ở đã đạt đến số lượng tối đa, bạn không thể thêm được nữa!');
        }
        else{
            $validated_data = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:customers',
                'phone' => 'required',
                'birthday' => 'required',
                'sex' => 'required',
                'address' => 'required',
                'identified_no' => 'required|string|min:9|max:12'
            ]);

            $customer = new Customer();
            $customer->name = $validated_data['name'];
            $customer->email = $validated_data['email'];
            $customer->phone = $validated_data['phone'];
            $customer->birthday = date('Y-m-d',strtotime($validated_data['birthday']));
            $customer->sex = $validated_data['sex'];
            $customer->address = $validated_data['address'];
            $customer->booking_people_id = $request->user_id;
            $customer->identified_no = $validated_data['identified_no'];
            $customer->save();

            //so nguoi o tro
            $user_infos = Customer::where('booking_id', '=', null)->where('booking_people_id','=', $request->user_id)->get();

            foreach ($user_infos as $info) {
                $user_list[] = array(
                    'name' => $customer->name,
                    'email' =>  $customer->email,
                    'phone' => $customer->phone,
                    'birthday' => $customer->birthday,
                    'sex' => $customer->sex,
                    'address' => $customer->address,
                    'identified_no' => $customer->identified_no,
                );
            }
            $user_lists = json_encode($user_list);
            echo "$user_lists";
        }
    }

    public function booking($id)
    {
        if(Session::get('user_id')==null)
            return redirect()->back()->with('error', 'Bạn vui lòng đăng nhập để thực hiện chức năng đặt phòng');
        else{
            $user = Auth::guard('web')->user();
            $room_categories = RoomCategory::all();
            $post_categories = PostCategory::all();
            $room = Room::find($id);
//            dd($room->room_type_id);
            $room_category = RoomCategory::find($room->room_type_id);
            $total_cost = $room->cost;
            $room_limit = RoomCategory::find($room->room_type_id)->room_limit;
            //count user_info
//            $user_infos = Customer::where('booking_id', '=', null)->where('booking_people_id', '=', $user->id)->get();
            //tinh tien dich vu
            $services = Service::all();
            $serviceRooms = ServiceRoom::where('room_id', $id)->get();
            $min =Carbon::now()->format('Y-m-d');
            $max = Carbon::now()->addDays(5)->format('Y-m-d');
            $year = Carbon::now()->subYears(18)->format('Y-m-d');
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

            return view('customer.rooms.order', compact('user','year','min','max','room_limit', 'post_categories','serviceRooms','room', 'room_categories', 'room_category', 'total_cost', 'services'));
        }

    }

    public function store(Request $request)
    {
//        dd($request);
        $user = Auth::guard('web')->user();
        $booking_check = Booking::where('booking_room_id', '=' , $request->room_id)->exists();
        $room = Room::find($request->room_id);


        if(($booking_check) && ($room->status==1))
        {
            return redirect()->route('customer.rooms.listing', compact('user'))->with('error', 'Phòng đã được đặt, bạn không thể đặt thêm nữa');
        }
        $validated_data = $request->validate([
            'payment_method' => 'required',
            'date_expire' => 'required',
        ]);

//        if ($errors)
//        dd(1);


        $images = Image::all();
        $services = Service::all();
//        dd($room->id);
        $user_email = $user->email;
        $user_name = $user->name;
        $room_limit = RoomCategory::find($room->room_type_id)->room_limit;
        //count user_info
        $user_infos = Customer::where('booking_id', '=', null)->where('booking_people_id', '=', $user->id)->get();

//        dd(1);
        if($booking_check)
        {
            return redirect()->route('customer.rooms.listing', compact('user'))->with('error', 'Phòng đã được đặt, bạn không thể đặt thêm nữa');
        }
        elseif(count($user_infos) > $room_limit){

            return redirect()->back()->with('error', 'Số người ở trọ vượt quá số lượng cho phép, vui lòng chọn lại!');
        }
        else {

//dd(1);
            $dataBooking = [
                'user_id' => $user->id,
                'booking_status' => 'new',
                'payment_method' => $validated_data['payment_method'],
                'payment' => 'no',
                'booking_room_id' => $room->id,
                'user_name' => $user->name,
                'date_expire' => $validated_data['date_expire'],
                'user_phone' => $user->phone,
                'created_at' => Carbon::now()
            ];

            //luu thong tin nguoi dat phong
            $booking = Booking::insert($dataBooking);
            $booking_inserted = Booking::where('booking_room_id', $room->id)->first();

            if ($booking_inserted)
            {
                session()->flash('newBooking', true);
            }
            //luu thong tin nguoi o tro
            $user_infos = Customer::where('booking_id', '=', null)->where('booking_people_id', '=', $request->user_booked_id)->get();
            foreach ($user_infos as $user_info){
                $customer = Customer::find($user_info->id);
                $customer->booking_id = $booking_inserted->id;
                $customer->save();
            }

            //luu thong tin bookking details
            $booking_detail = new BookingDetail();
            $booking_detail->payment_method = $dataBooking['payment_method'];
            $booking_detail->booking_id = $booking_inserted->id;
            $booking_detail->room_id = $dataBooking['booking_room_id'];
            $booking_detail->total_cost = $request->total_cost;
            $booking_detail->date = now();
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
                    'method' => $booking_detail->payment_method,
                    'date_expire' => $booking_inserted->date_expire
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
            else{
                return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng kiểm tra lại!');
            }

        }

    }

    public function payment_success(Request $request)
    {
//        dd($request->toArray());
        /// luu thong tin thanh toan o day ne nha
        $booking_id = Session::get('booking_id');
        $user_id = Session::get('user_id');
        $user = \App\Models\User::find($user_id);
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
            Booking::where('id', $booking_id)->delete();
            BookingDetail::where('booking_id', $booking_id)->delete();
            $customers = User::where('booking_id', $booking_id)->get();

            //
            $room->status =0;
            $room->save();
            foreach ($customers as $customer)
            {
                Customer::where('id', $customer->id)->delete();
            }
            return redirect()->route('customer.rooms.listing')->with('error', 'Có lỗi khi thanh toán, vui lòng thực hiện lại sau');
        }

    }


    public function vnpay_online($id)
    {
        $user = Auth::guard('web')->user();
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

    public function cancel_booking($id)
    {
        $booking=Booking::find($id);
        $book_user = Auth::guard('web')->user();
        $booked_email = $book_user->email;
        $booking_detail = BookingDetail::where('booking_id', $booking->id)->get()->first();
        $title_mail = 'Hủy đặt phòng';
        $room = Room::where('id', $booking->booking_room_id)->get()->first();
        $room->status=0;
        $room->save();
        $booking->booking_status='cancel';
        $booking->save();
        Customer::where('booking_id', $booking->id)->delete();
        Mail::send('customer.email.cancel_booking',
            ['room_name' => $room->name,
                'date_booking' => $booking->date,
                'user_name' => $book_user->name,
                'cost' => $booking_detail->total_cost,
                'date_cancel' => Carbon::now()],
            function ($message) use ($title_mail, $booked_email){
                $message->to($booked_email)->subject($title_mail);
                $message->from($booked_email, $title_mail);
            });
        return redirect()->back()->with('success', 'Hủy đặt hàng thành công');
    }



}
