@extends('layouts.main')

@section('title', 'create user')

@section('content')

    <div class="container mt-5 w-50">
        <h2 class="mt-5 text-xl" style="color: red"> Show user ID</h2>
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
            </tbody>
        </table>
    </div>

@endsection
