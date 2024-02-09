@extends('layouts.main')

@section('title', 'edit user')

@section('content')
    <div class="container mt-5 w-50">
        <h2 class="mt-5 text-xl" style="color: red"> Edit user </h2>
        <form>
            <div class="mb-3">
                <label for="exampleInputname1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputname1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
