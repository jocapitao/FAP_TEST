@extends('pages.tmpl.master')

@section('content')
    <section class="mainContentSection" id="checkout">

    </section>
@endsection

@section('js')
    <script type="text/javascript">
        function updatePaymentType(payment_id) {
            $('#payment_id').val(payment_id);
        }

        function handleGuestsInfo(res) {
            if ( res.status === false ) {
                snotices('Error' , 'red');
                return;
            }
            // updateUrl('/checkout/payment-billing');
            let template = _.template($('#step-2').html());
            $('#checkout').fadeOut().html(template({checkout_id: res.data.message.checkout_id,total:priceConverter(parseFloat(res.data.message.total),res.data.message.currency.currency_3)})).fadeIn();
        }

        function requestGuestsInfo() {
            ajaxRequest(APP_URL + '/checkout/guests-info' , $('#guests_info').serialize() , 'post' , handleGuestsInfo);
        }

        function btnSubmitPayment() {
            let form = $('#formPayment').serialize();
            requestPayment(form , handlePayment , APP_URL+'/checkout/step-3');
        }

        $(function () {
            var step = {{$step_nr}};
            // templateCheckoutPage(step);
            var template = _.template($('#step-1').html());
            $('#checkout').html(template);
            const price = $('input#price').data('price');
            const currency = $('input#price').data('currency');
            const value = priceConverter(price , currency);
            $('#totalprice').html(value);
        });
    </script>
@endsection

@section('templates')
    <script type="text/template" id="step-1">
        <div class="container">
            <div class="row progress-wizard" style="border-bottom:0;">

                <div class="col-sm-4 col-xs-12 progress-wizard-step active">
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="javascript:void(0)" class="progress-wizard-dot">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        1. Guests Info
                    </a>
                </div>

                <div class="col-sm-4 col-xs-12 progress-wizard-step disabled">
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="booking-2.html" class="progress-wizard-dot">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        2. Billing and Payment
                    </a>
                </div>

                <div class="col-sm-4 col-xs-12 progress-wizard-step disabled">
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="booking-3.html" class="progress-wizard-dot">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        3. Confirmation
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-push-8 col-xs-12">

                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="bookingForm">
                        <form id="guests_info" method="POST" role="form" class="form">
                            {{csrf_field()}}
                            <h3><i>Captain</i></h3>
                            <p>It's time to put the yellow bracelet and lead your team!</p>
                            <div class="row">
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="first_name_captain">First Name</label>
                                    <input type="text" class="form-control" id="first_name_captain" name="first_name_captain">
                                </div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="last_name_captain">Last Name</label>
                                    <input type="text" class="form-control" id="last_name_captain" name="last_name_captain">
                                </div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="country_captain">Country</label>
                                    <input type="text" class="form-control" id="country_captain" name="country_captain">
                                </div>
                            </div>
                            <hr>
                            @for($nr = 1;$nr <= ($data['guests']-1);$nr++)
                                <h3>Guest {{$nr}}</h3>
                                <p>We need some guest information.</p>
                                <div class="row">

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="first_name_guests">First Name</label>
                                        <input type="text" class="form-control" id="first_name_guests" name="first_name_guests[{{$nr}}]">
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="last_name_guests">Last Name</label>
                                        <input type="text" class="form-control" id="last_name_guests" name="last_name_guests[{{$nr}}]">
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="country_guests">Country</label>
                                        <input type="text" class="form-control" id="country_guests" name="country_guests[{{$nr}}]">
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="email_guests">Email address</label>
                                        <input type="text" class="form-control" id="email_guests" name="email_guests[{{$nr}}]">
                                    </div>
                                </div>
                            @endfor
                            <input type="hidden" name="checkout_id" value="{{$data['checkout_id']}}">
                            <button href="#" type="button" onclick="requestGuestsInfo()" class="btn buttonTransparent">Next</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/template" id="step-2">
        <div class="container">
            <div class="row progress-wizard" style="border-bottom:0;">

                <div class="col-sm-4 col-xs-12 progress-wizard-step complete">
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="booking-1.html" class="progress-wizard-dot">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        1. Guests Info
                    </a>
                </div>

                <div class="col-sm-4 col-xs-12 progress-wizard-step active">
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="javascript:void(0)" class="progress-wizard-dot">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        2. Billing and Payment
                    </a>
                </div>

                <div class="col-sm-4 col-xs-12 progress-wizard-step disabled">
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="booking-3.html" class="progress-wizard-dot">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        3. Confirmation
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-push-8 col-xs-12">
                    <aside>
                        <div class="infoTitle">
                            <h2>Booking Details</h2>
                        </div>
                        <div class="bookDetailsInfo">
                            <div class="infoArea">
                                <h4>Quick resume</h4>
                                <ul class="list-unstyled">
			        <?php $date_in = Carbon\Carbon::parse($data['check_in']); ?>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>From: <span>{{$date_in->format('l jS \\of F Y')}}</span></li>
			        <?php $date_out = Carbon\Carbon::parse($data['check_out']); ?>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>To: <span>{{$date_out->format('l jS \\of F Y')}}</span></li>
                                    <li><i class="fa fa-users" aria-hidden="true"></i></i>Guests: <span>{{$data['guests']}}</span></li>
                                </ul>
                                <div class="priceTotal">
                                    <input type="hidden" id="price" data-price="{{$data['price']}}" data-currency="{{$data['currency_data']['currency_3']}}">
                                    <h2>Total: <span id="totalprice"><%= total %> <small>(V.A.T included)</small></span></h2>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-8 col-sm-pull-4 col-xs-12">
                    <div class="infoTitle">
                        <h2>Billing and Payment</h2>
                    </div>
                    <div class="bookingForm">
                        <form method="POST" role="form" class="form" id="formPayment">
                            {{csrf_field()}}
                            {{--<input type="hidden" id="house_id" value="<%=  %>">--}}
                            <div class="row" style="margin-bottom: 50px;">
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                </div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control" id="address_1" name="address_1">
                                </div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control" id="address_2" name="address_2">
                                </div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="">Zip Code</label>
                                    <input type="text" class="form-control" id="zip" name="zip">
                                </div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="">State/Region</label>
                                    <input type="text" class="form-control" id="region" name="region">
                                </div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" id="country" name="country">
                                </div>
                                <div class="form-group col-xs-12">
                                    <label for="">Notes</label>
                                    <textarea class="form-control" id="notes" name="notes"></textarea>
                                </div>
                                <input type="hidden" name="house_id" value="{{$house_id}}">
                                {{--<div class="col-xs-12">
                                    <div class="buttonArea galleryBtnArea">
                                        <ul class="list-inline">
                                            <li>
                                                <button href="#" class="btn buttonTransparent">back</button>
                                            </li>
                                            <li class="pull-right"><a href="javascript:void(0)" onclick="submitStep1()" class="btn buttonTransparent">next</a></li>
                                        </ul>
                                    </div>
                                </div>--}}
                            </div>
                            <h4>Payment Method</h4>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="infoTitle">
                                        <a href="javascript:void(0)" onclick="updatePaymentType(1)"><h2>paypal</h2></a>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="infoTitle">
                                        <a href="javascript:void(0)" onclick="updatePaymentType(2)"><h2>credit card</h2></a>
                                    </div>
                                </div>

                                <input type="hidden" name="payment_id" id="payment_id" value="0">
                                <input type="hidden" name="checkout_id" id="checkout_id" value="<%= checkout_id %>">

                                <div class="checkbox col-xs-12">
                                    <label>
                                        <input type="checkbox"> I have read and accept the <a href="#">terms and conditions</a>
                                    </label>
                                </div>
                                <div class="checkbox col-xs-12">
                                    <label>
                                        <input type="checkbox"> I have read and accept the <a href="#">privacy policy</a>
                                    </label>
                                </div>

                                <div class="col-xs-12">
                                    <div class="buttonArea galleryBtnArea">
                                        <ul class="list-inline">
                                            <li class="pull-right"><button type="button" onclick="btnSubmitPayment()" class="btn buttonTransparent">next</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/template" id="step-3">
        <div class="container">
            <div class="row progress-wizard" style="border-bottom:0;">

                <div class="col-sm-4 col-xs-12 progress-wizard-step complete">
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="booking-1.html" class="progress-wizard-dot">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        1. personal info
                    </a>
                </div>

                <div class="col-sm-4 col-xs-12 progress-wizard-step complete">
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="booking-2.html" class="progress-wizard-dot">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        2. payment info
                    </a>
                </div>

                <div class="col-sm-4 col-xs-12 progress-wizard-step active">
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="javascript:void(0)" class="progress-wizard-dot">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        3. Confirmation
                    </a>
                </div>
            </div>
            <div class="row bookingConfirmed">
                <div class="col-xs-12">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">Dismiss</span></button>
                        Thank you! Your booking is confirmed. Invoice Sent in your email address
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="infoTitle">
                        <h2>Booking Details</h2>
                    </div>
                    <div class="confirmDetilas">
                        <img src="img/booking/booking-complete.jpg">
                        <div class="confirmInfo">
                            <div class="infoTitle">
                                <h2>Booking Details</h2>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <div class="row">
                                <div class="col-sm-4 col-xs-12">
                                    <dl class="dl-horizontal">
                                        <dt><i class="fa fa-calendar" aria-hidden="true"></i> From:</dt>
                                        <dd>25 Mar, 2016</dd>
                                        <dt><i class="fa fa-calendar" aria-hidden="true"></i> To:</dt>
                                        <dd>28 Mar, 2016</dd>
                                        <dt><i class="fa fa-users" aria-hidden="true"></i> Guests:</dt>
                                        <dd>2 Adults, 1 Child</dd>
                                    </dl>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <dl class="dl-horizontal">
                                        <dt><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</dt>
                                        <dd>Abdullah Al Masum <br> Shyamoli, Babor Road, <br> Mohammadpur, Dhaka.</dd>
                                    </dl>
                                </div>
                                <div class="col-sm-4 col-xs-12 priceTotal">
                                    <h2>Total: <span>$6,500</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/template" id="templatePayPal">
        <div class="col-md-6">

        </div>
    </script>
    <script type="text/template" id="templateCC">
        <div class="col-md-12">

        </div>
    </script>
@endsection