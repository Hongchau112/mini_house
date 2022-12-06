@extends('customer.login.layout', [
    'title' => ( $title ?? 'Cập nhật thông tin' )
])
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-hover" style="width: 80%; margin: 10px 0 200px 170px;">
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
                @foreach($rooms as $room)
                    @if($get_booking->booking_room_id==$room->id)
                        <td>{{$room->name}}</td>
                    @endif
                @endforeach
                    <td>{{$get_booking->date}}</td>
                @if(($get_booking->booking_status=='pending') or ($get_booking->booking_status=='new'))
                    <td> <span  class="btn btn-warning" style="color: white; font-size: 12px">Đang xử lý</span></td>
                @elseif($get_booking->booking_status=='cancel')
                    <td style="color: green;">Đã hủy</td>
                @elseif($get_booking->booking_status=='success')
                    <td style="color: green;">Thành công</td>
                @endif
                <td><button class="btn btn-success" style="font-size: 12px;"><a href="{{route('customer.booking_details', ['id'=> $get_booking->id])}}" style="    color: white;
    font-weight: bold;">Xem chi tiết</a></button>
                    @if(($get_booking->booking_status=='pending') or ($get_booking->booking_status=='new'))
                        <button class="btn btn-danger" style="font-size: 12px;" ><a style="color: white" href="{{route('customer.cancel_booking', ['id'=>$get_booking->id])}}">Hủy</a></button>
                    @endif
                </td>

            </tr>
            @php
                $i++;
            @endphp
        @endforeach
        </tbody>
    </table>
@endsection
