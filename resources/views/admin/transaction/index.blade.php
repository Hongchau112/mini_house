@extends('admin.transaction.layout', [
    'title' => ( $title ?? 'Quản lý giao dịch' )
])

@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h5 class="title">Dach sách</h5>
                        </div>
                        <div class="card-tools mr-n1">
                            <ul class="btn-toolbar gx-1">
                                <li>
                                    <a href="#" class="search-toggle toggle-search btn btn-icon" data-target="search"><em class="icon ni ni-search"></em></a>
                                </li><!-- li -->
                            </ul><!-- .btn-toolbar -->
                        </div><!-- .card-tools -->
                        <div class="card-search search-wrap" data-search="search">
                            <div class="search-content">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Quick search by transaction">
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                            </div>
                        </div><!-- .card-search -->
                    </div><!-- .card-title-group -->
                </div><!-- .card-inner -->
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-tnx">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col"><span>Người giao dịch</span></div>
                            <div class="nk-tb-col tb-col-xxl"><span>Mã giao dịch</span></div>
                            <div class="nk-tb-col tb-col-lg"><span>Tiền</span></div>
                            <div class="nk-tb-col text-right"><span>Loại giao dịch</span></div>
                            <div class="nk-tb-col text-right tb-col-sm"><span>Thời gian</span></div>
                            <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Trạng thái</span></div>
                            <div class="nk-tb-col nk-tb-col-tools"></div>
                        </div><!-- .nk-tb-item -->
                        @foreach($transactions as $tran)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col">
                                <div class="nk-tnx-type">
                                    <div class="nk-tnx-type-icon bg-success-dim text-success">
                                        <em class="icon ni ni-arrow-up-right"></em>
                                    </div>
                                    <div class="nk-tnx-type-text">
                                        @foreach($users as $user_sub)
                                            @if($user_sub->id==$tran->user_id)
                                            <span class="tb-lead">{{$user_sub->name}}</span>
                                            <span class="tb-date">{{$user_sub->email}}</span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="nk-tb-col tb-col-xxl">
                                <span class="tb-lead-sub"></span>
                                <span class="tb-sub"></span>
                            </div>
                            <div class="nk-tb-col tb-col-lg">
                                <span class="tb-lead-sub">{{number_format($tran->money/100)}} đ</span>
                                <span class="badge badge-dot badge-success"></span>
                            </div>
                            <div class="nk-tb-col text-right">
                                <span class="tb-amount">VNPay</span></span>
                                <span class="tb-amount-sm">{{$tran->code_bank}}</span>
                            </div>
                            <div class="nk-tb-col text-right tb-col-sm">
                                <span class="tb-amount">{{$tran->time}}</span></span>
                                <span class="tb-amount-sm"></span>
                            </div>
                            <div class="nk-tb-col nk-tb-col-status">
                                <div class="dot dot-success d-md-none"></div>
                                @if($tran->vnp_response_code=='00')
                                    <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">Thành công</span>
                                @endif
                            </div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-2">
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt">
                                                    <li><a href="{{route('admin.transactions.show', ['id'=>$tran->id])}}" data-toggle="modal"><em class="icon ni ni-eye"></em><span>Xem chi tiết</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-tb-item -->
                        @endforeach
                    </div><!-- .nk-tb-list -->
                </div><!-- .card-inner -->
                <div class="card-inner">
                    <div class="card-inner">
                        <div class="nk-block-between-md g-3">
                            <div class="g">
                                <ul class="pagination justify-content-center justify-content-md-start">
                                    {!!$transactions->links('pagination::bootstrap-4')!!}
                                </ul><!-- .pagination -->
                            </div>
                        </div><!-- .nk-block-between -->
                    </div><!-- .card-inner -->
                </div><!-- .card-inner -->
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
@endsection
