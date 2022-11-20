@extends('customer.login.layout', [
    'title' => ( $title ?? 'Cập nhật thông tin' )
])

@section('content')
    <style>
        body{
            background:white;
            font-size: 14px;
        }
        .card mb-4 {
            background-color: #f1fff8;
        }
        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: 1rem;
        }
        .text-reset {
            --bs-text-opacity: 1;
            color: inherit!important;
        }
        a {
            color: #5465ff;
            text-decoration: none;
        }
    </style>
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
    <div class="container-fluid">

        <div class="container">
            <!-- Title -->
            <div class="d-flex justify-content-between align-items-center py-3">
                <h2 class="h5 mb-0"><a href="#" class="text-muted"></a>Chi tiết đặt phòng</h2>
            </div>

            <!-- Main content -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Details -->
                    <div class="card mb-4" style="background-color: #c3fed0;">
                        <div class="card-body">
                            <div class="mb-3 d-flex justify-content-between">
                                <div>
                                    <span class="me-3">Ngày đặt: </span>
                                    <span class="me-3">{{$booking_detail->date}}</span>

                                    @if($booking->booking_status=='old')
                                        <span style="margin-left: 25px; padding: 12px; font-size: 13px; color: white;" class="badge rounded-pill bg-info">Đã trả phòng</span>

                                    @elseif($booking->booking_status=='booked')
                                        <span style="margin-left: 25px; padding: 12px; font-size: 13px; color: white;" class="badge rounded-pill bg-info">Đặt thành công - Đang thuê</span>
                                    @elseif($booking->booking_status=='pending')
                                        <span style="margin-left: 25px; padding: 12px; font-size: 13px; color: white;" class="badge rounded-pill bg-info">Đặt thành công - Chờ nhận phòng</span>
                                    @endif
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex mb-2">
                                            <div class="flex-shrink-0">
                                                <img src="{{asset('/images/'.$image->image_path)}}" alt="" width="130" class="img-fluid">
                                            </div>
                                            <div class="flex-lg-grow-1 ms-3" style="margin-left: 20px;}">
                                                <h6 class="small mb-0"><a href="#" class="text-reset">{{$room->name}}</a></h6>
                                                <span class="small">{{$room->short_intro}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$get_category->getCategory()}}</td>
                                    <td class="text-end">{{number_format($room->cost)}} đ</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2">Dịch vụ phòng</td>

                                </tr>
                                @foreach($serviceRooms as $serviceRoom)
                                    @foreach($services as $service)
                                        @if($serviceRoom->service_id==$service->id)
                                            <tr>
                                                <td colspan="2">{{$service->getName()}}</td>
                                                <td class="text-end">{{number_format($service->getCost())}} đ</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                                <tr class="fw-bold">
                                    <td colspan="2">Tổng thanh toán</td>
                                    <td class="text-end" style="font-weight: bold;">{{number_format($booking_detail->total_cost)}} đ</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Payment -->
                    <div class="card mb-4" style="background-color: #c3fed0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="h6">Thanh toán thông qua: </h3>
                                    <p style="font-size: 14px;">
                                        @if($booking_detail->payment_method=='cash')
                                        <span>Thanh toán tiền mặt khi nhận phòng</span>
                                    @elseif($booking_detail->payment_method=='vnpay')
                                            <span>Thanh toán bằng VNPAY <span style="margin-left: 10px" class="badge bg-success rounded-pill">Đã thanh toán</span></span>
                                        @endif<br>
                                    </p>
                                    <img src="/images/paid.png" width="100px">
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="h6">Người thanh toán</h3>
                                    <address>
                                        <strong>{{$user->name}}</strong><br><br>
                                        <p>Địa chỉ: {{$user->address}}</p>
                                        <p>Email: {{$user->email}}</p>
                                        <p>Số điện thoại: {{$user->phone}}</p>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Customer Notes -->
{{--                    <div class="card mb-4" style="background-color: #c3fed0;">--}}
{{--                        <div class="card-body">--}}
{{--                            <h3 class="h6">Customer Notes</h3>--}}
{{--                            <p>Sed enim, faucibus litora velit vestibulum habitasse. Cras lobortis cum sem aliquet mauris rutrum. Sollicitudin. Morbi, sem tellus vestibulum porttitor.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="card mb-4" style="background-color: #c3fed0;">
                        <!-- Shipping information -->
                        <div class="card-body">
                            <h3 >Thông tin người ở trọ</h3>
                            <strong></strong>
                            <span>Số người: {{count($customers)}}</span>
                            <hr>
                            <h3 class="h6">Thông tin cá nhân</h3>
                            @foreach($customers as $customer)
                                <table class="table table-borderless">
                                    <tr>
                                        <td style="font-weight: bold;">Họ và tên:</td>
                                        <td class="label"> {{$customer->name}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">SĐT</td>
                                        <td colspan="2"> {{$customer->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">CCCD</td>
                                        <td class="label"> {{$customer->identified_no}}</td>
                                    </tr>
                                    <tr >
                                        <td style="font-weight: bold;">Giới tính:</td>
                                        <td class="label"> {{$customer->sex}}</td>
                                    </tr>
                                    <tr >
                                        <td style="font-weight: bold;">Nghề nghiệp</td>
                                        <td class="label"> {{$customer->title}}</td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
