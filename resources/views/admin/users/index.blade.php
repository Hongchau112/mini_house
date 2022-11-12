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
                                        <select class="form-select form-select-sm"  id="filter-search" name="filter-search" data-placeholder="Lọc">
{{--                                            <option value="">Bulk Action</option>--}}
                                            <option value="all">Tất cả</option>
                                            <option value="admin">Người quản trị</option>
                                            <option value="staff">Nhân viên</option>
                                            <option value="user">Khách trọ</option>
{{--                                            <option value="delete">Delete User</option>--}}
                                        </select>
                                    </div>
                                </div><!-- .form-inline -->
                            </div><!-- .card-tools -->
                            <ul class="nk-block-tools" style="    margin-right: 670px;">
                                <li>
                                    <div class="drodown">
                                        <select class="form-select form-select-sm" id="sex-search" name="sex-search" data-placeholder="Giới tính">
                                                <option value="all"><span>Tất cả</span></option>
                                                <option value="male"><span>Nam</span></option>
                                                <option value="female"><span>Nữ</span></option>
                                                <option value="sex-other"><span>Khác</span></option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
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
                                    <form action="{{route('admin.users.search')}}" method="GET">
                                        <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                        <input type="text" id="key-search" name="key-search" class="form-control border-transparent form-focus-none" placeholder="Search by user or email">
                                        <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- .card-search -->
                    </div><!-- .card-inner -->

                    <div class="card-inner p-0" >
                        <div class="nk-tb-list nk-tb-ulist" id="list">
                            <div class="nk-tb-item nk-tb-head" >
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span class="sub-text">Tài khoản</span></div>
                                <div class="nk-tb-col tb-col-mb"><span class="sub-text">Số điện thoại</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Giới tính</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Trạng thái</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">User</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Admin</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Đổi quyền</span></div>


                                <div class="nk-tb-col nk-tb-col-tools text-right">
                                </div>
                            </div><!-- .nk-tb-item -->
                            @foreach($user_lists as $user_sub)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="uid1">
                                            <label class="custom-control-label" for="uid1"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col">
                                        <a href="#">
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
{{--                                    <div class="nk-tb-col tb-col-md">--}}
{{--                                        @if($user_sub->account=='staff')--}}
{{--                                            <span>Nhân viên</span>--}}
{{--                                        @elseif($user_sub->account=='user')--}}
{{--                                            <span>Người dùng</span>--}}
{{--                                        @else--}}
{{--                                            <span>Người quản trị</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
                                    <div class="nk-tb-col tb-col-lg">
                                        <ul class="list-status">
                                            @if($user_sub->sex=='female')
                                                <li><em class="icon text-success ni ni-check-circle"></em> <span>Nữ</span></li>
                                            @elseif($user_sub->sex=='male')
                                                <li><em class="icon text-success ni ni-check-circle"></em> <span>Nam</span></li>
                                            @else
                                                <li><em class="icon text-success ni ni-check-circle"></em> <span>Khác</span></li>
                                            @endif
                                            {{--                                            <li><em class="icon text-success ni ni-check-circle"></em> <span>{{$user_sub->sex}}</span></li>--}}
                                        </ul>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        @if($user_sub->status==1)
                                            <span class="tb-status text-success">Kích hoạt</span>
                                        @else
                                            <span class="tb-status text-danger">Bị khóa</span>
                                        @endif
                                    </div>
                                    <form action="{{route('admin.assign_roles')}}" method="post">
                                        @csrf
                                        <div class="nk-tb-col tb-col-md">
                                            <input type="checkbox" name="user_role" {{($user_sub->account=='user') ? 'checked' : ''}}></span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <input type="checkbox" name="admin_role" {{($user_sub->account=='admin') ? 'checked' : ''}}></span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <input type="hidden" name="email" id="email" value="{{$user_sub->email}}">
                                            <input type="submit" value="Thay đổi" class="btn btn-sm btn-gray">
                                        </div>
                                    </form>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">

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

        <div class="card-inner">
            <div class="nk-block-between-md g-3">
                <div class="g">
                    <ul class="pagination justify-content-center justify-content-md-start">
                        {!!$user_lists->links('pagination::bootstrap-4')!!}
                    </ul><!-- .pagination -->
                </div>
            </div><!-- .nk-block-between -->
        </div><!-- .card-inner -->
{{--    </div>--}}
@endsection
@push('footer')
    <script type="text/javascript">
        $(document).ready(function(){

            $("#key-search").on('keyup', function (){
                var search = $(this).val();
                $.ajax({
                    url: '{{route('admin.users.search')}}',
                    type: "GET",
                    data: {'search': search},
                    success:function (data){
                        $('#list').html(data);
                        console.log(data);
                    }
                })
            })

            //search by account type
            $("#filter-search").on('change', function(){
                var filter = $(this).val();
                $.ajax({
                    url: '{{route('admin.users.filter')}}',
                    type: "GET",
                    data: {'filter': filter},
                    success:function (data){
                        $('#list').html(data);
                        console.log(data);
                    }
                });
            });
            //search by sex
            $("#sex-search").on('change', function(){
                var sex = $(this).val();
                $.ajax({
                    url: '{{route('admin.users.sex_search')}}',
                    type: "GET",
                    data: {'sex': sex},
                    success:function (data){
                        $('#list').html(data);
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endpush
