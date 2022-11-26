@extends('includes.dashboard')

@section('content')
{{-- <h1>test</h1> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<form action="{{url('store-assign-task')}}" method="POST" class="form" style="margin: 5%;">
    @csrf
    <div class="form-group center" >
      <label for="exampleInputEmail1">Task Title</label>
      <input type="name" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
      {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Select User</label>
      <select name="user_id" id="user_id" class="form-control">
            <option value="">Select User</option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}} / {{$user->email}}</option>
        @endforeach
      </select>
      {{-- <input type="text" name="name" class="form-control" id="name" placeholder="Name"> --}}
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Client Name</label>
        <input type="text" name="client_name" class="form-control" id="client_name" placeholder="Client Name">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input type="text" name="description" class="form-control" id="description" placeholder="Description">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Inspection Items</label>
        <div >
            <input type="text" name="inspection_items[]" class="form-control" id="inspection_items" placeholder="Inspection Items" style="width: 60%; display:inline">
            <a style="display: inline-block" href="javascript:void(0);" class="add_button btn-success" title="Add field">+Click to Add</a>
        </div>
    </div>


    <div class="field_wrapper">

    </div>


      <input type="hidden" name="status" value="0">
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



<script type="text/javascript">
    $(document).ready(function(){
        // var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div ><input type="text" name="inspection_items[]" class="form-control" id="inspection_items" placeholder="Inspection Items" style="width: 60%; display:inline"></div>';
        // var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            // if(x < maxField){
                // x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            });
        });

    </script>


@endsection
