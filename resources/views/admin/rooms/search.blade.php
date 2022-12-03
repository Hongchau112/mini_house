<div class="nk-tb-item nk-tb-head">
    <div class="nk-tb-col tb-col-sm"><span>ID</span></div>
    <div class="nk-tb-col tb-col-sm"><span>Tên</span></div>
    <div class="nk-tb-col"><span>Số phòng</span></div>
    <div class="nk-tb-col"><span>Giá</span></div>
    <div class="nk-tb-col"><span>Trạng thái</span></div>
    <div class="nk-tb-col tb-col-md"><span>Loại phòng</span></div>
    {{--                                            <div class="nk-tb-col tb-col-md"><em class="tb-asterisk icon ni ni-star-round"></em></div>--}}
    <div class="nk-tb-col nk-tb-col-tools">

    </div>
</div><!-- .nk-tb-item -->
@foreach($rooms as $room)
    <div class="nk-tb-item">
        <div class="nk-tb-col nk-tb-col-check">
            <div>{{$room->id}}</div>
        </div>
        <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
{{--                                                            <img src="{{asset('/images/'.$im}}" alt="" class="thumb">--}}
                                                            <span class="title">{{$room->name}}</span>
                                                        </span>
        </div>
        <div class="nk-tb-col">
            <span class="tb-sub">{{$room->name}}</span>
        </div>
        <div class="nk-tb-col">
            <span class="tb-lead">{{number_format($room->cost)}} vnd</span>
        </div>
        <div class="nk-tb-col">
            @if($room->status==0)
                <span class="tb-sub btn btn-dim btn-outline-success">Còn phòng</span>
            @else
                <span class="tb-sub btn btn-dim btn-outline-danger">Hết phòng</span>
            @endif
        </div>
        <div class="nk-tb-col tb-col-md">
            @foreach($room_category as $room_cate_sub)
                @if($room->room_type_id == $room_cate_sub->id)
                    <span class="tb-sub">{{$room_cate_sub->name}}</span>
                @endif
            @endforeach
        </div>
        {{--                                            <div class="nk-tb-col tb-col-md">--}}
        {{--                                                <div class="asterisk tb-asterisk">--}}
        {{--                                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
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
