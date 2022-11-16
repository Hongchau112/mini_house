@extends('customer.login.layout', [
    'title' => ( $title ?? 'Cập nhật thông tin' )
])
@section('content')
    <table class="table table-hover" style="width: 80%;margin-left: 170px;">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên phòng</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Tùy chọn</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i = 1;
        @endphp
        @foreach($booking_rooms as $get_booking)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$get_booking->booking_room_id}}</td>
                <td>{{$get_booking->created_at}}</td>
                <td>Đang thuê</td>
                <td><button class="btn btn-success" style="font-size: 12px;"><a href="{{route('customer.booking_details', ['id'=> $get_booking->id])}}" style="    color: white;
    font-weight: bold;">Xem chi tiết</a></button></td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
        </tbody>
    </table>
@endsection
