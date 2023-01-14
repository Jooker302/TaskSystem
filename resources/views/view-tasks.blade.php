@extends('includes.dashboard')

@section('content')
{{-- <div style="width:20%; margin-top:50px; margin-left:50px;align:left">
    <a class="btn btn-success" href="{{url('generate-pdf')}}">Export</a>
</div> --}}
<table class="table table-striped table-bordered" style="margin: 5%;width: 80%; margin-top:0;">
    <thead>
      <tr>
        {{-- <th scope="col">#</th> --}}
        <th scope="col">Title</th>
        <th scope="col">Username</th>
        <th scope="col">Description</th>
        <th scope="col">Client Name</th>
        <th scope="col">Status</th>
        <th scope="col">Inspection Items</th>
        <th scope="col"></th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)


      <tr>
        {{-- <th scope="row">1</th> --}}
        <td>{{$task['title']}}</td>
        <td>
            @foreach ($task->user_id as $user)
                @php
                    $username = App\Models\User::find($user);
                @endphp
                {{$username->name}}
                <br>
            @endforeach
        </td>
        <td>{{$task['description']}}</td>
        <td>{{$task['client_name']}}</td>
        <td>
            @if(isset($task->status))
                @if ($task->status == 0)
                    Not Completed
                @elseif($task->status == 1)
                    Completed
                    <a class="btn btn-danger" href="{{url('final-unapprove/'.$task->id)}}">Reopen</a>
                @else
                    <a class="btn btn-success" href="{{url('final-approve/'.$task->id)}}">Approve</a>
                    <a class="btn btn-danger" href="{{url('final-unapprove/'.$task->id)}}">Unapprove</a>
                @endif


            @endif</td>
        <td>
            <a class="btn btn-primary" href="{{url('view-inspection-items/'.$task['id'])}}">View</a>
            {{-- <ul> --}}
                {{-- @foreach ($task['inspection_items'] as $ins_item) --}}
                    {{-- <li>{{}}</li> --}}
                {{-- @endforeach --}}
            {{-- </ul> --}}
        </td>
        <td><a class="btn btn-success" href="{{url('generate-spdf/'.$task['id'])}}">Export</a></td>
        <td>
            <a class="btn btn-secondary" href="{{url('edit-task/'.$task['id'])}}">Edit</a>
            <a class="btn btn-danger" href="{{url('delete-task/'.$task['id'])}}">Delete</a></td>
      </tr>
      {{-- @php
          $k=0;
      @endphp
        @foreach ($taskfiles as $taskfile)


      @if ($taskfile->task_id == $task['id'])

      @if($k==0)
        <tr>
            <td colspan="6" style="text-align:center"><b>Files</b></td>
            @php
                $k=1;
            @endphp
        </tr>
        @endif

        <tr>
            <td colspan="6">

                    <img style="height: 200px; width: 200px;" src="{{asset('assets/taskfiles/'.$taskfile->file)}}" alt="">

            </td>
        </tr>
        @endif
      @endforeach --}}
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
