@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
		
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $guest)
                    <tr>
                    <th scope="row">{{$guest->id}}</th>
                    <td>{{$guest->name}}</td>
                    <td>{{$guest->email}}</td>
                </tr>
                @endforeach

                </tbody>
            </table>
            </div>
            </div>
			
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Hacker News</div>
  <div class="panel-body">
    <p>...</p>
  </div>

  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Morbi leo risus</li>
    <li class="list-group-item">Porta ac consectetur ac</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
</div>
    </div>
</div>
@endsection
