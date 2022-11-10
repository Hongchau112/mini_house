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
    <div>
        <h5><a target="_blank" href="{{route('customer.posts.details', ['id'=>$comment->post_id])}}">Trả lời bình luận của bài đăng {{$comment->post_id}}</a></h5>
        <br>
            <div class="tb-tnx-date" >
                <div class="author-thumb"><img src="/images/avt-cmt.png" width="10%" style="margin-bottom: -60px;margin-left: 25px;}"></div>
                <div class="comment-inner" style="width: 700px;background: lavenderblush;padding: 20px;margin-left: 100px;">{{$comment->content}}</div>
                <div style="margin-top: 25px; margin-left: 100px;">
                    <ul class="list-reply-comment" style="width: 300px;">
                        Trả lời:
                        @foreach($cmt_reps as $key=>$cmt_reply)
                            @if($cmt_reply->comment_parent_id==$comment->id)
                                <div><li style=" background: lightgoldenrodyellow; margin-bottom: 20px;
                                         padding: 19px;
                                         width: 666px;
                                         list-style-type: none;">{{$cmt_reply->content}}</li></div>
                            @endif
                        @endforeach
                    </ul>
                    @if($comment->status==0)
    {{--                    <br><textarea rows="3" class="form-control reply_comment_{{$comment->id}}" data-width="300px"></textarea>--}}
                        <textarea class="form-control reply_comment_{{$comment->id}}"  placeholder="Bình luận" rows="6" data-width="700px"></textarea>
                        <br><button class="btn-primary btn-default btn-xs btn_reply_comment" data-post_id="{{$comment->post_id}}" data-comment_id="{{$comment->id}}">Trả lời</button>
                    @endif
                </div>
            </div>
    </div>

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
