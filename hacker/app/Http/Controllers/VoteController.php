<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Like;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function up($id,$user)
    {
        $res=  $this->getData($id,$user);
        if(isset($res) && isset($res->post_up) && $res->post_up == 0 && ($res->post_down == -1  || $res->post_down == 0) ){
           
            //inc likes
            $this->incLikes($id,$user,$res->post_likes,1);
            
            $like = Like::select('*')
            ->where('likes.post_id', '=', $id)
            ->where('likes.user_id', '=', $user)
            ->first(0);
            if($res->post_down == -1){
                $like->down =0;
            }else if($res->post_down == 0){
                $like->up = 1;
            }
            $like->update();
        }else if(!isset($res->post_up)){
            $this->incLikes($id,$user,$res->post_likes,1);
            
            $likes = new Like();
            $likes->user_id = $user;
            $likes->post_id = $id;
            $likes->up = 1;
            $likes->down = 0;
            $likes->save();
        }
        // $res=  $this->getData($id,$user);
        // echo "<pre>";
        // print_r($res);
        // echo "</pre>";
        return Redirect::to("/home");
    }
    public function Down($id,$user)
    {
        $res=  $this->getData($id,$user);
        if(isset($res) && isset($res->post_down) && $res->post_down == 0 && ($res->post_up == 1  || $res->post_up == 0) ){
            
            //dinc -1 incLikes
            $this->incLikes($id,$user,$res->post_likes,-1);
            
            $like = Like::select('*')
            ->where('likes.post_id', '=', $id)
            ->where('likes.user_id', '=', $user)
            ->first(0);
            if($res->post_up == 1){
                $like->up =0;
            }else if($res->post_up == 0){
                $like->down = -1;
            }
            $like->update();
        }else if(!isset($res->post_down)){
            
            $this->incLikes($id,$user,$res->post_likes,1);
            
            $likes = new Like();
            $likes->user_id = $user;
            $likes->post_id = $id;
            $likes->up = 0;
            $likes->down = -1;
            $likes->save();
        }
        return Redirect::to("/home");
    }
    private function getData($id,$user){
        
        return   $results = DB::table('posts')
        ->leftJoin('likes', function($join)
        {
            $join->on('posts.id', '=', 'likes.post_id');
            $join->on('posts.user_id', '=', 'likes.user_id');
        })
        ->where('posts.id', '=', $id)
        ->where('posts.user_id', '=', $user)
        ->select('posts.likes as post_likes',
        'likes.up as post_up','likes.down as post_down')
        ->first(0);
    }
    private function incLikes($id,$user,$old,$inc){
        $post = Post::select('*')
        ->where('posts.id', '=', $id)
        ->where('posts.user_id', '=', $user)
        ->first(0);
        $post->likes = $old + $inc;
        $post->update();
    }
}