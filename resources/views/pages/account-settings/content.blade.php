@extends('pages.tmpl.master')

@section('content')
    <section class="settingSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="settingContent bg-ash">
                        <!-- Change Password -->
                        <h4>Account Settings</h4>
                        <div class="changePassword">
                            <p>change Your Password</p>
                            <div class="row">
                                <form id="password_reset_form" action="{{url('/account-settings/updatepassword')}}"
                                      method="post">
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="old_password"
                                               name="old_password"
                                               placeholder="Old Password">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="New Password">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="password_confirmation"
                                               name="password_confirmation" placeholder="Confirm New Password">
                                    </div>
                                    {{csrf_field()}}
                                    <div class="col-sm-12" style="display:none" id="warning_pw">
                                        <div class="col-xs-12">
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <div id="error_warning_pw" style="padding:15px;">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" id="btnSubmitPW" class="btn buttonTransparent">Update
                                            Password
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <hr>

                        <!-- Change Email -->
                        <div class="changeEmail">
                            <p>Change Your Email</p>
                            <div class="row">
                                <form id="new_email_form" action="{{url('/account-settings/updateemail')}}"
                                      method="post">
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control " id="old_email" name="old_email"
                                               placeholder="Old Email">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="New Email">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="email_confirmation"
                                               name="email_confirmation"
                                               placeholder="Confirm New Email">
                                    </div>
                                    {{csrf_field()}}
                                    <div class="col-sm-12" style="display:none" id="warning_email">
                                        <div class="col-xs-12">
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <div id="error_warning_email" style="padding:15px;">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" id="btnSubmitEMAIL" class="btn buttonTransparent">Update
                                            Email Address
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Change Email -->
                        <div class="changeEmail">
                            <p>Change your currency</p>
                            <div class="row">
                                <form id="currency_form" action="{{url('update/currency')}}"
                                      method="get">
                                    <div class="col-sm-12">
                                        <div class="transparentDrop">
                                            <select name="account_currency" id="account_currency" class="select-drop" sb="78826275"
                                                    style="display: none;">
                                                <option value="0">Select your Currency</option>
                                                @if($currency_list)
                                                    @foreach($currency_list as $key => $list)
                                                        <option value="{{$list->currency_3}}">{{$list->currency_name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                    <div class="col-sm-12" style="display:none" id="warning_currency_lang">
                                        <div class="col-xs-12">
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <div id="error_warning_currency_lang" style="padding:15px;">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" id="btnSubmitCurrency" class="btn buttonTransparent">Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="settingContent bg-ash">
                        <h4>Privacy Settings</h4>
                        <!-- Change Setting  -->
                        <div class="changeSetting">
                            <p>Change Settings</p>
                            <div class="row">
                                <form action="" method="post">
                                    <div class="form-check col-sm-12">
                                        <input id="checkbox-1" class="checkbox-custom form-check-input"
                                               name="checkbox-1" type="checkbox">
                                        <label for="checkbox-1" class="checkbox-custom-label form-check-label">Star
                                            Travel has periodic offers and deals on really cool destinations.</label>
                                    </div>
                                    <div class="form-check col-sm-12">
                                        <input id="checkbox-2" class="checkbox-custom form-check-input"
                                               name="checkbox-1" type="checkbox">
                                        <label for="checkbox-2" class="checkbox-custom-label form-check-label">Star
                                            Travel has fun company news, as well as periodic emails.</label>
                                    </div>
                                    <div class="form-check col-sm-12">
                                        <input id="checkbox-3" class="checkbox-custom form-check-input"
                                               name="checkbox-1" type="checkbox">
                                        <label for="checkbox-3" class="checkbox-custom-label form-check-label">I have an
                                            upcoming reservation.</label>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn buttonTransparent">Update Email Address
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="settingContent bg-ash">
                        <h4>Privacy Settings</h4>
                        <!-- Change Setting  -->
                        <div class="changeSetting">
                            <p>Change Settings</p>
                            <div class="row">
                                <form action="" method="post">
                                    <div class="form-check col-sm-12">
                                        <input id="checkbox-1" class="checkbox-custom form-check-input"
                                               name="checkbox-1" type="checkbox">
                                        <label for="checkbox-1" class="checkbox-custom-label form-check-label">Star
                                            Travel has periodic offers and deals on really cool destinations.</label>
                                    </div>
                                    <div class="form-check col-sm-12">
                                        <input id="checkbox-2" class="checkbox-custom form-check-input"
                                               name="checkbox-1" type="checkbox">
                                        <label for="checkbox-2" class="checkbox-custom-label form-check-label">Star
                                            Travel has fun company news, as well as periodic emails.</label>
                                    </div>
                                    <div class="form-check col-sm-12">
                                        <input id="checkbox-3" class="checkbox-custom form-check-input"
                                               name="checkbox-1" type="checkbox">
                                        <label for="checkbox-3" class="checkbox-custom-label form-check-label">I have an
                                            upcoming reservation.</label>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn buttonTransparent">Update Email Address
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $(function () {
            @if(session()->has('status'))
            new jBox('Notice', {
                animation: 'flip',
                color: 'orange',
                content: "{{session()->pull('status')}}"
            });
            @endif


            $('#password_reset_form').submit(function (evt) {
                evt.preventDefault();

                var url = $(this).attr('action');
                var data = $(this).serialize();

                $('#btnSubmitPW').html('<i class="fas fa-circle-notch fa-spin"></i>');
                $('#btnSubmitPW').attr('disabled', true);
                $('#warning_pw').fadeOut();

                $.ajax({
                    url: url,
                    method: "post", //First change type to method here
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == true) {
                            $('#btnSubmitPW').html(response.messages);
                            $('#btnSubmitPW').css('background-color', '#21a700');
                            //then refrsh
                        } else if (response.status == false) {

                            var resp = '';

                            if (typeof(response.messages) == 'object') {
                                for (var key in response.messages) {
                                    var value = response.messages[key];
                                    resp += '<li>' + value + '</li>';
                                }
                            } else {
                                $(response.messages).each(function (x, y) {
                                    resp += '<li>' + y + '</li>';
                                });
                            }


                            $('#error_warning_pw').html(resp);
                            // $('#messages').css('display', 'block');
                            $('#warning_pw').fadeIn();
                            $('#btnSubmitPW').html('UPDATE PASSWORD');
                            $('#btnSubmitPW').attr('disabled', false);
                        }
                    },
                    error: function () {
                        alert("error");
                    }
                });
            });

            $('#new_email_form').submit(function (evt) {
                evt.preventDefault();

                var url = $(this).attr('action');
                var data = $(this).serialize();

                $('#btnSubmitEMAIL').html('<i class="fas fa-circle-notch fa-spin"></i>');
                $('#btnSubmitEMAIL').attr('disabled', true);
                $('#warning_email').fadeOut();

                $.ajax({
                    url: url,
                    method: "post", //First change type to method here
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.status == true) {
                            $('#btnSubmitEMAIL').html(response.messages);
                            $('#btnSubmitEMAIL').css('background-color', '#21a700');
                            //then refrsh
                        } else if (response.status == false) {

                            var resp = '';

                            if (typeof(response.messages) == 'object') {
                                for (var key in response.messages) {
                                    var value = response.messages[key];
                                    resp += '<li>' + value + '</li>';
                                }
                            } else {
                                $(response.messages).each(function (x, y) {
                                    resp += '<li>' + y + '</li>';
                                });
                            }

                            $('#error_warning_email').html(resp);
                            // $('#messages').css('display', 'block');
                            $('#warning_email').fadeIn();
                            $('#btnSubmitEMAIL').html('UPDATE EMAIL ADDRESS');
                            $('#btnSubmitEMAIL').attr('disabled', false);
                        }
                    },
                    error: function () {
                        alert("error");
                    }
                });
            });

            /*$('#currency_form').submit(function (evt) {
                evt.preventDefault();

                var currency = $("#account_currency").val();
                var url = $(this).attr('action');

                $('#currency_form').attr('action', url+'/'+currency);
                // $('#currency_form').submit();
            });*/

            $('#btnSubmitCurrency').click(function (evt) {
                evt.preventDefault();

                var currency = $("#account_currency").val();
                var url = $('#currency_form').attr('action');

                $('#currency_form').attr('action', url + '/' + currency);
                $('#currency_form').submit();
            });

            // $('#currency_lang_form').submit(function (evt) {
            //     evt.preventDefault();
            //
            //     var url = $(this).attr('action');
            //     var data = $(this).serialize();
            //
            //     $('#btnSubmitCURRENCYLANG').html('<i class="fas fa-circle-notch fa-spin"></i>');
            //     $('#btnSubmitCURRENCYLANG').attr('disabled', true);
            //     $('#error_warning_currency_lang').fadeOut();
            //
            //     $.ajax({
            //         url: url,
            //         method: "post", //First change type to method here
            //         data: data,
            //         //dataType: 'json',
            //         success: function (response) {
            //             console.log(response);
            //             if (response.status == true) {
            //                 $('#btnSubmitCURRENCYLANG').html(response.messages);
            //                 $('#btnSubmitCURRENCYLANG').css('background-color', '#21a700');
            //                 //then refrsh
            //             } else if (response.status == false) {
            //
            //                 var resp = '';
            //
            //                 if (typeof(response.messages) == 'object') {
            //                     for (var key in response.messages) {
            //                         var value = response.messages[key];
            //                         resp += '<li>' + value + '</li>';
            //
            //                     }
            //                 } else {
            //                     $(response.messages).each(function (x, y) {
            //                         resp += '<li>' + y + '</li>';
            //                     });
            //                 }
            //
            //                 $('#error_warning_currency_lang').html(resp);
            //                 // $('#messages').css('display', 'block');
            //                 $('#error_warning_currency_lang').fadeIn();
            //                 $('#btnSubmitCURRENCYLANG').html('UPDATE EMAIL ADDRESS');
            //                 $('#btnSubmitCURRENCYLANG').attr('disabled', false);
            //             }
            //
            //             $('#error_warning_currency_lang').html(resp);
            //             // $('#messages').css('display', 'block');
            //             $('#error_warning_currency_lang').fadeIn();
            //             $('#btnSubmitCURRENCYLANG').html('UPDATE');
            //             $('#btnSubmitCURRENCYLANG').attr('disabled', false);
            //         },
            //         error: function (xhr, ajaxOptions, thrownError) {
            //             alert(xhr.status);
            //             alert(thrownError);
            //         }
            //     });
            // });
        });
    </script>
@endsection