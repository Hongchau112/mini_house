@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Danh sách phòng' )
])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($user->has_role('admin'))
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
{{--                            <div>--}}
{{--                                @if($rooms->count() == 0)--}}
{{--                                    <div class="card-inner p-0">--}}
{{--                                        <div class="alert m-0">--}}
{{--                                            <div class="alert alert-warning alert-icon">--}}
{{--                                                <em class="icon ni ni-alert-circle"></em> Bạn chưa tao phòng nào, <a href="{{ route('admin.rooms.create') }}">Tạo phòng</a>.--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-search"></em>
                                                    </div>
                                                    <input type="text" class="form-control" id="default-04" placeholder="Tìm kiếm nhanh...">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-toggle="dropdown">Trạng thái</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>Còn phòng</span></a></li>
                                                            <li><a href="#"><span>Hết phòng</span></a></li>
                                                            <li><a href="#"><span>Phòng mới</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nk-block-tools-opt">
                                                <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
{{--                                                <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Product</span></a>--}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner-group">
                                <div class="card-inner p-0">
                                    <div class="nk-tb-list">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid">
                                                    <label class="custom-control-label" for="pid"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm"><span>Tên</span></div>
                                            <div class="nk-tb-col"><span>Số phòng</span></div>
                                            <div class="nk-tb-col"><span>Giá</span></div>
                                            <div class="nk-tb-col"><span>Trạng thái</span></div>
                                            <div class="nk-tb-col tb-col-md"><span>Danh mục</span></div>
                                            <div class="nk-tb-col tb-col-md"><em class="tb-asterisk icon ni ni-star-round"></em></div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Xem</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Chỉnh sửa</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Cập nhật</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid1">
                                                    <label class="custom-control-label" for="pid1"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <img src="./images/product/a.png" alt="" class="thumb">
                                                            <span class="title">Pink Fitness Tracker</span>
                                                        </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">UY3749</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead">$ 99.49</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">49</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">Fitbit, Tracker</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <div class="asterisk tb-asterisk">
                                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Xem</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Chỉnh sửa</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Cập nhật</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid2">
                                                    <label class="custom-control-label" for="pid2"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <img src="./images/product/b.png" alt="" class="thumb">
                                                            <span class="title">Purple Smartwatch</span>
                                                        </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">UY3750</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead">$ 89.49</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">103</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">Gadgets, Fitbit, Tracker</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <div class="asterisk tb-asterisk">
                                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid3">
                                                    <label class="custom-control-label" for="pid3"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <img src="./images/product/c.png" alt="" class="thumb">
                                                            <span class="title">Black Mi Band Smartwatch</span>
                                                        </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">UY3751</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead">$ 299.49</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">68</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">Smartwatch, Tracker</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <div class="asterisk tb-asterisk">
                                                    <a href="#" class="active"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid4">
                                                    <label class="custom-control-label" for="pid4"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <img src="./images/product/d.png" alt="" class="thumb">
                                                            <span class="title">Black Headphones</span>
                                                        </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">UY3752</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead">$ 99.49</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">77</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">Headphone, Gadgets</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <div class="asterisk tb-asterisk">
                                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid5">
                                                    <label class="custom-control-label" for="pid5"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <img src="./images/product/e.png" alt="" class="thumb">
                                                            <span class="title">iPhone 7 Headphones</span>
                                                        </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">UY3753</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead">$ 129.49</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">81</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">Headphone, Gadgets</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <div class="asterisk tb-asterisk">
                                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid6">
                                                    <label class="custom-control-label" for="pid6"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <img src="./images/product/f.png" alt="" class="thumb">
                                                            <span class="title">Purple Blue Gradient iPhone Case</span>
                                                        </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">UY3754</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead">$ 29.00</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">28</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">Case, Gadgets</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <div class="asterisk tb-asterisk">
                                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid7">
                                                    <label class="custom-control-label" for="pid7"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <img src="./images/product/g.png" alt="" class="thumb">
                                                            <span class="title">Plug In Speaker</span>
                                                        </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">UY3755</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead">$ 19.49</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">62</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">Gadgets, Speaker</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <div class="asterisk tb-asterisk">
                                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid8">
                                                    <label class="custom-control-label" for="pid8"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <img src="./images/product/h.png" alt="" class="thumb">
                                                            <span class="title">Wireless Waterproof Speaker</span>
                                                        </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">UY3756</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead">$ 59.00</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">37</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">Speaker, Gadgets</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <div class="asterisk tb-asterisk">
                                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid9">
                                                    <label class="custom-control-label" for="pid9"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <img src="./images/product/j.png" alt="" class="thumb">
                                                            <span class="title">AliExpress Fitness Trackers</span>
                                                        </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">UY3758</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead">$ 35.99</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">145</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">Fitbit, Tracker</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <div class="asterisk tb-asterisk">
                                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid10">
                                                    <label class="custom-control-label" for="pid10"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <img src="./images/product/i.png" alt="" class="thumb">
                                                            <span class="title">Pool Party Drink Holder</span>
                                                        </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">UY3757</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead">$ 9.49</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">73</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">Men, Holder</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <div class="asterisk tb-asterisk">
                                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                    </div><!-- .nk-tb-list -->
                                </div>
                                <div class="card-inner">
                                    <div class="nk-block-between-md g-3">
                                        <div class="g">
                                            <ul class="pagination justify-content-center justify-content-md-start">
                                                <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-left"></em></a></li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-right"></em></a></li>
                                            </ul><!-- .pagination -->
                                        </div>
                                        <div class="g">
                                            <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                <div>Page</div>
                                                <div>
                                                    <select class="form-select form-select-sm" data-search="on" data-dropdown="xs center">
                                                        <option value="page-1">1</option>
                                                        <option value="page-2">2</option>
                                                        <option value="page-4">4</option>
                                                        <option value="page-5">5</option>
                                                        <option value="page-6">6</option>
                                                        <option value="page-7">7</option>
                                                        <option value="page-8">8</option>
                                                        <option value="page-9">9</option>
                                                        <option value="page-10">10</option>
                                                        <option value="page-11">11</option>
                                                        <option value="page-12">12</option>
                                                        <option value="page-13">13</option>
                                                        <option value="page-14">14</option>
                                                        <option value="page-15">15</option>
                                                        <option value="page-16">16</option>
                                                        <option value="page-17">17</option>
                                                        <option value="page-18">18</option>
                                                        <option value="page-19">19</option>
                                                        <option value="page-20">20</option>
                                                    </select>
                                                </div>
                                                <div>OF 102</div>
                                            </div>
                                        </div><!-- .pagination-goto -->
                                    </div><!-- .nk-block-between -->
                                </div>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
{{--                    <div class="nk-block">--}}
{{--                        <div class="card card-bordered">--}}
{{--                            <div class="card-inner-group">--}}
{{--                                <div class="card-inner p-0">--}}
{{--                                    <div class="nk-tb-list">--}}
{{--                                        <div class="nk-tb-item nk-tb-head">--}}
{{--                                            <div class="nk-tb-col nk-tb-col-check">--}}
{{--                                                --}}{{--                                            <div class="custom-control custom-control-sm custom-checkbox notext">--}}
{{--                                                --}}{{--                                                <input type="checkbox" class="custom-control-input" id="pid">--}}
{{--                                                --}}{{--                                                <label class="custom-control-label" for="pid"></label>--}}
{{--                                                --}}{{--                                            </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="nk-tb-col tb-col-sm"><span>Mô tả</span></div>--}}
{{--                                            <div class="nk-tb-col"><span>Danh mục</span></div>--}}
{{--                                            <div class="nk-tb-col nk-tb-col-tools">--}}
{{--                                                <ul class="nk-tb-actions gx-1 my-n1">--}}
{{--                                                    <li class="mr-n1">--}}
{{--                                                        <div class="dropdown">--}}
{{--                                                            <div>Tùy chọn</div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div><!-- .nk-tb-item -->--}}
{{--                                        @foreach($rooms as $room)--}}
{{--                                            <div class="nk-tb-item">--}}
{{--                                                <div class="nk-tb-col nk-tb-col-check">--}}
{{--                                                    <div class="custom-control custom-control-sm custom-checkbox notext">--}}
{{--                                                        --}}{{--                                                    <input type="checkbox" class="custom-control-input" id="uid{{$product->id}}">--}}
{{--                                                        --}}{{--                                                    <label class="custom-control-label" for="uid{{$product->id}}"></label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="nk-tb-col">--}}
{{--                                                    <span class="tb-sub">{{$room->name}}</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="nk-tb-col">--}}
{{--                                                    <div>--}}
{{--                                                        @if ($room->room_type_id == 0)--}}
{{--                                                            <span class="tb-sub">Thư mục gốc</span>--}}
{{--                                                        @else--}}
{{--                                                            @foreach($room_category as $cate_sub)--}}
{{--                                                                @if ($cate_sub->id == $food->room_type_id)--}}
{{--                                                                    <span class="tb-sub">{{$cate_sub->name}}</span>--}}
{{--                                                                @endif--}}
{{--                                                            @endforeach--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="nk-tb-col nk-tb-col-tools">--}}
{{--                                                    <ul class="nk-tb-actions gx-1 my-n1">--}}
{{--                                                        <li class="mr-n1">--}}
{{--                                                            <div class="dropdown">--}}
{{--                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>--}}
{{--                                                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                                    <ul class="link-list-opt no-bdr">--}}
{{--                                                                        <li><a href=""><em class="icon ni ni-edit"></em><span>Sửa</span></a></li>--}}
{{--                                                                        <li><a href=""><em class="icon ni ni-eye"></em><span>Xem</span></a></li>--}}
{{--                                                                        --}}{{--                                                                    <li><a href="{{route('admin.foods.edit_price', ['id' => $food->id])}}"><em class="icon ni ni-edit"></em><span>Cập nhật giá</span></a></li>--}}
{{--                                                                        <li><a href=""><em class="icon ni ni-trash"></em><span>Xóa</span></a></li>--}}
{{--                                                                    </ul>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div><!-- .nk-tb-item -->--}}
{{--                                        @endforeach--}}
{{--                                    </div><!-- .nk-tb-list -->--}}
{{--                                </div>--}}
{{--                                <div class="card-inner">--}}
{{--                                    <div class="nk-block-between-md g-3">--}}
{{--                                        <div class="g">--}}
{{--                                            {!!$rooms->links('pagination::bootstrap-4')!!}--}}
{{--                                        </div>--}}
{{--                                    </div><!-- .nk-block-between -->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!-- .nk-block -->--}}
                </div>
            </div>
        </div>
    @elseif($user->has_role('user'))
        <p></p>
    @endif
@endsection


