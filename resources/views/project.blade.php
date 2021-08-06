@extends('layouts.master')
@section('content')

@if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif

    
    <form action="{{ route('projects.update', $project['id']) }}" method="POST">
        @method('PUT') @csrf
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input style="margin: 10px" type="text" name="name" value="{{ $project['name'] }}"><br>
        <input style="margin: 10px" class="btn btn-primary" type="submit" value="UPDATE">
        <a style="background-color: red; border-color: red;" href="{{url()->previous()}}" class="btn btn-primary" type="submit">CANCEL</a>
    </form>
@endsection
