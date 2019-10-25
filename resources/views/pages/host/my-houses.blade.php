@extends('pages.tmpl.master')

@section('content')
    <div class="mainContentSection packagesSection">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <aside>
                        <div class="panel panel-default packagesFilter">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{__('host.host_menu_houses')}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="{{url('host-management/add-house')}}"><i
                                                    class="fas fa-plus"></i> {{__('host.menu_add_house')}}</a>
                                    </div>
                                    <div class="col-xs-12">
                                        <a href="{{url('host-management/my-houses')}}"><i
                                                    class="fas fa-home"></i> {{__('host.menu_edit_house')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default packagesFilter">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{__('host.menu_bookings')}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="{{url('host-management/bookings')}}"><i
                                                    class="fas fa-eye"></i> {{__('host.menu_new_booking_requests')}}</a>
                                    </div>
                                    <div class="col-xs-12">
                                        <a href=""><i class="fas fa-list"></i> {{__('host.menu_booked_requests')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default packagesFilter">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{__('host.menu_host_account')}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href=""><i
                                                    class="far fa-user-circle"></i> {{__('host.menu_hosting_profile_edit')}}
                                        </a>
                                    </div>
                                    <div class="col-xs-12">
                                        <a href=""><i
                                                    class="fas fa-wrench"></i> {{__('host.menu_hosting_account_edit')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default packagesFilter">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{__('host.menu_stats')}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href=""><i class="fas fa-chart-bar"></i> {{__('host.menu_stats_graphs')}}</a>
                                    </div>
                                    {{--<div class="col-xs-12">
                                        <a href=""><i class="fas fa-wrench"></i> {{__('host.menu_hosting_account_edit')}}</a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-md-9" id="content">

                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        function handleHouseRequest(res){
            if(res.status === false){
                let template = _.template($('#error-page').html());
                $('#content').html(template({message: iterateMessages(res.content.message)}));
                return;
            }
            let template = _.template($('#house_list').html());
            console.log(res);
            $('#content').html(template({houses:res.content.houses, ratings: res.content.ratings}));
        }
        function requestHouses () {
            ajaxRequest(APP_URL_FULL+'/houses/get', {}, 'get', handleHouseRequest)
        }
        $(function () {
            requestHouses();
        });
    </script>
@stop
@section('templates')
    <script id="house_list" type="text/template">
        <% _.each(houses,function(house){ %>
        <div class="col-xs-12">
            <div class="media packagesList hotelsList">
                <div class="media-body">
                    <div class="bodyLeft">
                        <h4 class="media-heading"><a href="<%= APP_URL_FULL+'/edit/'+house.id %>"><%= house.name %></a></h4>
                        <% if(house.ratings === null){ %>
                        <div class="countryRating">
                            <ul class="list-inline rating">
                                <li><i class="fa fa-star not-rated" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star not-rated" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star not-rated" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star not-rated" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star not-rated" aria-hidden="true"></i></li>
                            </ul>
                            <span>(No reviews)</span>
                        </div>
                        <% } else { %>
                        <div class="countryRating">
                            <ul class="list-inline rating">
                                <% for (i = 1; i <= house.ratings.stars; i++) { %>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <% } %>

                                <% for (i = 1; i <= (5 - house.ratings.stars); i++) { %>
                                    <li><i class="fa fa-star not-rated" aria-hidden="true"></i></li>
                                <% } %>
                            </ul>
                            <span>(<%= house.ratings.stars %> Reviews)</span>
                        </div>
                        <% } %>
                        <p><i class="far fa-user"></i> - <%= house.guest_nr %></p>
                    </div>
                    <div class="bodyRight">
                        <div class="bookingDetails">
                            <h2><%= priceConverter(parseFloat(house.costs.price.price_clean), APP_CURRENCY.user_currency.currency.name_3) %></h2>
                            <p>Without Taxes</p>
                            <a href="<%= APP_URL_FULL+'/edit/'+house.id %>" class="btn buttonTransparent clearfix">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <% }); %>
    </script>
    <script type="text/template" id="error-page">
        <div class="text-center">
            <h3>Oops!</h3>
            <%= message %>
        </div>
    </script>
@stop