@extends('layouts.main')

@section('title', 'Show post')

@section('content')

    <div class="container mt-5 w-50">
        <h2 class="mt-5 text-xl" style="color: red"> Show post </h2>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>ID : </td>
                    <td> {{ $post->id }} </td>
                </tr>
                <tr>
                    <td>Title : </td>
                    <td>{{ $post->title }}</td>
                </tr>
                <tr>
                    <td>Slug : </td>
                    <td>{{ $post->slug }} </td>
                </tr>
                <tr>
                    <td>body : </td>
                    <td>{{ $post->body }} </td>
                </tr>
                <tr>
                    <td>published at : </td>
                    <td>{{ $post->published_at }} </td>
                </tr>
                <tr>
                    <td>User name : </td>
                    <td>{{ $post->user->name }} </td>
                </tr>
                <tr>
                    <td>image : </td>
                    <td><img src="{{ Storage::url($post->image)}}" alt=""> </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
