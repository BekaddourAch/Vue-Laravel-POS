<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Laravel</title>
        <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend/css/ruang-admin.min.css')}}" rel="stylesheet"> 
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        
    </head>
    <body class="bg-gray-50 h-screen antialiased leading-none font-sans">
        <div id="app">
           
        </div>

        <script src="{{mix('js/app.js')}}"></script>
        {{-- <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script> --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{asset('backend/js/ruang-admin.min.js')}}"></script>
        <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>    
        <script src="{{ asset('js/app.js')}}"></script>  
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       </body>
</html>
