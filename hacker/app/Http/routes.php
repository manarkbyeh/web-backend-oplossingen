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
    // Route::get('/Article/edit', function () {
    //     return view('admin.edit');});
    // Route::get('/Home',function(){
    //     return view('Home');
    // });
  

    Route::post('/Publish', array('as' => 'Publish', 'uses' => 'Article@create_post'));
    Route::get('/Article/Edit/{id}', array('as' => 'post_edit', 'uses' => 'Article@edit_posts'));
    Route::post('/Article/Update', array('as' => 'post_update', 'uses' => 'Article@update_post'));
    Route::get('/Article/Del/{id}', array('as' => 'post_delete', 'uses' => 'Article@del_posts'));
    Route::post('/Article/Conf', array('as' => 'post_conf', 'uses' => 'Article@conf_posts'));
});



