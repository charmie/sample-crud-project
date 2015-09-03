<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <!--<script src="{{ asset('js/bootstrap.min.js') }}"></script>-->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
        <!--<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css.map') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">-->
        @yield('javascript')

        
    </head>
    <body>

            @yield("content")

            @yield('footer')


        </div>
    </body>
</html>
