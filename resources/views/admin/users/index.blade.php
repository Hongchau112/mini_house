@extends('admin.users.layout', [
'title' => ( $title ?? 'Quản lý tài khoản' )
])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="nk-content-body">
        <div class="nk-block">
            <div class="card card-bordered card-stretch">
                <div class="card-inner-group">
                    <div class="card-inner position-relative card-tools-toggle">
                        <div class="card-title-group">
                            <div class="card-tools">
                                <div class="form-inline flex-nowrap gx-3">
                                    <div class="form-wrap w-150px">
                                        <select class="form-select form-select-sm" data-search="off" data-placeholder="Lọc">
                                            <option value="">Bulk Action</option>
                                            <option value="email">Người quản trị</option>
                                            <option value="group">Nhân viên</option>
                                            <option value="suspend">Khách trọ</option>
{{--                                            <option value="delete">Delete User</option>--}}
                                        </select>
                                    </div>
                                    <div class="btn-wrap">
                                        <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Áp dụng</button></span>
                                        <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                    </div>
                                </div><!-- .form-inline -->
                            </div><!-- .card-tools -->
                            <div class="card-tools mr-n1">
                                <ul class="btn-toolbar gx-1">
                                    <li>
                                        <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                    </li><!-- li -->
                                    <li class="btn-toolbar-sep"></li><!-- li -->
                                    <li>
                                        <div class="toggle-wrap">
                                            <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                            <div class="toggle-content" data-content="cardTools">
                                                <ul class="btn-toolbar gx-1">
                                                    <li class="toggle-close">
                                                        <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                                                    </li><!-- li -->
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                <div class="dot dot-primary"></div>
                                                                <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                                <div class="dropdown-head">
                                                                    <span class="sub-title dropdown-title">Filter Users</span>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="btn btn-sm btn-icon">
                                                                            <em class="icon ni ni-more-h"></em>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown-body dropdown-body-rg">
                                                                    <div class="row gx-6 gy-3">
                                                                        <div class="col-6">
                                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="hasBalance">
                                                                                <label class="custom-control-label" for="hasBalance"> Have Balance</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="hasKYC">
                                                                                <label class="custom-control-label" for="hasKYC"> KYC Verified</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label class="overline-title overline-title-alt">Role</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <option value="any">Any Role</option>
                                                                                    <option value="investor">Investor</option>
                                                                                    <option value="seller">Seller</option>
                                                                                    <option value="buyer">Buyer</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label class="overline-title overline-title-alt">Status</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <option value="any">Any Status</option>
                                                                                    <option value="active">Active</option>
                                                                                    <option value="pending">Pending</option>
                                                                                    <option value="suspend">Suspend</option>
                                                                                    <option value="deleted">Deleted</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <button type="button" class="btn btn-secondary">Filter</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown-foot between">
                                                                    <a class="clickable" href="#">Reset Filter</a>
                                                                    <a href="#">Save Filter</a>
                                                                </div>
                                                            </div><!-- .filter-wg -->
                                                        </div><!-- .dropdown -->
                                                    </li><!-- li -->
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                <em class="icon ni ni-setting"></em>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                                <ul class="link-check">
                                                                    <li><span>Show</span></li>
                                                                    <li class="active"><a href="#">10</a></li>
                                                                    <li><a href="#">20</a></li>
                                                                    <li><a href="#">50</a></li>
                                                                </ul>
                                                                <ul class="link-check">
                                                                    <li><span>Order</span></li>
                                                                    <li class="active"><a href="#">DESC</a></li>
                                                                    <li><a href="#">ASC</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .dropdown -->
                                                    </li><!-- li -->
                                                </ul><!-- .btn-toolbar -->
                                            </div><!-- .toggle-content -->
                                        </div><!-- .toggle-wrap -->
                                    </li><!-- li -->
                                </ul><!-- .btn-toolbar -->
                            </div><!-- .card-tools -->
                        </div><!-- .card-title-group -->
                        <div class="card-search search-wrap" data-search="search">
                            <div class="card-body">
                                <div class="search-content">
                                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or email">
                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                </div>
                            </div>
                        </div><!-- .card-search -->
                    </div><!-- .card-inner -->
                    <div class="card-inner p-0">
                        <div class="nk-tb-list nk-tb-ulist">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span class="sub-text">Tài khoản</span></div>
                                <div class="nk-tb-col tb-col-mb"><span class="sub-text">Số điện thoại</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Loại tài khoản</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Giới tính</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Trạng thái</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Ngày hoạt động</span></div>
                                <div class="nk-tb-col nk-tb-col-tools text-right">
                                </div>
                            </div><!-- .nk-tb-item -->
                            @foreach($user_list as $user_sub)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="uid1">
                                            <label class="custom-control-label" for="uid1"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col">
                                        <a href="html/user-details-regular.html">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">{{$user_sub->name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>{{$user_sub->email}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="nk-tb-col tb-col-mb">
                                        <span class="tb-amount">{{$user_sub->phone}}</span></span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span>{{$user_sub->account}}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        <ul class="list-status">
                                            <li><em class="icon text-success ni ni-check-circle"></em> <span>{{$user_sub->sex}}</span></li>

                                        </ul>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        @if($user_sub->status==1)
                                            <span class="tb-status text-success">Kích hoạt</span>
                                        @else
                                            <span class="tb-status text-danger">Bị khóa</span>
                                        @endif
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span class="tb-status">{{$user_sub->created_at}}</span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li class="nk-tb-action-hidden">
                                                <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Wallet">
                                                    <em class="icon ni ni-wallet-fill"></em>
                                                </a>
                                            </li>
                                            <li class="nk-tb-action-hidden">
                                                <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                    <em class="icon ni ni-mail-fill"></em>
                                                </a>
                                            </li>
                                            <li class="nk-tb-action-hidden">
                                                <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Suspend">
                                                    <em class="icon ni ni-user-cross-fill"></em>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="{{route('admin.show', ['id' => $user_sub->id])}}"><em class="icon ni ni-eye"></em><span>Xem</span></a></li>
                                                            <li><a href="{{route('admin.edit', ['id' => $user_sub->id])}}"><em class="icon ni ni-repeat"></em><span>Sửa</span></a></li>
                                                            <li><a href="{{route('admin.block', ['id' => $user_sub->id])}}"><em class="icon ni ni-activity-round"></em><span>Block</span></a></li>
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
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
{{--    <div class="card-inner p-0">--}}
{{--        <div class="nk-tb-list nk-tb-ulist">--}}
{{--            <div class="nk-tb-item nk-tb-head">--}}
{{--                <div class="nk-tb-col"><span class="sub-text">STT</span></div>--}}
{{--                <div class="nk-tb-col col"><span class="sub-text">Tên người dùng</span></div>--}}
{{--                <div class="nk-tb-col "><span class="sub-text">Email</span></div>--}}
{{--                <div class="nk-tb-col tb-col-md"><span class="sub-text">Trạng thái</span></div>--}}
{{--                <div class="nk-tb-col tb-col-md"><span class="sub-text">Admin</span></div>--}}
{{--                <div class="nk-tb-col tb-col-md"><span class="sub-text">User</span></div>--}}
{{--                <div class="nk-tb-col tb-col-md"><span class="sub-text">Phân quyền</span></div>--}}
{{--                <div class="nk-tb-col nk-tb-col-tools">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @foreach($user_list as $user_sub)--}}
{{--                <form action="{{route('user.assign_roles')}}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <tr>--}}
{{--                        <div class="nk-tb-item">--}}
{{--                            <div class="nk-tb-col col-lg-5">--}}
{{--                                <div class="user-info">--}}
{{--                                    <span class="tb-lead">{{$user_sub->id}}<span class="dot dot-success d-md-none ml-1"></span></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col">--}}
{{--                                <div class="user-card">--}}
{{--                                    <div class="user-info">--}}
{{--                                        <span class="tb-lead">{{$user_sub->name}}<span class="dot dot-success d-md-none ml-1"></span></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col tb-col-lg">--}}
{{--                                <ul class="list-status">--}}
{{--                                    <li><em class="icon text-success ni ni-check-circle"></em> <span>{{$user_sub->email}}</span></li>--}}
{{--                                    <input type="hidden" name="email" value="{{$user_sub->email}}">--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col tb-col-md">--}}
{{--                                @if ($user_sub->status == 1)--}}
{{--                                    <span class="tb-status text-success">Kích hoạt</span>--}}
{{--                                @else--}}
{{--                                    <span class="tb-status text-danger">Bị khóa</span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col tb-col-lg">--}}
{{--                                <ul class="list-status">--}}
{{--                                    <li><input type="checkbox" name="admin_role" {{$user_sub->has_role('admin') ? 'checked' : ''}}></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col tb-col-lg">--}}
{{--                                <ul class="list-status">--}}
{{--                                    <li><input type="checkbox" name="user_role" {{$user_sub->has_role('user') ? 'checked' : ''}}></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="nk-tb-col tb-col-lg">--}}
{{--                                <ul class="list-status">--}}
{{--                                    <li><input type="submit" value="Thay đổi" class="btn btn-outline-light"></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}

{{--                            <div class="nk-tb-col nk-tb-col-tools">--}}
{{--                                <ul class="nk-tb-actions gx-1">--}}
{{--                                    <li>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>--}}
{{--                                            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                <ul class="link-list-opt no-bdr">--}}
{{--                                                    <li><a href="{{ route('admin.show', ['id' => $user_sub->id]) }}"><em class="icon ni ni-eye"></em><span>Xem</span></a></li>--}}
{{--                                                    <li><a href="{{ route('admin.edit', ['id' => $user_sub->id]) }}"><em class="icon ni ni-edit"></em><span>Chỉnh sửa</span></a></li>--}}
{{--                                                    <li><a href="{{ route('admin.edit_password', ['id' => $user_sub->id]) }}"><em class="icon ni ni-repeat"></em><span>Đổi mật khẩu</span></a></li>--}}
{{--                                                    <li><a href="{{ route('admin.block', ['id' => $user_sub->id]) }}"><em class="icon ni ni-na"></em>--}}
{{--                                                            @if ($user_sub->status == 1)--}}
{{--                                                                <span>Chặn</span>--}}
{{--                                                            @else--}}
{{--                                                                <span >Gỡ chặn</span>--}}
{{--                                                            @endif--}}
{{--                                                        </a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div><!-- .nk-tb-item -->--}}

{{--                    </tr>--}}

{{--                </form>--}}

{{--            @endforeach--}}
{{--        </div><!-- .nk-tb-list -->--}}
        <div class="card-inner">
            <div class="nk-block-between-md g-3">
                <div class="g">
                    <ul class="pagination justify-content-center justify-content-md-start">
                        {!!$user_list->links('pagination::bootstrap-4')!!}
                    </ul><!-- .pagination -->
                </div>
            </div><!-- .nk-block-between -->
        </div><!-- .card-inner -->
{{--    </div>--}}
@endsection
