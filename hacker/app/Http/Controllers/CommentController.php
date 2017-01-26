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
    
    public function index($id){
        $id = intval($id);
        $post = DB::select(DB::raw("SELECT posts.* , (select count(comments.user_id) from comments where comments.post_id = posts.id) as post_count_comments,likes.up,likes.down FROM posts LEFT JOIN likes ON likes.user_id = posts.user_id and likes.post_id = posts.id where posts.is_delete = 0 and posts.id=".$id));
        
        $comments = Comment::select("*")
        ->leftjoin("users","comments.user_id","=","users.id")
        ->select('comments.content as content','users.name as name ',
        'comments.created_at as time','users.id as user_id','comments.id as id')
        ->where("post_id",$id)
        ->orderby("id","Desc")
        ->get();
        
        if ($post) {
            return View('Comment.show',['post'=>$post[0],'comments'=>$comments]);
        }else{
            return View('home');
        }
        
        
    }
    
    
    public function create_comment(Request $request)
    {
        if (!Auth::check())
            return redirect('/home');
        $rules=[
        'comment' => 'required|max:255'
        ];
        $val = Validator::make($request->all(),$rules);
        if($val->fails())
        {
            return redirect()->back()->withInput()->withErrors($val);
        }else {
            $count = Post::select('*')->where('id',input::get('post_id'))->count();
            if($count == 1){
                $comment = new Comment();
                $comment->post_id = input::get('post_id');
                $comment->content = input::get('comment');
                $comment->user_id = Auth::user()->id;
                $comment->save();
                return redirect()->route('show_comments', ['id' =>  $comment->post_id])
                ->with('Success', "comment added succesfully.");
            }
            return Redirect::to("/home");
        }
    }
    
    
    public function show_comment($id){
        if (!Auth::check())
            return redirect('/home');
        $comment =$this->getDataComment($id);
        if(isset($comment)){
            return view("Comment.edit",['comment'=>$comment]);
        }
        return redirect("/home");
    }
    
    public function update_comment(Request $request){
        if (!Auth::check())
            return redirect('/home');
        $rules=[
        'comment' => 'required|max:255'
        ];
        $val = Validator::make($request->all(),$rules);
        if($val->fails())
        {
            return redirect()->back()->withInput()->withErrors($val);
        }else {
            $comment =$this->getDataComment(input::get('id'));
            if(isset($comment)){
                $comment->content = input::get('comment');
                $comment->update();
                return redirect()->route('show_comment', ['id' => $comment->id])
                ->with('Success', "comment edited succesfully");
            }
            return Redirect::to("/home");
        }
    }
    public function delete_comment($id){
        if (!Auth::check())
            return redirect('/home');
        return  $this->delete($id,'show_comments');
    }
    public function delete_comment_edit($id){
        if (!Auth::check())
            return redirect('/home');
        return  $this->delete($id,'show_comment');
    }
    private function delete($id,$location){
        $comment =$this->getDataComment($id);
        if($location == 'show_comment')
        $id2 = $id;
        else
            $id2 = $comment->post_id;
        if(isset($comment)){
            return redirect()->route($location, ['id' => $id2])
            ->with('confirm', "yes")
            ->with('id', $id);
        }
        return Redirect::to("/home");
    }
    
    public function confirm_delete(){
        if (!Auth::check())
            return redirect('/home');
        return $this->confirm(1);
    }
    public function confirm_delete_edit(){
        if (!Auth::check())
            return redirect('/home');
        return $this->confirm(2);
    }
    private function confirm($cancel){
        $comment =$this->getDataComment(input::get('id'));
        if(input::get('delete')  && isset($comment)){
            $comment->delete();
            return redirect()->route('show_comments', ['id' => $comment->post_id ] )
            ->with('Success', "Comment deleted successfully");
        }else if (input::get('cancel') && isset($comment)){
            if($cancel == 1)
            return redirect()->route('show_comments', ['id' => $comment->post_id ] );
            else if($cancel == 2)
            return redirect()->route('show_comment', ['id' => $comment->id ] );
        }
        return Redirect::to("/home");
    }
    
    private function  getDataComment($id){
        return $comment = Comment::select('*')
        ->where('id',$id)
        ->where('user_id', Auth::user()->id)
        ->first();
    }
}