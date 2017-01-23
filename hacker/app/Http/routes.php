<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $article = App\Post::select('*')
        ->leftjoin('users','posts.user_id','=','users.id')
        ->select('posts.id as post_id','posts.title as post_title','posts.content as post_content','posts.slug as post_slug','users.name as post_user','posts.user_id as post_user_id')
        ->orderBy('posts.id', 'DESC')
        ->paginate(10);
    return view('welcome')->with('article',$article);
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    //Article
    Route::get('/article', function () {
    return view('admin.create');});
  
  

    Route::post('/publish', array('as' => 'publish', 'uses' => 'Admin@Create_post'));
   
});



