@extends('pages.tmpl.master')

@section('content')
    <section class="mainContentSection packagesSection">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" id="content">
                    <h3>Create your account</h3>
                    <p>Lorem ipsum amet.</p>
                    <form id="register_form" method="post" action="{{url('register')}}">
                        <div class="form-group">
                            <label for="register_name">Your Name:</label>
                            <input id="name" class="form-control" name="name" type="text" required>
                        </div>

                        <div class="form-group">
                            <label for="register_email">Your Email:</label>
                            <input id="email" class="form-control" name="email" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="register_username">Your Username:</label>
                            <input id="username" class="form-control" name="username" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Your Password:</label>
                            <input id="password" class="form-control" name="password" type="password" required>
                        </div>
                        <div class="form-group">
                            <label for="register_password_confirmation">Confirm your Password:</label>
                            <input id="password_confirmation" class="form-control" name="password_confirmation"
                                   type="password" required>
                        </div>
                        <div class="form-group">
                            <label for="tos">Terms Of Service</label>
                            <input id="tos" name="tos" type="checkbox" required>
                        </div>
                        <div class="form-group">
                            <label for="pp">Privacy Policy</label>
                            <input id="pp" name="pp" type="checkbox" required>
                        </div>
                        <div class="form-group">
                            <label for="marketing">I agree to receive newsletters.</label>
                            <input id="marketing" name="marketing" type="checkbox">
                        </div>
                        {{ csrf_field() }}

                        <button id="register_submit" class="btn btn-inverse" style="width:100%">Submit</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        function handleRegisterRequest(res) {
            console.log(res);
            if (res.status === false) {
                $.smkAlert({
                    text: iterateValidatorMessages(res.messages),
                    type: 'warning'
                });
                return;
            }

            let template = _.template($('#success-template').html());
            $('#content').html(template)
        }

        $(function () {
            $('#password').smkShowPass();

            $('#register_form').submit(function (evt) {
                evt.preventDefault();

                if (!$('#register_form').smkValidate()) {
                    $.smkAlert({
                        text: 'Fields required.',
                        type: 'warning'
                    });
                    return;
                    // Code here
                    // $.smkAlert({
                    //     text: 'Validate!',
                    //     type: 'success'
                    // });
                }

                var url = $(this).attr('action');
                var data = $(this).serialize();

                $.ajax({
                    url: url,
                    method: "post", //First change type to method here
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        handleRegisterRequest(response);
                    },
                    error: function () {
                        console.log("error");
                    }

                });
            });
        });
    </script>
@endsection

@section('templates')
    <script id="success-template" type="text/template">
        <div class="jumbotron">
            <h3>Registration complete!</h3>
            <p>We have sent a confirmation email to your address!</p>
        </div>
    </script>
@stop