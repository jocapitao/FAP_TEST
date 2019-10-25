@extends('pages.tmpl.master')

@section('content')
    <section class="mainContentSection singleHotel">
        <div class="container">
            <div class="row ">
                <div class="col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <div id="package-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    {{--<div class="item">--}}
                                    {{--<img alt="First slide" src="http://local.fansandplaces:8081/images/houses/73a5650df76975c22fe51caaffbb6172-index.jpg">--}}
                                    {{--</div>--}}
                                    {{--<div class="item">--}}
                                    {{--<img alt="Second slide" src="">--}}
                                    {{--</div>--}}
                                    {{--<div class="item active">--}}
                                    {{--<img alt="Third slide" src="">--}}
                                    {{--</div>--}}
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="description-aria">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="rooms-types-aria">
                                <div class="sectionTitle2">
                                    <h2>House Attributes</h2>
                                    <p>Discover what this house offers!</p>
                                </div>
                                <div id="rules_"></div>
                                <div id="rooms_"></div>
                                <div id="attributes"></div>
                                <div id="transport_provider"></div>
                                <div id="meals"></div>
                                <div id="night_fun"></div>
                                <div id="visits"></div>
                                <div id="transport"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="location-aria">
                                <div class="sectionTitle2">
                                    <h2>Location</h2>
                                </div>
                                <div class="google-maps">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12039.761538190085!2d-8.614766259382245!3d41.026560190451335!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd24799cf9ef0dbf%3A0xfb5a20b370d75ee0!2sWeCreateYou!5e0!3m2!1sen!2spt!4v1541783092515"
                                            width="600" height="450" frameborder="0" style="border:0"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="review-aria">
                                <div class="sectionTitle2">
                                    <h2>Reviews</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                </div>
                                <div class="reviewContent">
                                    <h3 class="reviewTitle">
                                        Reviews (3)
                                        <span>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                        </span>
                                    </h3>

                                    <div class="reviewMedia">
                                        <ul class="media-list">

                                        </ul>
                                    </div>
                                    <div id="formReview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="col-sm-4 col-xs-12">
                    <div class="singleCartSidebar">
                        <div class="panel panel-default">
                            <div class="panel-heading">Check availability</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <form class="form-horizontal" id="formCheckout" method="post"
                                              action="{{url('checkout')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-12 col-xs-4"
                                                       for="inputSuccess3">Check in/out:</label>
                                                <div class="col-md-8 col-sm-12 col-xs-8 datepickerWrap">
                                                    <input id="available_days"
                                                           class="calendar-input flatpickr flatpickr-input active form-control"
                                                           type="text" name="available_days[]"
                                                           placeholder="{{__('host.select_date_placeholder')}}"
                                                           readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-12 col-xs-4"
                                                       for="inputSuccess3">Guests:</label>
                                                <div class="col-md-8 col-sm-12 col-xs-8 datepickerWrap">
                                                    <div class="count-input">
                                                        <a class="incr-btn" data-action="decrease" data-info="house"
                                                           href="#">–</a>
                                                        <input type="hidden" id="max_guests">
                                                        <input class="quantity" id="nr_guests" name="nr_guests"
                                                               type="text" value="1">
                                                        <a class="incr-btn" data-action="increase" data-info="house"
                                                           href="#">+</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="totalCost">
                                                <div style="margin-left:0px" class="row" id="shared_space">

                                                </div>
                                                <div style="margin-left:0px" class="row" id="transport">
                                                </div>
                                                <div style="margin-left:0px" class="row" id="airport_transport">
                                                </div>
                                                <div style="margin-left:0px" class="row" id="meals">
                                                </div>
                                                <div style="margin-left:0px" class="row" id="night_fun">
                                                </div>
                                                <div style="margin-left:0px" class="row" id="visits">
                                                </div>
                                                <div style="margin-left:0px" class="row " id="cleaning_fee">
                                                </div>
                                                <div style="margin-left:0px" class="row " id="per_">
                                                </div>
                                                <input type="hidden" id="house_id" name="house_id">
                                                <div class="col-xs-8 totalCostLeft">
                                                    <p>Total</p>
                                                </div>
                                                <div class="col-xs-4 totalCostRight"></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-block buttonTransparent">Checkout
                                                    now <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <div id="teste"></div>
    <input type="hidden" id="current_total">
    <input type="hidden" id="base_total">
@endsection

@section('js')
    <script type="text/javascript">
        $('.mainContentSection').loading({
            message: 'Preparing Greatness...',
            shownClass: 'loader-top',
        });

        function requestReviews () {
                ajaxRequest(APP_URL_FULL+'/reviews', {}, 'get', templateReviews);
        }

        function templateReviews(res){
            if(res.status === false){
                alert();
                return;
            }
            let template = _.template($('#reviews').html());
            $('.media-list').html(template({reviews : res.content.reviews}));
        }

        $(function () {
            $('#teste').raty({
                path:APP_URL+'/vendors/bower_components/raty/lib/images',
                scoreName: 'rating',
                half: true,
                halfShow:true,
                hints:       ['bad', 'poor', 'regular', 'good', 'gorgeous']
            });

            requestReviews();
            requestHouseRules(templateHouseRules);

            $.ajax({
                url: '{{url()->current()}}',
                method: "post", //First change type to method here
                data: {slug: '{{$slug}}', _token: '{{csrf_token()}}'},
                // dataType: 'json',
                success: function (data) {
                    templateHouse(data);
                    $('[data-toggle="tooltip"]').tooltip();
                },
                error: function () {
                    console.log('error')
                }

            });
        });
    </script>
@endsection

@section('templates')
    <script type="text/template" id="reviews">
        <% _.each(reviews, function(review){ %>
        <li class="media">
            <div class="media-body">
                <h5 class="media-heading"><%= review.auther_user.name %></h5>
                <span>
                    <% let r = Math.random().toString(36).substring(7) %>
                    <div id="<%= r %>"></div>
                    <% jQuery('#'+r).raty('score', review.rating) %>
                </span>
                <p><%= review.message %> </p>
            </div>
        </li>
        <% }); %>
    </script>
    <script type="text/template" id="reviewForm">
        <form action="" method="POST" role="form" class="commentsForm">
            <h3 class="reviewTitle">Leave your review</h3>
            <p>Want to Rate it?
                <span>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-0" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
              </span>
            </p>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <textarea name="text" class="form-control" rows="3" placeholder="Comment"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn buttonCustomPrimary">submit</button>
        </form>
    </script>
    <script type="text/template" id="reviewWithSuccess"></script>
    <script type="text/template" id="reviewedWithFail"></script>

    <script type="text/template" id="rulesTemplate">
        <div class="sub-title">
            <h4>Rules</h4>
        </div>
        <% _.each(rules,function(rule){ %>
    <%= rule.name %> <br>
<% }); %>
</script>
@endsection