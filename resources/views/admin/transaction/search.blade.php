<thead>
<tr class="tb-tnx-head">
    <th class="tb-tnx-id"><span class="">Mã Phòng</span></th>
    <th class="tb-tnx-info">
                                                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                <span>Người đặt</span>
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
    <th>
        <span></span>
    </th>
</tr><!-- tb-tnx-item -->
</thead>
<tbody>
@foreach($bookings as $booking)
    <tr class="tb-tnx-item">
        <td class="tb-tnx-id">
            @php
                $room_sku = \App\Models\Room::find($booking->booking_room_id)->room_sku;
            @endphp
            <a href="{{route('admin.rooms.show', ['id'=>$booking->booking_room_id])}}"><span>{{$room_sku}}</span></a>
        </td>
        <td class="tb-tnx-info">
            <div class="tb-tnx-desc">
                <a href="{{route('admin.show', ['id'=>$booking->user_id])}}">
                    @foreach($users as $user)
                        @if($user->id==$booking->user_id)
                            <span class="title">{{$user->name}}</span>
                        @endif
                    @endforeach
                </a>
            </div>
            <div class="tb-tnx-date">
                <span class="date">{{date_format($booking->created_at, 'd-m-Y H:m:s')}}</span>
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
