<!-- resources/views/book/show.blade.php -->

@extends('layouts.bootstrap')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

@section('content')

    <div class="container" id="show">
        <div class="my-4"></div>
        <div class="row">
            <div class="col-md-3" style="background: #9ca3af">
                <img src="{{$book-> link}}" alt="{{ $book->title }}">
            </div>
            <div class="col-md-7">
                <h1 style="font-weight: bold; text-transform: capitalize">{{ $book->title }} </h1>
                {{--                ====--}}
                <div class="book-info">
                    <p style="color: #1a202c; font-size: large">Author: {{ $book->author }}</p>
                    <p>Published Date: {{ $book->year  ?? null }}</p>
                    <p>Description: {{ $book->description }}</p>
                    {{--                    <p>Rating: {{ $book->rating }}</p>--}}
                    <p class="">Rating:
                        <span class="icon">
                                   @for($i = 0; $i < $book->rating; $i++)
                                <span>&#9733;</span>
                            @endfor
                        </span>

                    </p>
                    <p>{{$book->finished_read_date ?? 'not finished !!'}}</p>
                    <p>{{$book->favorite===0 ? 'not favorite ':' favorite '}}</p>
                    <p>Category: {{ optional($book->category)->name }}</p>
                    <p>{{$book->id}}</p>
                </div>

                {{--                ===========--}}
                <div class="d-flex  justify-content-between book-footer">
                    @can('update', $book)
                        <a href="/books/{{ $book->id }}/edit" class="btn btn-primary">Edit</a>
                    @endcan

                    @can('delete', $book)
                        <form action="/books/{{ $book->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
            <div class="col-md-2" id="show-related">
                <h6>Related</h6>
                <h3>Books in the same category:</h3>

                <ul>
                    @foreach($sameCategoryBooks as $sameCategoryBook)
                        <li>{{ $sameCategoryBook->title }}</li>
                        <li>
                            <img src="{{ $sameCategoryBook->link}}" alt="{{  $sameCategoryBook->title }}" height="90px"
                                 width="90px">

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{--        <h1 style="font-weight: bold; text-transform: capitalize">{{ $book->title }} </h1>--}}
        {{--        <div class="book-info">--}}
        {{--            <p style="color: #1a202c; font-size: large">Author: {{ $book->author }}</p>--}}
        {{--            <p>Published Date: {{ $book->year  ?? null }}</p>--}}
        {{--            <p>Description: {{ $book->description }}</p>--}}
        {{--            <p>Description: {{ $book->rating }}</p>--}}
        {{--            <p>Category: {{ optional($book->category)->name }}</p>--}}
        {{--            <img src="{{$book-> link}}" alt="{{ $book->title }}" height="90px" width="90px">--}}
        {{--        </div>--}}


    </div>

@endsection

<script>
    console.log('inside')
    $(document).ready(function () {
        let title = $(".card-title");
        title.text(function (_, txt) {
            return txt.charAt(0).toUpperCase() + txt.slice(1);
        });
    });
</script>
