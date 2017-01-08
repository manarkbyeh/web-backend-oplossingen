<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');

 
});

Route::group(['middleware' => 'web'], function () {
Route::resource('text','mail');
    });
    Route::pattern('id','[a-z0-9]+');
    Route::get('test/{id}', function ($id) {
    return $id;

 
});
    Route::get('main/{id}', function ($id) {
    return 'welcome in main'.$id;

 
});
/*Route::get('test/{id}', function ($id) {
    return $id;

 
})->where('id','[0-9]+');*/

//Route::get('home/{number}', function ($number=null){
   // return view('welcome');
//return $number;
 
//});
//Route::post('home', function () {

 // echo 'welkome home post';
 
//});
//Route::get('home/{number?}', function ($number=null){
 //  echo Form::open(['method' => 'post', 'url' => 'home' ]);
 //  echo Form::submit('send');
//    echo Form::close();
 
//});
/*Route::put('home', function () {

  echo 'welkome home put';
 
});
Route::get('home/{number?}', function ($number=null){
   echo Form::open(['method' => 'put', 'url' => 'home' ]);
   echo Form::submit('send');
    echo Form::close();
 
});
Route::match(['post','put'],'home', function () {

  echo 'welkome home put';
 
});
Route::get('home/{number?}', function ($number=null){
  // echo Form::open(['method' => 'post', 'url' => 'home' ]);
   // echo Form::open(['method' => 'put', 'url' => 'home' ]);
   echo Form::submit('send');
    echo Form::close();
 
});
Route::group(['prefix' => 'panel'],function(){
    Route::get('users',function(){
        return 'control users';
    });
});
Route::group(['as' => 'panel::'],function(){
    Route::get('users',['as' => 'users' ,function(){
        return 'all users';
    }]);
});
Route::group(['as' => 'panel::'],function(){
      Route::get('users',['as' => 'users' ,function(){
       return Route('panel::users');
    }]);
       
 
});*/