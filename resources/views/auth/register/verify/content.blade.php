@extends('pages.tmpl.master')

@section('content')
    <section class="profileSection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h3 class="display-4">{{$title}}</h3>
                        <hr class="my-4">
                        {!! $content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection