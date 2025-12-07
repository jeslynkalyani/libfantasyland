@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="col-4 m-4">
        <a href="{{ route('book.create') }}" class="btn btn-primary">Insert a new book</a>
    </div>
    <div class="col-11 m-5">
        <div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4 m-4">
    @foreach ($books as $item)
    <div class="col">
      <div class="card mb-5">
        <img src="{{ asset('public/images/'.$item->photo) }}" class="card-img-top" style="height: 300px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">{{ $item->title }}</h5>
          <p class="card-text">
            <strong>Author:</strong> {{ $item->author }}<br>
            <strong>Genre:</strong> {{ $item->genre->name }}
          </p>
        </div>
        <div class="card-footer">
          <a href="{{ route('book.detail', ['book'=>$item->id]) }}" class="btn btn-primary">Detail</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="d-flex justify-content-center mt-4">
    {{ $books->links('pagination::bootstrap-4') }}
  </div>
</div>

    </div>
</body>
</html>
@endsection
