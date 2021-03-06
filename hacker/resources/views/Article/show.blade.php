@extends('layouts.app')
@section('title')
    All Article
@endsection
@section('content')
    <?php
    <div class="container">
        <div class="row">
        
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Article overview</div>

                    <div class="panel-content">

                        <ul class="article-overview">
                            @foreach($blog as $item)
                                <li>
                                    <div class="vote">
                                        <div class="form-inline upvote">
                                            <a id="bL-like-{{$item["User_Id"]}}-{{$item["id"]}}" href="{{URL('/')}}">
                                            <i class="fa fa-btn fa-caret-up disabled upvote" title="You need to be logged in to vote"></i></a>
                                        </div>
                                        <div class="form-inline upvote">
                                            <a id="bL-like-{{$item["User_Id"]}}-{{$item["id"]}}" href="{{URL('/')}}">
                                            <i class="fa fa-btn fa-caret-down disabled downvote" title="You need to be logged in to downvote"></i></a>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        @if ($item->post_user_id == Auth::user()->id)
                                            <a target="_blank" href="<?php echo $item->post_slug ?>" class="urlTitle"><?php echo  $item->post_title?> </a>
                                            <p class="col-lg-6 col-lg-6"><?php echo  $item->post_content?> </p>
                                            <a href="{{url('/post/edit',$item->post_id)}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                                        @else
                                            <a target="_blank" href="<?php echo $item->post_slug ?>" class="urlTitle"><?php echo  $item->post_title?> </a>
                                            <p class="col-lg-6 col-lg-6"><?php echo  $item->post_content?> </p>

                                        @endif
                                    </div>
                                    <div class="info">
                                        Post Vote 1 | Posted by <?php echo  $item->post_user ?> |  <a href="{{url('/post/comment',$item->post_id)}}">Comment</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $("a").click(function() {
            if(this.id.startsWith("bL-like-")){
                var temp=this.id.substr(8);
                var l_user=temp.substr(0,(temp.indexOf("-")));
                var l_id=temp.substr((temp.indexOf("-")+1));
                $.ajax({
                    type: 'POST',
                    url: '/Showarticle/like',
                    data:{user:l_user,link_id:l_id},
                    success:function(data){
                        alert('liked');
                    },
                    error:function(data){
                        alert('error');
                    }
                });
            }
        });
    </script>
@endsection
