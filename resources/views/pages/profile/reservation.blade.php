@extends('pages.tmpl.master')

@section('content')
    <div class="mainContentSection packageSection">
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="content">

                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        function handleRequest(res) {
            if (res.status === false) {
                alert(false);
                return;
            }
            let template = _.template($('#content-template').html());
            $('#content').html(template({content: res}));
        }

        function makeRequest() {
            ajaxRequest(APP_URL_FULL, {_token: APP_TOKEN}, 'post', handleRequest);
        }

        $(function () {
            makeRequest();
        });
    </script>
@stop
@section('templates')
    <script type="text/template" id="content-template">
        <div class="row">
            <div class="col-md-12">
                <h3>Reservation - <%= content.checkout_id %></h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <h4>Total: </h4>
                <h3><span class="label label-default"><%= priceConverter(content.costs.price.price_w_tax_w_guests_w_fee, content.costs.currency[0].currency_3) %></span>
                </h3>
            </div>
            <div class="col-md-3">
                <h4>Status: </h4>
                <h3><span class="label label-<%= content.reservation_status.label%>"><%= content.reservation_status.message%></span>
                </h3>
            </div>
            <div class="col-md-3">
            <% if(content.reservation_status.status === 2){ %>
                <h4>Continue: </h4>
                <a href="<%= APP_URL_FULL %>/checkout/continue"><h3><span class="label label-success">Press to finish the reservation</span></a>
            <% } %>
            </div>
        </div>
        <div class="top-spacer"></div>
        <div class="row">
            <div class="col-md-3">
                <b>Requested in</b>: <br> <%= moment(content.days.created_at).format("MMM Do YYYY ") %>
            </div>
            <div class="col-md-3">
                <b>Checkin</b>: <br> <%= moment(content.days.check_in).format("MMM Do YYYY ") %>
            </div>
            <div class="col-md-3">
                <b>Checkout</b>: <br> <%= moment(content.days.check_out).format("MMM Do YYYY ") %>
            </div>
            <div class="col-md-3">
                <b>Guests</b>: <br> <%= content.guests.number %> (<%= numberToWords.toWords(content.guests.number) %>)
            </div>
        </div>
        <div class="top-spacer"></div>
        <div class="row">
            <div class="col-md-3"><b>Visits</b>: <br><%= (content.costs.activities.visits !== 0 ? ' Total Cost - '+priceConverter(content.costs.activities.visits_w_guests,content.costs.currency[0].currency_3)+'(<i class="fas fa-user"></i> / '+priceConverter(content.costs.activities.visits,content.costs.currency[0].currency_3)+')' : '') %> <br> Info</div>
            <div class="col-md-3"><b>Night Activities</b>: <br> <%= (content.costs.activities.night_fun !== 0 ? ' Total Cost - '+priceConverter(content.costs.activities.night_fun_w_guests,content.costs.currency[0].currency_3)+'(<i class="fas fa-user"></i> / '+priceConverter(content.costs.activities.night_fun,content.costs.currency[0].currency_3)+')' : '') %> <br> Info</div>
            <div class="col-md-3"><b>Airport Pickup</b>: <br> <%= (content.costs.activities.airport !== 0 ? ' Total Cost - '+priceConverter(content.costs.activities.airport_pickup_w_guests,content.costs.currency[0].currency_3)+'(<i class="fas fa-user"></i> / '+priceConverter(content.costs.activities.airport,content.costs.currency[0].currency_3)+')' : '') %> <br> Info
            </div>
            <div class="col-md-3"><b>Meals</b>: <br><%= (content.costs.activities.meals !== 0 ? ' Total Cost - '+priceConverter(content.costs.activities.meals_w_guests,content.costs.currency[0].currency_3)+'(<i class="fas fa-user"></i> / '+priceConverter(content.costs.activities.meals,content.costs.currency[0].currency_3)+')' : '') %> <br> Info</div>
        </div>
        <div class="top-spacer"></div>
        <div class="row">
            <div class="col-md-12">
                <h3>Guests Information</h3>
            </div>
            <div class="col-md-6">
                <div class="top-spacer"></div>
                <h4>Captain Information</h4>
                <p><b>Name:</b> <%= content.guests.info.captain.first_name%> <%= content.guests.info.captain.last_name%>
                </p>
                <p><b>Country:</b> <%= content.guests.info.captain.country%></p>
            </div>
            <% if(content.guests.number > 1){ %>
                <div class="col-md-6">
                    <div class="top-spacer"></div>
                    <h4>Guests Information</h4>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Open to
                        verify guests information
                    </button>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Guests Information</h4>
                                </div>
                                <div class="modal-body">
                                    <% let nguests = 1; %>
                                    <% _.each(content.guests.info.guests, function(guest){ %>
                                    <div class="col-6">
                                        <label style="margin-bottom:25px;">Guest #<%= nguests%></label>
                                        <p><b>Name:</b> <%= guest.first_name%> <%= guest.last_name%></p>
                                        <p><b>Country:</b> <%= guest.country%></p>
                                        <p><b>Email:</b> <%= guest.email_address%></p>
                                    </div>
                                    <div class="top-spacer"></div>
                                    <% nguests++; %>
                                    <% }); %>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <% } %>
        </div>
        <div class="top-spacer"></div>
        <div class="row">
            <div class="col-md-6">
                <h3>Billing Information</h3>
                <% if(content.buyer_info.configured === false){ %>
                    <p><%= content.buyer_info.message %></p>
                <% } else if (content.buyer_info.configured === true) { %>
                    <p><b>First Name</b>: <%= content.buyer_info.content.first_name %></p>
                    <p><b>Last Name</b>: <%= content.buyer_info.content.last_name %></p>
                    <p><b>Address</b>: <%= content.buyer_info.content.address_1 %></p>
                    <p><b>Other Address</b>: <%= content.buyer_info.content.address_2 %></p>
                    <p><b>City</b>: <%= content.buyer_info.content.city %></p>
                    <p><b>State/Region</b>: <%= content.buyer_info.content.state_region %></p>
                    <p><b>ZIP</b>: <%= content.buyer_info.content.zip %></p>
                <% } %>
            </div>
            <div class="col-md-6">
                <h3>Payment Information</h3>
                <% if(content.checkout_payment_method.completed === 0){ %>
                    <h4>Method: <%= content.checkout_payment_method.method_name %></h4>
                    <p><%= content.checkout_payment_method.message %></p>
                    <a class="btn btn-default" href="<%= APP_URL_FULL %>/checkout/continue">Finish the reservations</a>
                <% } %>
            </div>
        </div>
    </script>
@stop