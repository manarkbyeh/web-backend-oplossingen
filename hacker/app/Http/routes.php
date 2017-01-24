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
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    //Article
    Route::get('/Article', function () {
        return view('Article.create');});
    Route::get('/post/edit', function () {
        return view('admin.edit');});
    // Route::get('/Home',function(){
    //     return view('Home');
    // });
  

    Route::post('/Publish', array('as' => 'Publish', 'uses' => 'Article@create_post'));
    Route::get('/post/edit/{id}', array('as' => 'post_edit', 'uses' => 'HomeController@edit_posts'));
    Route::post('/post/update', array('as' => 'post_update', 'uses' => 'HomeController@update_post'));
    Route::get('/post/del/{id}', array('as' => 'post_delete', 'uses' => 'HomeController@Del_posts'));
});



