<?php

namespace App\Http\Controllers;

use App\User;
use Input;
use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use NilPortugues\Laravel5\JsonApi\Controller\JsonApiController;

class Admin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function api(){
        $urls = User::Select('id','name','email')->get();


        return Response::json(array(
            'error' => false,
            'urls' => $urls->toArray()),
            200
        );
    }
    public function url(){

        $user = User::Select('id','name','email')->get();

        return view('home')->with('user',$user);
    }
	
    public function story(){

        $url = urldecode(("https://hacker-news.firebaseio.com/v0/item/8863.json?print=pretty"));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $auth = curl_exec($curl);
        $json = json_decode($auth) ;
        var_dump($auth);

    }
	//Offline data
	    public function comment(){

        $url = urldecode(("https://hacker-news.firebaseio.com/v0/item/2921983.json?print=pretty"));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $auth = curl_exec($curl);
        $json = json_decode($auth) ;
        var_dump($auth);

    }
	 public function polls(){

        $url = urldecode(("https://hacker-news.firebaseio.com/v0/item/126809.json?print=pretty"));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $auth = curl_exec($curl);
        $json = json_decode($auth) ;
        var_dump($auth);

    }
    	 public function job(){

        $url = urldecode(("https://hacker-news.firebaseio.com/v0/item/192327.json?print=pretty"));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $auth = curl_exec($curl);
        $json = json_decode($auth) ;
        var_dump($auth);

    }
	//live data
	 public function profile_itme(){

        $url = urldecode(("https://hacker-news.firebaseio.com/v0/updates.json?print=pretty"));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $auth = curl_exec($curl);
        $json = json_decode($auth) ;
        var_dump($auth);

    }
    public function article_view(){
        return view('addarticle');
    }

}
