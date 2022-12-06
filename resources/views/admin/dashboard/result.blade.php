<div class="nk-tb-item nk-tb-head">
    <div class="nk-tb-col"><span>Phòng</span></div>
    <div class="nk-tb-col tb-col-sm"><span>Người đặt</span></div>
    <div class="nk-tb-col tb-col-lg"><span>Ngày</span></div>
    <div class="nk-tb-col"><span>Giá</span></div>
    <div class="nk-tb-col tb-col-sm"><span>Trạng thái</span></div>
    <div class="nk-tb-col"><span>&nbsp;</span></div>
</div>
@foreach($new_bookings as $new_booking)
    <div class="nk-tb-item">
        <div class="nk-tb-col">
            <div class="align-center">
                <div class="user-avatar user-avatar-sm bg-light">
                    <span>P1</span>
                </div>
                <span class="tb-sub ml-2">{{$new_booking->room_id}}</span></span>
            </div>
        </div>
        <div class="nk-tb-col tb-col-sm">
            <div class="user-card">
                <div class="user-avatar user-avatar-xs bg-pink-dim">
                    <span>JC</span>
                </div>
                <div class="user-name">
                    <span class="tb-lead">{{$new_booking->user_id}}</span>
                </div>
            </div>
        </div>
        <div class="nk-tb-col tb-col-lg">
            <span class="tb-sub">{{$new_booking->date}}</span>
        </div>
        <div class="nk-tb-col">
            @foreach($booking_details as $detail)
                @if($detail->booking_id==$new_booking->id)
                    <span class="tb-sub tb-amount">{{number_format($detail->total_cost)}}<span> đ</span></span>
                @endif
            @endforeach
        </div>
        <div class="nk-tb-col tb-col-sm">
            <span class="badge badge-dot badge-dot-xs badge-warning">Đơn Mới</span>
        </div>
        <div class="nk-tb-col nk-tb-col-action">
            <div class="dropdown">
                <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                    <ul class="link-list-plain">
                        <li><a href="{{route('admin.transactions.show', ['id' => $new_booking->id])}}">Xem</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach
