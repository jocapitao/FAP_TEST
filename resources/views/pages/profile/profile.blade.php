@extends('pages.tmpl.master')

@section('content')
    <section class="profileSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="profileImg">
                        <img class="img-responsive" src="img/dashboard/profile-img-01.jpg" alt="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="profileContent">
                        <div class="profileTitle">
                            <div class="row" id="profile_simple_info_view">
                                <div class="col-xs-12" style="border-left: 1px solid lightgrey; height: 100%"
                                     id="profile_simple_info">
                                    <h2 id="profile_simple_info_name">
                                        @if($user_info->first_name == '' || !isset($user_info->first_name))
                                            Not Defined
                                        @else
                                            {{$user_info->first_name}} {{$user_info->last_name}}
                                        @endif
                                    </h2>
                                </div>

                            </div>
                            <div class="profileDescription">
                                <div class="row" id="profile_description_view">
                                    <div class="col-xs-12" style="border-left: 1px solid lightgrey; height: 100%"
                                         id="profile_description">
                                        <p id="profile_description_description">
                                            @if($user_info->description == '' || !isset($user_info->description))
                                                Not Defined
                                            @else
                                                {{$user_info->description}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="profileInfo" style="margin-top: 10px;">
                                <div class="row" id="profile_info_view">
                                    <div class="col-xs-12" style="border-left: 1px solid lightgrey;" id="profile_info">
                                        <p>
                                            <strong>Phone: </strong>
                                            @if($user_info->contact == ''  || !isset($user_info->contact))
                                                Not Defined
                                            @else
                                                {{$user_info->contact}}
                                            @endif
                                        </p>
                                        <p>
                                            <strong>Email: </strong>
                                            @if($user_info->email == ''  || !isset($user_info->email))
                                                Not Defined
                                            @else
                                                {{$user_info->email}}
                                            @endif
                                        </p>
                                        <p>
                                            <strong>Country: </strong>
                                            @if($user_info->country == ''  || !isset($user_info->country))
                                                Not Defined
                                            @else
                                                {{$countries[$user_info->country]}}
                                            @endif
                                        </p>
                                        <p>
                                            <strong>City: </strong>
                                            @if($user_info->city == ''  || !isset($user_info->city))
                                                Not Defined
                                            @else
                                                {{$user_info->city}}
                                            @endif
                                        </p>
                                        <p>
                                            <strong>Gender: </strong>
                                            @if($user_info->gender == ''  || !isset($user_info->gender))
                                                Not Defined
                                            @else
                                                {{$genders[$user_info->gender]}}
                                            @endif
                                        </p>
                                        <p>
                                            <strong>Age: </strong>
                                            @if($user_info->dob == ''  || !isset($user_info->dob))
                                                Not Defined
                                            @else
                                                {{$user_info->dob}}
                                            @endif
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <div class="row" style="margin-top: 10px;">
                                <div class="col-xs-12" style="border-left: 1px solid lightgrey;"
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

    </section>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection