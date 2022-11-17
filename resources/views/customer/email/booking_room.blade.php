<h2>Xin chào {{$user_name}}</h2>
<p>Bạn đã đặt phòng trọ nhatrogiatot</p>
<table>
    <thead>
    <tr>
        <th>Họ tên</th>
        <th>Số điện thoại</th>
        <th>Phòng đã đặt</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$room_id}}</td>
    </tr>
    </tbody>
</table>
