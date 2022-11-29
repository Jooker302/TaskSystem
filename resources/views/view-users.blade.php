@extends('includes.dashboard')

@section('content')

<table class="table table-striped table-bordered" style="margin: 5%;width: 80%">
    <thead>
      <tr>
        {{-- <th scope="col">#</th> --}}
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        <th scope="col">Created At</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)


      <tr>
        {{-- <th scope="row">1</th> --}}
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        @if($user->user_status == 'blocked')
            <td><a class="btn btn-success" href="{{url('status-act/'.$user->id)}}">Activate</a></td>
        @else
            <td><a class="btn btn-danger" href="{{url('status-deact/'.$user->id)}}">Deactivate</a></td>
        @endif
        <td>{{$user->created_at}}</td>
      </tr>
      @endforeach
      {{-- <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr> --}}
    </tbody>
  </table>

@endsection
