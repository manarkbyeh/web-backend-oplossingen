@extends('layouts.app')
@section('title')
Add New Article
@endsection

@section('content')
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
             <div class="breadcrumb">
                <a href="{{URL('/home')}}"><--- back to overview</a>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">Add article</div>
                <div class="panel-content">
                    <form action="{{URL::Route('Publish')}}" method="POST" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="article-title" class="col-sm-3 control-label">Title : </label>
                            <div class="col-sm-6">
                                <input name="title" id="article-title" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="article-title" class="col-sm-3 control-label">URL  : </label>
                            <div class="col-sm-6">
                                <input name="url" id="article-title" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="article-url" class="col-sm-3 control-label">Content : </label>

                            <div class="col-sm-6">
                                <textarea  placeholder="Enter comment here" name = "content" class="form-control"></textarea>
                            </div>
                        </div>
                        <!-- Add Article Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Article
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