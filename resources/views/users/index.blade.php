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
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a class="text-decoration-none"
                                href="{{route('users.index')}}/{{ $user->id }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a class="text-decoration-none"
                                href="{{ route('users.index') }}/{{ $user->id }}/edit"><button type="button"
                                    class="btn btn-primary">Edit</button></a>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
