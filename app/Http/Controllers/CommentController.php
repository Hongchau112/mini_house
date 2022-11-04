<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function send_comment(Request $request)
    {
        dd($request);
        $comment = new Comment();
        $comment->name = $request['name'];
        $comment->content = $request['content'];
        $comment->post_id = $request['post_id'];
        $comment->date = now();
        $comment->phone = $request['phone'];
        $comment->comment_parent_id = 0;
        $comment->save();
    }

    public function load_comment(Request $request)
    {
//        dd($request);
        $post_id = $request->post_id;
//        dd($post_id);
        $comments = Comment::where('post_id', $post_id)->get();
//        dd($comments);

//        $comments = Comment::with('post')->where('post_id', $post_id)->get();
//        $cmt_reps = Comment::with('food')->where('comment_parent_id','>',0)->get();
//        dd($food_id);
        $output='';
        foreach ($comments as $key => $comment){
            $output.= '<div class="comment-box mb-30">
                            <div class="comment">
                                <div class="author-thumb"><img src="/images/avt-cmt.png" alt=""></div>
                                <div class="comment-inner">
                                    <div class="comment-info clearfix">'.$comment->name.'
                                    <span> - Bình luận ngày '.$comment->date.'</span> </div>
                                    <div class="rating"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> </div>
                                    <div class="text">'.$comment->content.'</div>
                                </div>
                            </div>
                            </div>
 ';
//            foreach ($cmt_reps as $key => $reply_cmt){
//                if($reply_cmt->comment_parent_id==$comment->id)
//                {
//                    $output.= '
//                                            <div style="margin: 5px 40px; height: 60%"><div class="d-flex flex-row reply-cmt" style="margin-left: 20px;margin-top: 20px; padding: 8px 10px; border-radius: 15px;" ><img class="rounded-circle" src="/images/avt-admin.png") width="50" height="80%">
//                                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"></span><span class="d-block font-weight-bold name">@Admin</span><span class="date text-black-50">'.$reply_cmt->date.'</span></div>
//                                            </div>
//
//                                            <div class="mt-2">
//                                                <p class="comment-text" style="font-size: 14px">'.$reply_cmt->content.'</p>
//                                            </div>
//                                            </div>
//
//                                            ';
//                }
//            }
        }
        echo $output;

    }


}
