@extends('pages.tmpl.master')

@section('content')
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
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="panel-group">

                                    <form name="form_edit" id="form_edit"
                                          action="{{url('host-management/profile/update')}}" method="post" class="form">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                   value="{{($profile['status'] == TRUE ? ($profile['content']['data']['first_name'] ? $profile['content']['data']['first_name'] : '')  : '')}} {{($profile['status'] == TRUE ? ($profile['content']['data']['last_name'] ? $profile['content']['data']['last_name'] : '')  : '')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Describe yourself as a host</label>
                                            <textarea class="form-control" name="description" id="description" cols="30"
                                                      rows="10">{{($profile['status'] == TRUE ?  ($profile['content']['data']['description'] ? $profile['content']['data']['description'] : ''):'')}}</textarea>
                                            <div id="result__words"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Club</label>
                                            <select name="club" id="club" data-live-search="true">
                                                <option value="0" disabled selected>Choose your club</option>
                                                @if($clubs['status'] == TRUE)
                                                    @foreach($clubs['content'] as $key => $club)
                                                        <optgroup label="{{$club['league_native']}}">
                                                            <?php $clubs_j = json_decode($club['clubs'], true); ?>
                                                            @foreach($clubs_j as $c)
                                                                @if($profile['content']['data']['club'])
                                                                    {{--<option data-tokens="{{$club['league_native']}}">{{$c}}</option>--}}
                                                                    <option data-tokens="{{$club['league_native']}}" {{( $c == $profile['content']['data']['club']  ? 'selected' :'')}}>{{$c}}</option>
                                                                @else
                                                                    <option data-tokens="{{$club['league_native']}}">{{$c}}</option>
                                                                @endif
                                                            @endforeach
                                                            {{--<option data-tokens="fcp">Futebol Clube do Porto</option>--}}
                                                        </optgroup>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Favorite Clubs</label>
                                            <select name="clubs[]" id="clubs" multiple data-live-search="true">
                                                <option value="0" disabled>Choose your clubs</option>
                                                @if($clubs['status'] == TRUE)
                                                    @foreach($clubs['content'] as $key => $club)
                                                        <optgroup label="{{$club['league_native']}}">
                                                            <?php $clubs_j = json_decode($club['clubs'], true); ?>
                                                            @foreach($clubs_j as $c)
                                                                @if($profile['status'] == TRUE)
                                                                    @if($profile['content']['data']['clubs'])
                                                                        <option data-tokens="{{$club['league_native']}}" {{( in_array($c,json_decode($profile['content']['data']['clubs'],TRUE) ) ? 'selected' :'')}}>{{$c}}</option>
                                                                    @else
                                                                        <option data-tokens="{{$club['league_native']}}">{{$c}}</option>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                            {{--<option data-tokens="fcp">Futebol Clube do Porto</option>--}}
                                                        </optgroup>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <button type="button" class="btn btn-link btn-sm" data-toggle="modal"
                                                    data-target="#myModalRequestClub">Can't find a club? Ask for it
                                                here!
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Do you accept fans from other clubs?</label>
                                            <select name="other_clubs" id="other_clubs">
                                                @if($profile['content']['data']['other_clubs'])
                                                    <option value="0" disabled selected>Choose</option>
                                                    <option value="1" {{($profile['content']['data']['other_clubs'] == 1 ? 'selected' : '')}}>
                                                        Yes
                                                    </option>
                                                    <option value="2" {{($profile['content']['data']['other_clubs'] == 2 ? 'selected' : '')}}>
                                                        No
                                                    </option>
                                                @else
                                                    <option value="0" disabled selected>Choose</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                @endif

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">What languages do you speak?</label>
                                            <select name="langs[]" id="langs" multiple data-live-search="true">
                                                <option value="0" disabled>Choose your languages</option>
                                                @foreach($languages as $key => $language)
                                                    @if($profile['content']['data']['languages'])
                                                        <option value="{{$key}}" {{( in_array($key,json_decode($profile['content']['data']['languages'],TRUE) ) ? 'selected' :'')}}>{{$language['name']}}
                                                            <small>({{$language['nativeName']}})</small>
                                                        </option>
                                                    @else
                                                        <option value="{{$key}}">{{$language['name']}}
                                                            <small>({{$language['nativeName']}})</small>
                                                        </option>
                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="formSubmit" class="btn btn-Transparent btn-full">
                                                Update
                                            </button>
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                </section>
                                <!-- Modal Request New Club -->
                                <div class="modal fade" id="myModalRequestClub" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalRequestClubLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Request new club</h4>
                                            </div>
                                            <form id="form_request_club">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12" id="errors-body-modal-request-clubs">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Club Name</label>
                                                        <input type="email" class="form-control" id="club_name"
                                                               name="club_name" placeholder="Crystal Palace">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Club League</label>
                                                        <input type="email" class="form-control" id="club_league"
                                                               name="club_league" placeholder="Premier League">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="button" onclick="openWarningClubInsertion()"
                                                            class="btn btn-primary">Request
                                                    </button>
                                                </div>
                                                {{csrf_field()}}
                                            </form>
                                        </div>
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

@section ('js')
    <script type="text/javascript">
        function handleClubInsertion(res) {
            let templatee = _.template($('#club-request-messages').html());
            if (res.status === false) {
                $('#errors-body-modal-request-clubs').html(templatee({type:'warning', messages : iterateMessages(res.content.message)}));
                return;
            }
            $('#errors-body-modal-request-clubs').html(templatee({type:'success', messages : iterateMessages(res.content.message)}));
            setTimeout(function(){ $('#myModalRequestClub').modal('toggle'); }, 3000);
        }

        function requestClubInsertion() {
            ajaxRequest(APP_URL_FULL + '/request/new-club', $('#form_request_club').serialize(), 'post', handleClubInsertion)
        }

        function openWarningClubInsertion() {
            requestClubInsertion();
        }

        $(function () {

            $('#form_edit').submit(function (evt) {
                evt.preventDefault();

                inputLoading('formSubmit');

                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    url: url,
                    method: "post", //First change type to method here
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        var msgs = format_json_messages(response.content.messages);
                        format_noty_alerts(msgs, 'success');
                        if (response.status == true) {
                            inputDone('formSubmit');
                            inputSuccess('formSubmit');
                            $.each(response.content.messages, function (k, v) {
                                snotices(v, 'green');
                            });
                        } else {
                            inputDone('formSubmit', false);
                            inputError('formSubmit');
                            $.each(response.content.messages, function (k, v) {
                                snotices(v, 'red');
                            });
                        }

                        console.log(response);
                    },
                    error: function () {
                        inputRed('formSubmit');
                    }

                });
            });
            $('#club').selectpicker();
            $('#clubs').selectpicker();
            $('#other_clubs').selectpicker();
            $('#langs').selectpicker();
        });
    </script>
@endsection

@section('templates')
    <script type="text/template" id="club-request-messages">
        <div class="alert alert-<%= type %>">
               <%= messages %>
        </div>
    </script>
@stop