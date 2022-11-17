
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 70%;
        }

        th, td {
            padding: 10px;
        }
        .th {
            font-weight: bold;
            width: 230px;
        }
    </style>
</head>
<body>
<p>XIn chào {{$user->name}}<br><br>Chúng tôi sẽ liên hệ với anh chị để xác nhận việc đặt phòng. Khi nhận phòng vui lòng đem theo CCCD để làm thủ tục.</p>
<table border="1px">
    <tr>
        <td class="th">
            Họ tên khách hàng
        </td>
        <td>
            {{$user->name}}
        </td>
    </tr>
    <tr>
        <td class="th">
            Địa chỉ
        </td>
        <td >
            {{$user->address}}
        </td>
    </tr>
    <tr>
        <td class="th">
            Email
        </td>
        <td>
            {{$user->email}}
        </td>
    </tr>
    <tr>
        <td class="th">
            Số điện thoại
        </td>
        <td>
            {{$user->phone}}
        </td>
    </tr>

    <tr>
        <td class="th">
            Tổng tiền
        </td>
        <td>
            {{number_format($booking_detail->total_cost)}} VND
        </td>
    </tr>
    <tr>
        <td class="th">
            Hình thức thanh toán
        </td>
        <td>
            Thanh toán qua ví VPNAY
        </td>
    </tr>
    <tr>
        <td class="th">
            Phòng đã đặt
        </td>
        <td>
            {{$room->id}}
        </td>
    </tr>

</table>

<h5>Ghi chú:</h5>
<p id="p">
    Nếu Anh/chị có bất kỳ thắc mắc, xin liên hệ với chúng tôi qua số điện thoại 0965149361.
    <br>
<p id="footer">Trân trọng,</p>

</body>
</html>
