@extends('layout')

@section('content')
<a href="{{ route('book.show') }}" class="btn btn-secondary m-4">Back</a>

<div class="d-flex justify-content-center mt-4">
    <h4>Insert A New Book</h4>
</div>

@if (@session('success'))
    <div class="alert alert-success text-center mt-3">New Book Added!</div>
@endif

<form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="m-5">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        @error('title')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="m-5">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
        @error('author')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="m-5">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" name="photo" id="photo">
        @error('photo')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="m-5">
        <label for="genre" class="form-label">Genre</label>
        <select name="genre" id="genre" class="form-select">
            @foreach ($genre as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="m-5">
        <label for="desc" class="form-label">Description</label>
        <input type="text" class="form-control" name="desc" id="desc" value="{{ old('desc') }}">
        @error('desc')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="m-5">
        <label for="publish_date" class="form-label">Publish Date</label>
        <input type="date" class="form-control" name="publish_date" value="{{ old('publish_date') }}">
        @error('publish_date')
            <div class="alert alert-danger mt-1"><strong>{{ $message }}</strong></div>
        @enderror
    </div>

    <div class="d-flex justify-content-center mt-4">
        <input class="btn btn-primary" type="submit" value="Insert A New Book">
    </div>
</form>
@endsection
