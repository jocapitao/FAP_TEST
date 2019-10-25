@extends('pages.tmpl.master')

@section('content')
    <section class="mainContentSection packagesSection">

        <div class="container">
            <form method="post" id="search_form">
                <div class="row">
                    <aside class="col-sm-3 col-xs-12">
                        <div class=" hotelListSidebar">
                            <div class="panel-heading-title">
                                <h3>search </h3>
                            </div>
                            <div class="panel-group" id="accordion-filter" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12 ">
                                                <div class="inputText">
                                                    <div class="input-search">
                                                        <input name="search_term" style="text-transform: uppercase;" type="text" class="form-control" placeholder="@if($params['stringsearch'] == NULL || $params['stringsearch'] == 'all') Search @endif" aria-describedby="basic-addon1" value="@if($params['stringsearch'] != NULL && $params['stringsearch'] != 'all'){{$params['stringsearch']}}@endif">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 ">
                                                <div class="input-search">
                                                    <input id="available_days"
                                                           class="calendar-input flatpickr flatpickr-input active form-control"
                                                           type="text" name="checkin" id="checkin"
                                                           placeholder="Check in"
                                                           readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="input-search">
                                                    <input id="available_days"
                                                           class="calendar-input flatpickr flatpickr-input active form-control"
                                                           type="text" name="checkout" id="checkout"
                                                           placeholder="Check out"
                                                           readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 mb-30">
                                                <div class="input-search">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-4 col-sm-12 col-xs-4" for="inputSuccess3">rooms</label>
                                                        <div class="col-md-8 col-sm-12 col-xs-8 datepickerWrap">
                                                            <div class="count-input">
                                                                <a class="incr-btn" data-action="decrease" href="#">–</a>
                                                                <input class="quantity" name="quantity_rooms" type="text" value="0">
                                                                <a class="incr-btn" data-action="increase" href="#">+</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 mb-30">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 col-sm-12 col-xs-4" for="inputSuccess3">Guests</label>
                                                    <div class="col-md-8 col-sm-12 col-xs-8 datepickerWrap">
                                                        <div class="count-input">
                                                            <a class="incr-btn" data-action="decrease" href="#">–</a>
                                                            <input class="quantity" name="guests" type="text" value="0">
                                                            <a class="incr-btn" data-action="increase" href="#">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button href="#" type="submit" class="btn btn-block buttonTransparent">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class=" hotelListSidebar">
                            <div class="panel-heading-title">
                                <h3>Filter by</h3>
                            </div>
                            <div class="panel-group" id="accordion-filter" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="headingSix">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion-filter" href="#collapseSix" aria-expanded="true" aria-controls="collapseOne">
                                                <span>By Stay per </span>
                                                <i class="indicator fa fa-minus  pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
                                        <div class="panel-body">
                                            <div class="check-box-list">
                                                <div class="row">
                                                    <div class="form-check col-sm-12">
                                                        <label>
                                                            <input type="checkbox" value="price_night" name="stay_type">
                                                            Night
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-sm-12">
                                                        <label>
                                                            <input type="checkbox" value="price_weekend" name="stay_type">
                                                            Weekend
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-sm-12">
                                                        <label>
                                                            <input type="checkbox" value="price_week" name="stay_type">
                                                            Week
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-sm-12">
                                                        <label>
                                                            <input type="checkbox" value="price_month" name="stay_type">
                                                            Month
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion-filter" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <span>By Price </span>
                                                <i class="indicator fa fa-minus  pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="check-box-list">
                                                <div class="row">
                                                    <div class="form-check col-sm-12">
                                                        <label>
                                                            <input type="checkbox" value="0_50" name="price">
                                                            0{{$user_currency['user_currency']['currency']['name_s']}} - 50{{$user_currency['user_currency']['currency']['name_s']}}
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-sm-12">
                                                        <label>
                                                            <input type="checkbox" value="50_100" name="price">
                                                            50{{$user_currency['user_currency']['currency']['name_s']}} - 100{{$user_currency['user_currency']['currency']['name_s']}}
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-sm-12">
                                                        <label>
                                                            <input type="checkbox" value="100_150" name="price">
                                                            100{{$user_currency['user_currency']['currency']['name_s']}} - 150{{$user_currency['user_currency']['currency']['name_s']}}
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-sm-12">
                                                        <label>
                                                            <input type="checkbox" value="150_200" name="price">
                                                            150{{$user_currency['user_currency']['currency']['name_s']}} - 200{{$user_currency['user_currency']['currency']['name_s']}}
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-sm-12">
                                                        <label>
                                                            <input type="checkbox" value="200_999" name="price">
                                                            200{{$user_currency['user_currency']['currency']['name_s']}} +
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-filter" href="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                                                <span>House Type</span>
                                                <i class="indicator fa fa-minus  pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                        <div class="panel-body">
                                            <div class="check-box-list">
                                                <div class="row">
                                                    @foreach($commodities_list[3]['commodities'] as $commodity => $key)
                                                        <div class="form-check col-sm-12">
                                                            <label>
                                                                <input type="checkbox" value="{{$commodity}}" name="house_type">
                                                                {{$key['name']}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-filter" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <span>Property</span>
                                                <i class="indicator fa fa-minus  pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div class="check-box-list">
                                                <div class="row">
                                                    @foreach($commodities_list[2]['commodities'] as $commodity => $key)
                                                        <div class="form-check col-sm-12">
                                                            <label>
                                                                <input type="checkbox" value="{{$commodity}}" name="property">
                                                                {{$key['name']}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-filter" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <span>Commodities</span>
                                                <i class="indicator fa fa-minus  pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <div class="check-box-list">
                                                <div class="row">
					<?php $ix = 0;?>
                                                    @foreach($commodities_list[1]['commodities'] as $commodity => $key)
                                                        <div class="form-check col-sm-12">
                                                            <label>
                                                                <input type="checkbox" value="{{$commodity}}" name="commodities">
                                                                {{$key['name']}}
                                                            </label>
                                                        </div>
						<?php $ix++;?>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button href="#" type="submit" class="btn btn-block buttonTransparent">Search</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </aside>
                    <div class="col-sm-9 col-xs-12">
                        <div class="sort-by-section">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="sort-by-single">
                                        <div class="sort-select-box">
                                            <select name="guiest_id3" id="guiest_id3" class="select-drop" sb="68202611" style="display: none;">
                                                <option value="0">sort by price</option>
                                                <option value="1">sort by rating</option>
                                                <option value="1">sort by popularity</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="icon-right pull-right">
                                        <div class="icon ">
                                            <a href="hotels-list-left-sidebar.html"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="icon active">
                                            <a href="hotels-grid-left-sidebar.html"><i class="fa fa-th" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="list">

                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-xs-12">
                    <div class="paginationCenter">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Previous</span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">9</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">Next<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $(function () {
            $(".flatpickr").flatpickr({
                                          minDate:     "today" ,
                                          dateFormat:  "Y-m-d" ,
                                          weekNumbers: true ,
                                      });
            $('input').iCheck({checkboxClass: 'icheckbox_flat' , radioClass: 'iradio_flat'});
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

            $('#search_form').submit(function (evt) {
                evt.preventDefault();
                var custom_search_url = formatSearchUrl($(this).serializeArray() , '{{url("/search/".$page)}}' , '{{$params["stringsearch"]}}/{{$params["room"]}}/{{$params["guests"]}}/{{$params["price"]}}/{{$params["commodities"]}}/{{$params["property"]}}/{{$params["housetype"]}}/{{$params["housespacing"]}}/{{$params["start_date"]}}/{{$params["end_date"]}}');

                console.log(custom_search_url);

                getHouseListPerPage('post' , custom_search_url , {_token: "{{csrf_token()}}"});
            });

            getHouseListPerPage('post' , '{{url()->current()}}' , {_token: "{{csrf_token()}}"});
        });
    </script>
@endsection