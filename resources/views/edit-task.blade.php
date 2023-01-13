@extends('includes.dashboard')

@section('content')
{{-- <h1>test</h1> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<form action="{{url('update-task')}}" method="POST" class="form" style="margin: 5%;" enctype="multipart/form-data">
    <div class="form" style="margin: 5%;">
        <div class="main-div" id="main-div">
    @csrf
    <div class="form-group center" >
      <label for="exampleInputEmail1">Task Title</label>
      <input type="name" name="title" value="{{$task->title}}" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title" required>
      {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Select User</label>
      @foreach ($task->user_id as $user_id)
            <select name="user_id[]" id="user_id" class="form-control dynamic-user-id" required>
                <option value="">Select User</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}" @if($user_id == $user->id) selected @endif >{{$user->name}} / {{$user->email}}</option>
            @endforeach
          </select>
      @endforeach

      {{-- <select name="user_id[]" id="user_id" class="form-control dynamic-user-id" required>
            <option value="">Select User</option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}} / {{$user->email}}</option>
        @endforeach
      </select> --}}
      {{-- <input type="text" name="name" class="form-control" id="name" placeholder="Name"> --}}
    </div>

    <div class="field_wrapper"></div>

    <a style="display: inline-block; margin:1%" href="javascript:void(0);" class="add_button btn-success" title="Add field">+Click to Add</a>



    <div class="form-group">
        <label for="exampleInputPassword1">Client Name</label>
        <input require value="{{$task->client_name}}" type="text" name="client_name" class="form-control" id="client_name" placeholder="Client Name">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input  require type="text" value="{{$task->description}}" name="description" class="form-control" id="description" placeholder="Description">
    </div>

    {{-- <div class="form-group">
        <label for="exampleInputPassword1">Inspection Items</label>
        <div >
            <input type="text" name="inspection_items[]" class="form-control" id="inspection_items" placeholder="Inspection Items" style="width: 60%; display:inline">
            <br><br>
            <input type="file" name="inspection_image[]" class="form-control" id="inspection_items" placeholder="Inspection Items" style="width: 60%; display:inline">
            <a style="display: inline-block" href="javascript:void(0);" class="add_button btn-success" title="Add field">+Click to Add</a>
        </div>
    </div>
    <br>




    </div> --}}

        <input type="hidden" name="task_id" value="{{$task->id}}">
      <input type="hidden" name="status" id="status" value="0">
      {{-- <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div> --}}

    {{-- <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
    <br>
    <button type="submit" class="btn btn-warning">Update</button>
</div>
</div>
  </form>

  <script>
    $(document).ready(function(){
        // document.getElementById("edName").attributes["required"] = "";

        // var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="form-group"><select name="user_id[]" id="user_id" class="form-control dynamic-user-id" required><option value="">Select User</option>@foreach ($users as $user)<option value="{{$user->id}}">{{$user->name}} / {{$user->email}}</option>@endforeach</select></div>';
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
