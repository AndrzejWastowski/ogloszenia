<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Wastowski Andrzej">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KCI Ogłoszenia') }}</title>
    <!-- Bootstrap core CSS -->

    <link rel="stylesheet"  href="/assets/dist/css/bootstrap.min.css">    
    <link rel="stylesheet"  href="/css/add.css">
    <link rel="stylesheet"  href="/css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">





    <!-- Styles -->
</head>

<body>  

    @include('layouts.menu_top')
    @yield('content')
    @include('layouts.footer')

    <!-- SCRIPTS -->

    <script src="/assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="/assets/dist/js/jquery-3.4.1.min.js"></script>
    <script src="/assets/dist/js/wow.min.js"></script>
    
    
    <!-- start react js -->

    <!-- start react js -->
    <!-- Initializations -->
    <script type="text/javascript">
        new WOW().init();

        (function () {  'use strict'
            document.querySelector('[data-bs-toggle="offcanvas"]').addEventListener('click', function () {
            document.querySelector('.offcanvas-collapse').classList.toggle('open')
        })
        })()

        $(document).ready(function () {
        //jquery code... 

    });


    function addDays(date, days) {
            const copy = new Date(Number(date))
            copy.setDate(date.getDate() + days)
    return copy
}
    </script>

    

    @yield('java_script')


</body>
</html>
