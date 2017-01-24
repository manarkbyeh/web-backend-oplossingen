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
use Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
   public function index()
    {
     $result = DB::select(DB::raw("select posts.* , (select count(comments.user_id) from comments where comments.post_id = posts.id) as post_count_comments from posts "));
        //  echo"<pre>";

        //     print_r($blog);
        //     echo "</pre>";

     
       return view('Home',['result'=>$result]);
    }
    // public function 

}

