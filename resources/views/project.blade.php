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
        <input type="text" name="name" value="{{ $project['name'] }}"><br>
        <input class="btn btn-primary" type="submit" value="UPDATE">
    </form>
@endsection
