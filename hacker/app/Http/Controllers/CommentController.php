<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }
}