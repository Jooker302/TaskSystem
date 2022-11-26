@extends('includes.dashboard')

@section('content')

<table class="table table-striped table-bordered" style="margin: 5%;width: 80%">
    <thead>
      <tr>
        {{-- <th scope="col">#</th> --}}
        <th scope="col">Title</th>
        <th scope="col">Username</th>
        <th scope="col">Description</th>
        <th scope="col">Client Name</th>
        <th scope="col">Status</th>
        <th scope="col">Inspection Items</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)


      <tr>
        {{-- <th scope="row">1</th> --}}
        <td>{{$task['title']}}</td>
        <td>{{$task['username']}}</td>
        <td>{{$task['description']}}</td>
        <td>{{$task['client_name']}}</td>
        <td>{{$task['status']}}</td>
        <td>
            <ul>
                @foreach ($task['inspection_items'] as $ins_item)
                    <li>{{$ins_item}}</li>
                @endforeach
            </ul>
        </td>
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
