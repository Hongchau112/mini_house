@extends('customer.login.layout')
@section('content')
    <div class="detail-page pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 mb-30">
                    <form class="form-style-1">
                        <h4 class="mb-15">Trang thanh toán</h4>
                        <div class="list-box mb-30" style="background: #d7f5ff">
                            <table style="font-size: 16px;
    background: aliceblue;
    padding: 2px;
    margin: 35px;
    width: 450px;
    height: 231px;">
                                <th>Thông tin giao thanh toán</th>
                                <tr>
                                    @php
                                        $tong=$room->cost;
                                    @endphp
                                    <td>Phòng đặt: </td>
                                    <td>{{$room->name}}</td>
                                </tr>
                                <tr>
                                    <td>Giá phòng</td>
                                    <td>{{number_format($room->cost)}} VND</td>
                                </tr>
                                <tr>

                                        @if($room->maylanh==1)
                                            @php
                                            $tong+=300000;
                                            @endphp
                                        <td>Máy lạnh: </td>
                                        <td>{{number_format(300000)}} VND</td>
                                        @endif
                                </tr>
                                    <tr>
                                    @if($room->bep==1)
                                                @php
                                                    $tong+=100000;
                                                @endphp
                                                <td>Bếp: </td>
                                                <td>{{number_format(100000)}} VND</td>
                                    @endif
                                    </tr>
                                <tr>
                                    @if($room->gac==1)
                                                @php
                                                    $tong+=200000;
                                                @endphp
                                                <td>Gác</td>
                                                <td>{{number_format(200000)}} VND</td>
                                    @endif

                                </tr>
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td>{{number_format($tong)}} VND</td>
                                </tr>
                            </table>
{{--                            <div class="owl-carousel list-box-carousel">--}}
{{--                                @foreach($images as $image)--}}
{{--                                    @if($room->id == $image->room_id)--}}
{{--                                        @php--}}
{{--                                            $image_path = $image->image_path;--}}
{{--                                        @endphp--}}
{{--                                        <figure class="item"> <img src="{{asset('/images/'.$image_path)}}" alt="img description"> </figure>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                            <div class="list-box-content">--}}
{{--                                <div class="list-box-title">--}}
{{--                                    <h3>Phòng {{$room->name}}<span>{{number_format($room->cost)}} VND<em></em></span></h3>--}}
{{--                                </div>--}}
{{--                                <div class="list-box-rating"> <span class="at-stars"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i> </span> <em>1000 review</em> </div>--}}
{{--                                <ul class="hotel-featured">--}}
{{--                                    @foreach($services as $service)--}}
{{--                                        @if($service->room_id==$room->id)--}}
{{--                                            @if($service->bep==1)--}}
{{--                                                <li><span><i class="fas fa-home"></i> Bếp nấu ăn</span></li>--}}
{{--                                            @endif--}}
{{--                                            @if($service->gac==1)--}}
{{--                                                <li><span><i class="fas fa-home"></i> Phòng có gác</span></li>--}}
{{--                                            @endif--}}
{{--                                            @if($service->maylanh==1)--}}
{{--                                                <li><span><i class="fas fa-sad-cry"></i> Máy lạnh</span></li>--}}
{{--                                            @endif--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                    <li>--}}
{{--                                        <input type="hidden" id="room_id" value="{{$room->id}}">--}}
{{--                                        <a href="{{route('customer.add_wistlist', ['id'=>$room->id])}}" id="btn-wishlist"><i class="fa fa-heart"></i></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <div class="btn-wrapper mt-20 d-inline-block w-100"> <a class="view-detail-btn" href="">Chi tiết</a> <a class="book-now-btn ml-6" href="{{route('customer.rooms.booking', ['id' =>$room->id])}}">Đặt ngay</a> </div>--}}
{{--                            </div>--}}
                        </div>

                    </form>
                    <div>Thanh toán bằng: </div>
                        <div class="row">
                            <div class="col-lg-6 mb-20">
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
                                <form action="{{route('customer.payment.momo')}}" method="post">
                                    @csrf
                                    <button type="submit" name="redirect" style="border: none"><img src="/images/momo.png" width="240px" height="100px"></button>
                                </form>
                            </div>
                        </div>
                </div>

{{--                <div class="col-lg-4 col-md-4">--}}
{{--                    <aside>--}}
{{--                        <!-- filter widget -->--}}
{{--                        <div class="filter-widget mb-20">--}}
{{--                            <div class="accordion filter-accordion" id="filter-widget-accordion4-d">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header" id="headingOne4-d"> <a class="btn btn-link w-100 text-left" href="" data-toggle="collapse" data-target="#collapseOne4-m" aria-expanded="true" aria-controls="collapseOne4-m">--}}
{{--                                            <!-- title widget -->--}}
{{--                                            <div class="filter-title-widget">--}}
{{--                                                <h3>Hotel Details <i class="fas fa-plus-square float-right"></i> <i class="fas fa-minus-square float-right"></i></h3>--}}
{{--                                            </div>--}}
{{--                                            <!-- title widget end -->--}}
{{--                                        </a> </div>--}}
{{--                                    <div id="collapseOne4-m" class="collapse show mt-10" aria-labelledby="headingOne4-d" data-parent="#filter-widget-accordion4-d">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <ul class="list-inline select-all mb-10">--}}
{{--                                                <li class="list-inline-item">Hilton Miami Downtown</li>--}}
{{--                                            </ul>--}}
{{--                                            <div class="table-responsive">--}}
{{--                                                <table class="table table-bordered bg-gray w-100 border-0">--}}
{{--                                                    <tr>--}}
{{--                                                        <td>Check In</td>--}}
{{--                                                        <td>Jan 01, 2020 Wed</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>Check Out</td>--}}
{{--                                                        <td>Jan 01, 2020 Fri</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>Room 1</td>--}}
{{--                                                        <td>1  Adult(s)</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td><form class="form-style-1">--}}
{{--                                                                <input type="text" class="form-control" placeholder="Coupon Code">--}}
{{--                                                            </form></td>--}}
{{--                                                        <td><button type="submit" class="btn-style-1">Apply</button></td>--}}
{{--                                                    </tr>--}}
{{--                                                </table>--}}
{{--                                            </div>--}}
{{--                                            <div class="table-responsive">--}}
{{--                                                <table class="table table-bordered bg-gray mb-0 w-100 border-0">--}}
{{--                                                    <tr>--}}
{{--                                                        <td>Adult Price</td>--}}
{{--                                                        <td>$900</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>Children Price</td>--}}
{{--                                                        <td>$0</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>Infant Price</td>--}}
{{--                                                        <td>$0</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>Subtotal</td>--}}
{{--                                                        <td>$0</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>Tex</td>--}}
{{--                                                        <td>0%</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <th>Pay Amount</th>--}}
{{--                                                        <th>$900</th>--}}
{{--                                                    </tr>--}}
{{--                                                </table>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- filter widget end -->--}}
{{--                        <!-- help us -->--}}
{{--                        <div class="help-us mb-30">--}}
{{--                            <h3>How can we help you?</h3>--}}
{{--                            <p>Lorem ipsum dolor sit ametdf consectetur adipiscing elitdgsh ametdf consectetur piscing.</p>--}}
{{--                            <a class="view-detail-btn" href=""><i class="fas fa-phone-alt"></i> Contact Us</a> </div>--}}
{{--                        <!-- help us end -->--}}
{{--                    </aside>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
