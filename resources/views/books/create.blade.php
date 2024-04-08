@extends('layouts.app')

@section('title', 'Add Book')




@section('content')

    <div class="container" id="create-book">
        <h1>Add book</h1>

        <form action="/books" method="POST" class="w-100 mx-auto">
            @csrf
            <div class="d-flex flex-column">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required placeholder="title">
            </div>

            <br>
            <div class="d-flex flex-column">
                <label for="description">Description:</label>
                <input type="text" name="description" required id="description">
            </div>

            <br>
            <div class="d-flex flex-column">
                <label for="author">Author:</label>
                <input type="text" name="author" required id="author">
            </div>

            <br>
            <div class="d-flex flex-column">
                <label for="rating">Rating:</label>
                <input type="text" name="rating" required id="rating" placeholder="5">
            </div>

            <br>
            <div class="d-flex flex-column">
                <label for="category">Category:</label>
                <select name="category_id" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <div class="d-flex flex-column">
                <label for="year">Year:</label>
                <input type="number" name="year" required id="year" placeholder="1984">
            </div>

            <br>
            <div class="d-flex flex-column">
                <label for="image">Image:</label>
                <input type="text" name="link" required id="image" placeholder="https://link.com">
            </div>


            <div class="my-4">
                <button type="submit">Add Book</button>

            </div>
        </form>
    </div>
@endsection
