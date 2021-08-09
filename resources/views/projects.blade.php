@extends('layouts.app')
@section('content')
    
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif

    <h1>Personal management system (CRUD)</h1>
    <br>
    
    <table class="table"><thead>
        <tr>
            <th><h4>Id</h4></th>
            <th><h4>Name</h4></th>
            <th><h4>Firstname</h4></th>
            <th><h4>Action</h4></th>
        </tr>
    </thead>

    
    @foreach ($projects as $project) 
        @php $employee_firstnames = ''; @endphp
    @foreach ($project -> employees as $employee) 
        @php $employee_firstnames .= $employee -> firstname . ", ";  @endphp 
      
    @endforeach 
        <tr> 
            <td><h6>{{ $project['id'] }}</h6></td>
            <td><h6>{{ $project['name'] }}</h6></td>
            <td><h6>{{ $employee_firstnames }}</h6>
            <p style="font-size: 10px">Employees count: {{ count($project->employees) }} 
            <td><form style="margin-right: -150px" action="{{ route('projects.show', $project['id']) }}" method="GET">
                <input class="btn btn-primary" type="submit" value="UPDATE">
                </form></td>
            <td><form style="margin-left: -150px" action="{{ route('projects.destroy', $project['id']) }}" method="POST">
                @method('DELETE') @csrf
                <input class="btn btn-danger" type="submit" value="DELETE">
                </form></td>
        </tr>
    @endforeach
    </table> 

    <form class="table" method="POST" action="/projects">
        @csrf
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <form method="POST" action="/projects">
        @csrf
        <label for="text">Project:</label><br>
        <input type="text" id="name" name="name" placeholder="Project name">
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>


@endsection