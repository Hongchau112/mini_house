<thead>
<tr class="nk-tb-item nk-tb-head">
    <th class="nk-tb-col"><span class="sub-text">ID</span></th>

    <th class="nk-tb-col"><span class="sub-text">Người bình luận</span></th>
    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Ngày bình luận</span></th>
    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Bài đăng/Phòng trọ</span></th>
    <th class="nk-tb-col tb-col-md"><span class="sub-text">Trạng thái</span></th>
    <th class="nk-tb-col tb-col-md">
        <span>Tùy chọn</span>
    </th>
</tr><!-- .nk-tb-item -->
</thead>
<tbody>
@foreach($comments as $comment)
    <tr class="nk-tb-item">
        <td class="nk-tb-col nk-tb-col-check">
            <div>{{$comment->id}}</div>
        </td>
        <td class="nk-tb-col">

            @foreach($users as $user)
                @if($user->id==$comment->user_id)
                    <a href="" class="project-title">
                        <div class="user-avatar sq bg-purple">
                            <img src="{{asset('/images/'.$user->avatar)}}">
                        </div>
                        <div class="project-info">

                            <h6 class="title">{{$user->name}}</h6>
                        </div>

                    </a>

                @endif
            @endforeach
        </td>

        <td class="nk-tb-col tb-col-lg">
            <div>{{$comment->date}}</div>

        </td>
        <td class="nk-tb-col tb-col-md">
            @if($comment->post_id != null)
                @foreach($posts as $post)
                    @if($comment->post_id==$post->id)
                        <div>{{$post->title}}</div>
                    @endif
                @endforeach
            @else
                @foreach($rooms as $room)
                    @if($comment->room_id==$room->id)
                        <div>{{$room->name}}</div>
                    @endif
                @endforeach
            @endif
        </td>
        <td class="nk-tb-col tb-col-mb">
            <div class="tb-tnx-status" style="width: 80px; margin-right: 20px">
                @if($comment->status==0)
                    <input type="button" data-comment_status="1" data-comment_id = "{{$comment->id}}" id="{{$comment->post_id}}" class="btn btn-danger btn-xs comment-approve-btn" value="Chưa duyệt" ></input>
                @else
                    <input type="button"  data-comment_status="0" data-comment_id = "{{$comment->id}}" id="{{$comment->post_id}}" class="btn btn-primary btn-xs comment-approve-btn" value="Đã duyệt" ></input>
                @endif
            </div>
        </td>
        <td class="nk-tb-col nk-tb-col-tools">
            <ul class="nk-tb-actions gx-1">
                <li>
                    <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">
                                @if($comment->room_id==null)
                                    <li><a href="{{route('customer.posts.details', ['id' =>$comment->post_id])}}"><em class="icon ni ni-eye"></em><span>Xem bài đăng</span></a></li>
                                    <li><a href="{{route('admin.comments.reply', ['id'=>$comment->id])}}"><em class="icon ni ni-edit"></em><span>Phản hồi</span></a></li>
                                @else
                                    <li><a href="{{route('customer.rooms.details', ['id' =>$comment->room_id])}}"><em class="icon ni ni-eye"></em><span>Xem bài đăng</span></a></li>
                                    <li><a href="{{route('admin.comments.reply', ['id'=>$comment->id])}}"><em class="icon ni ni-edit"></em><span>Phản hồi</span></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </td>
    </tr><!-- .nk-tb-item -->
@endforeach
</tbody>
