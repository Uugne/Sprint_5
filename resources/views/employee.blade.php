@extends('layouts.master')
@section('content')
<form action="{{ route('employees.update', $employee['id']) }}" method="POST">
    @method('PUT') @csrf 
    <input type="text" name="firstname" value="{{ $employee['firstname'] }}"><br>
    <input type="text" name="project_id" value="{{ $employee['project_id'] }}"><br>
    <input class="btn btn-primary" type="submit" value="UPDATE">
</form>
@endsection
