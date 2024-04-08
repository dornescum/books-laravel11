@extends('layouts.bootstrap')
{{--FIXME nav not working --}}
@section('content')
    <div class="container" id="myBooks">
        <h1 class="p-1">My Books</h1>
        <div class="row">
            @forelse($books as $book)


                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card mt-4">
                        <a href="books/{{$book['id']}}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text">{{ $book->description }}</p>
                                <!-- Add more book stats here -->
                            </div>
                        </a>
                    </div>
                </div>

            @empty
                <p>You have no books.</p>
            @endforelse
        </div>

    </div>
@endsection
