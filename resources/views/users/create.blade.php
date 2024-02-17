@extends('layouts.main')

@section('title', 'create user')

@section('content')

    <div class="container mt-5 w-50">
        <h2 class="mt-5 text-xl" style="color: red"> Create user </h2>

@if($errors->any())

@foreach ($errors-> all() as $error)
        <p>{{ $error }}</p>
@endforeach

@endif

        <form action="{{ url('/users') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection
