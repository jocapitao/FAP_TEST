@extends('pages.tmpl.master')
@section('content')
    <div class="mainContentSection packagesSection">
        <div class="container" >
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
                                        <a href="{{url('host-management/add-house')}}"><i class="fas fa-plus"></i> {{__('host.menu_add_house')}}</a>
                                    </div>
                                    <div class="col-xs-12">
                                        <a href="{{url('host-management/my-houses')}}"><i class="fas fa-home"></i> {{__('host.menu_edit_house')}}</a>
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
                                        <a href="{{url('host-management/bookings')}}"><i class="fas fa-eye"></i> {{__('host.menu_new_booking_requests')}}</a>
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
                                        <a href=""><i class="far fa-user-circle"></i> {{__('host.menu_hosting_profile_edit')}}</a>
                                    </div>
                                    <div class="col-xs-12">
                                        <a href=""><i class="fas fa-wrench"></i> {{__('host.menu_hosting_account_edit')}}</a>
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
        function templateBooking (res) {
            console.log(res);
            let template = _.template($('#templateContent').html());
            $('#content').html(template({data:res}));
        }
        $(function(){
            ajaxRequest(APP_URL_FULL+'/get', {}, 'get',templateBooking);
        });
    </script>
@stop
@section('templates')
    <script type="text/template" id="templateContent">
        <div class="row">
            <div class="col-md-12">
                <h3><%= data.house_info.name %> - <%= data.checkout_info.checkout_id %></h3>
            </div>
        </div>
        <div class="top-spacer"></div>
        <div class="row">
            <div class="col-md-3">
                <h4>Total: </h4>
                <h3><span class="label label-default"><%= priceConverter(parseFloat(data.compiled_info.total_price), data.currency.currency_3) %></span></h3>
            </div>
            <div class="col-md-3">
                <h4>Status: </h4>
                <h3><span class="label label-warning">Not Paid</span></h3>
            </div>
        </div>
        <div class="top-spacer"></div>
        <div class="row">
            <div class="col-md-3"><b>Requested in</b>: <br> <%= moment(data.checkout_info.created_at).format("MMM Do YYYY ") %></div>
            <div class="col-md-3"><b>Checkin</b>: <br> <%= moment(data.checkout_info.check_in).format("MMM Do YYYY ") %></div>
            <div class="col-md-3"><b>Checkout</b>: <br> <%= moment(data.checkout_info.check_out).format("MMM Do YYYY ") %></div>
            <div class="col-md-3"><b>Guests</b>: <br> <%= data.checkout_info.guest_nr %> (<%= numberToWords.toWords(data.checkout_info.guest_nr) %>)</div>
        </div>
        <div class="top-spacer"></div>
        <div class="row">
            <div class="col-md-3"><b>Visits</b>: <br> Guest will not use.</div>
            <div class="col-md-3"><b>Night Activities</b>: <br> Guest will not use.</div>
            <div class="col-md-3"><b>Airport Pickup</b>: <br> Guest wants the pickup from the airport.</div>
            <div class="col-md-3"><b>Meals</b>: <br> Guest will want to use meals service.</div>
        </div>
        <div class="top-spacer"></div>
        <div class="row">
            <div class="col-md-12"><h4>User Information</h4></div>
        </div>
        <div class="row">
            <% if(data.user_address !== null){ %>
                <div class="col-md-3"><b>Name</b>: <%= data.user_address.first_name %> <%= data.user_address.last_name %></div>
                <div class="col-md-3"><b>Location</b>: Porto, Portugal</div>
            <% } else { %>
                <div class="col-md-12">
                <h5>User did not finish the checkout.</h5>
                </div>
            <% } %>
        </div>
    </script>
@stop