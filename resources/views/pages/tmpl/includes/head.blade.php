<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <!-- PLUGINS CSS STYLE -->
    <link href="{{url('vendors/bower_components/')}}/jquery-ui/jquery-ui.css" rel="stylesheet">
    <link href="{{url('vendors/bower_components/')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{--<link href="{{url('vendors/bower_components/')}}/font-awesome/css/font-awesome.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css" href="{{url('vendors/bower_components/')}}/selectbox/select_option1.css">
    <link rel="stylesheet" type="text/css" href="{{url('vendors/bower_components/')}}/datepicker/datepicker.css">
    <link rel="stylesheet" type="text/css" href="{{url('vendors/bower_components/')}}/isotope/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="{{url('vendors/bower_components/')}}/isotope/isotope.css">
    <link rel="stylesheet" href="{{url('vendors/bower_components/')}}/slick/slick.css">
    <link rel="stylesheet" href="{{url('vendors/bower_components/')}}/slick/slick-theme.css">
    <link rel="stylesheet" href="{{url('vendors/icons/')}}/font/flaticon.css">
    <!-- REVOLUTION SLIDER -->
    <link rel="stylesheet" href="{{url('vendors/bower_components/')}}/revolution/css/settings.css">
    <link rel="stylesheet" href="{{url('vendors/bower_components/')}}/revolution/css/layers.css">
    <link rel="stylesheet" href="{{url('vendors/bower_components/')}}/revolution/css/navigation.css">
    <link rel="stylesheet" href="{{url('vendors/bower_components/')}}/jBox/Source/jBox.css">

@if(isset($css))
    @foreach($css as $link)
        {!! $link !!}
    @endforeach
@endif


<!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,600,700' rel='stylesheet' type='text/css'>

    <!-- CUSTOM CSS -->
    <link href="{{url('')}}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('')}}/css/colors/default.css" id="option_color">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>