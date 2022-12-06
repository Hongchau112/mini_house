@extends('admin.dashboard.layout', [
    'title' => ( $title ?? 'Thống kê' )
])
@section('content')
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
            <div class="col-md-12 col-xxl-4">
{{--                <div class="card-tools">--}}
{{--                    <form action="" method="post">--}}
{{--                        @csrf--}}
{{--                        <select class="link-list-opt no-bdr" id="select_date">--}}
{{--                            <option value="7ngay">Trong tuần</option>--}}
{{--                            <option value="30ngay">Trong tháng</option>--}}
{{--                            <option value="365ngay">Trong năm</option>--}}
{{--                        </select>--}}
{{--                    </form>--}}
{{--                </div>--}}

                <div id="chart" style="height: 400px;"></div>
            </div><!-- .col -->

            <div class="col-xl-12 col-xxl-8">
                <div class="card-tools" style="margin: 14px;width: 116px; font-size: 16px;">
                        <select class="link-list-opt no-bdr" name="thoigian" id="select_date">
                            <option value="1ngay">Hôm nay</option>
                            <option value="7ngay">Trong tuần</option>
                            <option value="30ngay">Trong tháng</option>
                            <option value="365ngay">Trong năm</option>
                        </select>
                </div>
                <div class="card card-bordered card-full">
                    <div class="card-inner border-bottom">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Các đơn mới</h6>
                            </div>
                            <div class="card-tools">
                                <a href="#" class="link">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="nk-tb-list" id="list">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col"><span>Phòng</span></div>
                            <div class="nk-tb-col tb-col-sm"><span>Người đặt</span></div>
                            <div class="nk-tb-col tb-col-lg"><span>Ngày</span></div>
                            <div class="nk-tb-col"><span>Giá</span></div>
                            <div class="nk-tb-col tb-col-sm"><span>Trạng thái</span></div>
                            <div class="nk-tb-col"><span>&nbsp;</span></div>
                        </div>
                        @foreach($new_bookings as $new_booking)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col">
                                <div class="align-center">
                                    <div class="user-avatar user-avatar-sm bg-light">
                                        <span>P1</span>
                                    </div>
                                    <span class="tb-sub ml-2">{{$new_booking->room_id}}</span></span>
                                </div>
                            </div>
                            <div class="nk-tb-col tb-col-sm">
                                <div class="user-card">
                                    <div class="user-avatar user-avatar-xs bg-pink-dim">
                                        <span>JC</span>
                                    </div>
                                    <div class="user-name">
                                        <span class="tb-lead">{{$new_booking->user_id}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-tb-col tb-col-lg">
                                <span class="tb-sub">{{$new_booking->date}}</span>
                            </div>
                            <div class="nk-tb-col">
                                @foreach($booking_details as $detail)
                                    @if($detail->booking_id==$new_booking->id)
                                        <span class="tb-sub tb-amount">{{number_format($detail->total_cost)}}<span> đ</span></span>
                                    @endif
                                @endforeach
                            </div>
                            <div class="nk-tb-col tb-col-sm">
                                <span class="badge badge-dot badge-dot-xs badge-warning">Đơn Mới</span>
                            </div>
                            <div class="nk-tb-col nk-tb-col-action">
                                <div class="dropdown">
                                    <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                        <ul class="link-list-plain">
                                            <li><a href="{{route('admin.transactions.show', ['id' => $new_booking->id])}}">Xem</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->
        </div>
    </div>
@endsection
@push('footer')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            // thongke();
            var colorDanger = "#FF1744";
            Morris.Donut({
                element: 'chart',
                resize: true,
                colors: [
                    '#E0F7FA',
                    '#B2EBF2',
                    '#80DEEA',
                    '#4DD0E1'
                ],
                //labelColor:"#cccccc", // text color
                //backgroundColor: '#333333', // border color
                data: [
                    {label: "Đơn mới", value: <?php echo $booking_new ?>},
                    {label: "Đơn đang xử lý", value:<?php echo $booking_pending ?>},
                    {label: "Đơn thành công", value:<?php echo $booking_success ?>},
                    {label: "Đơn hủy", value:<?php echo $booking_cancel ?>},
                ]
            });
        })

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
