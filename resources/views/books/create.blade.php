@extends('layouts.bootstrap')

@section('title', 'Add Book')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

@section('content')
{{--TODO add favorite and fihished date --}}
    <div class="container" id="create-book">
        <h1>Add book</h1>

        <form action="/books" method="POST" class="w-100 mx-auto">
            @csrf
            <div class="d-flex flex-column">
                <label for="title"  class="form-label">Title:</label>
                <input type="text" id="title" name="title" required placeholder="title" class="form-control">
            </div>
            <br>
            <div class="d-flex flex-column">
                <label class="form-label" for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" required></textarea>
            </div>
            <br>
            <div class="d-flex flex-column">
                <label  class="form-label" for="author">Author:</label>
                <input  class="form-control" type="text" name="author" required id="author">
            </div>

            <br>
            <div class="d-flex flex-column">
                <label  class="form-label" for="rating">Rating:</label>
                <input  class="form-control" type="text" name="rating" required id="rating" placeholder="5">
            </div>

            <br>
            <div class="d-flex flex-column">
                <label  class="form-label" for="category">Category:</label>
                <select name="category_id" id="category" class="form-select" aria-label="Default select example">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <div class="d-flex flex-column">
                <label  class="form-label" for="year">Year:</label>
                <input  class="form-control" type="number" name="year" required id="year" placeholder="1984">
            </div>

            <br>
            <div class="d-flex flex-column">
                <label  class="form-label" for="image">Image:</label>
                <input  class="form-control" type="text" name="link" required id="image" placeholder="https://link.com">
            </div>

            <div class="my-4">
                <button type="submit" class="btn btn-primary"> Add Book</button>

            </div>
        </form>
    </div>
@endsection
