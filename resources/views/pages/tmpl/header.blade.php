<header>
    <nav class="navbar navbar-default navbar-main darkHeader" role="navigation">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown singleDrop active">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li class="dropdown singleDrop  "><a href="index.html">Home Main</a></li>
                            <li class="dropdown singleDrop  "><a href="index-v2.html">Home City</a></li>
                            <li class="dropdown singleDrop active "><a href="index-v3.html">Home Destination</a></li>
                        </ul>
                    </li>
                    <li class="dropdown megaDropMenu ">
                        <a href="{{url('search/0/all/all/all/all/all/all/all/all/all')}}" class="dropdown-toggle"
                           aria-expanded="false">Houses</a>
                    </li>
                    @if($user_logged === FALSE)
                        {{--@if ()--}}
                        <li class="dropdown singleDrop">
                            <a href="" data-toggle="modal" data-target="#login">Login</a>
                        </li>
                        {{--@endif--}}
                    @endif


                    <li>
                        <div class="navbar-btn">
                            <a class="btn btn-nav" style="width:200px">RENT YOUR HOUSE</a>
                        </div>
                    </li>

                    <li class="dropdown singleDrop">
                        <a href="" href="" data-toggle="modal" data-target="#currencyModal">
                            @if(isset($user_currency))
                                @if(isset($user_currency['user_currency']['currency']))
                                    {{$user_currency['user_currency']['currency']['name_s']}}
                                @elseif (isset($user_currency['user_currency']['name_s']))
                                    {{$user_currency['user_currency']['name_s']}}
                                @endif
                            @else
                                @if( session('guest_currency') )
                                    {{session('guest_currency')['currency_symbol']}}
                                @endif

                            @endif

                        </a>
                    </li>


                </ul>

            </div>

        </div>
    </nav>
</header>
@if($user_logged === TRUE)
    {{--@if ($user_logged === true)--}}
    <section class="dashboardMenu">
        <nav class="navbar dashboradNav">
            <div class="container">
                <div class="dashboardNavRight">
                    <ul class="NavRight">
                        <li class="dropdown singleDrop">
                            <a href="#" class=" " data-toggle="" role="button" aria-haspopup="true"
                               aria-expanded="false"><i class="fa fa-bell" aria-hidden="true"></i> {{--<span
                                        class="notifyNumber">2</span>--}}</a>
                            <ul class="dropdown-menu dropdownMenu">
                                <li>
                                    <a href="#">
                                        <h4>information</h4>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown singleDrop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><img
                                                                               src="{{url('img\dashboard\dash-user.jpg')}}" alt=""><i
                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu dropdownMenu">
                                <li><a href="{{url('edit-profile')}}"><h5>{{trans('profile.edit_profile')}}</h5></a>
                                </li>
                                <li><a href="{{url('account-settings')}}"><h5>{{trans('profile.account_settings')}}</h5>
                                    </a></li>
                                <li><a href="{{url('logout')}}"><h5>{{trans('profile.user_logout')}}</h5></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav dashboardNavLeft">
                        <li><a href="{{url('my-reservations')}}"><i class="fas fa-home"
                                                                    aria-hidden="true"></i> {{trans('profile.my_reservations')}}</a>
                        </li>
                        <li><a href="dashboard.html"><i class="fas fa-history"
                                                        aria-hidden="true"></i> {{trans('profile.my_transactions')}}</a>
                        </li>
                        <li>
                            @if(\Auth::user()['is_host']== 1 )
                                <div class="navbar-btn" style="margin-top: 10px;">
                                    <a class="btn btn-nav" href="{{url('host-management')}}" style="width:200px">{{trans('profile.profile_is_host')}}</a>
                                </div>
                        </li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->

            </div><!-- /.container -->
        </nav>
    </section>
    {{--@endif--}}
@endif
