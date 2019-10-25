
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
    <title>Dashboard 1 - Dashboards - Appwork</title>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900"
          rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/fonts/fontawesome.css">
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/fonts/ionicons.css">
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/fonts/linearicons.css">
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/fonts/open-iconic.css">
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/fonts/pe-icon-7-stroke.css">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/css/rtl/bootstrap.css" class="theme-settings-bootstrap-css">
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/css/rtl/appwork.css" class="theme-settings-appwork-css">
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/css/rtl/theme-corporate.css" class="theme-settings-theme-css">
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/css/rtl/colors.css" class="theme-settings-colors-css">
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/css/rtl/uikit.css">
    <link rel="stylesheet" href="{{asset('admin/')}}/css/demo.css">

    <script src="{{asset('admin/')}}/vendor/js/material-ripple.js"></script>
    <script src="{{asset('admin/')}}/vendor/js/layout-helpers.js"></script>
    <script src="{{asset('admin/vendor/libs')}}/datatables/datatables.css"></script>

    <!-- Theme settings -->
    <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
    <script src="{{asset('admin/')}}/vendor/js/theme-settings.js"></script>
    <script>
        window.themeSettings = new ThemeSettings({
            cssPath: '{{asset('admin/')}}/vendor/css/rtl/',
            themesPath: '{{asset('admin/')}}/vendor/css/rtl/'
        });
    </script>

    <!-- Core scripts -->
    <script src="{{asset('admin/')}}/vendor/js/pace.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Libs -->
    <link rel="stylesheet" href="{{asset('admin/')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">

</head>

<body>
<div class="page-loader">
    <div class="bg-primary"></div>
</div>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-2">
    <div class="layout-inner">

        <!-- Layout sidenav -->
        @include('admin.tmpl.sidebar')
        <!-- / Layout sidenav -->

        <!-- Layout container -->
        <div class="layout-container">
            <!-- Layout navbar -->
            @include('admin.tmpl.topbar')
            <!-- / Layout navbar -->

            <!-- Layout content -->
            <div class="layout-content">

                <!-- Content -->
                <div class="container-fluid flex-grow-1 container-p-y">

                    @yield('content')

                </div>
                <!-- / Content -->

                <!-- Layout footer -->
                <nav class="layout-footer footer bg-footer-theme">
                    <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
                        <div class="pt-3">
                            <span class="footer-text font-weight-bolder">Appwork</span> ©
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="footer-link pt-3">About Us</a>
                            <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Help</a>
                            <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Contact</a>
                            <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </nav>
                <!-- / Layout footer -->

            </div>
            <!-- Layout content -->

        </div>
        <!-- / Layout container -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-sidenav-toggle"></div>
</div>
<!-- / Layout wrapper -->
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/admin_area')) !!};
    var APP_TOKEN = '{{csrf_token()}}';
    var APP_URL_FULL = '{{url()->full()}}';
</script>
<!-- Core scripts -->
<script src="{{asset('admin/')}}/vendor/libs/popper/popper.js"></script>
<script src="{{asset('admin/')}}/vendor/js/bootstrap.js"></script>
<script src="{{asset('admin/')}}/vendor/js/sidenav.js"></script>

<!-- Libs -->
<script src="{{asset('admin/')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{asset('admin/')}}/vendor/libs/chartjs/chartjs.js"></script>

<!-- Demo -->
<script src="{{asset('admin/')}}/js/demo.js"></script>
<script src="{{asset('admin/')}}/js/dashboards_dashboard-1.js"></script>
<script src="{{asset('admin/')}}/js/admin.js"></script>
<script src="{{asset('vendors/bower_components')}}/underscorejs/underscore.min.js"></script>
<script src="{{asset('admin/vendor/libs')}}/datatables/datatables.js"></script>
@yield('templates')
@yield('js')
</body>

</html>