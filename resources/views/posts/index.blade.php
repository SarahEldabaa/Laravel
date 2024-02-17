@extends('layouts.main')

@section('title', 'Posts')

@section('content')

    <div class="container mt-5 ">
        <h2 class="mt-5 text-xl" style="color: red"> Posts List</h2>

        <table class="table">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">title</th>
                <th scope="col">slug</th>
                <th scope="col">body</th>
                <th scope="col">published at</th>
                <th scope="col">user name</th>
                <th scope="col">action</th>

            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            <a class="text-decoration-none" href="{{ route('posts.show', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </td>

                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->published_at }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <a class="text-decoration-none" href="{{ route('posts.edit', $post->id) }}"><button
                                    type="button" class="btn btn-primary">Edit</button></a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">{{ $posts->links() }}</div>

@endsection
