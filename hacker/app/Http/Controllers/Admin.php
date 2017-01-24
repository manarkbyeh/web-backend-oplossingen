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

class Admin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  
  public function Create_post (Request $request){

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
            $posts->slug = input::get('slug');
            $posts->content = input::get('content');
            $posts->user_id = Auth::user()->id;
            $posts->save();
            return Redirect::to("/Showarticle?success=$posts->id")
                ->with('Success', 'You have been successfully Add New One ');
        }

    }

    
}
