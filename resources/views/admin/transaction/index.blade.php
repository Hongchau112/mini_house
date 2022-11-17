@extends('admin.transaction.layout', [
    'title' => ( $title ?? 'Quản lý giao dịch' )
])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h5 class="title">Danh sách đặt phòng</h5>
                        </div>
                        <div class="card-tools mr-n1">
                            <ul class="btn-toolbar">
                                <li>
                                    <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                </li><!-- li -->
                                <li class="btn-toolbar-sep"></li><!-- li -->
                                <li>
                                </li><!-- li -->
                            </ul><!-- .btn-toolbar -->
                        </div><!-- card-tools -->
                        <div class="card-search search-wrap" data-search="search">
                            <div class="search-content">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by order id">
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                            </div>
                        </div><!-- card-search -->
                    </div><!-- .card-title-group -->
                </div><!-- .card-inner -->
                <div class="card-inner p-0">
                    <table class="table table-tranx">
                        <thead>
                        <tr class="tb-tnx-head">
                            <th class="tb-tnx-id"><span class="">ID Phòng</span></th>
                            <th class="tb-tnx-info">
                                                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                <span>ID người đặt</span>
                                                            </span>
                                <span class="tb-tnx-date d-md-inline-block d-none">
                                                                <span class="d-md-none">Date</span>
                                                                <span class="d-none d-md-block">
                                                                    <span>Ngày giao dịch</span>
                                                                </span>
                                                            </span>
                            </th>
                            <th class="tb-tnx-amount is-alt">
                                <span class="tb-tnx-total">Tổng tiền</span>
                                <span class="tb-tnx-status d-none d-md-inline-block">Trạng thái</span>
                            </th>
                            <th class="tb-tnx-action">
                                <span>&nbsp;</span>
                            </th>
                        </tr><!-- tb-tnx-item -->
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                        <tr class="tb-tnx-item">
                            <td class="tb-tnx-id">
                                <a href="{{route('admin.rooms.show', ['id'=>$booking->booking_room_id])}}"><span>{{$booking->booking_room_id}}</span></a>
                            </td>
                            <td class="tb-tnx-info">
                                <div class="tb-tnx-desc">
                                    <span class="title">{{$booking->user_name}}</span>
                                </div>
                                <div class="tb-tnx-date">
                                    <span class="date">{{$booking->date}}</span>
                                </div>
                            </td>
                            <td class="tb-tnx-amount is-alt">
                                <div class="tb-tnx-total">
                                    @foreach ($booking_details as $detail)
                                        @if($booking->id==$detail->booking_id)
                                            <span class="amount">{{number_format($detail->total_cost)}} đ</span>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="tb-tnx-status">
                                    @if($booking->booking_status=='pending')
                                        <span class="badge badge-dot badge-warning">Đang xử lý</span>
                                    @elseif($booking->booking_status ='success')
                                        <span class="badge badge-dot badge-success">Thành công</span>
                                    @elseif($booking->booking_status ='hired')
                                        <span class="btn btn-success">Đã vào ở</span>
                                    @endif
                                </div>
                            </td>
                            <td class="tb-tnx-action">
                                <div class="dropdown">
                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                        <ul class="link-list-plain">
                                            <li><a href="{{route('admin.transactions.show', ['id' => $booking->id])}}">Xem</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr><!-- tb-tnx-item -->
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- .card-inner -->
                <div class="card-inner">
                    <ul class="pagination justify-content-center justify-content-md-start">
                        {!!$bookings->links('pagination::bootstrap-4')!!}
                    </ul><!-- .pagination -->
                </div><!-- .card-inner -->
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
{{--        <div class="card card-bordered card-stretch">--}}
{{--            <div class="card-inner-group">--}}
{{--                <div class="card-inner">--}}
{{--                    <div class="card-title-group">--}}
{{--                        <div class="card-title">--}}
{{--                            <h5 class="title">Dach sách</h5>--}}
{{--                        </div>--}}
{{--                        <div class="card-tools mr-n1">--}}
{{--                            <ul class="btn-toolbar gx-1">--}}
{{--                                <li>--}}
{{--                                    <a href="#" class="search-toggle toggle-search btn btn-icon" data-target="search"><em class="icon ni ni-search"></em></a>--}}
{{--                                </li><!-- li -->--}}
{{--                            </ul><!-- .btn-toolbar -->--}}
{{--                        </div><!-- .card-tools -->--}}
{{--                        <div class="card-search search-wrap" data-search="search">--}}
{{--                            <div class="search-content">--}}
{{--                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>--}}
{{--                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Quick search by transaction">--}}
{{--                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>--}}
{{--                            </div>--}}
{{--                        </div><!-- .card-search -->--}}
{{--                    </div><!-- .card-title-group -->--}}
{{--                </div><!-- .card-inner -->--}}
{{--                <div class="card-inner p-0">--}}
{{--                    <div class="nk-tb-list nk-tb-tnx">--}}
{{--                        <div class="nk-tb-item nk-tb-head">--}}
{{--                            <div class="nk-tb-col"><span>Người đặt phòng</span></div>--}}
{{--                            <div class="nk-tb-col"><span>Mã phòng</span></div>--}}
{{--                            <div class="nk-tb-col text-right"><span>Phương thức</span></div>--}}
{{--                            <div class="nk-tb-col text-right tb-col-sm"><span>Thời gian</span></div>--}}
{{--                            <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Trạng thái</span></div>--}}
{{--                            <div class="nk-tb-col nk-tb-col-tools"></div>--}}
{{--                        </div><!-- .nk-tb-item -->--}}
{{--                        @foreach($bookings as $tran)--}}
{{--                        <div class="nk-tb-item">--}}
{{--                            <div class="nk-tb-col">--}}
{{--                                <div class="nk-tnx-type">--}}
{{--                                    <div class="nk-tnx-type-icon bg-success-dim text-success">--}}
{{--                                        <em class="icon ni ni-arrow-up-right"></em>--}}
{{--                                    </div>--}}
{{--                                    <div class="nk-tnx-type-text">--}}
{{--                                        @foreach($users as $user_sub)--}}
{{--                                            @if($user_sub->id==$tran->user_id)--}}
{{--                                            <span class="tb-lead">{{$user_sub->name}}</span>--}}
{{--                                            <span class="tb-date">{{$user_sub->email}}</span>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col tb-col-xxl">--}}
{{--                                <span class="tb-lead-sub"></span>--}}
{{--                                <span class="tb-sub"></span>--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col tb-col-lg">--}}
{{--                                <span class="tb-lead-sub">#{{$tran->booking_room_id}}</span>--}}
{{--                                <span class="badge badge-dot badge-success"></span>--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col text-right">--}}
{{--                                @if($tran->payment_method=='cash')--}}
{{--                                    <span class="tb-amount"></span>Thanh toán tiền mặt</span>--}}
{{--                                @elseif($tran->payment_method=='vnpay')--}}
{{--                                    <span class="tb-amount"></span>Thanh toán VNPAY</span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col text-right tb-col-sm">--}}
{{--                                <span class="tb-amount">{{$tran->date}}</span>--}}
{{--                                <span class="tb-amount-sm"></span>--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col nk-tb-col-status">--}}
{{--                                <div class="dot dot-success d-md-none"></div>--}}
{{--                                @if($tran->booking_status=='pending')--}}
{{--                                    <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">Đặt thành công</span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col nk-tb-col-tools">--}}
{{--                                <ul class="nk-tb-actions gx-2">--}}
{{--                                    <li>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="#" class="dropdown-toggle bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>--}}
{{--                                            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                <ul class="link-list-opt">--}}
{{--                                                    <li><a href="{{route('admin.transactions.show', ['id'=>$tran->id])}}" data-toggle="modal"><em class="icon ni ni-eye"></em><span>Xem chi tiết</span></a></li>--}}
{{--                                                    <li><a href="{{route('admin.transactions.edit', ['id'=>$tran->id])}}" data-toggle="modal"><em class="icon ni ni-edit"></em><span>Cập nhật trạng thái</span></a></li>--}}
{{--                                                </ul>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div><!-- .nk-tb-item -->--}}
{{--                        @endforeach--}}
{{--                    </div><!-- .nk-tb-list -->--}}
{{--                </div><!-- .card-inner -->--}}
{{--                <div class="card-inner">--}}
{{--                    <div class="card-inner">--}}
{{--                        <div class="nk-block-between-md g-3">--}}
{{--                            <div class="g">--}}
{{--                                <ul class="pagination justify-content-center justify-content-md-start">--}}
{{--                                    {!!$bookings->links('pagination::bootstrap-4')!!}--}}
{{--                                </ul><!-- .pagination -->--}}
{{--                            </div>--}}
{{--                        </div><!-- .nk-block-between -->--}}
{{--                    </div><!-- .card-inner -->--}}
{{--                </div><!-- .card-inner -->--}}
{{--            </div><!-- .card-inner-group -->--}}
{{--        </div><!-- .card -->--}}
@endsection
