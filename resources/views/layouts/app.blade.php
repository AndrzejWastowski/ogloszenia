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
    <link rel="stylesheet"  href="/css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet"  href="/assets/css/app.css">

    <!--plugins-->
	<link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="/assets/css/pace.min.css" rel="stylesheet" />
	<script src="/assets/js/pace.min.js"></script>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link href="/assets/css/icons.css" rel="stylesheet">

    <!-- Styles -->
</head>

<body class="bg-light-grey">  

    <div class="row" id="example"></div>
     
    @include('layouts.menu_top')
    @yield('content')
    @include('layouts.footer')
  
    <!-- SCRIPTS -->
    <script src="/js/app.js"></script>
    <script src="/assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script src="/assets/dist/js/wow.min.js"></script>
    <script src="https://unpkg.com/react@16/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>

    <!-- Initializations -->
    <script type="text/javascript">
        new WOW().init();   
 

    function addDays(date, days) {
            const copy = new Date(Number(date))
            copy.setDate(date.getDate() + days)
    return copy
}
    </script>

    

    @yield('java_script')

 

</body>
</html>
