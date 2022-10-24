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
            <span class="tb-sub">49</span>
        </div>
        <div class="nk-tb-col tb-col-md">
            <span class="tb-sub">{{$room->room_type_id}}</span>
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
                                <li><a href="{{route('admin.rooms.show', ['id'=>$room->id])}}"><em class="icon ni ni-edit"></em><span>Xem</span></a></li>
                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Chỉnh sửa</span></a></li>
                                <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Cập nhật</span></a></li>
                                <li><a href="{{route('admin.rooms.upload_images', ['id'=>$room->id])}}"><em class="icon ni ni-bar-c"></em><span>Thêm ảnh</span></a></li>
                                <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Xóa</span></a></li>


                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div><!-- .nk-tb-item -->
@endforeach
