@extends('includes.dashboard')

@section('content')

<table class="table table-striped table-bordered" style="margin: 5%;width: 80%">
    <thead>
      <tr>
        {{-- <th scope="col">#</th> --}}
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Created At</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)


      <tr>
        {{-- <th scope="row">1</th> --}}
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
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
