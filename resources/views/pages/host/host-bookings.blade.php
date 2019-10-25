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
                                    {{--<div class="col-xs-12">
                                        <a href=""><i class="fas fa-wrench"></i> {{__('host.menu_hosting_account_edit')}}</a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-md-9">
                    <table id="example" class="table table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>House</th>
                            <th>Amount</th>
                            <th>Guests</th>
                            <th>Booked</th>
                            <th>Status</th>
                            <th>Checkout Identification</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="bookings-table">


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>House</th>
                            <th>Amount</th>
                            <th>Guests</th>
                            <th>Booked</th>
                            <th>Status</th>
                            <th>Checkout Identification</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        function templateBookings (res) {
            let template_bookings = _.template($('#bookings-table-content').html());
            $('#bookings-table').html(template_bookings({bookings:res}));
            $('#example').DataTable();
        }

        $(document).ready(function () {
            $.getJSON(
                // NB: using Open Exchange Rates here, but you can use any source!
                'http://data.fixer.io/api/latest?access_key=11e78070f34b418b344fa4e8b2cc0115&base='+APP_CURRENCY.user_currency.currency.name_3 ,
                function (data) {
                    // Check money.js has finished loading:
                    if ( typeof fx !== "undefined" && fx.rates ) {
                        fx.rates = data.rates;
                        fx.base = data.base;
                    } else {
                        // If not, apply to fxSetup global:
                        var fxSetup = {
                            rates: data.rates ,
                            base:  data.base
                        }
                    }
                }
            );
            ajaxRequest(APP_URL_FULL+'/get',{},'get',templateBookings);
        });
    </script>
@stop
@section('templates')
    <script type="text/template" id="bookings-table-content">
        <% let numbers = 1; %>
        <% _.each(bookings,function(booking){ %>
        <tr>
            <td><%= booking.house %></td>
            <td><%= priceConverter(parseFloat(booking.total) , booking.currency.currency_3) %></td>
            <td><%= booking.guest_nr %></td>
            <td><%= booking.created_at %></td>
            <td><%= (booking.checkout_status === 1 ? 'Not Paid' : 'Paid') %></td>
            <td><%= booking.checkout_id %></td>
            <td><a href="<%= APP_URL %>/host-management/booking/<%= booking.checkout_id %>" class="btn btn-inverse"><i class="far fa-eye"></i></a></td>
        </tr>
        <% numbers++; %>
        <% }); %>
    </script>
@stop