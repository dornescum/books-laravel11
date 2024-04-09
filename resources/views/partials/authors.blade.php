
@php
    $authors = App\Models\Book::select('author')->distinct()->get();
@endphp

@foreach($authors as $author)
    <li data-id="$book->{{ $author->author }}">
    <a class="" href="{{ route('books.author', ['author' => $author->author]) }}">{{ $author->author }}</a>
    </li>

@endforeach
{{--TODO page for all authors--}}
<button class="btn btn-secondary"> more ...</button>
