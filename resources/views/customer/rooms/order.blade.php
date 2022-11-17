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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Họ và tên<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$user->name}}" name="name" id="name">
                                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Số điện thoại<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{{$user->phone}}" id="phone" class="form-control">
                                    <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>CCCD/CMND<span class="text-danger">*</span></label>
                                    <input type="text" name="identified_no" id="identified_no" class="form-control">
                                    <span class="text-danger">@error('identified_no'){{$message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Giới tính<span class="text-danger">*</span></label>
                                    <select class="form-control" name="sex">
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
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control">
                                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ngày sinh<span class="text-danger">*</span></label>
                                    <input name="birthday" type="text" id="datepickerdob" class="form-control">
                                    <span class="text-danger">@error('birthday'){{$message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nghề nghiệp<span class="text-danger">*</span></label>
                                    <select class="form-control" name="title">
                                        <option value="0">- Chọn -</option>
                                        <option value="student">Sinh viên</option>
                                        <option value="adult">Người đi làm</option>
                                        <option value="other">Khác</option>
                                    </select>
                                    <span class="text-danger">@error('title'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Địa chỉ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address">
                                    <span class="text-danger">@error('address'){{$message}}@enderror</span>
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
                                <a href="{{route('customer.payment.vnpay_online', ['id'=>$room->id])}}"><img src="/images/vnpay.jpg"></a>
                            </div>
                            <div class="col-lg-6 mb-20">
                            </div>
                        </div>

                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <input type="hidden" name="total_cost" value="{{$total_cost}}">
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
                                @foreach($serviceRooms as $serviceRoom)
                                    @foreach($services as $service)
                                        @if($serviceRoom->service_id==$service->id)
                                            <tr>
                                                <td class="label">{{$service->getName()}}</td>
                                                <td>{{number_format($service->getCost())}} đ</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach

                                <tr>
                                    <td class="label">Tổng tiền cần thu</td>
                                    <td>{{number_format($total_cost)}} đ</td>
                                </tr>
                            </table>
                            </div>
                        <!-- help us end -->
                    </aside>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
