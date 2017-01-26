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

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create_post(Request $request)
    {
        $rules=[
        'title' => 'required|max:255',
        'url' => 'required|max:255|url',
        'content' => 'required|min:6',
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
            $posts->save();
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
    
    public function update_post(Request $request){
        $rules=[
        'title' => 'required|max:255',
        'url' => 'required|max:255|url',
        'content' => 'required|min:6',
        ];
        $val = Validator::make($request->all(),$rules);
        if($val->fails())
        {
            return redirect()->back()->withInput()->withErrors($val);
        }else {
            $poo = Post::find(Input::get('id'));
            $poo->title = input::get('title');
            $poo->url = input::get('url');
            $poo->user_id = Auth::user()->id;
            $poo->content = input::get('content');
            $poo->update();
            return Redirect::to("/home")
            ->with('Success','article "'.input::get('title').'" edited succesfully' );
        }
    }
    public function del_posts($id) {
        $Post = Post::find($id);
        if ($Post) {
            return redirect()->route('post_edit', ['id' => $id])
            ->with('confirm', "yes");
        } else {
            return Redirect::to("/home");
        }
    }
    public function conf_posts() {
        $id = Input::get('id');
        $post = Post::find($id);
        if(input::get('delete') && $post){
            $post->is_delete = true;
            $post->update();
            return Redirect::to("/home")
            ->with('Success','Article "'.$post->title.'" deleted successfully' );
        }else if (input::get('cancel')){
            return redirect()->route('post_edit', ['id' => $post->id ] );
        }
    }
}