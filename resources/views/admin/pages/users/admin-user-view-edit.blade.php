@extends('admin.tmpl.master')

@section('content')
    <input type="hidden" id="user_id" value="{{$user_id}}">
    <div class="container-fluid flex-grow-1 container-p-y">

        <!-- Header -->
        <section id="block1"></section>
        <!-- Header -->

        <div class="row">
            <div class="col-12">

                <!-- Info -->
                <section id="block2"></section>
                <!-- / Info -->

            </div>
        </div>

    </div>
@stop

@section('js')
    <script type="text/javascript">
        function template_block_1(content) {
            let template = _.template($('#block1-template').html());
            $('#block1').html(template);
        }

        function template_block_2(content) {
            let template = _.template($('#block2-template').html());
            $('#block2').html(template);
        }

        function handleRequest(res) {

        }

        $(function () {
            template_block_2();
            template_block_1();
            ajaxRequest(APP_URL_FULL, {_token: APP_TOKEN}, 'post', handleRequest)
        });
    </script>
@stop

@section('templates')
    <script id="block1-template" type="text/template">
        <div class="bg-white container-m--x container-m--y mb-4">
            <div class="media col-md-10 col-lg-8 col-xl-7 py-5 mx-auto">
                <img src="assets/img/avatars/5.png" alt="" class="d-block ui-w-100 rounded-circle">
                <div class="media-body ml-5">
                    <h4 class="font-weight-bold mb-4">Nellie Maxwell</h4>

                    <div class="text-muted mb-4">
                        Lorem ipsum dolor sit amet, nibh suavitate qualisque ut nam. Ad harum primis electram duo, porro
                        principes ei has.
                    </div>

                    <a href="javascript:void(0)" class="d-inline-block text-dark">
                        <strong>234</strong>
                        <span class="text-muted">followers</span>
                    </a>
                    <a href="javascript:void(0)" class="d-inline-block text-dark ml-3">
                        <strong>111</strong>
                        <span class="text-muted">following</span>
                    </a>
                </div>
            </div>
            <hr class="m-0">
        </div>
    </script>
    <script id="block2-template" type="text/template">
        <div class="card mb-4">
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-md-3 text-muted">Birthday:</div>
                    <div class="col-md-9">
                        May 3, 1995
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3 text-muted">Country:</div>
                    <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-dark">Canada</a>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3 text-muted">Languages:</div>
                    <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-dark">English</a>
                    </div>
                </div>

                <h6 class="my-3">Contacts</h6>

                <div class="row mb-2">
                    <div class="col-md-3 text-muted">Phone:</div>
                    <div class="col-md-9">
                        +0 (123) 456 7891
                    </div>
                </div>

                <h6 class="my-3">Interests</h6>

                <div class="row mb-2">
                    <div class="col-md-3 text-muted">Favorite music:</div>
                    <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-dark">Rock</a>,
                        <a href="javascript:void(0)" class="text-dark">Alternative</a>,
                        <a href="javascript:void(0)" class="text-dark">Electro</a>,
                        <a href="javascript:void(0)" class="text-dark">Drum &amp; Bass</a>,
                        <a href="javascript:void(0)" class="text-dark">Dance</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-muted">Favorite movies:</div>
                    <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-dark">The Green Mile</a>,
                        <a href="javascript:void(0)" class="text-dark">Pulp Fiction</a>,
                        <a href="javascript:void(0)" class="text-dark">Back to the Future</a>,
                        <a href="javascript:void(0)" class="text-dark">WALL·E</a>,
                        <a href="javascript:void(0)" class="text-dark">Django Unchained</a>,
                        <a href="javascript:void(0)" class="text-dark">The Truman Show</a>,
                        <a href="javascript:void(0)" class="text-dark">Home Alone</a>,
                        <a href="javascript:void(0)" class="text-dark">Seven Pounds</a>
                    </div>
                </div>

            </div>
            <div class="card-footer text-center p-0">
                <div class="row no-gutters row-bordered row-border-light">
                    <a href="javascript:void(0)" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">24</div>
                        <div class="text-muted small">posts</div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">51</div>
                        <div class="text-muted small">videos</div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">215</div>
                        <div class="text-muted small">photos</div>
                    </a>
                </div>
            </div>
        </div>
    </script>
    <script id="block3" type="text/template"></script>
    <script id="block4" type="text/template"></script>
    <script id="block5" type="text/template"></script>
@stop