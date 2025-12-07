@extends('layout')

@section('content')
@if (@session('success'))
    <div class="alert alert-success text-center mt-3">Book updated</div>
@endif

<a href="{{ route('book.show') }}" class="btn btn-secondary m-4">Back</a>

<div class="d-flex justify-content-center mt-4">
    <h4>Edit Book</h4>
</div>

<div class="d-flex justify-content-center my-4">
    <img src="{{ asset('public/images/'.$book->photo) }}" alt="Book Photo" style="width: 150px; height: 200px; object-fit: cover;">
</div>

<form action="{{ route('book.update', ['book' => $book->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="m-5">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $book->title) }}">
        @error('title')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="m-5">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" name="author" id="author" value="{{ old('author', $book->author) }}">
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
            @foreach ($genre as $g)
                <option value="{{ $g->id }}" @selected(old('genre', $book->genre_id) == $g->id)>{{ $g->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="m-5">
        <label for="desc" class="form-label">Description</label>
        <input type="text" class="form-control" name="desc" id="desc" value="{{ old('desc', $book->desc) }}">
        @error('desc')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="m-5">
        <label for="publish_date" class="form-label">Publish Date</label>
        <input type="date" class="form-control" name="publish_date" value="{{ old('publish_date', $book->publish_date) }}">
        @error('publish_date')
            <div class="alert alert-danger mt-1"><strong>{{ $message }}</strong></div>
        @enderror
    </div>

    <div class="d-flex justify-content-center mt-4">
        <input class="btn btn-primary" type="submit" value="Update">
    </div>
</form>
@endsection
