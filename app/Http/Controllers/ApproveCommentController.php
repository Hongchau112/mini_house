<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveCommentController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user();
        $comments = Comment::with('post')->where('comment_parent_id', '=', 0)->orderBy('status', 'DESC')->paginate(10);
        $cmt_reps = Comment::with('post')->where('comment_parent_id','>',0)->get();
        return view('admin.comments.index', compact('comments', 'user', 'cmt_reps'));

    }


}
