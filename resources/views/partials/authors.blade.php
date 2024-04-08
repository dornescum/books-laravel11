{{--@foreach ($booksGroupedByAuthor as $author => $booksInAuthor)--}}
{{--    <h2><a href="{{ route('books.author', ['author' => $author]) }}">{{ $author }}</a></h2>--}}
{{--@endforeach--}}
{{--<p>test</p>--}}


@php
    $authors = App\Models\Book::select('author')->distinct()->get();
@endphp

@foreach($authors as $author)
    <li data-id="$book->{{ $author->author }}">
    <a href="{{ route('books.author', ['author' => $author->author]) }}">{{ $author->author }}</a>
    </li>

@endforeach
<button> more ...</button>
