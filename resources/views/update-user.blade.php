@extends('includes.dashboard')

@section('content')
{{-- <h1>test</h1> --}}

<form action="{{url('update')}}" method="POST" class="form" style="margin: 5%;" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <div class="form-group center" >
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" class="form-control" value="{{$user->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Name</label>
      <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="trade">Trade / Profession</label>
        <input type="text" value="{{$user->trade}}" name="trade" class="form-control" id="trade" placeholder="Trade / Profession">
      </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Image</label>
        <input type="file" name="image" class="form-control" id="image">
      </div>
      <input type="hidden" name="status" value="user">
      {{-- <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div> --}}

    {{-- <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
