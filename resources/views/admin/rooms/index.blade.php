@extends('admin.rooms.layout', [
    'title' => ( $title ?? 'Danh sách phòng' )
])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($user->hasRole('admin'))
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div>
                                @if($rooms->count() == 0)
                                    <div class="card-inner p-0">
                                        <div class="alert m-0">
                                            <div class="alert alert-warning alert-icon">
                                                <em class="icon ni ni-alert-circle"></em> Bạn chưa tao phòng nào, <a href="{{ route('admin.rooms.create') }}">Tạo phòng</a>.
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
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
                                                    <input type="text" class="form-control" id="key_search" placeholder="Tìm kiếm nhanh...">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="drodown" style="width: 130px;">
                                                    <select class="form-select form-select-sm" id="filter-search" name="filter-search" data-placeholder="Tìm phòng">
                                                        <option value="all"><span>Tất cả</span></option>
                                                        <option value="0"><span>Còn phòng</span></option>
                                                        <option value="1"><span>Hết phòng</span></option>
                                                    </select>
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
                                <div class="card-inner p-0" >
                                    <div class="nk-tb-list" id="list">
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
                                            <div class="nk-tb-col tb-col-md"><span>Loại phòng</span></div>
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
                                        @foreach($rooms as $room)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="{{$room->id}}">
                                                    <label class="custom-control-label" for="{{$room->id}}"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <img src="{{asset('dashlite/./images/product/a.png')}}" alt="" class="thumb">
                                                            <span class="title">{{$room->name}}</span>
                                                        </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub">{{$room->name}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead">{{$room->cost}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                @if($room->status==0)
                                                    <span class="tb-sub">Còn phòng</span>
                                                @else
                                                    <span class="tb-sub">Hết phòng</span>
                                                @endif
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                @foreach($room_category as $room_cate_sub)
                                                    @if($room->room_type_id == $room_cate_sub->id)
                                                        <span class="tb-sub">{{$room_cate_sub->name}}</span>
                                                    @endif
                                                @endforeach
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
                                                                    <li><a href="{{route('admin.rooms.show', ['id'=>$room->id])}}"><em class="icon ni ni-view-grid"></em><span>Xem</span></a></li>
                                                                    <li><a href="{{route('admin.rooms.edit', ['id'=>$room->id])}}"><em class="icon ni ni-edit"></em><span>Chỉnh sửa</span></a></li>
                                                                    <li><a href="{{route('admin.rooms.upload_images', ['id'=>$room->id])}}"><em class="icon ni ni-bar-c"></em><span>Thêm ảnh</span></a></li>
                                                                    <li><a href="{{route('admin.rooms.delete', ['id'=>$room->id])}}"><em class="icon ni ni-delete"  ></em><span>Xóa</span></a></li>


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div><!-- .nk-tb-list -->
                                </div>
                                <div class="card-inner">
                                    <div class="card-inner">
                                        <div class="nk-block-between-md g-3">
                                            <div class="g">
                                                <ul class="pagination justify-content-center justify-content-md-start">
                                                    {!!$rooms->links('pagination::bootstrap-4')!!}
                                                </ul><!-- .pagination -->
                                            </div>
                                        </div><!-- .nk-block-between -->
                                    </div><!-- .card-inner -->
                                </div>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    @elseif($user->has_role('user'))
        <p></p>
    @endif
@endsection

@push('footer')
    <script type="text/javascript">
        $(document).ready(function(){

            $("#key_search").on('keyup', function (){
                var search = $(this).val();
                $.ajax({
                    url: '{{route('admin.rooms.room_search')}}',
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
                    url: '{{route('admin.rooms.filter_search')}}',
                    type: "GET",
                    data: {'filter': filter},
                    success:function (data){
                        $('#list').html(data);
                        // console.log(data);
                    }
                });
            });
        });
    </script>
@endpush
