<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use Input;
use Response;
use Validator;
use Auth;
use Session;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class CommentController extends Controller
{
    // public function __construct(Request $request)
    // {
    //     $this->middleware('auth');
    // }
    public function index($id){
        $id = intval($id);
        $post = DB::select(DB::raw("SELECT posts.* , (select count(comments.user_id) from comments where comments.post_id = posts.id) as post_count_comments,likes.up,likes.down FROM posts LEFT JOIN likes ON likes.user_id = posts.user_id and likes.post_id = posts.id where posts.is_delete = 0 and posts.id=".$id));
        
        $comments = Comment::select("*")
        ->leftjoin("users","comments.user_id","=","users.id")
        ->select('comments.content as content','users.name as name ',
        'comments.created_at as time','users.id as user_id','comments.id as id')
        ->where("post_id",$id)
        ->get();
        
        if ($post) {
            return View('Comment.show',['post'=>$post[0],'comments'=>$comments]);
        }else{
            return View('home');
        }
        
        
    }
    
    
    public function create_comment(Request $request)
    {
        // $rules=[
        // 'title'=>'required'
        // ];
        // $val = Validator::make($request->all(),$rules);
        // if($val->fails())
        // {
        //     return redirect()->back()->withInput()->withErrors($val);
        // }else {
        $count = Post::select('*')->where('id',input::get('post_id'))->count();
        if($count == 1){
            $commnet = new Comment();
            $commnet->post_id = input::get('post_id');
            $commnet->content = input::get('comment');
            $commnet->user_id = Auth::user()->id;
            $commnet->save();
            return redirect()->route('show_comments', ['id' =>  $commnet->post_id])
            ->with('Success', "comment added succesfully.");
        }
        return Redirect::to("/home");
    }
    
    
    public function show_comment($id){
        $comment = Comment::select('*')->where('id',$id)->first();
        if(isset($comment)){
            return view("Comment.edit",['comment'=>$comment]);
        }
        return redirect("/home");
    }

    public function update_comment(){
        $commnet = Comment::select('*')->where('id',input::get('id'))->first();
        if(isset($commnet)){
            $commnet->content = input::get('comment');
            $commnet->update();
            return redirect()->route('show_comment', ['id' => $commnet->id])
            ->with('Success', "comment edited succesfully");
        }
        return Redirect::to("/home");
    }





}