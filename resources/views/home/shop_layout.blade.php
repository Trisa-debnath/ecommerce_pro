<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>Product Details - Famms</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    @livewireStyles
</head>
<body class="sub_page">
    <div class="hero_area">
        <livewire:home.header />
    </div>

    <main>
        {{ $slot }} </main>

    @include('home.footer')

<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>

    @livewireScripts
</body>
</html>
