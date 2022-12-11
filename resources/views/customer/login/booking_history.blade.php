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
    <div class="about-page pt-70 pb-60" style="margin-top: 30px;">
        <table class="table table-hover" style="width: 80%; margin: 108px 0 200px 170px;">
            <thead style="background-color: #ade6b8;">
            <tr>
                <th scope="col">Mã phòng</th>
                <th scope="col">Tên phòng</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tùy chọn</th>
            </tr>
            </thead>
            <tbody style="background-color: aliceblue;">
            @foreach($booking_rooms as $get_booking)
                <tr >
                    @foreach($rooms as $room)
                        @if($get_booking->booking_room_id==$room->id)
                            <th scope="row">{{$room->room_sku}}</th>
                            <td>{{$room->name}}</td>
                        @endif
                    @endforeach
                    <td>{{date_format($get_booking->created_at, 'd-m-Y H:m:s')}}</td>
                    @if(($get_booking->booking_status=='pending') or ($get_booking->booking_status=='new'))
                        <td> <span  class="btn btn-warning" style="color: white; font-size: 12px">Đang xử lý</span></td>
                    @elseif($get_booking->booking_status=='cancel')
                        <td style="color: green;"><span  class="btn btn-outline-danger" style="font-size: 12px">Đã hủy</span></td>
                    @elseif($get_booking->booking_status=='success')
                        <td> <span  class="btn btn-success" style="color: white; font-size: 12px;background-color: #31b675;">Thành công</span></td>
                    @endif
                    <td><button class="btn btn-success" style="font-size: 12px;"><a href="{{route('customer.booking_details', ['id'=> $get_booking->id])}}" style="    color: white;
    font-weight: bold;">Xem chi tiết</a></button>
                        @if(($get_booking->booking_status=='pending') or ($get_booking->booking_status=='new'))
                            <button class="btn btn-danger" style="font-size: 12px;" ><a style="color: white" href="{{route('customer.cancel_booking', ['id'=>$get_booking->id])}}">Hủy</a></button>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
