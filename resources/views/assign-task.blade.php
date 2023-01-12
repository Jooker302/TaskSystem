@extends('includes.dashboard')

@section('content')
{{-- <h1>test</h1> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

{{-- <form action="{{url('store-assign-task')}}" method="POST" class="form" style="margin: 5%;" enctype="multipart/form-data"> --}}
    <div class="form" style="margin: 5%;">
        <div class="main-div" id="main-div">
    {{-- @csrf --}}
    <div class="form-group center" >
      <label for="exampleInputEmail1">Task Title</label>
      <input type="name" name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title" required>
      {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Select User</label>
      <select name="user_id[]" id="user_id" class="form-control dynamic-user-id" required>
            <option value="">Select User</option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}} / {{$user->email}}</option>
        @endforeach
      </select>
      {{-- <input type="text" name="name" class="form-control" id="name" placeholder="Name"> --}}
    </div>

    <div class="field_wrapper"></div>

    <a style="display: inline-block; margin:1%" href="javascript:void(0);" class="add_button btn-success" title="Add field">+Click to Add</a>



    <div class="form-group">
        <label for="exampleInputPassword1">Client Name</label>
        <input require type="text" name="client_name" class="form-control" id="client_name" placeholder="Client Name">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input  require type="text" name="description" class="form-control" id="description" placeholder="Description">
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
    <button type="button" onclick="next_items()" class="btn btn-primary">Next</button>
</div>
</div>
  {{-- </form> --}}



<script type="text/javascript">
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

        function next_items(){
        // $("form").submit();
        document.getElementById("title").required = true;
        // document.getElementById("user_id").attributes["required"] = "";
        document.getElementById("client_name").attributes["required"] = "";
        document.getElementById("description").attributes["required"] = "";
        document.getElementById("status").attributes["required"] = "";

        var title = document.getElementById("title").value;
        // var user_id = document.getElementById("user_id").value;
        var client_name = document.getElementById("client_name").value;
        var description = document.getElementById("description").value;
        var status = document.getElementById("status").value;
        // var arr = $('input[name="user_id[]"]').map(function () {

        //     // alert(this.value);
        //     return this.value; // $(this).val()
        // }).get();
        var selWeight = [];
        $('.dynamic-user-id').each(function() {
             if ($(this).val() != '') {
        selWeight.push($(this).val());
    }
    // selWeight.push($(this).val());
});
alert(selWeight);
        // alert(arr);
        // alert(user_id);
        // var title = document.getElementById("title").value;
        if(!title || !client_name || !description){
            // console.log("yes");
            alert("Fill the Fields");
        }else{
            // console.log(title);

        $.ajax({
                url: "/ajax_task",
                type: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'title': title,
                    'user_id': selWeight,
                    'client_name': client_name,
                    'description': description,
                    'status': status
                },
                cache: false,
                success: function(result){
                    $("#main-div").html(result);
                    // submitfilter();
                }
            });
        }
    }
    </script>


@endsection
