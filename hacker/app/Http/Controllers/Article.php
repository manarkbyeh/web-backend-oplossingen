<?php
namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Input;
use Response;
use Validator;
use Auth;
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
              echo"<pre>";
            print_r($posts);
            echo "</pre>";
            $posts->save();
             return Redirect::to("/home")
            ->with('Success', input::get('title'));
        }
    }
}
