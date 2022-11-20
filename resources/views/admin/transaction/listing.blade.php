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
                            <div class="form-wrap w-150px">
                                <select class="form-select form-select-sm"  id="payment_search" name="filter-search" data-placeholder="Lọc">
                                    {{--                                            <option value="">Bulk Action</option>--}}
                                    <option value="all">Tất cả</option>
                                    <option value="yes">Đã thanh toán</option>
                                    <option value="no">Chưa thanh toán</option>
                                    {{--                                            <option value="delete">Delete User</option>--}}
                                </select>
                            </div>
                        </div>
                        <button><a href="{{route('admin.transactions.mail_reminder')}}">Gửi email</a></button>
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
                                <input type="text" class="form-control form-control-sm border-transparent form-focus-none" id="key-search" name="key-search" placeholder="Tìm kiếm nhanh...">
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                            </div>
                        </div><!-- card-search -->
                    </div><!-- .card-title-group -->
                </div><!-- .card-inner -->
                <div class="card-inner p-0">
                    <table class="table table-tranx" id="list">
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
                                        @if($booking->payment=='yes')
                                            <span class="badge badge-dot badge-dot-xs badge-success">Đã thanh toán</span>
                                        @elseif($booking->payment='no')
                                            <span class="badge badge-dot badge-dot-xs badge-danger">Chưa thanh toán</span>
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
@endsection
@push('footer')
    <script type="text/javascript">
        $(document).ready(function (){
            $('#key-search').on('keyup', function (){
                var key_search = $(this).val();
                $.ajax({
                    url: '{{route('admin.transactions.key_search')}}',
                    type: "GET",
                    data: {'key_search': key_search},
                    success:function (data){
                        $('#list').html(data);
                        console.log(data);
                    }
                })
            })
            $("#payment_search").on('change', function(){
                var filter = $(this).val();
                $.ajax({
                    url: '{{route('admin.transactions.payment_search')}}',
                    type: "GET",
                    data: {'filter': filter},
                    success:function (data){
                        $('#list').html(data);
                        console.log(data);
                    }
                });
            });
        })
    </script>
@endpush
