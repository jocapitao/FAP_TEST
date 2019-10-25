@extends('pages.tmpl.master')

@section('content')
    <section class="bannercontainer">

        <div id="rev_slider_wrapper3" class="rev_slider_wrapper fullscreen-container" data-alias="christmas-snow-scene"
             data-source="gallery" style="background-color:transparent;padding:0px;">
            <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
            <div id="rev_video_slider" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                <ul>
                    <!-- LAYERS -->

                    <!-- BACKGROUND VIDEO LAYER -->
                    <li data-index="rs-2896" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                        data-masterspeed="3000" data-thumb="../../assets/images/vimeobg-100x50.jpg" data-rotate="0"
                        data-saveperformance="off" data-title="Intro" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <div class="tp-caption tp-resizeme tp-videolayer" id="slide-1-layer-2"

                             data-actions='[{
                                "event": "mouseenter",
                                "action": "playvideo",
                                "layer": "slide-1-layer-2",
                                "delay": "0"
                            }]'

                             data-frames='[{"delay": 0, "speed": 300, "from": "opacity: 0", "to": "opacity: 1"},
                   {"delay": "wait", "speed": 300, "to": "opacity: 0"}]'

                             data-type="video"
                             data-videomp4="{{url('videos/30867067-preview.mp4')}}"
                             data-videowidth="100%"
                             data-videoheight="800"
                             data-autoplay="on"
                             data-videocontrols="none"
                             data-nextslideatend="true"
                             data-forcerewind="on"
                             data-videoloop="loopandnoslidestop"
                             data-allowfullscreenvideo="false"
                             data-videopreload="metadata"

                             data-x="center"
                             data-y="center"
                             data-hoffset="0"
                             data-voffset="0"
                             data-basealign="slide">

                            <div>
                            </div>
                        </div>
                    </li>

                    <li data-index="rs-2896" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                        data-masterspeed="3000" data-thumb="../../assets/images/vimeobg-100x50.jpg" data-rotate="0"
                        data-saveperformance="off" data-title="Intro" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        {{--<img src="img/home/slider/slider-07.jpg" alt="" data-bgposition="center center"--}}
                        {{--data-bgfit="cover" data-bgparallax="10" class="rev-slidebg" data-no-retina>--}}
                        <img src="{{asset('images/home_page/slide_1.jpg') }}" alt="" data-bgposition="center center"
                             data-bgfit="cover" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                    </li>


                </ul>


            </div><!-- END REVOLUTION SLIDER -->
        </div>
    </section>




    <section class="searchDestinationSection">
        <div class="container">
            <div class="headingTitle">
                <h2>Search <span>Your Destination</span></h2>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="searchDestination">
                        <ul class="nav nav-tabs ">
                            <li class="active">
                                <a data-toggle="tab" href="#destination"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>Destinations</span></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#clubs"><i class="fa fa-tshirt" aria-hidden="true"></i><span>Clubs</span></a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div id="destination" class="tab-pane fade in active">
                                <form method="" action="">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="typeKeyword">Search</label>
                                                <input type="text" class="form-control" id="typeKeyword"
                                                       placeholder="Type Destination">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="searchHotel">
                                                <label for="typeKeyword">Destination</label>
                                                <select name="guiest_id2" id="guiest_id2" class="select-drop">
                                                    <option value="0">Your Destination</option>
                                                    <option value="1">AFRICA</option>
                                                    <option value="2">ASIA</option>
                                                    <option value="3">EUROPE</option>
                                                    <option value="4">RUSSIA</option>
                                                    <option value="5">SOUTH AMERICA</option>
                                                    <option value="6">USA</option>
                                                    <option value="7">UK</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-12">
                                            <label class="marginTop" for="typeKeyword">Check in date</label>
                                            <div class="date-picker-custom">
                                                <div class="input-group date ed-datepicker filterDate"
                                                     data-provide="datepicker">
                                                    <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="searchHotel">
                                                <label class="marginTop" for="typeKeyword">Guests</label>
                                                <input type="number" class="form-control" id="GuestNumbers"
                                                       placeholder="Number of guests">

                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="searchbtn">
                                                <button type="submit" class="btn btn-default">Search by Destination</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>




                            <div id="clubs" class="tab-pane">
                                <form method="" action="">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="typeKeyword">Search</label>
                                                <input type="text" class="form-control" id="typeKeyword"
                                                       placeholder="Type Club">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="searchHotel">
                                                <label for="typeKeyword">Region</label>
                                                <select name="guiest_id2" id="guiest_id2" class="select-drop">
                                                    <option value="0">Club Region</option>
                                                    <option value="1">AFRICA</option>
                                                    <option value="2">ASIA</option>
                                                    <option value="3">EUROPE</option>
                                                    <option value="4">RUSSIA</option>
                                                    <option value="5">SOUTH AMERICA</option>
                                                    <option value="6">USA</option>
                                                    <option value="7">UK</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-xs-12">
                                            <label class="marginTop" for="typeKeyword">Check in date</label>
                                            <div class="date-picker-custom">
                                                <div class="input-group date ed-datepicker filterDate"
                                                     data-provide="datepicker">
                                                    <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="searchHotel">
                                                <label class="marginTop" for="typeKeyword">Guests</label>
                                                <input type="number" class="form-control" id="GuestNumbers"
                                                       placeholder="Number of guests">

                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="searchbtn">
                                                <button type="submit" class="btn btn-default">Search by Clubs</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
        </div>
    </section>


    <!-- CALENDAR & HIGHLIGHTS SECTION -->
    <section class="lastestHighlights ptb-100">
        <div class="container">
            <div class="sectionTitleHomeCity">
                <h2>Calendar & Highlights of the week</h2>
                <p>Know what games are on the way, plan what you want to watch.</p>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <iframe frameborder="0"  scrolling="no" width="520" height="440" src="https://www.fctables.com/championsleague/iframe/?type=league-scores&lang_id=2&country=5&stage=&timezone=Europe/Lisbon&time=24&width=520&height=440&font=Verdana&fs=12&lh=22&bg=FFFFFF&fc=333333&logo=1&tlink=1&scoreb=f4454f&scorefc=FFFFFF&sgdcoreb=8f8d8d&sgdcorefc=FFFFFF&sh=1&hfb=1&hbc=f20e0e&hfc=FFFFFF"></iframe><div style="text-align:center;"></div><a href="https://www.fctables.com/championsleague/" rel="nofollow"></a>
                </div>

                <div class="col-sm-6 col-xs-12">
                    <iframe src="https://www.scorebat.com/embed/" frameborder="0" scrolling="yes" width="300" height="460" allowfullscreen  allow="autoplay; fullscreen" style="width:300px;height:460px;overflow:hidden;display:block;" class="_scorebatEmbeddedPlayer_"></iframe><script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = 'https://www.scorebat.com/embed/embed.js?v=mto';
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'scorebat-jssdk'));</script>
                </div>
            </div>
    </section>

    <!-- OUR PACKAGES SECTION -->
    <section class="ourPackagesSection ptb-100">
        <div class="container">
            <div class="sectionTitleHomeCity">
                <h2>our packages</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="ourPackage">
                        <div class="ourPackageImg">
                            <img src="img/experiences/gastronomy.jpg" alt="">
                        </div>
                        <div class="ourPackageContent">
                            <h4>Local Gastronomy</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="ourPackage">
                        <div class="ourPackageImg">
                            <img src="img/experiences/sightseeing.jpg" alt="">
                        </div>
                        <div class="ourPackageContent">
                            <h4>Sightseeing</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="ourPackage">
                        <div class="ourPackageImg">
                            <img src="img/experiences/localsportbars.jpg" alt="">
                        </div>
                        <div class="ourPackageContent">
                            <h4>Local Sports Bars</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- NEXT TRAVEL SECTION -->
    <section class="nextTravelSection ptb-100"
             style="background-image: url({{asset('images/home_page/slide_2.jpg')}});">
        <div class="container">
            <div class="sectionTitleHomeCity2">
                <h2>Be a part of the biggest fan community!</h2>
                <p>Don't miss another game and make money renting your house.</p>
            </div>
            <div class="content">
                <ul class="nextTravelContent">
                    <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Meet other sport enthusiasts!</li>
                </ul>
                <a href="single-package-right-sidebar.html" class="btn buttonCustomPrimary">Rent your house now!</a>
            </div>
        </div>
    </section>

    <!-- TOP HOTEL SECTION -->
    <section class="topHotelSection ptb-100">
        <div class="container">
            <div class="sectionTitleHomeCity">
                <h2>TOP HOUSES</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xs-12">
                    <div class="thumbnail deals">
                        <img src="img/holets/hotel-list-10.jpg" alt="Hotel-image">
                        <a href="single-hotel-right-sidebar.html" class="pageLink"></a>
                        <div class="discountInfo discountCol-3">
                            <ul class="list-inline rating homePage">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                            <ul class="list-inline duration">
                                <li>5 Review</li>
                            </ul>
                        </div>
                        <div class="caption">
                            <a href="single-hotel-right-sidebar.html" class="captionTitle"><h4>Marriott Hotel
                                    London</h4></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>Per night</span>
                                    $150
                                </h5>
                                <ul class="list-inline detailsBtn">
                                    <li><a href="booking-1.html" class="btn buttonTransparent">Book now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xs-12">
                    <div class="thumbnail deals">
                        <img src="img/holets/hotel-list-11.jpg" alt="Hotel-image">
                        <a href="single-hotel-right-sidebar.html" class="pageLink"></a>
                        <div class="discountInfo discountCol-3">
                            <ul class="list-inline rating homePage">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            </ul>
                            <ul class="list-inline duration">
                                <li>5 Review</li>
                            </ul>
                        </div>
                        <div class="caption">
                            <a href="single-hotel-right-sidebar.html" class="captionTitle"><h4>Marriott Hotel
                                    London</h4></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>Per night</span>
                                    $150
                                </h5>
                                <ul class="list-inline detailsBtn">
                                    <li><a href="booking-1.html" class="btn buttonTransparent">Book now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xs-12">
                    <div class="thumbnail deals">
                        <img src="img/holets/hotel-list-12.jpg" alt="Hotel-image">
                        <a href="single-hotel-right-sidebar.html" class="pageLink"></a>
                        <div class="discountInfo discountCol-3">
                            <ul class="list-inline rating homePage">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            </ul>
                            <ul class="list-inline duration">
                                <li>5 Review</li>
                            </ul>
                        </div>
                        <div class="caption">
                            <a href="single-hotel-right-sidebar.html" class="captionTitle"><h4>Marriott Hotel
                                    London</h4></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>Per night</span>
                                    $150
                                </h5>
                                <ul class="list-inline detailsBtn">
                                    <li><a href="booking-1.html" class="btn buttonTransparent">Book now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TOP DESTINATION SECTION -->
    <section class="topDestinationSection" style="margin-bottom:50px;">
        <div class="container">
            <div class="sectionTitleHomeCity">
                <h2>top destinationS</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="row">
                <div class="col-sm-2 col-xs-6">
                    <div class="destinationContent">
                        <a href="destination-single-city.html"><img
                                    src="img/home-destination/destination/destination-img-01.jpg" alt="Image">
                            <h5>Australia</h5>
                            <p>Opera House</p>
                        </a>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="destinationContent">
                        <a href="destination-single-city.html">
                            <img src="img/home-destination/destination/destination-img-02.jpg" alt="Image">
                            <h5>America</h5>
                            <p>Statue of Liberty</p>
                        </a>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="destinationContent">
                        <a href="destination-single-city.html">
                            <img src="img/home-destination/destination/destination-img-03.jpg" alt="Image">
                            <h5>London</h5>
                            <p>Big Ben Watch</p>
                        </a>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="destinationContent">
                        <a href="destination-single-city.html">
                            <img src="img/home-destination/destination/destination-img-04.jpg" alt="Image">
                            <h5>Russia</h5>
                            <p>Moxco Tower</p>
                        </a>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="destinationContent">
                        <a href="destination-single-city.html">
                            <img src="img/home-destination/destination/destination-img-05.jpg" alt="Image">
                            <h5>India</h5>
                            <p>Tajmahal</p>
                        </a>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="destinationContent">
                        <a href="destination-single-city.html">
                            <img src="img/home-destination/destination/destination-img-06.jpg" alt="Image">
                            <h5>France</h5>
                            <p>Eiffel Tower</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PACKAGE SAlE SECTION -->
    <section class="packageSAleSection ptb-100"
             style="background-image: url({{asset('images/home_page/slide_3.jpg')}});">
        <div class="container">
            <div class="sectionTitleHomeCity2">
                <h2>10% OFF THE FIRST BOOKING</h2>
                <p></p>
            </div>
            <div class="buttonSale">
                <a href="booking-1.html" class="btn buttonCustomPrimary">Book now</a>
            </div>
        </div>
    </section>

    {{--SPONSOR SECTION--}}
    <!-- BRAND SLIDER SECTION -->
    {{--<section class="brandSliderSection bg-ash">
        <div class="container">
            <div class="brandSlider">
                <div class="singleItem">
                    <img src="img/home-destination/slider/logo-01.png" alt="image">
                </div>
                <div class="singleItem">
                    <img src="img/home-destination/slider/logo-02.png" alt="image">
                </div>
                <div class="singleItem">
                    <img src="img/home-destination/slider/logo-03.png" alt="image">
                </div>
                <div class="singleItem">
                    <img src="img/home-destination/slider/logo-04.png" alt="image">
                </div>
                <div class="singleItem">
                    <img src="img/home-destination/slider/logo-01.png" alt="image">
                </div>
                <div class="singleItem">
                    <img src="img/home-destination/slider/logo-02.png" alt="image">
                </div>
                <div class="singleItem">
                    <img src="img/home-destination/slider/logo-03.png" alt="image">
                </div>
                <div class="singleItem">
                    <img src="img/home-destination/slider/logo-04.png" alt="image">
                </div>
            </div>
        </div>
    </section>--}}

    <!-- Modal Video -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="iframeYoutube" class="embed-responsive-item"
                                src="https://www.youtube.com/embed/KOSYSxJfMoc" frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(function(){
            window.setInterval(function(){
                if($('video')){
                    // try{
                        $('video').get(0).play();
                    // }
                }
            }, 500);
        });
    </script>
@endsection