<!DOCTYPE html>
<html lang="en">
@include('pages.tmpl.includes.head')

<body class="body-wrapper ">
<div class="main-wrapper">

    <!-- HEADER -->

@include('pages.tmpl.header')

@yield('content')

<!-- FOOTER -->
    @include('pages.tmpl.footer')
</div>

<!-- Signup Modal -->
<div class="modal fade currencyModal" id="currencyModal" tabindex="-1" role="dialog" aria-labelledby="mycurrencyModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modalContentCustom">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="mycurrencyModalLabel">Choose your currency</h4>
            </div>
            <div class="modal-body">
                @if(Cache::has('currencies'))
			<?php $c = count(Cache::get('currencies')) ?>
			<?php $nr = (12 / $c) ?>
                    <div class="row">
                        @foreach(Cache::get( 'currencies' ) as $key => $value)
                            {{--<a href="{{url('update/currency/'.$value['currency_3'])}}">{{$value['currency_name']}}</a>--}}
                            <div class="col-md-{{$nr}} text-center">
                                <a href="{{url('update/currency/'.$value['currency_3'])}}"><img style="width:100px;" src="{{url('img/currencies/'.$value['currency_3'].'.svg')}}" alt=""></a>
                            </div>
                        @endforeach
                    </div>

                @endif
            </div>
        </div>
    </div>
</div>

@if($user_logged === FALSE)
    {{--    @if ($user_logged === false)--}}
    <!-- Login Modal -->
    <div class="modal fade signupLoging" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modalContentCustom">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Log in to your account</h4>
                </div>
                <div class="modal-body">
                    <form id="login_form" action="{{url('/login')}}" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control bg-ash" id="login_email" name="login_email"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control bg-ash" id="login_password" name="login_password"
                                   placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="login_remember" name="login_remember"> Remember me
                            </label>
                            <a class="forgotPass clerfix" href="">Forgot Password?</a>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="alert alert-danger" style="display:none;" role="alert" id="messages">
                                    <button type="button" class="close" data-dismiss="alert"><span
                                                aria-hidden="true">x</span></button>
                                    <div id="error_warning" style="margin:15px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                        <button type="submit" id="submiBtn" class="btn btn-default">Login</button>
                    </form>
                    <div class="or">
                        or
                    </div>
                    <a class="btn btn-default btnSocial" href="#">Log in with facebook</a>
                </div>

                <div class="modal-footer">
                    <div class="dontHaveAccount">
                        <p>Don’t have an Account?<a href="{{url('register')}}"> Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--@endif--}}
@endif

<!-- JAVASCRIPTS -->
<script src="{{url('vendors/bower_components/')}}/jquery/jquery-2.2.4.min.js"></script>
<script src="{{url('vendors/bower_components/')}}/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="{{url('vendors/bower_components/')}}/jquery-ui/jquery-ui.min.js"></script>
<script src="{{url('vendors/bower_components/')}}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{url('vendors/bower_components/')}}/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="{{url('vendors/bower_components/')}}/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="{{url('vendors/bower_components/')}}/selectbox/jquery.selectbox-0.1.3.min.js"></script>
<script src="{{url('vendors/bower_components/')}}/datepicker/bootstrap-datepicker.js"></script>
<script src="{{url('vendors/bower_components/')}}/jquery/waypoints.min.js"></script>
<script src="{{url('vendors/bower_components/')}}/counter-up/jquery.counterup.min.js"></script>
<script src="{{url('vendors/bower_components/')}}/isotope/isotope.min.js"></script>
<script src="{{url('vendors/bower_components/')}}/isotope/jquery.fancybox.pack.js"></script>
<script src="{{url('vendors/bower_components/')}}/isotope/isotope-triger.js"></script>
<script src="{{url('vendors/bower_components/')}}/countdown/jquery.syotimer.js"></script>
<script src="{{url('vendors/bower_components/')}}/slick/slick.min.js"></script>
<script src="{{url('vendors/bower_components/')}}/jBox/Source/jBox.min.js"></script>

<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!};
            @if(isset($user_currency))
    var APP_CURRENCY = {!! json_encode($user_currency) !!};
            @endif
    var APP_TOKEN = '{{csrf_token()}}';
    var APP_URL_FULL = '{{url()->full()}}';
</script>


@if(isset($js))
    @foreach($js as $link)
        {!! $link !!}
    @endforeach
@endif

<script src="{{url('/')}}/js/custom.js"></script>
<script src="{{url('/')}}/js/app.js"></script>

@if($user_logged === FALSE)
    {{--    @if ($user_logged === false)--}}
    <script type="text/javascript">
        $('#login_form').submit(function (evt) {
            evt.preventDefault();

            var url = $(this).attr('action');
            var data = $(this).serialize();

            $('#submiBtn').html('<i class="fas fa-circle-notch fa-spin"></i>');
            $('#submiBtn').attr('disabled' , true);
            $('#messages').fadeOut();

            $.ajax({
                       url:      url ,
                       method:   "post" , //First change type to method here
                       data:     data ,
                       dataType: 'json' ,
                       success:  function (response) {
                           if ( response.status == true ) {
                               $('#submiBtn').html(response.messages);
                               //then refrsh
                               window.location.reload(1);
                           } else if ( response.status == false ) {
                               var resp = '';

                               if ( typeof(response.messages) == 'object' ) {
                                   for ( var key in response.messages ) {
                                       var value = response.messages[key];
                                       resp += '<li>' + value + '</li>';
                                   }
                               } else {
                                   $(response.messages).each(function (x , y) {
                                       resp += '<li>' + y + '</li>';
                                   });
                               }


                               $('#error_warning').html(resp);
                               // $('#messages').css('display', 'block');
                               $('#messages').fadeIn();
                               $('#submiBtn').html('Login');
                               $('#submiBtn').attr('disabled' , false);
                           }

                       } ,
                       error:    function () {
                           $('#error_warning').html('Something went wrong!');
                           $('#messages').css('display' , 'block');
                           $('#submiBtn').html('Login');
                           $('#submiBtn').attr('disabled' , false);
                       }

                   });
        });
    </script>
    {{--@endif--}}
@endif

@yield('templates')
@yield('js')

{{--
@if(Session::has('message'))
    <script type="text/javascript">
        $(document).ready(function(){
            snotices("{{session('message')['message']}}");
        });
    </script>
@endif
--}}

</body>

</html>

