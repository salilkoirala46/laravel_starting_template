<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cars | Sales</title>
        
        @vite('resources/css/app.css')
        @vite(['resources/js/app.js'])
        
    </head>
    <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
        <div id="app"></div>
    </body>
</html>
