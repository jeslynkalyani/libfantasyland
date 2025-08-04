@extends('layout')

@section('content')
<a href="{{ route('book.show') }}" class="btn btn-secondary m-4">Back</a>
<div class="container my-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <img src="{{ asset('storage/'.$book->photo) }}" class="img-fluid rounded" style="height: 600px; object-fit: cover;">
        </div>

        <div class="col-md-8">
            <h2 class="mb-3">{{ $book->title }}</h2>
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Publish Date:</strong> {{ $book->publish_date }}</p>
            <p><strong>Genre:</strong> {{ $book->genre->name }}</p>
            <p class="text-muted"><em>{{ $book->desc }}</em></p>

            <div class="d-flex gap-3 mt-4">
                <a href="{{ route('book.toupdate', ['book' => $book->id]) }}" class="btn btn-success">Update</a>

                <form action="{{ route('book.delete', ['id' => $book->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
