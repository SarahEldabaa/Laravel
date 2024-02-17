@extends('layouts.main')

@section('title', 'create post')

@section('content')

    <div class="container mt-5 w-50">
        <h2 class="mt-5 text-xl" style="color: red"> Create post </h2>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">title</label>
                <input type="text" class="form-control" id="name" name="title">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">body</label>
                <textarea name="body" class="form-control" style="resize: none" cols="30" rows="10"></textarea>
            </div>
            
            <select name="user_id" class="form-select mb-3">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    @endsection
