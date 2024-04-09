@extends('layouts.bootstrap')

@section('title', 'Edit Book')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <div class="container" id="edit-book">
        <h1>Edit book</h1>
        <form method="POST" action="{{ route('books.update', ['book' => $book->id]) }}" class="mx-auto">
            @csrf
            @method('PUT')
            <div class="d-flex flex-column">
                <label for="title" class="text-center form-label mb-2">
                    Title
                </label>
                <input type="text" name="title" id="title" value="{{ $book->title }}" class="form-control w-full py-2 px-3
        text-slate-700 leading-tight focus:outline-none"/>
                @error('title')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex flex-column">
                <label class="text-center block uppercase text-slate-700 mb-2" for="author">Author</label>
                <input type="text" name="author" id="author" value="{{ $book->author }}" class="shadow-sm appearance-none border w-full py-2 px-3
        text-slate-700 leading-tight focus:outline-none"/>
                @error('author')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex flex-column">
                <label class="text-center block uppercase text-slate-700 mb-2" for="description">Description</label>
                <textarea class="shadow-sm appearance-none border w-full py-2 px-3
        text-slate-700 leading-tight focus:outline-none" name="description" id="description"
                          rows="5">{{ $book->description }}</textarea>
                @error('description')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex mx-auto my-2">
                <button type="submit" class="mx-auto">Edit Book</button>
            </div>
        </form>
    </div>
@endsection


