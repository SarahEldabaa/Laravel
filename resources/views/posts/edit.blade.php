@extends('layouts.main')

@section('title', 'edit post')

@section('content')
    <div class="container mt-5 w-50">
        <h2 class="mt-5 text-xl" style="color: red"> Edit post </h2>

        <form action="{{ url("/posts/$post->id") }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-sm-3 mt-4 mb-4">
                <input type="text" name="user_id" value="{{ $AunthenticatedUser->id }}" hidden>
                <h2 class="text-decoration-underline text-muted">Author: {{ $AunthenticatedUser->name }}</h2>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">title</label>
                <input type="text" class="form-control" id="name" value="{{ $post->title }}" name="title">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">body</label>
                <textarea name="body" class="form-control" style="resize: none" cols="30" rows="10"> {{ $post->body }}</textarea>
            </div>

            {{-- <select name="user_id" class="form-select mb-3">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select> --}}

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection
