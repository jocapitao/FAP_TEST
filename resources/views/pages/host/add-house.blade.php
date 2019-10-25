@extends('pages.tmpl.master')

@section('content')
    {{--    {{dd($commodities)}}--}}
    <section class="mainContentSection packagesSection">
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

                <!-- -->

                <div class="col-sm-9 col-xs-12">
                    <div>
                        <form id="form_add_house" method="post" action="{{url('host-management/add-house')}}">
                            <div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success" role="alert" hidden><h3>Added with success!</h3>
                                            <p id="success"></p></div>
                                    </div>
                                </div>
                                <div class="row" id="content">
                                    <div class="col-sm-12">
                                        <div class="alert alert-danger" id="alert-content" role="alert" hidden><h3>Please correct the following errors.</h3>
                                            <p id="errors"></p></div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="col-sm-12 col-xs-12 accordionsTransparent">
                                            <h2>Lorem ipsum</h2>
                                            <p style="text-align:justify;" id="introText">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                do
                                                eiusmod tempor incididunt ut
                                                labore et dolore
                                                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                aliquip
                                                ex ea commodo
                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                                eu
                                                fugiat nulla
                                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                                deserunt
                                                mollit anim id est
                                                laborum.</p>
                                            <div class="solidBgTitle">
                                                <section class="panel-group" id="accordionSolid">
                                                    <div class="panel panel-default" style="background-color:#f5f5f5;">
                                                        <a class="panel-heading accordion-toggle collapse" data-toggle="collapse"
                                                           data-parent="#accordionSolid" href="#collapse-aa" aria-expanded="false" style="margin-bottom:20px;">
                                                            <span>{{__('host.anh_step_1')}}</span>
                                                            <i class="indicator fa  pull-right fa-minus"></i>
                                                        </a>
                                                        <div id="collapse-aa" class="panel-collapse collapse" aria-expanded="false"
                                                             style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-xs-12">
                                                                        <div class="form-group">
                                                                            <label for="house_name">{{__('host.form_house_name')}}</label>
                                                                            <input class="form-control" id="house_name"
                                                                                   name="house_name"
                                                                                   placeholder="{{__('host.form_house_name_placeholder')}}"
                                                                                   type="text">
                                                                            <small class="error-input">{{__('host.required_name')}}</small>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="guest_nr">{{__('host.guest_nr_label')}}</label>
                                                                            <input name="guest_nr" id="guest_nr" type="number" class="form-control" min="1" max="999" placeholder="1">
                                                                            <small style="margin-top:60px" class="error-input">{{__('host.required_guestnr')}}</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-xs-12">
                                                                        <div class="form-group">
                                                                            <label for="house_location">{!!__('host.form_house_location')!!}</label>
                                                                            <input class="form-control" id="house_location"
                                                                                   name="house_location"
                                                                                   placeholder="{{__('host.form_house_location_placeholder')}}"
                                                                                   type="text">
                                                                            <small class="error-input">{{__('host.required_location')}}</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-xs-12">
                                                                        <div class="form-group">
                                                                            <label for="house_address">{!!__('host.form_house_address')!!}</label>
                                                                            <input class="form-control" id="house_address"
                                                                                   name="house_address"
                                                                                   placeholder="{{__('host.form_house_address_placeholder')}}"
                                                                                   type="text">
                                                                            <small class="error-input">{{__('host.required_address')}}</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Describe</label>
                                                                            <div id="editor">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default" style="background-color:#f5f5f5;">
                                                            <a class="panel-heading accordion-toggle collapsed" data-toggle="collapse"
                                                               data-parent="#accordionSolid" href="#collapse-ff" aria-expanded="false">
                                                                <span>{{__('host.anh_step_2')}}</span>
                                                                <i class="indicator fa fa-plus  pull-right"></i>
                                                            </a>
                                                            <div id="collapse-ff" class="panel-collapse collapse" aria-expanded="false">
                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="sharedspace">How will the house space be hosted?</label>
                                                                                <input type="checkbox" class="boxes" name="sharedspace" id="sharedspace"
                                                                                       data-labelauty="This space will be shared with the house residents | This space is going to be exclusive to the guests">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">


                                                                        <label for="">Add divisions and beds to your house</label>
                                                                        <a href="javascript:void(0)" onclick="addBedroom()"
                                                                           class="btn btn-inverse" style="display:none;" id="bedroom-btn">Add Bedroom</a>
                                                                        <input type="hidden" id="current_bedroom_nrs" value="0">
                                                                        <input type="hidden" id="current_divisions_nrs" value="0">

                                                                        <div class="error-input" id="error-beds">
                                                                            <small>{{__('host.missing_beds')}}</small>
                                                                        </div>
                                                                        {{--<div class="row" id="rooms">
                                                                        </div>--}}

                                                                        <div id="divisions_div"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default" style="background-color:#f5f5f5;">
                                                            <a class="panel-heading accordion-toggle collapsed" data-toggle="collapse"
                                                               data-parent="#accordionSolid" href="#collapse-bb" aria-expanded="false">
                                                                <span>{{__('host.anh_step_3')}}</span>
                                                                <i class="indicator fa fa-plus  pull-right"></i>
                                                            </a>
                                                            <div id="collapse-bb" class="panel-collapse collapse" aria-expanded="false">
                                                                <div class="panel-body">

						    <?php
						    $columns = 0;
						    $nrof = (count($commodities[0]) - 1);
						    $columns = (12 / $nrof);
						    ?>
                                                                    <div class="row">
                                                                    @foreach($commodities[0] as $c => $commodity)
                                                                        <!--                                                                        --><?php //var_dump($commodity['property_type']) ?>
                                                                            @if($commodity['property_type']['idt'] == "division")
								<?php continue; ?>>
                                                                            @endif

                                                                            <div class="col-sm-{{$columns}}">
                                                                                <div class="text-center"><i
                                                                                            class="{{$commodity['property_type']['icon']}} fa-3x"></i>
                                                                                </div>
                                                                                <h3 class="text-center">{{$commodity['property_type']['name']}}</h3>

                                                                                @foreach($commodity['commodities'] as $p => $property)
                                                                                    @if ($commodity['property_type']['type'] == 1)
                                                                                        <div class="col-sm-6">
                                                                                            <input class="boxes" value="{{$p}}"
                                                                                                   type="checkbox"
                                                                                                   name="{{$commodity['property_type']['idt']}}[]"
                                                                                                   data-labelauty="{{$property['name']}}"/>
                                                                                        </div>
                                                                                    @elseif($commodity['property_type']['type'] == 2)
                                                                                        <div class="col-sm-6">
                                                                                            {{--<input class="" type="radio" name="{{$commodity['property_type']['idt']}}" id="{{$commodity['property_type']['idt']}}" value="{{$property}}" data-labelauty="{{$property}}"/>--}}
                                                                                            <input type="radio" name="property_type"
                                                                                                   value="{{$p}}"
                                                                                                   data-labelauty="{{$property['name']}}">
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default" style="background-color:#f5f5f5;">
                                                            <a class="panel-heading accordion-toggle collapsed" data-toggle="collapse"
                                                               data-parent="#accordionSolid" href="#collapse-cc" aria-expanded="false">
                                                                <span>{{__('host.anh_step_4')}}</span>
                                                                <i class="indicator fa fa-plus  pull-right"></i>
                                                            </a>
                                                            <div id="collapse-cc" class="panel-collapse collapse" aria-expanded="false">
                                                                <div class="panel-body">
                                                                    <div class="media custom-rules-block">
                                                                        <div class="media-body">
                                                                            <label for="selectmultiple">{{__('host.select_rules_label')}}</label>
                                                                            <select name="selectmultiple[]" multiple
                                                                                    id="selectmultiple"></select>
                                                                            <p class="text-muted"
                                                                               style="margin-top:55px;">{{__('host.advisory_text_select_rules')}}</p>
                                                                            <div id="houserules"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="panel panel-default">
                                                            <a class="panel-heading accordion-toggle collapsed" data-toggle="collapse"
                                                               data-parent="#accordionSolid" href="#collapse-dd" aria-expanded="false">
                                                                <span>{{__('host.anh_step_5')}}</span>
                                                                <i class="indicator fa fa-plus  pull-right"></i>
                                                            </a>
                                                            <div id="collapse-dd" class="panel-collapse collapse" aria-expanded="false">
                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="meals">{{__('host.form_meals_questions')}}</label>

                                                                                <input type="checkbox" name="meals"
                                                                                       id="meals"
                                                                                       data-labelauty="{{__('host.form_meals_answer1')}}|{{__('host.form_meals_answer2')}}"/>
                                                                            </div>
                                                                            <div id="meals_group" class="undisplayed">
                                                                                <div class="form-group">
                                                                                    <label for="meals_price_question">{{__('host.additional_cost_question')}}</label>
                                                                                    <input type="checkbox" name="meals_price_question"
                                                                                           id="meals_price_question"
                                                                                           data-labelauty="{{__('host.price_included')}}.|{{__('host.price_not_included')}}."/>
                                                                                </div>
                                                                                <div id="meals_price_group"
                                                                                     class="form-group undisplayed">
                                                                                    <label for="meal_price">{{__('host.label_price_question')}}</label>
                                                                                    <input type="text" name="meal_price"
                                                                                           class="form-control"
                                                                                           id="meal_price"
                                                                                           placeholder="{{__('host.price_suggestion', ['currency' => $user_currency['user_currency']['name_s']])}}"/>
                                                                                    <small class="error-input">{{__('host.required_price')}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label for="visit_around_city">{{__('host.form_visits_question')}}</label>

                                                                                <input type="checkbox" name="visit_around_city"
                                                                                       id="visit_around_city"
                                                                                       data-labelauty="{{__('host.form_visits_answer1')}}|{{__('host.form_visits_answer2')}}"/>
                                                                            </div>
                                                                            <div id="guest_visit_group" class="undisplayed">
                                                                                <div class="form-group">
                                                                                    <label for="guest_visit_price_question">{{__('host.additional_cost_question')}}</label>
                                                                                    <input type="checkbox" name="guest_visit_price_question"
                                                                                           id="guest_visit_price_question"
                                                                                           data-labelauty="{{__('host.price_included')}}.|{{__('host.price_not_included')}}."/>
                                                                                </div>
                                                                                <div id="guest_visit_price_group"
                                                                                     class="form-group undisplayed">
                                                                                    <label for="guest_visit_price">{{__('host.label_price_question')}}</label>
                                                                                    <input type="text" name="guest_visit_price"
                                                                                           class="form-control"
                                                                                           id="guest_visit_price"
                                                                                           placeholder="{{__('host.price_suggestion', ['currency' => $user_currency['user_currency']['name_s']])}}"/>
                                                                                    <small class="error-input">{{__('host.required_price')}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="night_fun">{{__('host.night_fun_label')}}</label>

                                                                                <input type="checkbox" name="night_fun"
                                                                                       id="night_fun"
                                                                                       data-labelauty="{{__('host.night_fun_q_2')}}|{{__('host.night_fun_q_1')}}"/>
                                                                            </div>
                                                                            <div id="night_fun_group" class="undisplayed">
                                                                                <div class="form-group">
                                                                                    <label for="night_fun_price_question">{{__('host.additional_cost_question')}}</label>
                                                                                    <input type="checkbox"
                                                                                           name="night_fun_price_question"
                                                                                           id="night_fun_price_question"
                                                                                           data-labelauty="{{__('host.price_included')}}.|{{__('host.price_not_included')}}."/>
                                                                                </div>
                                                                                <div id="night_fun_price_group"
                                                                                     class="form-group undisplayed">
                                                                                    <label for="night_fun_price">{{__('host.label_price_question')}}</label>
                                                                                    <input type="text" name="night_fun_price"
                                                                                           class="form-control"
                                                                                           id="night_fun_price"
                                                                                           placeholder="{{__('host.price_suggestion', ['currency' => $user_currency['user_currency']['name_s']])}}"/>
                                                                                    <small class="error-input">{{__('host.required_price')}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="guest_pickup">{{__('host.form_pickup_question')}}</label>

                                                                                <input type="checkbox" name="guest_pickup"
                                                                                       id="guest_pickup"
                                                                                       data-labelauty="{{__('host.form_pickup_answer1')}}|{{__('host.form_pickup_answer2')}}"/>
                                                                            </div>
                                                                            <div id="guest_pickup_group" class="undisplayed">
                                                                                <div class="form-group">
                                                                                    <label for="guest_pickup_price_question">{{__('host.additional_cost_question')}}</label>
                                                                                    <input type="checkbox"
                                                                                           name="guest_pickup_price_question"
                                                                                           id="guest_pickup_price_question"
                                                                                           data-labelauty="{{__('host.price_included')}}.|{{__('host.price_not_included')}}."/>
                                                                                </div>
                                                                                <div id="guest_pickup_price_group"
                                                                                     class="form-group undisplayed">
                                                                                    <label for="guest_pickup_price">{{__('host.label_price_question')}}</label>
                                                                                    <input type="text" name="guest_pickup_price"
                                                                                           class="form-control"
                                                                                           id="guest_pickup_price"
                                                                                           placeholder="{{__('host.price_suggestion', ['currency' => $user_currency['user_currency']['name_s']])}}"/>
                                                                                    <small class="error-input">{{__('host.required_price')}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                            <a class="panel-heading accordion-toggle collapsed" data-toggle="collapse"
                                                               data-parent="#accordionSolid" href="#collapse-ee" aria-expanded="false">
                                                                <span>{{__('host.anh_step_6')}}</span>
                                                                <i class="indicator fa fa-plus  pull-right"></i>
                                                            </a>
                                                            <div id="collapse-ee" class="panel-collapse collapse" aria-expanded="false">
                                                                <div class="panel-body">
                                                                    <div class="form-group">
                                                                        <label for="">{{__('host.provide_transport_label')}}</label>
                                                                        <input type="checkbox" id="transport_provider"
                                                                               name="transport_provider"
                                                                               data-labelauty="{{__('host.will_not_provide_trans')}}|{{__('host.will_provide_trans')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                            <a class="panel-heading accordion-toggle collapsed" data-toggle="collapse"
                                                               data-parent="#accordionSolid" href="#collapse-ww" aria-expanded="false">
                                                                <span>{{__('host.availability')}}</span>
                                                                <i class="indicator fa fa-plus  pull-right"></i>
                                                            </a>
                                                            <div id="collapse-ww" class="panel-collapse collapse" aria-expanded="false">
                                                                <div class="panel-body" id="pickers">
                                                                    <div class="col-sm-12" style="margin-bottom: 25px;">
                                                                        <button class="btn btn-inverse btn-full" id="btnMoreDates" type="button">More</button>
                                                                    </div>
                                                                    <div class="form-group col-sm-6" id="datepicker">
                                                                        <label for="available_days">{{__('host.label_available_days')}}</label>
                                                                        <input id="available_days"
                                                                               class="calendar-input flatpickr flatpickr-input active form-control"
                                                                               type="text" name="available_days[]"
                                                                               placeholder="{{__('host.select_date_placeholder')}}"
                                                                               readonly="readonly">
                                                                        <small class="error-input">{{__('host.missing_days')}}</small>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                            <a class="panel-heading accordion-toggle collapsed" data-toggle="collapse"
                                                               data-parent="#accordionSolid" href="#collapse-zz" aria-expanded="false">
                                                                <span>{{__('host.pricing')}}</span>
                                                                <i class="indicator fa fa-plus  pull-right"></i>
                                                            </a>
                                                            <div id="collapse-zz" class="panel-collapse collapse" aria-expanded="false">
                                                                <div class="panel-body">
                                                                    <div class="form-group">
                                                                        <label id="pricetoapply_label">{{__('host.label_price_to_apply')}}</label>
                                                                        <div>
                                                                            <label class="radio-inline">
                                                                                <input type="radio"
                                                                                       data-labelauty="{{__('host.price_to_apply_input_night')}}"
                                                                                       name="price_to_apply_input" value="price_night">
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                                <input type="radio"
                                                                                       data-labelauty="{{__('host.price_to_apply_input_weekend')}}"
                                                                                       name="price_to_apply_input" value="price_weekend">
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                                <input type="radio"
                                                                                       data-labelauty="{{__('host.price_to_apply_input_weekly')}}"
                                                                                       name="price_to_apply_input" value="price_weekly">
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                                <input type="radio"
                                                                                       data-labelauty="{{__('host.price_to_apply_input_monthly')}}"
                                                                                       name="price_to_apply_input" value="price_monthly">
                                                                            </label>
                                                                        </div>
                                                                        <small id="pricetoapply_small" class="error-input">{{__('host.missing_type_stay')}}</small>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                {{--<div class="">--}}
                                                                                <label for="stay_price">{{__('host.stay_price_input_label')}}</label>
                                                                                <input placeholder="{{__('host.stay_price_input_placeholder', ['currency' => $user_currency['user_currency']['name_s']])}}"
                                                                                       type="text" class="form-control" id="stay_price"
                                                                                       name="stay_price">
                                                                                <small class="error-input">{{__('host.required_price_cost')}}</small>

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="cleaning_fee">Cleaning fee
                                                                                    <small>(Leave empty to not apply)</small>
                                                                                </label>
                                                                                <input type="text" class="form-control" id="cleaning_fee" name="cleaning_fee" placeholder="Example: 25 {{$user_currency['user_currency']['name_s']}}">
                                                                            </div>
                                                                            <label>{{__('host.rates_question')}}</label>
                                                                            <div class="form-group">
                                                                                <label id="ratetoapply_label" class="radio-inline">
                                                                                    <input type="radio" name="rate"
                                                                                           data-labelauty="{{__('host.radio_standard_rate_txt')}}"
                                                                                           value="standard_rate">
                                                                                </label>
                                                                                {{--<label class="radio-inline">
                                                                                    <input type="radio" name="rate" value="reduced_rate"
                                                                                           data-labelauty="{{__('host.radio_reduced_rate_txt')}}">
                                                                                </label>--}}
                                                                                <label class="radio-inline">
                                                                                    <input type="radio" name="rate" value="do_not_apply"
                                                                                           data-labelauty="{{__('host.radio_rate_donot_apply_txt')}}">
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label id="ratedivlabel" for="stay_price_vat" hidden>{{__('host.stay_price_vat_input_label')}}</label>
                                                                                <div id="rate_div">

                                                                                </div>
                                                                                <small id="ratedivsmall" style="margin-top: 60px;" class="error-input">{{__('host.required_rates')}}</small>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="house_rooms">
                                                            {{--<input type="hidden" name="house_room[]">--}}
                                                        </div>

                                                        <div id="beds_rooms">
                                                            {{--<input type="hidden" name="house_room[]">--}}
                                                        </div>
                                                        <input name="description" id="description" style="display:none;">
                            {{csrf_field()}}

                        </form>
                        <div class="panel panel-default">
                            <a class="panel-heading accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordionSolid" href="#collapse-im" aria-expanded="false">
                                <span>{{__('host.upload_images')}}</span>
                                <i class="indicator fa fa-plus  pull-right"></i>
                            </a>
                            <div id="collapse-im" class="panel-collapse collapse" aria-expanded="false">
                                <div class="panel-body">
                                    <form action="{{url('file-upload')}}"
                                          class="dropzone"
                                          id="image-dropzone">{{csrf_field()}}
                                    </form>

                                </div>
                            </div>
                        </div>
    </section>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="row top-spacer">
        <div class="col-md-12">
            {{--<h4>{{__('host.resume')}}</h4>--}}
            <div id="calculatecosts"></div>
        </div>
    </div>
    <div class="row">
        <div class="navbar-btn" style="margin-top: 10px;">
            <button id="btnSubmit" type="button" class="btn btn-inverse btn-full">Add House
            </button>
        </div>
    </div>
    </div>

    </div>

    </div>
    </div>
    </section>

    <!-- Beds Modal -->
    <div class="modal fade signupLoging" id="beds" tabindex="-1" role="dialog" aria-labelledby="beds">
        <div class="modal-dialog mediumModal" role="document">
            <div class="modal-content modalContentCustom">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="beds">Choose bed type for Bedroom <span id="bednr"></span>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="text-align:center;">
                        <input type="hidden" id="roomnr" value="">
                        @foreach($beds['bedroom_beds'] as $k => $bed)
                            <div class="col-xs-3">
                                <a href="javascript:void(0)" id="applyBedTypeBtn"
                                   onclick="applyBedType('{{$bed["bed_id"]}}', '{{$bed["bed_name"]}}', '{{url($bed["image_path"])}}')">
                                    <img src="{{url($bed['image_path'])}}" alt="{{$bed['bed_id']}}">
                                    <label>{{$bed['bed_name']}}</label>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Room Type -->
    <div class="modal fade signupLoging" id="rooms" tabindex="-1" role="dialog" aria-labelledby="room">
        <div class="modal-dialog mediumModal" role="document">
            <div class="modal-content modalContentCustom">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><span id="bednr"></span>
                    </h4>
                </div>
                <div class="modal-body" id="division_modal_body">
                    <div class="row" style="text-align:center;">
		        <?php
		        //		        var_dump($commodity['commodities']);
		        $count_c = count($commodity['commodities']);
		        $divider_c = (12 / $count_c);
		        ?>
                        <div class="row">
                            @foreach ($commodity['commodities'] as $divisions => $division)
                                <a href="javascript:void(0)" onclick="makeDivision('{{$divisions}}', '{{$division['name']}}')">
                                    <div class="col-sm-{{$divider_c}}">
                                        <div class="row choose-divison" style="text-align: center;"><i class="{{$division['icon']}}"></i></div>
                                        <div class="row" style="text-align: center;"><h4>{{$division['name']}}</h4></div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade signupLoging" id="rooms_division" tabindex="-1" role="dialog" aria-labelledby="rooms_divisionLabel">
        <div class="modal-dialog mediumModal" role="document">
            <div class="modal-content modalContentCustom">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><span id="bednr"></span>
                    </h4>
                </div>
                <div class="modal-body" id="division_modal_body_properties">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(function () {
            var quill = new Quill('#editor' , {
                theme: 'snow'
            });
            var twatVar = 0;
            $('#btnMoreDates').on('click' , function () {
                $('#datepicker').clone().appendTo('#pickers').find('#available_days').attr('id' , 'available_days' + twatVar);
                $("#available_days" + twatVar).flatpickr({
                                                             minDate:     "today" ,
                                                             mode:        "range" ,
                                                             dateFormat:  "Y-m-d" ,
                                                             weekNumbers: true ,
                                                         }).clear();
                twatVar++;
            });

            // var c = $('#datepicker').clone();
            // $('#pickers').html(c);
            // $("input[type='number']").inputSpinner();

            // Dropzone.autoDiscover = false;
            Dropzone.options.imageDropzone = {
                paramName:          'file' ,
                maxFilesize:        5 , // MB
                maxFiles:           15 ,
                resizeQuality:      0.1 ,
                dictDefaultMessage: 'Drag an image here to upload, or click to select one' +
                                    ' <br> ' +
                                    '<ul>' +
                                    '<li>Min image dimensions: 800 pixels per 800 pixels</li>' +
                                    '<li>Max image size: 5 MB</li>' +
                                    '<li>Max images: 15</li>' +
                                    '</ul>' ,
                headers:            {
                    'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value ,
                } ,
                acceptedFiles:      'image/*' ,
                init:               function () {
                    this.on('success' , function (file , resp) {
                        console.log(file);
                        console.log(resp);
                    });
                    this.on('thumbnail' , function (file) {
                        if ( file.width < 800 || file.height < 800 ) {
                            file.rejectDimensions();
                        }
                        else {
                            file.acceptDimensions();
                        }
                    });
                } ,
                accept:             function (file , done) {
                    file.acceptDimensions = done;
                    file.rejectDimensions = function () {
                        done('The image must be at least 800 x 800px')
                    };
                }
            };

            $('#price_per').selectize();

            $(":radio").labelauty({
                                      icon:          false ,
                                      minimum_width: "100px" ,
                                  });

            $(".boxes").labelauty({
                                      icon:          false ,
                                      minimum_width: "100px" ,
                                  });

            $('#meals_availability, #visit_around_city, #guest_pickup, #guest_pickup_price_question, #guest_visit_price_question,#night_fun_price_question, #night_fun, #meals, #meals_price_question, #transport_provider').labelauty({
                                                                                                                                                                                                                                           icon:          false ,
                                                                                                                                                                                                                                           minimum_width: "250px" ,
                                                                                                                                                                                                                                       });
            $('#btnSubmit').click(function () {
                //update textarea data to submit decription
                var editor = new Quill("#editor");

                $('#description').val(JSON.stringify(editor.getContents()));

                var url = $('#form_add_house').attr('action');
                var data = $('#form_add_house').serialize();
                $.ajax({
                           url:     url ,
                           method:  "post" , //First change type to method here
                           data:    data ,
                           // dataType: 'json',
                           success: function (response) {
                               console.log(response);
                               if ( response.status === false ) {
                                   $('#errors').html(iterateValidatorMessages(response.errors[0]));
                                   $('.alert.alert-danger').show();
                                   snotices('Opps! Looks like not everything is filled up, check the errors above','orange');
                                   return;
                               }
                               $('#success').html('Added with success!');
                               $('.alert.alert-success').show();
                               $('#content').html('');
                           } ,
                           error:   function () {
                               alert("error");
                           }

                       });
                // }
                // });
            });

            $('#go').submit(function (evt) {
                evt.preventDefault();

                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                           url:     url ,
                           method:  "post" ,
                           data:    data ,
                           success: function (response) {
                               console.log(response);
                           } ,
                           error:   function (a) {
                               console.log(a);
                           }

                       });
            });

            $('#current_bedroom_nrs').val(0);
            $('#beds').on('show.bs.modal' , function (event) {
                var button = $(event.relatedTarget);
                var recipient = button.data('bednr');
                var modal = $(this);

                modal.find('#bednr').text(recipient);
                modal.find('#roomnr').val(recipient);
            })

            ///////////////////////////////////////////////////////

            //pickup
            $('#guest_pickup').change(function () {
                if ( $(this).attr('checked') === 'checked' ) {
                    $('#guest_pickup_group').removeClass('undisplayed');
                    $('#guest_pickup_group').addClass('display');
                } else if ( $(this).attr('checked') === undefined ) {
                    $('#guest_pickup_group').addClass('undisplayed');
                    $('#guest_pickup_group').removeClass('display');
                }
            });

            $('#guest_pickup_price_question').change(function () {
                if ( $(this).attr('checked') === 'checked' ) {
                    $('#guest_pickup_price_group').removeClass('undisplayed');
                    $('#guest_pickup_price_group').addClass('display');
                } else if ( $(this).attr('checked') === undefined ) {
                    $('#guest_pickup_price_group').addClass('undisplayed');
                    $('#guest_pickup_price_group').removeClass('display');
                }
            });

            /////////////////////////////////////////////////////

            //visits
            $('#visit_around_city').change(function () {
                if ( $(this).attr('checked') === 'checked' ) {
                    $('#guest_visit_group').removeClass('undisplayed');
                    $('#guest_visit_group').addClass('display');
                } else if ( $(this).attr('checked') === undefined ) {
                    $('#guest_visit_group').addClass('undisplayed');
                    $('#guest_visit_group').removeClass('display');
                }
            });

            $('#guest_visit_price_question').change(function () {
                if ( $(this).attr('checked') === 'checked' ) {
                    $('#guest_visit_price_group').removeClass('undisplayed');
                    $('#guest_visit_price_group').addClass('display');
                } else if ( $(this).attr('checked') === undefined ) {
                    $('#guest_visit_price_group').addClass('undisplayed');
                    $('#guest_visit_price_group').removeClass('display');
                }
            });

            /////////////////////////////////////////////////////

            //night_fun
            $('#night_fun').change(function () {
                if ( $(this).attr('checked') === 'checked' ) {
                    $('#night_fun_group').removeClass('undisplayed');
                    $('#night_fun_group').addClass('display');
                } else if ( $(this).attr('checked') === undefined ) {
                    $('#night_fun_group').addClass('undisplayed');
                    $('#night_fun_group').removeClass('display');
                }
            });

            $('#night_fun_price_question').change(function () {
                if ( $(this).attr('checked') === 'checked' ) {
                    $('#night_fun_price_group').removeClass('undisplayed');
                    $('#night_fun_price_group').addClass('display');
                } else if ( $(this).attr('checked') === undefined ) {
                    $('#night_fun_price_group').addClass('undisplayed');
                    $('#night_fun_price_group').removeClass('display');
                }
            });

            /////////////////////////////////////////////////////

            //meals
            $('#meals').change(function () {
                if ( $(this).attr('checked') === 'checked' ) {
                    $('#meals_group').removeClass('undisplayed');
                    $('#meals_group').addClass('display');
                } else if ( $(this).attr('checked') === undefined ) {
                    $('#meals_group').addClass('undisplayed');
                    $('#meals_group').removeClass('display');
                }
            });

            $('#meals_price_question').change(function () {
                if ( $(this).attr('checked') === 'checked' ) {
                    $('#meals_price_group').removeClass('undisplayed');
                    $('#meals_price_group').addClass('display');
                } else if ( $(this).attr('checked') === undefined ) {
                    $('#meals_price_group').addClass('undisplayed');
                    $('#meals_price_group').removeClass('display');
                }
            });

            /////////////////////////////////////////////////////

            //price to apply input

            $("input[name='price_to_apply_input']").change(function () {

            });

            /////////////////////////////////////////////////////

            var checkslist = {
                guest_pickup_price_question: 'guest_pickup_price_group' ,
                guest_visit_price_question:  'guest_visit_price_group' ,
                meals_price_question:        'meals_price_group' ,
                night_price_question:        'night_fun_price_group' ,
                guest_pickup:                'guest_pickup_group' ,
                visit_around_city:           'guest_visit_group' ,
                meals:                       'meals_group' ,
                night_fun:                   'night_fun_group' ,
            };

            $.each(checkslist , function (z , x) {
                if ( $('#' + z).attr('checked') == 'checked' ) {
                    $('#' + x).removeClass('undisplayed');
                    $('#' + x).addClass('display');
                }
            });

            $('select#guest_nr').selectize({
                                               create:    true ,
                                               sortField: 'text' ,
                                               onChange:  function (value) {
                                                   $('#rater').val(value);
                                                   callerForRate_GuestChange(APP_CURRENCY , 2);
                                               }
                                           });

            $(".flatpickr").flatpickr({
                                          minDate:     "today" ,
                                          mode:        "range" ,
                                          dateFormat:  "Y-m-d" ,
                                          weekNumbers: true ,
                                      });

            $('#houserules').houselister({
                                             lang: "{{$user_language['name_2']}}" ,
                                         });

            $('#calculatecosts').calculatecosts({
                                                    lang:     "{{$user_language['name_2']}}" ,
                                                    currency: "{{$user_currency['user_currency']['name_s']}}"
                                                });

            $('#rate_div').makerates({
                                         lang:     "{{$user_language['name_2']}}" ,
                                         currency: "{{$user_currency['user_currency']['name_s']}}"
                                     });
            $('#divisons_div').divisonmaker({
                                                lang:     "{{$user_language['name_2']}}" ,
                                                currency: "{{$user_currency['user_currency']['name_s']}}"
                                            });

            $('#meal_price, #guest_visit_price, #night_fun_price, #guest_pickup_price, #stay_price,#cleaning_fee').mask('000,000,000,000,000.00 {{$user_currency['user_currency']["name_s"]}}' , {reverse: true});

        });
    </script>
@endsection
