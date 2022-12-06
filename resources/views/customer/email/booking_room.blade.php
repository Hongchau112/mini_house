
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
<p>XIn chào {{$user_name}}<br><br>Chúng mừng bạn đã đặt phòng thành công! Vui lòng liên hệ trực tiếp để thanh toán tiền phòng trong vòng 5 ngày sau ngày đặt phòng. Nêú không thì việc đặt phòng sẽ bị hủy. Khi nhận phòng vui lòng đem theo CCCD để làm thủ tục. </p>
<table border="1px">
    <tr>
        <td class="th">
            Họ tên khách hàng
        </td>
        <td>
            {{$user_name}}
        </td>
    </tr>
    <tr>
        <td class="th">
            Phòng đã đặt
        </td>
        <td>
            {{$room_name}}
        </td>
    </tr>
    <tr>
        <td class="th">
            Thanh toán tiền
        </td>
        <td>
            {{number_format($total_cost)}} đ
        </td>
    </tr>

    <tr>
        <td class="th">
            Hình thức thanh toán:
        </td>
        @if($method=='cash')
            <td>
                Thanh toán tiền mặt
            </td>
        @else
            <td>
                Thanh toán qua ví VNPAY
            </td>
        @endif
    </tr>


</table>

<h5>Ghi chú:</h5>
<p id="p">
    Nếu Anh/chị có bất kỳ thắc mắc, xin liên hệ với chúng tôi qua số điện thoại 0965149361.
    <br>
<p id="footer">Trân trọng,</p>

</body>
</html>
