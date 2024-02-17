@extends('layouts.main')

@section('title', 'create user')

@section('content')

    <div class="container mt-5 w-50">
        <h2 class="mt-5 text-xl" style="color: red"> Show post ID</h2>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>ID : </td>
                    <td> {{ $user->id }} </td>
                </tr>
                <tr>
                    <td>Name : </td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td>{{ $user->email }} </td>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td>post title : </td>
                        <td>{{ $post->title }} </td>
                    </tr>
                    <tr>
                        <td>post body : </td>
                        <td>{{ $post->body }} </td>
                    </tr>
                    <tr>
                        <td>post published_at : </td>
                        <td>{{ $post->published_at }} </td>
                    </tr>
                    <tr>
                        <td>post slug : </td>
                        <td>{{ $post->slug }} </td>
                    </tr>
                    <tr>
                        <td>post id : </td>
                        <td>{{ $post->id }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">{{ $posts->links() }}</div>

@endsection
