<!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Include Bootstrap JavaScript Bundle (no jQuery required) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@foreach ($booksGroupedByCategory as $category => $booksInCategory)
    <li >
    <a class="category my-4" href="{{ route('books.category', ['category' => $category]) }}">
        <span >
             {{ $category }}
        </span>
       </a>
    </li>
@endforeach


<script>
    $(document).ready(function () {
        let category = $(".category");
        category.text(function (_, txt) {
            return txt.charAt(0).toUpperCase() + txt.slice(1);
        });
    });
</script>
