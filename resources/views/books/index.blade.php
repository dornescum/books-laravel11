<!-- resources/views/books.blade.php -->

@extends('layouts.app')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
</script>

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

    <h1>Books</h1>
    <form action="{{ route('books.search') }}" method="get">

        {{--        <input type="reset" value="Reset">--}}
        {{--        <a href="/books" class="btn btn-secondary">Reset</a>--}}
        <div class="d-flex">
            <label for="search" style="padding-right: 1rem">
                <input type="text" id="search" name="keyword" placeholder="search" style="height: 34px">
            </label>
               <span style="position: relative">
            <input type="submit" name="submit" value="" style="padding: 0 1rem; border-radius: 5px">
            <i class="fa fa-search" style="position: absolute; right: 8px; top: 7px; color: black;"></i>
        </span>
            <span style="position: relative">
            <input type="reset" name="submit" value="" style="padding: 0 1rem; border-radius: 5px">
            <i class="fa fa-close" style="position: absolute; right: 10px; top: 7px; color: black;"></i>
        </span>
        </div>

        <div class="d-flex">
{{--                    <span style="position: relative">--}}
{{--            <input type="reset" name="submit" value="">--}}
{{--            <i class="fa fa-close" style="position: absolute; right: 10px; top: 5px; color: black;"></i>--}}
{{--        </span>--}}
        </div>


    </form>

    @if(count($books) > 0)
        <div class="container">
            <div class="row">
                @foreach($books as $book)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12" id="books">
                        {{--                        style="width: 18rem;"--}}
                        <a href="books/{{$book['id']}}">


                            <div class="card my-1 book-card">
                                {{--                            height="290px" width="190px"--}}
                                {{--                            style="object-fit: cover"--}}
                                <img src="{{$book->link}}" class="card-img-top" alt="{{$book->title}}">
                                <div class="card-body">
                                    <h5 class="card-title capitalize">{{ $book->title }}</h5>
                                    {{--                                <p class="card-text">{{ $book->description }}</p>--}}
                                </div>
                                <ul class=" d-flex justify-content-between book-author">
                                    {{--                                <li class="list-group-item">Year: {{ $book->year }}</li>--}}
                                    <li class="list-group-item"> {{ $book->author }}</li>
                                    {{--                                <li class="list-group-item"> {{ $book->rating }}</li>--}}
                                    <li class="list-group-item">
                                        @for($i = 0; $i < $book->rating; $i++)
                                            <span>&#9733;</span>
                                        @endfor
                                    </li>
                                </ul>
                                {{--                            <div class="card-body">--}}
                                {{--                                <a href="books/{{$book['id']}}" class="card-link">Book Details</a>--}}
                                {{--                            </div>--}}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No books found</p>
    @endif
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

