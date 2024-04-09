<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    <title>Laravel 11 | Books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Include Bootstrap JavaScript Bundle (no jQuery required) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/all.min.css"/>
    @yield('styles')
</head>

<body class="container-fluid">
@include('partials.navbar')
<div class="row">
    <div class="col-md-1" id="categories">
        <h6 class="pt-4 categories-title">Categories</h6>
        <ul style=" list-style: none">
            @include('partials.categories')
        </ul>
    </div>
    <div class="col-md-10">
        @yield('content')
    </div>
    <div class="col-md-1" id="authors">
        <h6 class="pt-4 authors-title">Authors</h6>
        <ul style=" list-style: none">
            @include('partials.authors')
        </ul>
    </div>
</div>
<pre>


<div x-data="{ flash: true }">
    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
        <div x-show="flash"
             class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
             role="alert">
            <strong class="font-bold">Success!</strong>
            <div>{{ session('success') }}</div>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     @click="flash = false"
                     stroke="currentColor" class="h-6 w-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </span>
        </div>
@endif

@include('partials.footer')

</body>

</html>

