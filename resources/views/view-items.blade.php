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
        <th scope="col">Image</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Status</th>
        <th scope="col">Questions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)


      <tr>
        {{-- <th scope="row">1</th> --}}
        <td>{{$item->i_title}}</td>
            {{-- <img style="height: 200px; width: 200px;" src="{{$user->image}}" alt=""> --}}
            <td><img src="{{$item->image}}" style="height: 200px; width: 200px;" alt="No iMage" ></td>
        <td>{{$task->start_date}}</td>
        <td>{{$task->end_date}}</td>
        <td>
            @if(!$item->status)
                <p>N.A</p>
            @else
            {{$item->status}}</td>
            @endif
        <td>
            <a class="btn btn-primary" href="{{url('view-questions/'.$item->id)}}">View</a>
            {{-- <ul> --}}
                {{-- @foreach ($task['inspection_items'] as $ins_item) --}}
                    {{-- <li>{{}}</li> --}}
                {{-- @endforeach --}}
            {{-- </ul> --}}
        </td>
        {{-- <td><a class="btn btn-success" href="{{url('generate-spdf/'.$task['id'])}}">Export</a></td> --}}
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
