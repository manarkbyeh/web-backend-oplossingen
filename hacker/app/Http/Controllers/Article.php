<?php
namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Input;
use Response;
use Validator;
use Auth;
use Session;
use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Article extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create_post(Request $request)
    {
        $rules=[
        'title'=>'required'
        ];
        $val = Validator::make($request->all(),$rules);
        if($val->fails())
        {
            return redirect()->back()->withInput()->withErrors($val);
        }else {
            $posts = new Post();
            $posts->id = input::get('id');
            $posts->title = input::get('title');
            $posts->url = input::get('url');
            $posts->content = input::get('content');
            $posts->user_id = Auth::user()->id;
            $posts->author = Auth::user()->name;
            // echo"<pre>";
            // print_r($posts);
            // echo "</pre>";
            // $posts->save();
            return Redirect::to("/home")
            ->with('Success', 'article "'.input::get('title').'" created succesfully');
        }
    }
    public function edit_posts($id){
        $Post = Post::find($id);
        if ($Post) {
            return view('Article.edit',['Post'=>$Post]);
        } else {
            return Redirect::to("/home");
        }
    }
    
    public function update_post(){
        
        $poo = Post::find(Input::get('id'));
        $poo->title = input::get('title');
        $poo->url = input::get('url');
        $poo->user_id = Auth::user()->id;
        $poo->content = input::get('content');
        $poo->update();
        return Redirect::to("/home")
        ->with('Success','article "'.input::get('title').'" edited succesfully' );
    }
    
    
    public function del_posts($id) {
        $Post = Post::find($id);
        if ($Post) {
            return view('Article.edit',['Post'=>$Post,'confirm'=>true]);
        } else {
            return Redirect::to("/home");
        }
    }
    public function conf_posts() {
        $id = Input::get('id');
        $poo = Post::find($id);
        if(input::get('delete') && $poo){
            $poo->is_delete = true;
            $poo->update();
            return Redirect::to("/home")
            ->with('Success','Article "'.$poo->title.'" deleted successfully' );
        }else if (input::get('cancel')){
           return $this->edit_posts($id);
        }
    }
}