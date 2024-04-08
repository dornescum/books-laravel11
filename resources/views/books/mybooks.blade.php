@extends('layouts.bootstrap')

@section('content')
    <div class="container">
        <h1>My Books</h1>
        @forelse($books as $book)
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text">{{ $book->description }}</p>
                    <!-- Add more book stats here -->
                </div>
            </div>
        @empty
            <p>You have no books.</p>
        @endforelse
    </div>
@endsection
