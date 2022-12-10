<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        $posts = Post::all();
        $rooms = Room::all();
        $user = Auth::guard('web')->user();
        $comments = Comment::with('post')->where('comment_parent_id', '=', 0)->orderBy('date', 'DESC')->paginate(10);
        $cmt_reps = Comment::with('post')->where('comment_parent_id','>',0)->get();
        return view('admin.comments.index', compact('comments', 'rooms', 'user', 'cmt_reps', 'users', 'posts'));
    }

    public function not_approve()
    {
        $users = \App\Models\User::all();
        $posts = Post::all();
        $rooms = Room::all();
        $user = Auth::guard('web')->user();
        $comments = Comment::with('post')->where('comment_parent_id', '=', 0)->where('status', 0)->orderBy('date', 'DESC')->paginate(10);
        $cmt_reps = Comment::with('post')->where('comment_parent_id','>',0)->get();
        return view('admin.comments.index', compact('comments', 'rooms', 'user', 'cmt_reps', 'users', 'posts'));
    }

    public function key_search(Request $request)
    {
        $user = Auth::guard('web')->user();
        $search = $request->get('search');
        $users = \App\Models\User::all();
        $posts = Post::all();
        $rooms = Room::all();
        $user = Auth::guard('web')->user();
        $cmt_reps = Comment::with('post')->where('comment_parent_id','>',0)->get();

//        dd($search);
        $comments = Comment::orderBy('date','desc')->where('comment_parent_id', '=', 0)->where('content', 'LIKE', '%' . $search . '%')->orWhere('id', 'LIKE', '%' . $search . '%')->orWhere('date', 'LIKE', '%' . $search . '%')->orWhere('name', 'LIKE', '%' . $search . '%')->get();
        if (count($comments)>0)

            return view('admin.comments.search', compact('comments', 'rooms', 'user', 'cmt_reps', 'users', 'posts'));
        else
            return view('admin.rooms.not_found', compact('user'));
    }

    public function allow_comment(Request $request)
    {
        $data = $request->all();
        $comment = Comment::find($data['id']);
        $comment->status = $data['status'];
        $comment->save();
    }

    public function reply($id)
    {
        $user = Auth::guard('web')->user();
        $comment = Comment::find($id);
        $user_cmt = User::where('id', $comment->user_id)->get()->first();
//        dd($user_cmt->id);

        $comments = Comment::with('post')->where('comment_parent_id', '=', 0)->orderBy('status', 'DESC')->paginate(10);
        $cmt_reps = Comment::with('post')->where('comment_parent_id','>',0)->get();
        return view('admin.comments.reply_cmt', compact('comment','user_cmt', 'comments', 'cmt_reps', 'user'));
    }

    public function reply_comment(Request $request)
    {
        $user = Auth::guard('web')->user();
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
        $comment->date = Carbon::now();
        $comment->rating = $request['rating'];
        $comment->phone = $request['phone'];
        $comment->comment_parent_id = 0;
        $comment->user_id = $request['user_id'];
        $comment->save();
    }

    public function load_comment(Request $request)
    {
        $rating1 = '<i class="fas fa-star"></i>';
        $rating2 = '<i class="fas fa-star"></i><i class="fas fa-star"></i>';
        $rating3 = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
        $rating4 = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
        $rating5 = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
        $post_id = $request->post_id;
        $comments = Comment::where('post_id', $post_id)->where('status', 1)->where('comment_parent_id','=',0)->get();

//        $comments = Comment::with('post')->where('post_id', $post_id)->get();
        $cmt_reps = Comment::with('post')->where('comment_parent_id','>',0)->get();
//        dd($food_id);
        $output='';
        if (count($comments)==0)
        {
            $output.='<div><p>Chưa có bình luận nào cho bài đăng này</p></div>';
        }
        else{
            foreach ($comments as $key => $comment){
                $user = \App\Models\User::find($comment->user_id);
                if ($comment->rating==1)
                    {
                        $rating = $rating1;
                    }
                elseif ($comment->rating==2)
                {
                    $rating = $rating2;
                }
                elseif ($comment->rating==3)
                {
                    $rating = $rating3;
                }
                elseif ($comment->rating==4)
                {
                    $rating = $rating4;
                }
                elseif ($comment->rating==5)
                {
                    $rating = $rating5;
                }
                else{
                    $rating='';
                }
                $i=0;
//                dd($user->avatar);
                $output.= '<div class="comment-box mb-30">
                            <div class="comment">
                                <div class="author-thumb"><img src="/images/'.$user->avatar.'" alt=""></div>
                                <div class="comment-inner">
                                    <div class="comment-info clearfix">'.$comment->name.'
                                    <span> - Bình luận ngày '.$comment->date.'</span> </div>
                                    <div class="rating">
                                       '.$rating.'
                  </div>
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
                                    <div class="rating"> </div>
                                    <div class="text">'.$reply_cmt->content.'</div>
                                  </div>
                                </div>
                              </div>
                                            ';
                    }
                }
            }
        }
        echo $output;

    }


}
