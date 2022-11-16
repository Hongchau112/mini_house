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
                                    <span class="me-3">{{$booking->created_at}}</span>
                                    @if($booking->booking_status=='old')
                                        <span style="margin-left: 25px; padding: 12px; font-size: 13px; color: white;" class="badge rounded-pill bg-info">Đã trả phòng</span>

                                    @elseif($booking->booking_status=='booked')
                                        <span style="margin-left: 25px; padding: 12px; font-size: 13px; color: white;" class="badge rounded-pill bg-info">Đang thuê</span>
                                    @endif
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex mb-2">
                                            <div class="flex-shrink-0">
                                                <img src="{{asset('/images/'.$image->image_path)}}" alt="" width="150" class="img-fluid">
                                            </div>
                                            <div class="flex-lg-grow-1 ms-3" style="margin-left: 20px;}">
                                                <h6 class="small mb-0"><a href="#" class="text-reset">{{$room->name}}</a></h6>
                                                <span class="small">{{$room->short_intro}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    @if($get_category->room_limit==1)
                                        <td>Phòng 1 người</td>
                                    @endif
                                    <td class="text-end">{{number_format($room->cost)}} đ</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2">Dịch vụ phòng</td>

                                </tr>
                                @php
                                    $tong=$room->cost;
                                @endphp
                                @if($room->maylanh==1)
                                <tr>
                                    <td colspan="2">Máy lạnh</td>
                                    <td class="text-end">{{number_format(300000)}} đ</td>
                                    @php
                                        $tong+=300000;
                                    @endphp
                                </tr>
                                @endif
                                @if($room->bep==1)
                                    <tr>
                                        <td colspan="2">Bếp nấu ăn</td>
                                        <td class="text-end">{{number_format(100000)}} đ</td>
                                    </tr>
                                    @php
                                        $tong+=100000;
                                    @endphp
                                @endif
                                <tr>
                                    <td colspan="2">Phòng có gác</td>
                                    <td class="text-end">{{number_format(200000)}} đ</td>
                                    @php
                                        $tong+=200000;
                                    @endphp
                                </tr>
                                <tr class="fw-bold">
                                    <td colspan="2">Tổng thanh toán</td>
                                    <td class="text-end" style="font-weight: bold;">{{number_format($tong)}} đ</td>
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
                                    <p style="font-size: 14px;"><br>
                                        {{number_format($tong)}} đ<span style="margin-left: 10px" class="badge bg-success rounded-pill"> PAID</span></p>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="h6">Người thanh toán</h3>
                                    <address>
                                        <strong>{{$user->name}}</strong><br>
                                        <br>Địa chỉ: {{$user->address}}
                                        <br>
                                        <abbr title="Phone">SĐT: </abbr> {{$user->phone}}
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Customer Notes -->
                    <div class="card mb-4" style="background-color: #c3fed0;">
                        <div class="card-body">
                            <h3 class="h6">Customer Notes</h3>
                            <p>Sed enim, faucibus litora velit vestibulum habitasse. Cras lobortis cum sem aliquet mauris rutrum. Sollicitudin. Morbi, sem tellus vestibulum porttitor.</p>
                        </div>
                    </div>
                    <div class="card mb-4" style="background-color: #c3fed0;">
                        <!-- Shipping information -->
                        <div class="card-body">
                            <h3 class="h6">Shipping Information</h3>
                            <strong>FedEx</strong>
                            <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i class="bi bi-box-arrow-up-right"></i> </span>
                            <hr>
                            <h3 class="h6">Address</h3>
                            <address>
                                <strong>John Doe</strong><br>
                                1355 Market St, Suite 900<br>
                                San Francisco, CA 94103<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
