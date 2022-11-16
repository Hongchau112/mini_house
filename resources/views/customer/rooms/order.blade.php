@extends('customer.login.layout', [
    'title' => ( $title ?? 'Trang chủ' )
])

@section('content')
    <div class="detail-page pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 mb-30">
                    <h3>Thông tin người đặt phòng trọ</h3>
                    <br>
                    <form class="form-style-1" action="{{route('customer.booking.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Họ và tên<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$user->name}}" name="user_name" id="user-name">
                                    <span class="text-danger">@error('user_name'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Số điện thoại<span class="text-danger">*</span></label>
                                    <input type="text" name="user_phone" value="{{$user->phone}}" id="user_phone" class="form-control">
                                    <span class="text-danger">@error('user_phone'){{$message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Giới tính<span class="text-danger">*</span></label>
                                    <select class="form-control" name="user_sex">
                                        <option value="0">- Chọn -</option>
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                        <option value="other">Khác</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" name="user_email" value="{{$user->email}}" class="form-control">
                                    <span class="text-danger">@error('user_email'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày sinh<span class="text-danger">*</span></label>
                                    <input name="user_birthday" type="text" id="datepickerdob" class="form-control">
                                    <span class="text-danger">@error('user_birthday'){{$message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Địa chỉ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="user_address">
                                    <span class="text-danger">@error('user_address'){{$message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h4>Chọn phương thức thanh toán</h4>
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="cash" id="cash">
                                    <label class="form-check-label" for="cash">
                                       Thanh toán tiền phòng trực tiếp vào ngày nhận phòng
                                    </label>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-lg-6 mb-20">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="vnpay" id="vnpay">
                                    <label class="form-check-label" for="vnpay">
                                        Thanh toán với VNPAY
                                    </label>
                                </div>
                                {{--                            <form action="{{route('customer.payment.vnpay')}}" method="post">--}}
                                {{--                            <form action="{{route('customer.payment.vnpay')}}" method="post">--}}
                                {{--                                @csrf--}}
                                {{--                                <input type="hidden" name="user_id" id="user-id" value="{{$user->id}}">--}}
                                {{--                                <input type="hidden" name="booking_id" id="booking_id" value="{{$booking->id}}">--}}
                                {{--                                <input type="hidden" name="cost" id="cost" value="{{$total_cost}}">--}}
                                {{--                                <button type="submit" style="border: none"  name="redirect"><img src="/images/vnpay.jpg" width="240px" height="100px"></button>--}}
                                {{--                            </form>--}}
                                <a href="{{route('customer.payment.vnpay_online', ['id'=>$room->id])}}"><img src="/images/vnpay.jpg"></a>
                            </div>
                            <div class="col-lg-6 mb-20">
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="radio" name="payment_method" id="momo" >--}}
{{--                                    <label class="form-check-label" for="momo">--}}
{{--                                        Default checked radio--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <form action="{{route('customer.payment.momo')}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" name="redirect" style="border: none"><img src="/images/momo.png" width="240px" height="100px"></button>--}}
{{--                                </form>--}}
                            </div>
                        </div>

                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <button type="submit" class="btn-style-1">Tiếp tục với thanh toán</button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4">
                    <style>
                        .label {
                            font-weight: bold;
                        }
                    </style>
                    <aside>
                        <!-- help us -->
                        <div class="help-us mb-30" style="font-size: 16px;color: white;">
                            <h3>Thanh toán trọ</h3>
                            @php
                            $tong=$room->cost;
                            @endphp
                            <table style="width: 315px;padding: 0px; height: 240px;">
                                <tr>
                                    <td class="label">Loại phòng: </td>
                                    <td>{{$room_category->name}}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <td class="label">Tên phòng</td>
                                    <td>{{$room->name}}</td>
                                </tr>
                                    <td class="label">Tiền phòng/tháng: </td>
                                    <td>{{number_format($room->cost)}} đ</td>
                                </tr>
                                <tr class="label">
                                    <td>Các dịch vụ (Nếu có) </td>
                                </tr>
                                @if($room->gac==1)
                                    @php
                                        $tong+=100000;
                                    @endphp
                                    <tr>
                                        <td class="label">Phòng có gác</td>
                                        <td>{{number_format(100000)}} đ</td>
                                    </tr>
                                @endif
                                @if($room->maylanh==1)
                                    @php
                                        $tong+=300000;
                                    @endphp
                                    <tr>
                                        <td class="label">Máy lạnh</td>
                                        <td>{{number_format(300000)}} đ</td>
                                    </tr>
                                @endif
                                @if($room->bep==1)
                                    @php
                                        $tong+=200000;
                                    @endphp
                                    <tr>
                                        <td>Bếp nấu ăn</td>
                                        <td>{{number_format(200000)}} đ</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="label">Tổng tiền cần thu</td>
                                    <td>{{number_format($tong)}} đ</td>
                                </tr>
                            </table>
                            </div>
                        <!-- help us end -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
