<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Image;
use App\Models\Payment;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Service;
use App\Models\ServiceRoom;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function booking($id)
    {
        if(Session::get('user_id')==null)
            return redirect()->route('admin.login_auth');
        else{
            $room_categories = RoomCategory::all();
            $room = Room::find($id);
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
            return view('customer.rooms.order', compact('user', 'serviceRooms','room', 'room_categories', 'room_category', 'total_cost', 'services'));
        }

    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:booking',
            'user_phone' => 'required',
            'user_birthday' => 'required',
            'user_sex' => 'required',
            'user_address' => 'required',
            'payment_method' => 'required'
        ]);
//        dd($request->payment_method);
        $images = Image::all();
        $services = Service::all();
        $room = Room::find($request->room_id);
//        dd($room->id);
        $user = Auth::guard('admin')->user();
        $user_email = $request->user_email;
        $user_name = $request->user_name;

//        dd(1);
        $booking_check = Booking::where('booking_room_id', '=' , $request->room_id)->exists();
        if($booking_check)
        {
            return redirect()->route('customer.rooms.listing', compact('user'))->with('error', 'Phòng đã được đặt, bạn không thể đặt thêm nữa');
        }
        else {

//dd(1);
            $dataBooking = [
                'user_id' => $user->id,
                'user_name' => $validated_data['user_name'],
                'user_email' => $validated_data['user_email'],
                'user_phone' => $validated_data['user_phone'],
                'user_birthday' => date('Y-m-d H:i', strtotime($validated_data['user_birthday'])),
                'user_sex' => $validated_data['user_sex'],
                'booking_room_id' => $request->room_id,
                'user_address' => $validated_data['user_address'],
                'payment_method' => $validated_data['payment_method']
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
                    'room_id' => $room->id
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
        $booking= Booking::find($booking_id);
        $room = Room::where('id', $booking->room_id)->get()->first();
        $booking_detail = BookingDetail::where('booking_id', $booking_id)->get()->first();
//        dd($booking_detail);
        if($request->vnp_ResponseCode =='00' and ($request->vnp_TransactionStatus=='00'))
        {
            $booking_detail->vnp_code ='00';
            $booking_detail->save();

            Mail::send('customer.email.booking_room', [
                'booking' => $booking,
                'room_id' => $room->id
            ], function ($mail) use ($booking, $room, $booking_detail){
                $mail->to($user_email, $user_name);
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




    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function momo()
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $redirectUrl = "http://localhost:8000/customer/rooms/payment";
        $ipnUrl = "http://localhost:8000/customer/rooms/payment";
        $extraData = "";


        $requestId = time() . "";
        $requestType = "payWithATM";
//        $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
//        dd($signature);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
//dd($jsonResult);
        return redirect()->to($jsonResult['payUrl']);

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
