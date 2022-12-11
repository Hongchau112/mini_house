<table>
    <thead style="background-color: #afefcd; font-size: 20px;">
    <th style="width: 300px; text-align: center; padding: 20px; ">Trạng thái</th>
    <th style="width: 400px;text-align: center; padding: 20px">Số lượng</th>
    </thead>
    <tbody style="background-color: #f2ffed; font-size: 20px;">
    <tr>
        <td style="width: 300px; text-align: center; padding: 20px">Tất cả</td>
        <td style="width: 300px; text-align: center; padding: 20px"> {{$all}}</td>
    </tr>
    <tr>
        <td style="width: 300px; text-align: center; padding: 20px">Mới</td>
        <td style="width: 300px; text-align: center; padding: 20px"> {{$new_bookings}}</td>
    </tr>
    <tr>
        <td style="width: 300px; text-align: center; padding: 20px">Đang xử lý</td>
        <td style="width: 300px; text-align: center; padding: 20px">{{$pending_bookings}}</td>
    </tr>

    <tr>
        <td style="width: 300px; text-align: center; padding: 20px">Thành công</td>
        <td style="width: 300px; text-align: center; padding: 20px">{{$success_bookings}}</td>
    </tr>

    <tr>
        <td style="width: 300px; text-align: center; padding: 20px">Đã hủy</td>
        <td style="width: 300px; text-align: center; padding: 20px">{{$cancel_bookings}}</td>
    </tr>
    </tbody>
</table>
