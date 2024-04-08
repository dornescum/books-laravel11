<!-- resources/views/books.blade.php -->

@extends('layouts.bootstrap')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

{{--@section('styles')--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--@endsection--}}
<style>
    span {
        color: gold;
        font-size: 20px;
        margin-right: 5px;
    }
</style>
@section('content')
{{--    <div class="d-flex justify-content-end">--}}
{{--        <a href="/books">Books</a>--}}
{{--    </div>--}}

    <h1 class="p-1">All Books</h1>
    <div class="d-flex justify-content-end">
        <form action="{{ route('books.search') }}" method="get" id="searchBooks">
            <div class="d-flex">
                <label for="search" style="padding-right: 1rem">
                    <input type="text" id="search" name="keyword" placeholder="search" >
                </label>

                <button type="submit" class="btn btn-search">
{{--                    search--}}
                    <i class="fa fa-search" aria-hidden="true"></i>

                </button>

{{--                <button type="reset" class="btn btn-reset ml-4 pl-4">--}}
{{--                    <i class="fa fa-times" aria-hidden="true"></i>--}}
{{--                </button>--}}
                <a href="/books" type="reset"  class="btn btn-reset ml-4 pl-4">
                    <i class="fa fa-times" aria-hidden="true"></i>

                </a>
            </div>
            <div class="d-flex">
            </div>
        </form>
    </div>


    @if(count($books) > 0)
        <div class="">
            <div class="row">
                @foreach($books as $book)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12" id="books">
                        <a href="books/{{$book['id']}}">
                            <div class="card my-1 book-card">
                                <img src="{{$book->link}}" class="card-img-top" alt="{{$book->title}}">
                                <div class="card-body card-center">
                                    <h5 class="card-title capitalize">{{ $book->title }} --UID: {{$book->user_id}}</h5>
                                </div>
                                <ul class=" d-flex justify-content-between book-author">
                                    <li class="list-group-item"> {{ $book->author }}</li>
                                    <li class="list-group-item">
                                        @for($i = 0; $i < $book->rating; $i++)
                                            <span>&#9733;</span>
                                        @endfor
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No books found</p>
    @endif

    <nav aria-label="Page navigation example" class="my-4 py-4">
        <ul class="pagination " style="margin: 0 0 120px 0">
            <!-- Previous Page Link -->
            @if ($books->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Previous</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $books->previousPageUrl() }}">Previous</a></li>
            @endif

            <!-- Page Number Links -->
            @for ($i = 1; $i <= $books->lastPage(); $i++)
                <li class="page-item {{ ($books->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $books->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            <!-- Next Page Link -->
            @if ($books->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $books->nextPageUrl() }}">Next</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Next</span></li>
            @endif
        </ul>
    </nav>

@endsection



{{--<ul class="list-group my-5">--}}
{{--    @foreach ($books as $book)--}}
{{--        <li class="list-group-item">{{ $book->title }} - {{ $book->category->name }}</li>--}}
{{--    @endforeach--}}
{{--</ul>--}}

{{--<div class="d-flex justify-content-center">--}}
{{--    {{ $books->links() }}--}}
{{--</div>--}}





<script>
    $(document).ready(function () {
        let title = $(".card-title");
        console.log('title ', title)
        console.log('search value ', $("search"))
        title.text(function (_, txt) {
            return txt.charAt(0).toUpperCase() + txt.slice(1);
        });
    });
</script>

{{--            <ul>--}}
{{--            @foreach($books as $book)--}}
{{--                <li class="my-2">--}}
{{--                    <a href="books/<?= $book['id'] ?>">--}}
{{--                        <ul>--}}
{{--                            <li>  {{ $book->title }}</li>--}}
{{--                            <li> {{ $book->description }}</li>--}}
{{--                            <li> Year : {{ $book-> year }}</li>--}}
{{--                            <li>Rating: {{ $book-> rating }}</li>--}}
{{--                            <li>Author : {{ $book-> author }}</li>--}}
{{--                            <li>--}}
{{--                                <img src="{{$book-> link}}" alt="{{$book->title}}" height="90px" width="190px">--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--            </ul>--}}

