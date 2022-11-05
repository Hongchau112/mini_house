<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        $comments = Comment::with('post')->where('comment_parent_id', '=', 0)->orderBy('status', 'DESC')->paginate(10);
        $cmt_reps = Comment::with('post')->where('comment_parent_id','>',0)->get();
        return view('admin.comments.index', compact('comments', 'user', 'cmt_reps'));
    }

    public function allow_comment(Request $request)
    {
        $data = $request->all();
        $comment = Comment::find($data['id']);
        $comment->status = $data['status'];
        $comment->save();
    }

    public function reply_comment(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $data = $request->all();
        $comment = new Comment();
        $comment->name = "ChauAdmin";
        $comment->content = $data['content'];
        $comment->post_id = $data['post_id'];
        $comment->comment_parent_id = $data['comment_id'];
        $comment->date = now();
        $comment->user_id = $user->id;
        $comment->status = 1;
        $comment->save();

    }

    public function send_comment(Request $request)
    {
//        var_dump($request);
//        dd($request);
        $comment = new Comment();
        $comment->name = $request['name'];
        $comment->content = $request['content'];
        $comment->post_id = $request['post_id'];
        $comment->date = now();
        $comment->phone = $request['phone'];
        $comment->comment_parent_id = 0;
        $comment->user_id = $request['user_id'];
        $comment->save();
    }

    public function load_comment(Request $request)
    {
        $post_id = $request->post_id;
        $comments = Comment::where('post_id', $post_id)->where('status', 1)->get();

//        $comments = Comment::with('post')->where('post_id', $post_id)->get();
        $cmt_reps = Comment::with('post')->where('comment_parent_id','>',0)->get();
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
            foreach ($cmt_reps as $key => $reply_cmt){
                if($reply_cmt->comment_parent_id==$comment->id)
                {
                    $output.= '<div class="comment-box ml-30 mb-30">
                                <div class="comment">
                                  <div class="author-thumb"><img src="/images/avt-admin.png" alt=""></div>
                                  <div class="comment-inner">
                                    <div class="comment-info clearfix">'.$reply_cmt->name.' <span> - Bình luận ngày '.$reply_cmt->date.'</div>
                                    <div class="rating"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> </div>
                                    <div class="text">'.$reply_cmt->content.'</div>
                                  </div>
                                </div>
                              </div>
                                            ';
                }
            }
        }
        echo $output;

    }


}
