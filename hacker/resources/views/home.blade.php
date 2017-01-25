@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
             @if($Success = (Session::has('Success')) ? Session::get('Success') : "")
            <div class="bg-success">
                   <?php echo $Success; ?>
                </div>
                 @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Article overview</div>
                    <div class="panel-content">
                        <ul class="article-overview">
                            @foreach($result as $item)
                                <li>
                                   <div class="vote">
                                        <div class="form-inline upvote">
                                            <a id="bL-like" href="{{url('Vote/Up',[$item->id, $item->user_id])}}">
                                                <i class="fa fa-btn fa-caret-up  <?php echo (!empty($item->up)&& $item->up ==1)? '':'disabled' ?> upvote" title="You need to be logged in to vote"></i>
                                                </a>
                                        </div>
                                        <div class="form-inline upvote">
                                            <a id="bL-like" href="{{url('Vote/Down',[$item->id, $item->user_id])}}">
                                                <i class="fa fa-btn fa-caret-down <?php echo (!empty($item->down)&& $item->down == -1)? '':'disabled' ?> downvote" title="You need to be logged in to downvote"></i></a>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <a target="_blank" href="<?php echo $item->url ?>" class="urlTitle"><?php echo  $item->title?> </a>
                                        @if (isset(Auth::user()->id) && $item->user_id == Auth::user()->id)
                                            <a href="{{url('/Article/Edit',$item->id)}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                                        @endif
                                    </div>
                                    <div class="info">
                                        Post Vote <?php echo  $item->likes ?> | Posted by <?php echo  $item->author ?> |  <a href="{{url('/post/comment',$item->id)}}"><?php echo  $item->post_count_comments ?> Comment</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection