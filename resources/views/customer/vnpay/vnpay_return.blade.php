<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('vnpay_php/assets/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{asset('vnpay_php/assets/jumbotron-narrow.css')}}" rel="stylesheet">
    <script src="{{'vnpay_php/assets/jquery-1.11.3.min.js'}}"></script>
</head>
<body>
<?php
require_once("vnpay_php/config.php");
$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
?>
    <!--Begin display -->
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">KẾT QUẢ GIAO DỊCH VNPAY</h3>
        <p>Thanh toán thành công, hệ thống sẽ gửi email xác nhận giao dịch đến bạn, vui lòng chờ giây lát!</p>
    </div>
    <div class="table-responsive">
        <div class="form-group">
            <label >Mã đơn hàng:</label>

            <label>{{$vnpayData['vnp_TxnRef']}}</label>
        </div>
        <div class="form-group">

            <label >Số tiền:</label>
            <label>{{$vnpayData['vnp_Amount']}}</label>
        </div>
        <div class="form-group">
            <label >Nội dung thanh toán:</label>
            <label>{{$vnpayData['vnp_OrderInfo']}}</label>
        </div>
        <div class="form-group">
            <label >Mã phản hồi (vnp_ResponseCode):</label>
            <label>{{$vnpayData['vnp_ResponseCode']}}</label>
        </div>
        <div class="form-group">
            <label >Mã GD Tại VNPAY:</label>
            <label>{{$vnpayData['vnp_TransactionNo']}}</label>
        </div>
        <div class="form-group">
            <label >Mã Ngân hàng:</label>
            <label>{{$vnpayData['vnp_BankCode']}}</label>
        </div>
        <div class="form-group">
            <label >Thời gian thanh toán:</label>
            <label>{{date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate']))}}</label>
        </div>
        <div class="form-group">
            <label >Kết quả:</label>
            <label>
                @if($vnpayData['vnp_response_code']=='00')
                <p>Giao dịch thành công</p>
                @else
                    <p>Đã có lỗi khi xử lý giao dịch</p>
                @endif
            </label>
        </div>
        <div><button class="btn btn-success" ><a href="{{route('customer.index')}}">Trở về trang chủ</a></button></div>
    </div>
    <p>
        &nbsp;
    </p>
    <footer class="footer">
        <p>&copy; VNPAY <?php echo date('Y')?></p>
    </footer>
</div>
</body>
</html>
