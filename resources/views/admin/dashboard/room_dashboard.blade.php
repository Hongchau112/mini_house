@extends('admin.dashboard.layout', [
    'title' => ( $title ?? 'Thống kê' )
])
@section('content')
    <style>
        text {
            font-family: Sans-serif !important;
        }
    </style>
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-md-4" style="height: 260px;">
                <div class="card card-bordered card-full">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                            <div class="card-title">
                                <h5 class="title">Người dùng</h5>
                            </div>
                        </div>
                        <div class="invest-data">
                            <div class="invest-data-amount g-2">
                                <div class="invest-data-history">
                                    <div class="title">Tổng số</div>
                                    <h2 class="amount" style="font-size: 45px;"><span class="currency currency-usd">{{$users}}</span></h2>
                                </div>
                            </div>
                            <div class="invest-data-ck" >
                                <img src="/images/customer.png" width="75%" alt="jgf" style="margin-left: 40px;">
                            </div>
                        </div>
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-md-4" style="height: 260px;">
                <div class="card card-bordered card-full">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                            <div class="card-title">
                                <span>
{{--                                    <button  style="margin-left: 10px;">Xem</button>--}}
                                </span>
                                <h5 class="title">Phòng</h5>

                            </div>
                        </div>
                        <div class="invest-data">
                            <div class="invest-data-amount g-2">
                                <div class="invest-data-history">
                                    <div class="title">Tổng số</div>
                                    <h2 class="amount" style="font-size: 45px;"><span class="currency currency-usd">{{$rooms}}</span></h2>
                                </div>
                            </div>


                            <div class="invest-data-ck" >
                                <img src="/images/room1.png" width="75%" alt="jgf" style="margin-left: 40px;">
                            </div>

                        </div>
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-md-4" style="height: 260px;">
                <div class="card card-bordered  card-full">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                            <div class="card-title-group align-start mb-0">
                                <div class="card-title">
                                    <h5 class="title">Đặt phòng</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-amount">

                        </div>
                        <div class="invest-data">
                            <div class="invest-data-amount g-2">
                                <div class="invest-data-history">
                                    <div class="title">Tổng số</div>
                                    <h2 class="amount" style="font-size: 45px;"><span class="currency currency-usd">{{$bookings}}</span></h2>
                                </div>
                            </div>
                            <div class="invest-data-ck" >
                                <img src="/images/booking.png" width="75%" alt="jgf" style="margin-left: 40px;">
                            </div>
                        </div>
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-xl-12 col-xxl-8">
                <div class="row">
                    <div class="card-tools" style="margin: 14px; font-size: 16px;">
                        <select class="link-list-opt no-bdr" name="thoigian" id="select_date" style="width: 150px; padding: 10px;">
                            <option value="all" selected="selected">Tất cả</option>
                            <option value="7ngay" >6 ngày trước</option>
                            <option value="30ngay">30 ngày trước</option>
                            <option value="365ngay" >Một năm trước</option>
                        </select>
                    </div>
                    {{--                    <div class="col-lg-6" style="background-color: #12808b">--}}
                    {{--                        <div style="margin: 15px; text-align: center;font-size: 21px; font-weight: bold;color: white;"> Tổng doanh thu: {{number_format($total)}} VND</div>--}}

                    {{--                    </div>--}}
                </div>
            <div class="col-md-6" style="margin-left: 260px;" id="list">
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



{{--                <div id="chart" style="height: 400px;"></div>--}}
            </div><!-- .col -->


        </div>
    </div>
@endsection
@push('footer')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript">

        {{--$(document).ready(function() {--}}
        {{--    // thongke();--}}
        {{--    var colorDanger = "#FF1744";--}}
        {{--    Morris.Donut({--}}
        {{--        element: 'chart',--}}
        {{--        resize: true,--}}
        {{--        colors: [--}}
        {{--            '#E0F7FA',--}}
        {{--            '#B2EBF2',--}}
        {{--            '#80DEEA',--}}
        {{--            '#4DD0E1'--}}
        {{--        ],--}}
        {{--        // labelColor:"#cccccc", // text color--}}
        {{--        //backgroundColor: '#333333', // border color--}}
        {{--        gridTextFamily: "sans-serif",--}}
        {{--        data: [--}}
        {{--            {label: "Đơn mới", value: <?php echo $booking_new ?>},--}}
        {{--            {label: "Đơn đang xử lý", value:<?php echo $booking_pending ?>},--}}
        {{--            {label: "Đơn thành công", value:<?php echo $booking_success ?>},--}}
        {{--            {label: "Đơn hủy", value:<?php echo $booking_cancel ?>},--}}
        {{--        ]--}}
        {{--    });--}}
        {{--})--}}

        $('#select_date').on('change', function(){
            var thoigian = $(this).val();
            $.ajax({
                url: '{{route('admin.dashboard.statistic_order')}}',
                type: "GET",
                data: {thoigian: thoigian},
                success:function (data){
                    $('#list').html(data);
                    console.log(data);
                }
            });
        });
    </script>


@endpush
