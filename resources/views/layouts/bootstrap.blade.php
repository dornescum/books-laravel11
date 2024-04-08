<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    <title>Laravel 11 books</title>
    {{--    <script src="https://cdn.tailwindcss.com"></script>--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <script src="//unpkg.com/alpinejs" defer></script>
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>--}}



    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Include Bootstrap JavaScript Bundle (no jQuery required) -->
    {{--    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>--}}

    {{--    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>--}}


    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/all.min.css"/>
    @yield('styles')

    <style>


    </style>
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
        {{--        breK HERE FOR CONTENT--}}
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
{{--    <p>2 :</p>--}}
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    echo session_id();
    ?>
        </pre>

{{--<pre>--}}
{{--    <p>3 : </p>--}}
{{--    {{ session()->getId() }}--}}
{{--</pre>--}}


<div x-data="{ flash: true }">
    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
        <div x-show="flash"
             class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
             role="alert">
            <strong class="font-bold">Success!</strong>
            <div>{{ session('success') }}</div>
            {{--<p>test</p>--}}
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     @click="flash = false"
                     stroke="currentColor" class="h-6 w-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </span>
        </div>
@endif
{{--@yield('content')--}}

{{--add gere for content--}}



{{--    <div>--}}

{{--        @if (session()->has('success'))--}}
{{--        <div>{{ session('success') }}</div>--}}
{{--        @endif--}}
{{--        @yield('content')--}}
{{--    </div>--}}
@include('partials.footer')

</body>

</html>
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $(".navbar-toggler").click(function () {--}}
{{--            $("#navbarNav").collapse('toggle');--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
<script>
    // document.addEventListener('DOMContentLoaded', (event) => {
    //     const navbarToggler = document.querySelector('.navbar-toggler');
    //     const navbarNav = document.querySelector('#navbarNav');
    //
    //     navbarToggler.addEventListener('click', () => {
    //         // navbarNav.classList.toggle('show');
    //         if(navbarNav.classList.contains('show')){
    //             navbarNav.classList.remove('show')
    //         } else {
    //             navbarNav.classList.add('show');
    //         }
    //
    //     });
    // });

    // document.addEventListener('DOMContentLoaded', (event) => {
    // const navbarToggler = document.querySelector('.navbar-toggler');
    // const navbarNav = document.querySelector('#navbarNav');
    //
    // navbarToggler.addEventListener('click', () => {
    //     if (navbarNav.classList.contains('collapse')) {
    //         navbarNav.classList.remove('collapse');
    //         navbarNav.classList.add('collapsing');
    //         navbarNav.offsetHeight; // force reflow to enable transition
    //         navbarNav.classList.remove('collapsing');
    //         navbarNav.classList.add('collapse', 'show');
    //     } else {
    //         navbarNav.classList.remove('collapse', 'show');
    //         navbarNav.classList.add('collapsing');
    //         navbarNav.offsetHeight; // force reflow to enable transition
    //         navbarNav.classList.remove('collapsing');
    //         navbarNav.classList.add('collapse');
    //     }
    // });
    // });
</script>

<script>
    // $(".navbar-collapse a").click(function () {
    //     $(".navbar-collapse").collapse("hide");
    // });
</script>
