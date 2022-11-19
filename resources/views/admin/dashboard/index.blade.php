@extends('admin.dashboard.layout', [
    'title' => ( $title ?? 'Thống kê' )
])
@section('content')
    <div class="row g-gs">
    <div class="col-xxl-5">
        <div class="card card-bordered h-100">
            <div class="card-inner">
                <div class="card-title-group align-start gx-3 mb-3">
                    <div class="card-title">
                        <h6 class="title">Sales Overview</h6>
                        <p>In 30 days sales of product subscription.</p>
                    </div>
                    <div class="card-tools">
                        <form action="" method="post">
                            @csrf
                            <select class="link-list-opt no-bdr" id="select_date">
                                <option value="1ngay">Hôm nay</option>
                                <option value="7ngay">Trong tuần</option>
                                <option value="30ngay">Trong tháng</option>
                                <option value="365ngay">Trong năm</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="nk-sale-data-group align-center justify-between gy-3 gx-5">
                    <div class="nk-sale-data">
                        <span class="amount">$82,944.60</span>
                    </div>
                    <div class="nk-sale-data">
                        <span class="amount sm" id="selected_option">1,937 <small id>Subscribers</small></span>
                    </div>
                </div>
                <div class="nk-sales-ck large pt-4">
                    <div id="chart" style="height: 200px;"></div>
                </div>
            </div>
        </div><!-- .card -->
    </div><!-- .col -->
    <div class="col-xxl-8">
        <div class="card card-bordered card-full">
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title"><span class="mr-2">Transaction</span> <a href="#" class="link d-none d-sm-inline">See History</a></h6>
                    </div>
                    <div class="card-tools">
                        <ul class="card-tools-nav">
                            <li><a href="#"><span>Paid</span></a></li>
                            <li><a href="#"><span>Pending</span></a></li>
                            <li class="active"><a href="#"><span>All</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-inner p-0 border-top">
                <div class="nk-tb-list nk-tb-orders">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col"><span>Order No.</span></div>
                        <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                        <div class="nk-tb-col tb-col-lg"><span>Ref</span></div>
                        <div class="nk-tb-col"><span>Amount</span></div>
                        <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                        <div class="nk-tb-col"><span>&nbsp;</span></div>
                    </div>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95954</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar user-avatar-sm bg-purple">
                                    <span>AB</span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">Abu Bin Ishtiyak</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">02/11/2020</span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span class="tb-sub text-primary">SUB-2309232</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">4,596.75 <span>USD</span></span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="#">View</a></li>
                                        <li><a href="#">Invoice</a></li>
                                        <li><a href="#">Print</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95850</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar user-avatar-sm bg-azure">
                                    <span>DE</span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">Desiree Edwards</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">02/02/2020</span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span class="tb-sub text-primary">SUB-2309154</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">596.75 <span>USD</span></span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs badge-danger">Canceled</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="#">View</a></li>
                                        <li><a href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95812</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar user-avatar-sm bg-warning">
                                    <img src="./images/avatar/b-sm.jpg" alt="">
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">Blanca Schultz</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">02/01/2020</span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span class="tb-sub text-primary">SUB-2309143</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">199.99 <span>USD</span></span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="#">View</a></li>
                                        <li><a href="#">Invoice</a></li>
                                        <li><a href="#">Print</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95256</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar user-avatar-sm bg-purple">
                                    <span>NL</span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">Naomi Lawrence</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">01/29/2020</span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span class="tb-sub text-primary">SUB-2305684</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="#">View</a></li>
                                        <li><a href="#">Invoice</a></li>
                                        <li><a href="#">Print</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95135</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar user-avatar-sm bg-success">
                                    <span>CH</span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">Cassandra Hogan</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">01/29/2020</span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span class="tb-sub text-primary">SUB-2305564</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs badge-warning">Due</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-action">
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain">
                                        <li><a href="#">View</a></li>
                                        <li><a href="#">Invoice</a></li>
                                        <li><a href="#">Notify</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-inner-sm border-top text-center d-sm-none">
                <a href="#" class="btn btn-link btn-block">See History</a>
            </div>
        </div><!-- .card -->
    </div><!-- .col -->

</div><!-- .row -->
@endsection
@push('footer')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
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
                    {label:"Phòng trọ", value: <?php echo $rooms ?>},
                    {label:"Bài đăng", value:<?php echo $posts ?>},
                    {label:"Đơn đặt phòng", value:<?php echo $bookings ?>},
                    {label:"Khách hàng", value:<?php echo $users ?>},
                ]
            });

        {{--$('#select_date').change(function(){--}}
            {{--    var thoigian = $(this).val();--}}
            {{--    if(thoigian=='1ngay'){--}}
            {{--        var text = 'Hôm nay';--}}
            {{--    }else if(thoigian=='7ngay'){--}}
            {{--        var text = 'Tuần qua';--}}
            {{--    }else if(thoigian=='30ngay'){--}}
            {{--        var text = 'Tháng qua';--}}
            {{--    }else if(thoigian=='365ngay'){--}}
            {{--        var text = 'Năm qua';--}}
            {{--    }--}}
            {{--    $.ajax({--}}
            {{--        url: '{{route('admin.dashboard.statistic_order')}}',--}}
            {{--        method: "POST",--}}
            {{--        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
            {{--        dataType: "JSON",--}}
            {{--        data:{thoigian: thoigian},--}}

            {{--        success:function(data){--}}
            {{--            chart.setData(data);--}}
            {{--            $('selected_option').text(text);--}}
            {{--        }--}}

            {{--    })--}}
            {{--})--}}
            {{--function thongke(){--}}
            {{--    var text='năm qua';--}}
            {{--    $('#selected_option').text(text);--}}
            {{--    $.ajax({--}}
            {{--        url: '{{route('admin.dashboard.statistic_order')}}',--}}
            {{--        method: "POST",--}}
            {{--        dataType: "JSON",--}}
            {{--        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
            {{--        data:{thoigian: thoigian},--}}

            {{--        success:function(data){--}}
            {{--            chart.setData(data);--}}
            {{--            $('selected_option').text(text);--}}
            {{--        }--}}

            {{--    })--}}

            {{--}--}}
        })


    </script>
@endpush
