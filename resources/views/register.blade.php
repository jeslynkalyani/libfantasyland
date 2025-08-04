@extends('layout')
@section('content')
@session('success')
    <div class="alert alert-success">
        Registration success!
    </div>
@endsession
<div class="d-flex justify-content-center mt-4">
    <div class="row m-3"><h4>Register</h4></div>
  </div>
<form action="{{ route('doregister') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="m-5">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="" value="{{old('name')}}"/>
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="m-5">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder=""  value="{{old('email')}}"/>
        @error('email')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="m-5">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder=""  value="{{old('password')}}"/>
        @error('password')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="m-5">
        <label for="password_confirmation" class="form-label">Password Confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder=""  value="{{old('password_confirmation')}}"/>
        @error('password_confirmation')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="m-5">
        <a href="{{ route('login') }}">Already have an account? Login</a>
    </div>

    <div class="d-flex justify-content-center mt-4">
            <input class="btn btn-primary m-3" type ="submit" value="Register">
    </div>
</form>
<div class="m-5">
    <a href="{{ route('book.show') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
