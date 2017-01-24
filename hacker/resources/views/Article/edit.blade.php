@extends('layouts.app') @section('title') Edit Article @endsection @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <div class="breadcrumb">
          <a href="{{URL('/home')}}">
            <--- back to overview</a>
        </div>
        @if(isset($confirm))
        <div class="bg-danger clearfix">
          Are you sure you want to delete this article?
          <form action="{{ URL::Route('post_conf') }}" method="POST" class="pull-right">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="<?php echo $Post->id ?>">
            <button name="delete" class="btn btn-danger" value="5">
              <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
            </button>
            <button name="cancel" class="btn" value="5">
              <i class="fa fa-btn fa-trash" title="delete"></i> cancel
            </button>

          </form>
        </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">Edit Article
            <a href="{{url('Article/Del',$Post->id)}}" class="btn btn-danger btn-xs pull-right">
              <i class="fa fa-btn fa-trash" title="delete"></i> delete article
            </a>
          </div>
          <div class="panel-content">
            <form id="main-form" method="post" action="{{ URL::Route('post_update') }}" class="form-horizontal form-bordered" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="<?php echo $Post->id ?>">

              <div class="form-group">
                <label for="article-title" class="col-sm-3 control-label">Title (max. 255 characters)</label>
                <div class="col-sm-6">
                  <input required="required" type="text" name="title" placeholder="<?php echo $Post->title ?>" value="<?php echo $Post->title ?>" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label for="article-title" class="col-sm-3 control-label">URL (max. 255 characters)</label>
                <div class="col-sm-6">
                  <input required="required" type="text" name="url" placeholder="<?php echo $Post->url ?>" value="<?php echo $Post->url ?>" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label for="article-url" class="col-sm-3 control-label">Content(max. 255 characters)</label>

                <div class="col-sm-6">
                  <textarea required="required" placeholder="<?php echo $Post->content ?>" name="content" class="form-control">
                    <?php echo $Post->content ?>
                  </textarea>
                </div>
              </div>
              <!-- Add Article Button -->
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                  <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Edit Article
                  </button>
                </div>
              </div>
            </form>

          </div>
        </div>

    </div>
  </div>
</div>
@stop