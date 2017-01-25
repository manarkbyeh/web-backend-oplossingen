@extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
     @if($Success = (Session::has('Success')) ? Session::get('Success') : "")
      <div class="bg-success">
        <?php echo $Success; ?>
      </div>
      @endif
      <div class="breadcrumb">
        <a href="{{URL::Route('show_comments',$comment->post_id)}}">← back to overview</a>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          Edit comment
          <a href="http://pascalculator.be/hackernews/public/comments/delete/10" class="btn btn-danger btn-xs edit-btn pull-right">
            <i class="fa fa-btn fa-trash" title="delete"></i> delete
          </a>
        </div>

        <!-- New Task Form -->
        <form action="{{URL::Route('update_comment')}}" method="POST" class="form-horizontal">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="hidden" name="id" value="{{$comment->id}}">

          <!-- Article data -->
          <div class="form-group">
            <label for="body" class="col-sm-3 control-label">Comment</label>

            <div class="col-sm-6">
              <textarea type="text" name="comment" id="comment" class="form-control">{{$comment->content}}</textarea>
            </div>
          </div>

          <input type="hidden" name="comment_id" value="10">

          <!-- Add Article Button -->
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-default">
                <i class="fa fa-pencil-square-o"></i> edit comment
              </button>
            </div>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
@endsection