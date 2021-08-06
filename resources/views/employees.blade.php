@extends('layouts.master')
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
            <th><h4>Project</h4></th>
            <th><h4>Action</h4></th>
        </tr>
    </thead>

    @foreach ($employees as $employee)

        <tr> 
            <td><h6>{{ $employee['id'] }}</h6></td>
            <td><h6>{{ $employee['firstname'] }}</h6></td>  
            <td><h6>{{ $employee -> project['name'] }}</h6></td>
            <td><form style="margin-right: -150px" action="{{ route('employees.show', $employee['id']) }}" method="GET">
                <input class="btn btn-primary" type="submit" value="UPDATE">
                </form></td>
            <td><form style="margin-left: -150px" action="{{ route('employees.destroy', $employee['id']) }}" method="POST">
                @method('DELETE') @csrf
                <input class="btn btn-danger" type="submit" value="DELETE">
                </form></td>
        </tr>
    @endforeach
    </table> 

    <form class="table" method="POST" action="/employees">
        @csrf
        @error('firstname')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <form class="table" method="POST" action="/employees">
        @csrf
        @error('project_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <form method="POST" action="/employees">
        @csrf
        <label for="text">Employee name:</label><br>
        <input type="text" id="firstname" name="firstname"><br>
        <label for="text">Project:</label><br>
        <select style="padding: 4px 13px" name="project_id" id="project_id">
        <option value="">-- Select Project --</option>
        @foreach (App\Models\Project::all() as $project)
        
        <option value="{{ $project['id'] }}">{{ $project['name'] }}</option>
        
        @endforeach
    </select>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>

@endsection