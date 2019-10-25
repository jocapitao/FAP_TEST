<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{url('vendors/bower_components/smoke/dist/css/smoke.min.css')}}" />
    </head>
    <body>
        @yield('content')

        <script src="{{url('vendors/bower_components/jquery/js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{url('vendors/bower_components/smoke/dist/js/smoke.min.js')}}" type="text/javascript"></script>

        @yield('js')
    </body>
</html>


