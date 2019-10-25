@extends('pages.tmpl.master')

@section('content')
    <section class="profileSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="profileImg" style="">
                        <div class="jumbotron">
                            @if($picture !== null)
                                <img id="profile-picture" class="img-responsive" src="{{url($picture['base_path'])}}" alt="{{$picture['name']}}">
                            @else
                                <p>Set your profile picture.</p>
                                <form action="{{url('file-upload/profile')}}"
                                      class="dropzone"
                                      id="image-dropzone">{{csrf_field()}}</form>

                            @endif
                            <div id="upload-new-foto" style="display:none;">
                                <p>Set your profile picture.</p>
                                <form action="{{url('file-upload/profile')}}"
                                      class="dropzone"
                                      id="image-dropzone">{{csrf_field()}}</form>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 10px;" id="profile_picture_view">
                        <a id="profile_picture_view" onclick="change_profile_picture_view()" href="javascript:void(0)"><i class="fas fa-wrench"></i> Change your profile picture</a>

                    </div>
                    <div id="profile_picture_form">
                        <div class="contactForm">

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="profileContent">
                        <div class="profileTitle">
                            <div class="row" id="profile_simple_info_view">
                                <div class="col-xs-1" id="profile_simple_info_save" style="text-align:center;">
                                    <a href="javascript:void(0)" onclick="change_simple_info_view()"><i
                                                class="fas fa-wrench" style="padding-left:25px;padding-top:10px;"></i></a>
                                </div>
                                <div class="col-xs-11" style="border-left: 1px solid lightgrey; height: 100%"
                                     id="profile_simple_info">
                                    <h2 id="profile_simple_info_name">
                                        @if($user_info->first_name == '')
                                            Not Defined
                                        @else
                                            {{$user_info->first_name}} {{$user_info->last_name}}
                                        @endif

                                    </h2>
                                </div>

                            </div>

                            <div class="row" id="profile_simple_info_form" style="display:none;">
                                <div class="col-xs-2" id="profile_simple_info_save" style="text-align:center;">
                                    <button type="button" onclick="update_simple_info(this);" id="submitBTN"
                                            class="btn buttonCustomPrimary" style="width:100%">Update
                                    </button>
                                    <br><a href="javascript:void(0)" onclick="cancel_edit_simple_info();"><i
                                                class="fas fa-times"></i> Cancel</a>
                                </div>
                                <div class="col-xs-10" style="border-left: 1px solid lightgrey; height: 100%"
                                     id="profile_simple_info">
                                    <div class="contactForm">
                                        <form action="{{url('edit-profile/update_simple_info')}}" id="form_simple_info"
                                              method="post" role="form" class="form">
                                            <div class="row">
                                                <div class="form-group col-xs-6">
                                                    <input class="form-control" name="first_name_input"
                                                           id="first_name_input" placeholder="First Name" type="text"
                                                           value="' + current_f_name + '">
                                                </div>
                                                <div class="form-group col-xs-6">
                                                    <input class="form-control" name="last_name_input"
                                                           id="last_name_input" placeholder="Last Name" type="text"
                                                           value="' + current_l_name + '">
                                                </div>
                                            </div>
                                            {{csrf_field()}}
                                        </form>
                                    </div>
                                    <div>
                                    </div>
                                </div>

                            </div>

                            <div class="profileDescription">
                                <div class="row" id="profile_description_view">
                                    <div class="col-xs-1" id="profile_description_save" style="text-align:center;">
                                        <a href="javascript:void(0)" onclick="change_profile_description_view();"><i
                                                    class="fas fa-wrench"
                                                    style="padding-left:25px;padding-top:10px"></i></a>
                                    </div>
                                    <div class="col-xs-11" style="border-left: 1px solid lightgrey; height: 100%"
                                         id="profile_description">
                                        <p id="profile_description_description">
                                            @if($user_info->description == '')
                                                Not Defined
                                            @else
                                                {{$user_info->description}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="row" id="profile_description_form" style="display:none;">
                                    <div class="col-xs-2" id="profile_description_save" style="text-align:center;">
                                        <button type="button" id="submitBTN" onclick="update_description(this);"
                                                class="btn buttonCustomPrimary" style="width:100%; margin-top:60px;">
                                            Update
                                        </button>
                                        <br><a href="javascript:void(0);" onclick="cancel_edit_description()"><i
                                                    class="fas fa-times"></i> Cancel</a>
                                    </div>
                                    <div class="col-xs-10" style="border-left: 1px solid lightgrey; height: 100%"
                                         id="profile_description">
                                        <div class="contactForm">
                                            <form action="{{url('edit-profile/update_description')}}"
                                                  id="form_description"
                                                  method="post" role="form" class="form">
                                                <div class="row">
                                                    <div class="form-group col-xs-12">
                                                <textarea class="form-control" id="description_input"
                                                          name="description_input" placeholder="Describe yourself">' + current_d + '</textarea>
                                                        {{csrf_field()}}
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="profileInfo" style="margin-top: 10px;">
                                <div class="row" id="profile_info_view">
                                    <div class="col-xs-1" style=" height: 100%; text-align:center;"
                                         id="profile_info_save">
                                        <a href="javascript:void(0)" onclick="change_info_view()"><i
                                                    class="fas fa-wrench"
                                                    style="padding-left:25px;padding-top:115px;"></i></a>
                                    </div>
                                    <div class="col-xs-11" style="border-left: 1px solid lightgrey;" id="profile_info">
                                        <p>
                                            <strong>Phone: </strong>
                                            @if($user_info->contact == '')
                                                Not Defined
                                            @else
                                                {{$user_info->contact}}
                                            @endif
                                        </p>
                                        <p>
                                            <strong>Email: </strong>
                                            @if($user_info->email == '')
                                                Not Defined
                                            @else
                                                {{$user_info->email}}
                                            @endif
                                        </p>
                                        <p>
                                            <strong>Country: </strong>
                                            @if($user_info->country == '')
                                                Not Defined
                                            @else
                                                {{$countries[$user_info->country]}}
                                            @endif
                                        </p>
                                        <p>
                                            <strong>City: </strong>
                                            @if($user_info->city == '')
                                                Not Defined
                                            @else
                                                {{$user_info->city}}
                                            @endif
                                        </p>
                                        <p>
                                            <strong>Languages: </strong>
				    <?php $user_langs = json_decode($user_info->languages, true); ?>
                                            @foreach($user_langs as $key => $lan)
                                                {{$languages[$lan]['name']}}{{$loop->last ? '' : ', '}}
                                            @endforeach
                                        </p>
                                        <p>
                                            <strong>Gender: </strong>
                                            @if($user_info->gender == '')
                                                Not Defined
                                            @else
                                                {{$genders[$user_info->gender]}}
                                            @endif
                                        </p>
                                        <p>
                                            <strong>Date of Birth: </strong>
                                            @if($user_info->gender == '')
                                                Not Defined
                                            @else
                                                {{$user_info->dob}}
                                            @endif
                                        </p>
                                    </div>

                                </div>
                                <div class="row" id="profile_info_form" style="display:none;">
                                    <div class="col-xs-2" style=" height: 100%; text-align:center;"
                                         id="profile_info_save">
                                        <button type="button" id="submitBTN" onclick="update_info(this);"
                                                class="btn buttonCustomPrimary" style="width:100%;margin-top:140px">
                                            Update
                                        </button>
                                        <br>
                                        <a href="javascript:void(0);" onclick="cancel_edit_info()"><i
                                                    class="fas fa-times"></i> Cancel</a>
                                    </div>
                                    <div class="col-xs-10" style="border-left: 1px solid lightgrey;" id="profile_info">
                                        <div class="contactForm">
                                            <form action="{{url('edit-profile/update_info')}}" id="form_info"
                                                  method="post" role="form" class="form">
                                                <div class="row">

                                                    <div class="form-group col-xs-12">
                                                        <p>Leave blank what you don't want to share.</p>
                                                    </div>

                                                    <div class="form-group col-xs-12">
                                                        <input class="form-control" name="contact_input"
                                                               id="contact_input" placeholder="Contact" type="text"
                                                               value="">
                                                    </div>

                                                    <div class="form-group col-xs-12">
                                                        <input data-validation="email" class="form-control"
                                                               name="email_input" id="email_input" placeholder="Email"
                                                               type="text" value="">
                                                    </div>

                                                    <div class="form-group col-xs-12">
                                                        <select id="country_input" name="country_input" data-live-search="true" class="selectpicker demo-default"
                                                                placeholder="Select a country...">
                                                            <option value="">Select a country...</option>
                                                            @foreach($countries as $country => $value)
                                                                @if($country == $user_info->country)
                                                                    <option value="{{$country}}"
                                                                            selected="true">{{$value}}</option>
                                                                @else
                                                                    <option value="{{$country}}">{{$value}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-xs-12">
                                                        <input class="form-control" name="city_input" id="city_input"
                                                               placeholder="City" type="text"
                                                               value="">
                                                    </div>

                                                    <div class="form-group col-xs-12">
                                                        <select id="gender_input" name="gender_input" class="selectpicker demo-default"
                                                                placeholder="Select a gender...">
                                                            <option value="">Select a gender...</option>
                                                            @foreach($genders as $gender => $value)
                                                                @if($gender == $user_info->gender)
                                                                    <option value="{{$gender}}"
                                                                            selected="true">{{$value}}</option>
                                                                @else
                                                                    <option value="{{$gender}}">{{$value}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-xs-12">
                                                        <select id="languages_input" name="languages_input[]" data-live-search="true" multiple class="selectpicker demo-default"
                                                                placeholder="Select the languages you speak...">
                                                            <option value="">Select the languages you speak...</option>
                                                            @foreach($languages as $language => $value)
						        <?php $user_langs = json_decode($user_info->languages, true); ?>
                                                                @if(in_array($language, $user_langs))
                                                                    <option selected value="{{$language}}">{{$value['name']}} ({{$value['nativeName']}})</option>
                                                                @else
                                                                    <option value="{{$language}}">{{$value['name']}} ({{$value['nativeName']}})</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-xs-12">
                                                        <input class="form-control" name="age_input" id="age_input"
                                                               placeholder="Age" type="text" value="">
                                                    </div>
                                                    {{csrf_field()}}
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 10px;">
                                <div class="col-xs-1" style=" height: 100%; text-align:center;"
                                     id="profile_social_networks_save">
                                    <a href="javascript:void(0)" onclick="change_social_networks_view();"><i
                                                class="fas fa-wrench"
                                                style="padding-left:25px;padding-top:10px"></i></a>
                                </div>
                                <div class="col-xs-11" style="border-left: 1px solid lightgrey;"
                                     id="profile_social_networks">
                                    <div class="profileSocialIcon">
                                        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-rss" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" id="profile_input_first_name_current" value="{{$user_info->first_name}}">
        <input type="hidden" id="profile_input_last_name_current" value="{{$user_info->last_name}}">

        <input type="hidden" id="description_current" value="{{$user_info->description}}">

        <input type="hidden" id="profile_input_contact_current"
               value="{{$user_info->contact}}">
        <input type="hidden" id="profile_input_email_current" value="{{$user_info->email}}">
        <input type="hidden" id="profile_input_country_current"
               value="{{$user_info->country}}">
        <input type="hidden" id="profile_input_city_current" value="{{$user_info->city}}">
        <input type="hidden" id="profile_input_gender_current"
               value="{{$user_info->gender}}">
        <input type="hidden" id="profile_input_dob_current" value="{{$user_info->dob}}">
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $(function(){
            Dropzone.autoDiscover = false;

            var token = "{{ csrf_token() }}";

            Dropzone.options.dropzoneFileUpload = {
                url: "{{url('file-upload/profile')}}",
                paramName: "file",
                params: {
                    _token: token
                },
                init: function() {
                    this.on("addedfile", function(file) {
                        alert("Added file.");
                    }),
                        this.on("success", function(file, response) {
                            console.log(response);
                        })
                }
            }

            $('#profile-picture').dropzone();
        });

        function change_simple_info_view() {

            if ($('#first_name_current')) {
                $('#first_name_input').val($('#profile_input_first_name_current').val());
                $('#last_name_input').val($('#profile_input_last_name_current').val());
            }

            $('#profile_simple_info_view').fadeOut(function () {
                $('#profile_simple_info_form').fadeIn();
            });

            /*var form = '<div class="contactForm">' +
                '<form action="{{url('edit-profile/update_simple_info')}}" id="form_simple_info" method="post" role="form" class="form">' +
                '<div class="row">' +
                '<div class="form-group col-xs-6">' +
                '<input class="form-control" name="first_name_input" id="first_name_input" placeholder="First Name" type="text" value="' + current_f_name + '">' +
                '</div>' +
                '<div class="form-group col-xs-6">' +
                '<input class="form-control" name="last_name_input" id="last_name_input" placeholder="Last Name" type="text" value="' + current_l_name + '">' +
                '</div>' +
                '</div>' +
                '{{csrf_field()}}' +
                '</form>' +
                '</div>';
            var submitBTN = '<button type="button" onclick="update_simple_info(this);" id="submitBTN" class="btn buttonCustomPrimary" style="width:100%">Update </button>' +
                '<br><a href="javascript:void(0)" onclick="cancel_edit_simple_info();"><i class="fas fa-times"></i> Cancel</a>';*/

            //$('#profile_simple_info').html(form);
            // $('#profile_simple_info').removeClass('col-xs-11');
            //  $('#profile_simple_info').addClass('col-xs-10');
            //  $('#profile_simple_info_save').html(submitBTN);
            //  $('#profile_simple_info_save').removeClass('col-xs-1');
            //  $('#profile_simple_info_save').addClass('col-xs-2');
        }

        function change_profile_description_view() {
            var current_d = '';

            if ($('#description_current')) {
                $('#description_input').val($('#description_current').val());
            }

            $('#profile_description_view').fadeOut(function () {
                $('#profile_description_form').fadeIn();
            });

            {{--var form = '<div class="contactForm">' +--}}
            {{--'<form action="{{url('edit-profile/update_description')}}" id="form_description" method="post" role="form" class="form">' +--}}
            {{--'<div class="row">' +--}}
            {{--'<div class="form-group col-xs-12">' +--}}
            {{--'<textarea class="form-control" id="description_input" name="description_input" placeholder="Describe yourself">' + current_d + '</textarea>' +--}}
            {{--'{{csrf_field()}}' +--}}
            {{--'</div>' +--}}
            {{--'</div>' +--}}
            {{--'</form>' +--}}
            {{--'</div>';--}}
            {{--var submitBTN = '<button type="button" id="submitBTN" onclick="update_description(this);" class="btn buttonCustomPrimary" style="width:100%; margin-top:60px;">Update </button>' +--}}
            {{--'<br><a href="javascript:void(0);" onclick="cancel_edit_description()"><i class="fas fa-times"></i> Cancel</a>';--}}

            {{--$('#profile_description').html(form);--}}
            {{--$('#profile_description').removeClass('col-xs-11');--}}
            {{--$('#profile_description').addClass('col-xs-10');--}}
            {{--$('#profile_description_save').html(submitBTN);--}}
            {{--$('#profile_description_save').removeClass('col-xs-1');--}}
            {{--$('#profile_description_save').addClass('col-xs-2');--}}
        }

        function change_info_view() {

            var input_contact = '';
            var input_email = '';
            var input_country = '';
            var input_city = '';
            var input_gender = '';
            var input_dob = '';

            if ($("#profile_input_contact_current").val()) {
                $('#contact_input').val($("#profile_input_contact_current").val());
            }

            if ($("#profile_input_email_current").val()) {
                $('#email_input').val($("#profile_input_email_current").val());

            }

            if ($("#profile_input_country_current").val()) {
                $('#').val($("#profile_input_country_current").val());
            }

            if ($("#profile_input_city_current").val()) {
                $('#city_input').val($("#profile_input_city_current").val());
            }

            if ($("#profile_input_gender_current").val()) {
                $('#gender_input').val($("#profile_input_gender_current").val());
            }

            if ($("#profile_input_dob_current").val()) {
                $('#age_input').val($("#profile_input_dob_current").val());
            }

            $('#profile_info_view').fadeOut(function () {
                $('#profile_info_form').fadeIn();
            });

            // $('#country_input').selectize();
            // $('#gender_input').selectize();
            // $('#gender_input').fastsearch();

            $('#profile_info_form').fadeOut(function () {
                $('#profile_description_view').fadeIn();
            });

            var cleave = new Cleave('#age_input', {
                date: true,
                delimiter: '-',
                datePattern: ['Y', 'm', 'd']
            });

            var cleave = new Cleave('#contact_input', {
                phone: true,
                phoneRegionCode: 'us'
            });
        }

        function change_social_networks_view() {
            var form = '<div class="contactForm">' +
                '<form action="{{url('edit-profile/update_social_networks')}}" id="form_social_networks" method="post" role="form" class="form">' +
                '<div class="row">' +

                '<div class="form-group col-xs-12">' +
                '<input class="form-control" name="facebook_input" id="facebook_input" placeholder="Facebook Profile" type="text" >' +
                '</div>' +

                '<div class="form-group col-xs-12">' +
                '<input class="form-control" name="instagram_input" id="instagram_input" placeholder="Instagram Profile" type="text" >' +
                '</div>' +

                '<div class="form-group col-xs-12">' +
                '<input class="form-control" name="twitter_input" id="twitter_input" placeholder="Twitter Profile" type="text" >' +
                '</div>' +

                '{{csrf_field()}}' +
                '</div>' +
                '</form>' +
                '</div>';
            var submitBTN = '<button type="button" id="submitBTN" onclick="update_social_networks();" class="btn buttonCustomPrimary" style="width:100%;margin-top:60px">Update </button>' +
                '<br><a href="javascript:void(0);"><i class="fas fa-times"></i> Cancel</a>';

            $('#profile_social_networks').html(form);
            $('#profile_social_networks').removeClass('col-xs-11');
            $('#profile_social_networks').addClass('col-xs-10');
            $('#profile_social_networks_save').html(submitBTN);
            $('#profile_social_networks_save').removeClass('col-xs-1');
            $('#profile_social_networks_save').addClass('col-xs-2');
        }

        $('#profile_picture_view').toggle(
            function(){
                $('#profile-picture').fadeOut(300,function(){
                    $('#upload-new-foto').fadeIn(300);
                });
            },
            function(){
                $('#upload-new-foto').fadeOut(300,function(){
                    $('#profile-picture').fadeIn(300);
                });
            }
        );

        function change_profile_picture_view() {


        }

        ///////////////////////////////////////////

        function update_simple_info(e) {
            $(e).html('<i class="fas fa-circle-notch fa-spin"></i>');
            $(e).attr('disabled', true);

            var url = $('#form_simple_info').attr('action');
            var data = $('#form_simple_info').serialize();

            $.post(url, data, function (returned) {
                if (returned.status == true) {
                    var msgs = format_json_messages(returned.messages);
                    format_noty_alerts(msgs, 'success');

                    $('#profile_input_first_name_current').val(returned.first_name);
                    $('#profile_input_last_name_current').val(returned.last_name);

                    $('#profile_simple_info_name').html(returned.first_name + ' ' + returned.last_name);

                    $('#profile_simple_info_form').fadeOut(function () {
                        $('#profile_simple_info_view').fadeIn();
                    });

                } else if (returned.status == false) {
                    var msgs = format_json_messages(returned.messages);
                    format_noty_alerts(msgs, 'warning');
                }

                $(e).html('Update');
                $(e).attr('disabled', false);
            });
        }

        function update_description(e) {
            $(e).html('<i class="fas fa-circle-notch fa-spin"></i>');
            $(e).attr('disabled', true);

            var url = $('#form_description').attr('action');
            var data = $('#form_description').serialize();

            $.post(url, data, function (returned) {
                if (returned.status == true) {
                    var msgs = format_json_messages(returned.messages);
                    format_noty_alerts(msgs, 'success');

                    $('#profile_description_form').fadeOut(function () {
                        $('#description_current').val(returned.description);
                        $('#profile_description_description').html(returned.description);
                        $('#profile_description_view').fadeIn();
                    });

                } else if (returned.status == false) {
                    var msgs = format_json_messages(returned.messages);
                    format_noty_alerts(msgs, 'warning');
                }

                $(e).html('Update');
                $(e).attr('disabled', false);
            });
        }

        function update_info(e) {
            $(e).html('<i class="fas fa-circle-notch fa-spin"></i>');
            $(e).attr('disabled', true);

            var url = $('#form_info').attr('action');
            var data = $('#form_info').serialize();

            $.post(url, data, function (returned) {
                if (returned.status == true) {
                    var msgs = format_json_messages(returned.messages);
                    format_noty_alerts(msgs, 'success');

                    $("profile_input_contact_current").val(returned.contact);
                    $("profile_input_email_current").val(returned.email);
                    $("profile_input_country_current").val(returned.country);
                    $("profile_input_city_current").val(returned.city);
                    $("profile_input_gender_current").val(returned.gender);
                    $("profile_input_dob_current").val(returned.dob);

                    $('#profile_info').html(
                        '<p>' +
                        '                                        <strong>Phone: </strong>' +
                        returned.contact +
                        '                                    </p>' +
                        '                                    <p>' +
                        '                                        <strong>Email: </strong>' +
                        returned.email +
                        '                                    </p>' +
                        '                                    <p>' +
                        '                                        <strong>Country: </strong>' +
                        returned.country +
                        '                                    </p>' +
                        '                                    <p>' +
                        '                                        <strong>City: </strong>' +
                        returned.city +
                        '                                    </p>' +
                        '                                    <p>' +
                        '                                        <strong>Gender: </strong>' +
                        returned.gender +
                        '                                    </p>' +
                        '                                    <p>' +
                        '                                        <strong>Age: </strong>' +
                        returned.dob +
                        '                                    </p>'
                    );

                    $('#profile_info').removeClass('col-xs-10');
                    $('#profile_info').addClass('col-xs-11');
                    $('#profile_info_save').html('<a href="javascript:void(0)" onclick="change_info_view()"><i class="fas fa-wrench" style="padding-left:25px;padding-top:10px"></i></a>');
                    $('#profile_info_save').removeClass('col-xs-2');
                    $('#profile_info_save').addClass('col-xs-1');

                } else if (returned.status == false) {
                    var msgs = format_json_messages(returned.messages);
                    format_noty_alerts(msgs, 'warning');
                }

                $(e).html('Update');
                $(e).attr('disabled', false);
            });
        }

        function update_social_networks(e) {
            var url = $('#form_social_networks').attr('action');
            var data = $('#form_social_networks').serialize();

            $.post(url, data, function (returned) {
                console.log(returned);
            });
        }

        function update_profile_picture(e) {

        }

        ///////////////////////////////////////////

        function cancel_edit_simple_info() {
            $('#profile_simple_info_form').fadeOut(function () {
                $('#profile_simple_info_view').fadeIn();
            });

            /*$('#profile_simple_info').html('<h2>' + $('#first_name_current').val() + ' ' + $('#last_name_current').val() + '</h2>'
                +
                '<span>CEO, D9 Studio</span>');

            $('#profile_simple_info').removeClass('col-xs-10');
            $('#profile_simple_info').addClass('col-xs-11');

            $('#profile_simple_info_save').html('<a href="javascript:void(0)" onclick="change_simple_info_view()"><i class="fas fa-wrench" style="padding:25px"></i></a>');

            $('#profile_simple_info_save').removeClass('col-xs-2');
            $('#profile_simple_info_save').addClass('col-xs-1');*/
        }

        function cancel_edit_description() {
            $('#profile_description_form').fadeOut(function () {
                $('#profile_description_view').fadeIn();
            });
            /*$('#profile_description').html($('#description_current').val());
            $('#profile_description').removeClass('col-xs-10');
            $('#profile_description').addClass('col-xs-11');
            $('#profile_description_save').html('<a href="javascript:void(0)" onclick="change_profile_description_view()"><i class="fas fa-wrench" style="padding-left:25px;padding-top:10px"></i></a>');
            $('#profile_description_save').removeClass('col-xs-2');
            $('#profile_description_save').addClass('col-xs-1');*/
        }

        function cancel_edit_info() {
            $('#profile_info_form').fadeOut(function () {
                $('#profile_info_view').fadeIn();
            });
            /*$('#profile_info').html(
                '<p>' +
                '                                        <strong>Phone: </strong>' +
                $("#profile_input_contact_current").val() +
                '                                    </p>' +
                '                                    <p>' +
                '                                        <strong>Email: </strong>' +
                $("#profile_input_email_current").val() +
                '                                    </p>' +
                '                                    <p>' +
                '                                        <strong>Country: </strong>' +
                $("#profile_input_country_current").val() +
                '                                    </p>' +
                '                                    <p>' +
                '                                        <strong>City: </strong>' +
                $("#profile_input_city_current").val() +
                '                                    </p>' +
                '                                    <p>' +
                '                                        <strong>Gender: </strong>' +
                $("#profile_input_gender_current").val() +
                '                                    </p>' +
                '                                    <p>' +
                '                                        <strong>Age: </strong>' +
                $("#profile_input_age_current").val() +
                '                                    </p>'
            );

            /!*$("profile_input_contact_current").val(returned.contact);
            $("profile_input_email_current").val(returned.email);
            $("profile_input_country_current").val(returned.country);
            $("profile_input_city_current").val(returned.city);
            $("profile_input_gender_current").val(returned.gender);
            $("profile_input_dob_current").val(returned.dob);*!/

            $('#profile_info').removeClass('col-xs-10');
            $('#profile_info').addClass('col-xs-11');
            $('#profile_info_save').html('<a href="javascript:void(0)" onclick="change_info_view()"><i class="fas fa-wrench" style="padding-left:25px;padding-top:10px"></i></a>');
            $('#profile_info_save').removeClass('col-xs-2');
            $('#profile_info_save').addClass('col-xs-1');*/
        }

        function cancel_social_networks() {

        }

        function cancel_edit_profile_picture() {

        }
    </script>
@endsection