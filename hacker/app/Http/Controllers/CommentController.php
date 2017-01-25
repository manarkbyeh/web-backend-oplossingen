<?php

namespace App\Http\Controllers;
use App\Post;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;

class CommentController extends Controller
{
    // public function __construct(Request $request)
    // {
    //     $this->middleware('auth');
    // }
    public function index($id){
        $id = intval($id);
        $post = DB::select(DB::raw("SELECT posts.* , (select count(comments.user_id) from comments where comments.post_id = posts.id) as post_count_comments,likes.up,likes.down FROM posts LEFT JOIN likes ON likes.user_id = posts.user_id and likes.post_id =$id where posts.is_delete = 0 ORDER BY posts.id DESC"));
        if ($post) {
            return View('Comment.show',['post'=>$post[0]]);
        }else{
            return View('home');
        }
        
        
    }
}