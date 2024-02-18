@extends('layouts.main')

@section('title', 'Users')

@section('content')

    <div class="container mt-5 ">
        <h2 class="mt-5 text-xl" style="color: red"> Users List</h2>

        <table class="table">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">#Posts</th>
                <th scope="col">Posts Count</th>
                <th scope="col">Action</th>

            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a class="text-decoration-none"
                            href="{{ route('users.index') }}/{{ $user->id }}">{{ $user->name }}</a>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->posts->count() }}</td>
                            <td>{{ $user->posts_count }}</td>
                        <td>
                            <a class="text-decoration-none"
                                href="{{ route('users.index') }}/{{ $user->id }}/edit"><button type="button"
                                    class="btn btn-primary">Edit</button></a>
                            <form action="{{ url("users/$user->id") }}" method="POST" style="display:inline">
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
    <div class="d-flex justify-content-center">{{ $users->links() }}</div>

@endsection
