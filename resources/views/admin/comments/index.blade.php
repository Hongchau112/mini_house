@extends('admin.comments.layout', [
    'title' => ($title ?? 'Bình luận')
])

@section('content')

        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
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
                                            <li class="nk-block-tools-opt">
                                                <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                {{--                                                <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Product</span></a>--}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                        <div>
                            @if($comments->count() == 0)
                                <div class="card-inner p-0">
                                    <div class="alert m-0">
                                        <div class="alert alert-warning alert-icon">
                                            <em class="icon ni ni-alert-circle"></em> Chưa có bình luận nào</a>.
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered card-stretch">
                            <div class="card-inner-group">
                                <div class="card-inner p-0">
                                    <table class="nk-tb-list nk-tb-ulist" id="list">
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
                                    </table><!-- .nk-tb-list -->
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="nk-block-between-md g-3">
                                        <div class="g">
                                        </div>
                                        <div class="g">
                                            <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                            </div>
                                        </div><!-- .pagination-goto -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->

{{--                <div class="nk-content-body">--}}
{{--                    <div>--}}
{{--                        @if($comments->count() == 0)--}}
{{--                            <div class="card-inner p-0">--}}
{{--                                <div class="alert m-0">--}}
{{--                                    <div class="alert alert-warning alert-icon">--}}
{{--                                        <em class="icon ni ni-alert-circle"></em> Chưa có bình luận nào</a>.--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div class="nk-block">--}}
{{--                        <div class="card card-bordered card-stretch">--}}
{{--                            <div class="card-inner-group">--}}
{{--                                <div class="card-inner">--}}
{{--                                    <div class="card-title-group">--}}
{{--                                        <div class="card-title">--}}
{{--                                            <h5 class="title">Danh sách bình luận</h5>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-tools mr-n1">--}}
{{--                                            <ul class="btn-toolbar">--}}
{{--                                                --}}{{----}}{{--                                                <li>--}}
{{--                                                --}}{{----}}{{--                                                    <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>--}}
{{--                                                --}}{{----}}{{--                                                </li><!-- li -->--}}
{{--                                                --}}{{----}}{{--                                                <li class="btn-toolbar-sep"></li><!-- li -->--}}

{{--                                            </ul><!-- .btn-toolbar -->--}}
{{--                                        </div><!-- card-tools -->--}}
{{--                                        <div class="card-search search-wrap" data-search="search">--}}
{{--                                            <div class="search-content">--}}
{{--                                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>--}}
{{--                                                <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by order id">--}}
{{--                                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>--}}
{{--                                            </div>--}}
{{--                                        </div><!-- card-search -->--}}
{{--                                    </div><!-- .card-title-group -->--}}
{{--                                </div><!-- .card-inner -->--}}
{{--                                <div class="card-inner p-0">--}}
{{--                                    <table class="table table-tranx">--}}
{{--                                        <thead>--}}
{{--                                        <tr class="tb-tnx-head">--}}
{{--                                            --}}{{----}}{{--                                            <th class="tb-tnx-id"><span class="">ID</span></th>--}}
{{--                                            <th class="tb-tnx-id">--}}
{{--                                                <span class="tb-tnx-id">Trạng thái</span>--}}
{{--                                            </th>--}}
{{--                                            <th class="nk-tb-col tb-col-mb" style="width: 200px;">--}}
{{--                                                <span class="tb-tnx-info">Người gửi</span>--}}

{{--                                            </th>--}}
{{--                                            <th class="tb-tnx-info">--}}
{{--                                                                <span class="tb-tnx-info">--}}
{{--                                                                    <span>Bài đăng</span>--}}
{{--                                                                </span>--}}
{{--                                            </th>--}}
{{--                                            <th class="tb-tnx-info">--}}
{{--                                                                <span class="tb-tnx-info">--}}
{{--                                                                    <span>Bình luận</span>--}}

{{--                                                                </span>--}}
{{--                                            </th>--}}


{{--                                        </tr><!-- tb-tnx-item -->--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        @foreach($comments as $comment)--}}
{{--                                            <tr class="tb-tnx-item">--}}
{{--                                                <td class="tb-tnx-amount is-alt">--}}
{{--                                                    <div class="tb-tnx-status" style="width: 80px; margin-right: 20px">--}}
{{--                                                        @if($comment->status==0)--}}
{{--                                                            <input type="button" data-comment_status="1" data-comment_id = "{{$comment->id}}" id="{{$comment->post_id}}" class="btn btn-danger btn-xs comment-approve-btn" value="Duyệt" ></input>--}}
{{--                                                        @else--}}
{{--                                                            <input type="button"  data-comment_status="0" data-comment_id = "{{$comment->id}}" id="{{$comment->post_id}}" class="btn btn-primary btn-xs comment-approve-btn" value="Bỏ Duyệt" ></input>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                                <td class="tb-tnx-info" style="width: 100px;">--}}
{{--                                                    <div style="width: 100px;">--}}
{{--                                                        <span class="title">{{$comment->name}}</span>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="tb-tnx-date">--}}
{{--                                                        <span class="date" style="width: 100px;">{{$comment->post->name}}</span>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="tb-tnx-date" >--}}
{{--                                                        <span class="date" style="width: 300px; margin-right: 0px">{{$comment->content}}</span>--}}
{{--                                                        <style type="text/css">--}}
{{--                                                            ul.list-reply-comment li{--}}
{{--                                                                font-weight: bold;--}}
{{--                                                                list-style-type: auto;--}}
{{--                                                                margin: 5px 30px;--}}
{{--                                                            }--}}
{{--                                                        </style>--}}
{{--                                                        <ul class="list-reply-comment" style="width: 300px;">--}}
{{--                                                            Trả lời:--}}
{{--                                                            @foreach($cmt_reps as $key=>$cmt_reply)--}}
{{--                                                                @if($cmt_reply->comment_parent_id==$comment->id)--}}
{{--                                                                    <li>{{$cmt_reply->content}}</li>--}}
{{--                                                                @endif--}}
{{--                                                            @endforeach--}}
{{--                                                        </ul>--}}
{{--                                                        @if($comment->status==0)--}}
{{--                                                            <br><textarea rows="3" class="form-control reply_comment_{{$comment->id}}" data-width="300px"></textarea>--}}
{{--                                                            <br><button class="btn-primary btn-default btn-xs btn_reply_comment" data-post_id="{{$comment->post_id}}" data-comment_id="{{$comment->id}}">Trả lời</button>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}

{{--                                            </tr><!-- tb-tnx-item -->--}}
{{--                                        @endforeach--}}

{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div><!-- .card-inner -->--}}
                                <div class="card-inner">
                                    <ul class="pagination justify-content-center justify-content-md-start">
                                        {!!$comments->links('pagination::bootstrap-4')!!}
                                    </ul><!-- .pagination -->
                                </div><!-- .card-inner -->
{{--                            </div><!-- .card-inner-group -->--}}
{{--                        </div><!-- .card -->--}}
{{--                    </div><!-- .nk-block -->--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection

@push('footer')
    <script>
        $('.comment-approve-btn').click(function(){
            var status = $(this).data('comment_status');
            var id = $(this).data('comment_id');
            var post_id = $(this).attr('id');
            if(status==0) {
                alert("Thay đổi thành không duyệt thành công");
            }else {
                alert("Thay đổi thành duyệt thành công!");
            }


            $.ajax({
                url: '/admin/allow_comment',
                type: "POST",
                data: {status: status, id: id, post_id: post_id},
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                success: function (result) {
                    window.location.reload(true);
                }
            });

        })
        //
        //
        $('.btn_reply_comment').click(function(){
            var comment_id = $(this).data('comment_id');
            var content = $('.reply_comment_'+comment_id).val();
            var post_id = $(this).data('post_id');


            $.ajax({
                url: '/admin/reply_comment',
                type: "POST",
                data: {comment_id: comment_id, content: content, post_id: post_id},
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                success: function (result) {
                    alert("Reply thành công!");
                    window.location.reload(true);

                }
            });



        })
        $(document).ready(function() {

            $("#key_search").on('keyup', function () {
                var search = $(this).val();
                $.ajax({
                    url: '{{route('admin.comments.key_search')}}',
                    type: "GET",
                    data: {'search': search},
                    success: function (data) {
                        $('#list').html(data);
                        console.log(data);
                    }
                })
            })
        })
    </script>
@endpush

