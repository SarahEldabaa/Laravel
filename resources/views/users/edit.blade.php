@extends('layouts.main')

@section('title', 'edit user')

@section('content')
    <div class="container mt-5 w-50">
        <h2 class="mt-5 text-xl" style="color: red"> Edit user </h2>

        <form action="{{ url("/users/$user->id") }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">

                <label for="name" class="form-label">Name</label>

                <input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name">

            </div>

            <div class="mb-3">

                <label for="email" class="form-label">Email
                    address</label>

                <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email">

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
