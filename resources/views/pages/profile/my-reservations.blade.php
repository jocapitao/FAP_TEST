@extends('pages.tmpl.master')

@section('content')
    <section class="mainContentSection recentActivitySection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 ">
                    <h2>My Reservations</h2>
                    <p>Manage the reservations you did.</p>
                    <div class="recentActivityContent bg-ash">
                        <div class="table-responsive"  data-pattern="priority-columns">
                            <table class="table listingsTable">
                                <tbody id="reservations-table">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        function templateMyReservations (res) {
            console.log(res);
            let template = _.template($('#templateMyReservations').html());
            $('#reservations-table').html(template({reservations:res}));
        }
        $(function(){
            requestUserReservations(templateMyReservations);
        });
    </script>
@endsection

@section('templates')
    <script type="text/template" id="templateMyReservations">
        <% _.each(reservations, function(reservation){ %>
        <% console.log(reservation) %>
        <tr class="rowItem">
            <td class="dateTd"><div class="date"><span style="padding:10px;"><%= (reservation.checkout_status <= 2 ? 'Not Paid' : 'Paid' ) %></span> </div></td>
            <td class="packageTd">
                <ul class="list-inline listingsInfo">
                    <li>
                        <h4><a href="<%= APP_URL_FULL %>/reservation/<%= reservation.checkout_id %>"></a></h4>
                        <a href="<%= APP_URL_FULL %>/reservation/<%= reservation.checkout_id %>"><p><%= reservation.house.name %></p></a>
                    </li>
                </ul>
            </td>
            <td class="priceTd">
                <ul class="list-inline listingsInfo text-right">
                    <li>
                        <h4><%= priceConverter(reservation.total,reservation.currency.currency_3) %></h4>
<!--                        <p>AVG/Person</p>-->
                    </li>
                </ul>
            </td>
            <td class="bookingTd">
                <ul class="list-inline listingsInfo text-left">
                    <li>
                        <h4>TRIP ID</h4>
                        <p><%= reservation.checkout_id %></p>
                        <h4>BOOKED ON</h4>
                        <p><%= moment(reservation.created_at).format('LL') %></p>
                    </li>
                </ul>
            </td>
        </tr>
        <% }); %>
    </script>
@endsection