@extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      @if(Session::has('confirm'))
        <div class="bg-danger clearfix">
          Are you sure you want to delete this article?
          <form action="{{ URL::Route('conf_delete') }}" method="POST" class="pull-right">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{Session::get('id')}}">
            <button name="delete" class="btn btn-danger" value="5">
              <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
            </button>
            <button name="cancel" class="btn" value="5">
              <i class="fa fa-btn fa-trash" title="delete"></i> cancel
            </button>
          </form>
        </div>
        @endif
      @if($Success = (Session::has('Success')) ? Session::get('Success') : "")
      <div class="bg-success">
        <?php echo $Success; ?>
      </div>
      @endif
      <div class="breadcrumb">
        <a href="{{url('/home')}}">← back to overview</a>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          Article: {{$post->title}}
        </div>
        <div class="panel-content">
          <div class="vote">
            <div class="form-inline upvote">
              <a id="bL-like" href="{{url('Vote/Up',[$post->id, $post->user_id,'Comment'])}}">
<i class="fa fa-btn fa-caret-up  <?php echo (!empty($post->up)&& $post->up ==1)? '':'disabled' ?> upvote" title="You need to be logged in to vote"></i>
</a>
            </div>
            <div class="form-inline upvote">
              <a id="bL-like" href="{{url('Vote/Down',[$post->id, $post->user_id,'Comment'])}}">
<i class="fa fa-btn fa-caret-down <?php echo (!empty($post->down)&& $post->down == -1)? '':'disabled' ?> downvote" title="You need to be logged in to downvote"></i></a>
            </div>
          </div>

          <div class="url">
            <a target="_blank" href="<?php echo $post->url ?>" class="urlTitle">{{$post->title}}</a> @if (isset(Auth::user()->id) && $post->user_id == Auth::user()->id)
            <a href="{{url('/Article/Edit',$post->id)}}" class="btn btn-primary btn-xs edit-btn">edit</a> @endif
          </div>
          <div class="info">Post Vote {{$post->likes}} | Posted by {{$post->author}} | {{$post->post_count_comments}} Comment
          </div>
          <div class="comments">
            @if(isset($comments) && count($comments) >0)
            <ul>
              @foreach($comments as $comment)
              <li>
                <div class="comment-body"><?php echo $comment->content ?>
                </div>
                <div class="comment-info">Posted by <?php echo $comment->name ?> on <?php echo $comment->time ?>
                      @if (isset(Auth::user()->id) && $comment->user_id == Auth::user()->id)
                      <a href="{{url('Comment/Edit',$comment->id)}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                      <a href="{{url('Comment/Del',$comment->id)}}" class="btn btn-danger btn-xs edit-btn">
                        <i class="fa fa-btn fa-trash" title="delete"></i> delete
                      </a>
                      @endif
                </div>
              </li>
              @endforeach
            </ul>
            @else
            <div>
              <p>No comments yet</p>
            </div>
            @endif
          </div>
          @if (isset(Auth::user()->id))
          <form action="{{URL::Route('create_comment')}}" method="POST" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- Comment data -->
            <div class="form-group">
              <label for="body" class="col-sm-3 control-label">Comment</label>
              <div class="col-sm-6">
                <textarea type="text" name="comment" id="comment" class="form-control"></textarea>
              </div>
            </div>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <!-- Add comment -->
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                  <i class="fa fa-plus"></i> Add comment
                </button>
              </div>
            </div>
          </form>
          @else
          <div>
            <p>You need to be <a href="{{url('/login')}}">logged in</a> to comment</p>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection