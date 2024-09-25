<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Car | Sales</title><!--begin::Primary Meta Tags-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Car Sales | Dashboard">

        @vite(['resources/css/app.css'])
        
        
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
        
            <div id="app"></div>
        
            @vite(['resources/js/app.js'])
        </div>
    </body>
</html>
