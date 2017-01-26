@extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      @if (count($errors) > 0)
            <div class="alert alert-danger">
            <strong>Whoops! Something went wrong!</strong>
            <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
      @if(Session::has('confirm'))
        <div class="bg-danger clearfix">
          Are you sure you want to delete this article?
          <form action="{{ URL::Route('conf_delete_edit') }}" method="POST" class="pull-right">
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
        <a href="{{URL::Route('show_comments',$comment->post_id)}}">← back to overview</a>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          Edit comment
          <a href="{{URL::Route('del_comment_edit',$comment->id)}}" class="btn btn-danger btn-xs edit-btn pull-right">
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