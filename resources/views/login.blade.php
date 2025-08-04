@extends('layout')
@section('content')
<div class="d-flex justify-content-center mt-4">
    <div class="row m-3"><h4>Login User</h4></div>
  </div>

    @session('err-login')
        <div class="alert alert-danger">Wrong email/password</div>
    @endsession
    <form action="{{route('dologin')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="m-5">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
        </div>
        <div class="m-5">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
        </div>
        <div class="m-5">
            <a href="{{ route('register') }}">Don't have an account? Register</a>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <input class="btn btn-primary m-3" type ="submit" value="Login">
        </div>

    </form>
    <div class="m-5">
        <a href="{{ route('book.show') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
