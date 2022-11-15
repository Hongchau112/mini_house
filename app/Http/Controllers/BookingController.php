<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\Booking;
use App\Models\Image;
use App\Models\Payment;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function booking($id)
    {
        $room_categories = RoomCategory::all();
        $room = Room::find($id);
        $room_category = RoomCategory::find($room->room_type_id);
        $user = Auth::guard('admin')->user();
        return view('customer.rooms.order', compact('user', 'room', 'room_categories', 'room_category'));
    }

    public function store(Request $request)
    {
//        dd($request->payment_method);
        $images = Image::all();
        $services = Service::all();
        $room = Room::find($request->room_id);
//        dd($room->id);
        $user = Auth::guard('admin')->user();
//        dd(1);
        $booking_check = Booking::where('booking_room_id', '=' , $request->room_id)->exists();
        if($booking_check)
        {
            return redirect()->route('customer.rooms.listing', compact('user'))->with('error', 'Không thể đặt');
        }
        else {
            $validated_data = $request->validate([
                'user_name' => 'required',
                'user_email' => 'required|email|unique:booking',
                'user_phone' => 'required',
                'user_birthday' => 'required',
                'user_sex' => 'required',
                'user_address' => 'required',
                'payment_method' => 'required'
            ]);
//dd(1);
            $dataBooking = [
                'user_name' => $validated_data['user_name'],
                'user_email' => $validated_data['user_email'],
                'user_phone' => $validated_data['user_phone'],
                'user_birthday' => date('Y-m-d H:i', strtotime($validated_data['user_birthday'])),
                'user_sex' => $validated_data['user_sex'],
                'booking_room_id' => $request->room_id,
                'user_address' => $validated_data['user_address'],
                'payment_method' => $validated_data['payment_method']
            ];

            if($validated_data['payment_method']=='cash')
            {
//            dd(1);
                $booking = Booking::insert($dataBooking);
//            dd($booking);
                $booking_inserted = Booking::where('booking_room_id', $room->id)->first();
                SendEmail::dispatch($booking)->delay(now()->addMinute(1));
                return view('customer.rooms.booking_success', ['id'=>$booking_inserted->id]);
            }
            elseif ($validated_data['payment_method']=='vnpay')
            {
                Booking::insert($dataBooking);
                return redirect()->route('customer.payment.vnpay_online', ['id'=>$room->id]);
            }

        }


//        $booking = new Booking();
//        $booking->name = $validated_data['name'];
//        $booking->email = $validated_data['email'];
//        $booking->phone = $validated_data['phone'];
//        $booking->birthday = $birthday;
//        $booking->sex = $validated_data['sex'];
//        $booking->room_id = $request->room_id;
//        $booking->address = $validated_data['address'];
//        $booking->save();

//        $bookings = Booking::all();


    }

    public function payment($id)
    {
        $booking = Booking::find($id);
        $total_cost = 0;
        $room = Room::find($booking->room_id);
        $total_cost+=$room->cost;
        if ($room->maylanh==1)
        {
            $total_cost+=300000;
        }
        if ($room->bep==1)
        {
            $total_cost+=100000;
        }
        if ($room->gac==1)
        {
            $total_cost+=200000;
        }

//        dd($total_cost);
//        dd($booking->room_id);
        $images = Image::all();
        $services = Service::all();
        $user = Auth::guard('admin')->user();
        if($room->status==0)
        {
            $room->status=1;
            $room->save();
        }
        return view('customer.rooms.payment', compact('user', 'images','booking', 'services', 'room', 'total_cost'));

    }

    public function payment_success(Request $request)
    {
//        dd($request->toArray());
        /// luu thong tin thanh toan o day ne nha
        if($request->vnp_ResponseCode =='00')
        {
            $vnpayData = $request->all();
        }
        $user = Auth::guard('admin')->user();

//        dd($user->id);
        $dataPayment = [
          'transaction_id' => $vnpayData['vnp_TransactionNo'],
            'transaction_code' => $vnpayData['vnp_TxnRef'],
            'user_id' => $user->id,
            'money' => $vnpayData['vnp_Amount'],
            'note' => $vnpayData['vnp_OrderInfo'],
            'vnp_response_code' => $vnpayData['vnp_ResponseCode'],
            'code_vnpay' => $vnpayData['vnp_TransactionNo'],
            'code_bank' => $vnpayData['vnp_BankCode'],
            'time' => date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate']))
        ];
//        dd($dataPayment);
        Payment::insert($dataPayment);
        \Illuminate\Support\Facades\Session::flash('toastr',
        ['type' => 'success',
        'message' => 'Đơn hàng của bạn đã được lưu']);
        return view('customer.vnpay.vnpay_return', compact('vnpayData'));
    }


    public function vnpay(Request $request)
    {
        $code_vnpay = rand(00, 9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/customer/payment/success"; //thanh toan thanh cong se tra ve
        $vnp_TmnCode = "ZRTWFNN6";//Mã website tại VNPAY
        $vnp_HashSecret = "UCAIBLHEMJCGUVGHFPGURNAJCXYFXGHZ"; //Chuỗi bí mật

        $vnp_TxnRef = $code_vnpay; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'thanh toán đơn hàng';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $_POST['cost'] * 100;
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
            "vnp_TxnRef" => $vnp_TxnRef,

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
        $total_cost = 0;
        $room = Room::find($id);
        $booking = Booking::where('booking_room_id', $room->id)->get()->id;
//        dd($booking);
        $total_cost+=$room->cost;
        if ($room->maylanh==1)
        {
            $total_cost+=300000;
        }
        if ($room->bep==1)
        {
            $total_cost+=100000;
        }
        if ($room->gac==1)
        {
            $total_cost+=200000;
        }

        return view('customer.vnpay.vnpay_index', compact('user', 'total_cost', 'booking', 'room'));
    }

    public function vnpay_payment(Request $request)
    {
//        dd($request->toArray());
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
            "vnp_TxnRef" => $vnp_TxnRef,

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
