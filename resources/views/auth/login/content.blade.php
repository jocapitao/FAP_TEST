@extends('pages.tmpl.master')

@section('content')
    <section class="mainContentSection packagesSection">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3>Log in to your account.</h3>
                    <p>Lorem ipsum amet.</p>
                    <form id="login_form" action="{{url('/login')}}" method="post">
                        <div class="form-group">
                            <label for="login_email">Username/Email</label>
                            <input id="login_email" class="form-control" name="login_email" type="text">
                        </div>
                        <div class="form-group">
                            <label for="login_password">Password</label>
                            <input id="login_password" class="form-control" name="login_password" type="password">
                        </div>
                        <div class="form-group">
                            <label for="login_remember">Remember Me?</label>
                            <input id="login_remember" name="login_remember" type="checkbox">
                        </div>

                        {{ csrf_field() }}

                        <button type="submit" id="login_submit" class="btn btn-inverse" style="width:100%">Submit</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $(function(){
            $('#login_form').submit(function (evt) {
                evt.preventDefault();

                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    url:url,
                    method:"post", //First change type to method here
                    data:data,
                    dataType: 'json',
                    success:function(response) {
                        console.log(response);
                    },
                    error:function(){
                        alert("error");
                    }

                });
            });
        });
    </script>
@endsection
