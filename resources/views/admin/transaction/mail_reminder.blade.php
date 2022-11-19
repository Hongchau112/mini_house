
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
            width: 200px;
        }
    </style>
</head>
<body>
<p>Xin chào {{$user_name}}.<br><br> Trước tiên, cảm ơn bạn đã đặt phòng trọ tại nhatrogiatot</p>
<p>Email này được gửi để nhắc nhở bạn, hãy nhanh chóng đến phòng trọ để thanh toán tiền phòng trước khi hết hạn vào ngày {{date_format(new DateTime($date_expire), 'd-m-Y')}}
    . Nếu quá hạn thì việc đặt phòng của bạn sẽ hết hiệu lực bạn nhé.</p>

<p>Thông tin về việc đặt phòng và thanh toán</p>
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
            {{number_format($cost)}} đ
        </td>
    </tr>

    <tr>
        <td class="th">
            Hình thức thanh toán:
        </td>
            <td>
                Thanh toán tiền mặt
            </td>
    </tr>
    <tr>
        <td class="th">
            Ngày đặt phòng:
        </td>
        <td>
            {{date_format(new DateTime($date_booking), 'd-m-Y')}}
        </td>
    </tr>
    <tr>
        <td class="th">
            Ngày hết hạn:
        </td>
        <td>
            {{date_format(new DateTime($date_expire), 'd-m-Y')}}
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

