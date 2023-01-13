@extends('includes.dashboard')

@section('content')
{{-- <h1>test</h1> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<form action="{{url('update-inspection-items')}}" method="POST" enctype="multipart/form-data" class="form" style="margin: 5%;" >
    @csrf
    <input type="hidden" name="inspection_item_id" value="{{$inspection_item->id}}">
    <input type="hidden" name="task_id" id="task_id" value="{{$inspection_item->task_id}}">
    <input type="text" value="{{$inspection_item->i_title}}" name="inspection_items" class="form-control" id="inspection_items" placeholder="Inspection Items" style="width: 60%; display:inline">
    <br><br>
    <p>If you want to change image upload it</p>
    <img style="height:200px; width:200px" src="{{$inspection_item->image}}" alt="No Image">
    <input type="file" name="inspection_image" class="form-control" id="inspection_image" placeholder="Inspection Items" style="width: 60%; display:inline">
    <br><br>
    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" value="{{$inspection_item->start_date}}" class="form-control" id="start_date" placeholder="Start Date" style="width: 60%; display:inline">
    <br><br>
    <label for="end_date">End Date</label>
    <input type="date" name="end_date" value="{{$inspection_item->end_date}}" class="form-control" id="end_date" placeholder="End Date" style="width: 60%; display:inline">

    {{-- <a style="display: inline-block" href="javascript:void(0);" class="add_button btn-success" title="Add field">+Click to Add</a> --}}

<br>
<br>




<button type="submit"  class="btn btn-warning">Update</button>

</form>

 @endsection
