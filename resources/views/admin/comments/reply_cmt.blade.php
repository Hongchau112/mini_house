@extends('admin.comments.layout', [
    'title' => ($title ?? 'Bình luận')
])
<style>
    ul.list-reply-comment li{
        font-weight: bold;
        list-style-type: auto;
        margin: 5px 30px;
    }
</style>
@section('content')
{{--    <div>--}}
{{--        <h5><a target="_blank" href="{{route('customer.posts.details', ['id'=>$comment->post_id])}}">Trả lời bình luận của bài đăng {{$comment->post_id}}</a></h5>--}}
{{--        <br>--}}
{{--            <div class="tb-tnx-date" >--}}
{{--                <div class="author-thumb"><img src="/images/avt-cmt.png" width="10%" style="margin-bottom: -60px;margin-left: 25px;}"></div>--}}
{{--                <div class="comment-inner" style="width: 700px;background: lavenderblush;padding: 20px;margin-left: 100px;">{{$comment->content}}</div>--}}
{{--                <div style="margin-top: 25px; margin-left: 100px;">--}}
{{--                    <ul class="list-reply-comment" style="width: 300px;">--}}
{{--                        Trả lời:--}}
{{--                        @foreach($cmt_reps as $key=>$cmt_reply)--}}
{{--                            @if($cmt_reply->comment_parent_id==$comment->id)--}}
{{--                                <div><li style=" background: lightgoldenrodyellow; margin-bottom: 20px;--}}
{{--                                         padding: 19px;--}}
{{--                                         width: 666px;--}}
{{--                                         list-style-type: none;">{{$cmt_reply->content}}</li></div>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                    @if($comment->status==0)--}}
{{--    --}}{{--                    <br><textarea rows="3" class="form-control reply_comment_{{$comment->id}}" data-width="300px"></textarea>--}}
{{--                        <textarea class="form-control reply_comment_{{$comment->id}}"  placeholder="Bình luận" rows="6" data-width="700px"></textarea>--}}
{{--                        <br><button class="btn-primary btn-default btn-xs btn_reply_comment" data-post_id="{{$comment->post_id}}" data-comment_id="{{$comment->id}}">Trả lời</button>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--    </div>--}}
    <section style="background-color: #eee;">
        <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">

                        <div class="card-body">
                            <div class="d-flex flex-start align-items-center">
                                <img class="rounded-circle shadow-1-strong me-3"
                                     src="{{asset('images/'.$user_cmt->avatar)}}" alt="avatar" width="60"
                                     height="60" />
                                <div style="margin-left: 20px">
                                    <h6 class="fw-bold text-primary mb-1">{{$comment->user_id}}</h6>
                                    <p class="text-muted small mb-0">
                                        {{$comment->date}}
                                    </p>
                                </div>
                            </div>

                            <p class="mt-3 mb-4 pb-2">
                                {{$comment->content}}
                            </p>
                            <div class="small d-flex justify-content-start">

                                <a href="#!" class="d-flex align-items-center me-3">
                                    <i class="far fa-comment-dots me-2"></i>
                                    <p class="mb-0">Trả lời</p>
                                </a>
                            </div>
                        </div>
                        <div class="form-reply" style="padding: 20px 45px">
                            <ul>
                                @foreach($cmt_reps as $key=>$cmt_reply)
                                    @if($cmt_reply->comment_parent_id==$comment->id)
                                        <div class="card-body">
                                            <div class="d-flex flex-start align-items-center">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                     @php
                                                        $admin_rep = \App\Models\User::where('id', $cmt_reply->user_id)->get()->first();
                                                     @endphp
                                                     src="{{asset('images/'.$admin_rep->avatar)}}" alt="avatar" width="60"
                                                     height="60" />
                                                <div style="margin-left: 20px">
                                                    <h6 class="fw-bold text-primary mb-1">{{$admin_rep->name}}</h6>
                                                    <p class="text-muted small mb-0">
                                                        {{$cmt_reply->date}}
                                                    </p>
                                                </div>
                                            </div>

                                            <p class="mt-3 mb-4 pb-2">
                                                {{$comment->content}}
                                            </p>
                                            <div class="small d-flex justify-content-start">

                                                <a href="#!" class="d-flex align-items-center me-3">
                                                    <i class="far fa-comment-dots me-2"></i>
                                                    <p class="mb-0">Trả lời</p>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                            <div class="d-flex flex-start w-100" >
                                <img class="rounded-circle shadow-1-strong me-3"
                                     src="{{asset('images/'.$user->avatar)}}" alt="avatar" width="40"
                                     height="40" />
                                <div class="form-outline w-100" style="margin-left: 10px;">
                                <textarea class="form-control reply_comment_{{$comment->id}}"  placeholder="Bình luận" id="textAreaExample" rows="4"
                          style="background: #fff;"></textarea>
                                </div>
                            </div>
                            <div class="float-end mt-2 pt-1">
                                <button type="button" class="btn-primary btn-default btn-xs btn_reply_comment" data-post_id="{{$comment->post_id}}" data-comment_id="{{$comment->id}}">Bình luận</button>
                                <button type="button" class="btn btn-outline-primary btn-sm"><a href="{{route('admin.comments.index')}}" >Đóng</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('footer')
    <script>

        $('.btn_reply_comment').click(function(){
            var comment_id = $(this).data('comment_id');
            var content = $('.reply_comment_'+comment_id).val();
            var post_id = $(this).data('post_id');
console.log(comment_id);
            console.log(content);
            console.log(post_id);

            $.ajax({
                url: '{{ route('admin.comments.reply_comment') }}',
                type: "POST",
                data: {comment_id: comment_id, content: content, post_id: post_id},
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                success: function (result) {
                    alert("Reply thành công!");
                    window.location.reload(true);

                }
            });

        })
    </script>
@endpush
