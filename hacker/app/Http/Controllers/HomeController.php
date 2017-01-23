<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Carbon\CarbonInterval;
use Request;
use App\Post;
use App\Like;
use App\Comment;
use App\User;
use Input;
use Response;
use Auth;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
   

    public function index()
    {
      $blog = Post::select('*')
            ->leftjoin('users','posts.user_id','=','users.id')
            ->select('posts.id as post_id','posts.title as post_title','posts.content as post_content','posts.slug as post_slug','users.name as post_user','posts.user_id as post_user_id')
             ->leftjoin('comments','posts.user_id','=','comments.user_id')
             ->select(['*',DB::raw('count(posts.user_id')])
            //->leftjoin('likes','posts.user_id','=','likes.id')
            //  ->orderBy('posts.id', 'DESC')
            // ->groupBy('posts.id')
            ->paginate(10);


      
        //  echo"<pre>";

        //     print_r($blog);
        //     echo "</pre>";
        
      return view('Home',['blog'=>$blog]);
    }
    // public function 
 public function toSql()
  {
        //I add this line to make debugging easier (originally it's all one return statement)
        //note: 
      $checkMysql = $this->grammar->compileSelect($this);
        
        //I put breakpoint here
    return $checkMysql;
  }
}

