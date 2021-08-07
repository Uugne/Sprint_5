@extends('layouts.master')
@section('content')

<form action="{{ route('employees.update', $employee['id']) }}" method="POST">
    <div class="form-group">
        @method('PUT') @csrf 
        <input type="text" name="firstname" value="{{ $employee['firstname'] }}"><br>
    </div>
    <div class="form-group">
        <select name="project_id" id="project_id">
            @foreach (App\Models\Project::all() as $project)
                <option value="{{ $project['id'] }}">{{ $project['name'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="UPDATE">
        <a style="background-color: red; border-color: red;" href="{{url()->previous()}}" class="btn btn-primary" type="submit">CANCEL</a>
    </div>
</form>

@endsection
