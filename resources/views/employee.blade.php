@extends('layouts.master')
@section('content')

<form action="{{ route('employees.update', $employee['id']) }}" method="POST">
    @method('PUT') @csrf 
    <input style="margin: 5px" type="text" name="firstname" value="{{ $employee['firstname'] }}"><br>
    <input style="margin: 5px" type="text" name="project_id" value="{{ $employee -> project['name'] }}"><br>
    <input style="margin: 5px" class="btn btn-primary" type="submit" value="UPDATE">
</form>

@endsection
