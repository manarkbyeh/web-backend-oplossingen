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
        $result = DB::select(DB::raw("SELECT posts.* , (select count(comments.user_id) from comments where comments.post_id = posts.id) as post_count_comments,likes.up,likes.down FROM posts LEFT JOIN likes ON likes.user_id = posts.user_id and likes.post_id = posts.id where posts.is_delete = 0 ORDER BY posts.likes DESC"));
        // echo"<pre>";
        // print_r($result);
        // echo "</pre>";
        return view('Home',['result'=>$result]);
    }
    
}