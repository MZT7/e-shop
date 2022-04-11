<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{-- {{$title}} --}}
        {{ $title ?? 'ESHOP' }}
        resin in nigeria

    </title>
    <script defer src="https://unpkg.com/alpinejs@3.7.0/dist/cdn.min.js"></script>
    {{-- scripts --}}
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico"> --}}

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css"> --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @livewireStyles
    {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script> --}}
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

    @include('inc.header')


    @include('inc.messages')
    {{-- <livewire:cart /> --}}
    @yield('content')

    @if (isset($slot))
        {{ $slot }}

    @endif

    @include('inc.footer')



    {{-- <a id="topbtn" href="#top">
        <i class="ti-arrow-up"></i>
    </a> --}}

    @livewireScripts
    <script src="js/manifest.js" defer></script>
    {{-- <script src="js/vendor.js" defer></script> --}}
    {{-- <script src="js/jquery.min.js"></script> --}}
    <script src={{ mix('js/app.js') }}></script>
    <script>
        window.addEventListener('swal', function(e) {
            Swal.fire({
                title: e.detail.title,
                icon: e.detail.icon,
                iconColor: e.detail.iconColor,
                timer: 3000,
                toast: true,
                position: 'bottom',
                timerProgressBar: true,
                showConfirmButton: false,


            });
        });
    </script>



</body>

</html>
