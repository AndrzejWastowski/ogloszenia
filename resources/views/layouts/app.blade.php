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
    <link rel="stylesheet"  href="/assets/css/app.css"  >    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Bootstrap core CSS -->

    <!-- 
        <link rel="stylesheet"  href="/css/bootstrap.min.css">    
    <link rel="stylesheet"  href="/css/add.css">
    <link rel="stylesheet"  href="/css/animate.css">
    <link rel="stylesheet"  href="/css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet"  href="/assets/css/app.css"  >

    <!--plugins
	<link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader
	<link href="/assets/css/pace.min.css" rel="stylesheet" />
	<script src="/assets/js/pace.min.js"></script>
 

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link href="/assets/css/icons.css" rel="stylesheet">
-->


    <!-- Styles -->
</head>

<body class="bg-light-grey">  
    

    @include('layouts.menu_top')
    @yield('content')
   
    @include('layouts.footer')
  
    <!-- SCRIPTS -->
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    


    <!-- Initializations -->
    <script type="text/javascript">
      
 

    function addDays(date, days) {
            const copy = new Date(Number(date))
            copy.setDate(date.getDate() + days)
    return copy
}
    </script>    

    @yield('java_script') 

</body>
</html>
