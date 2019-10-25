@extends('pages.tmpl.master')

@section('content')
    <section class="mainContentSection recentActivitySection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2>Oh no!</h2>
                        @foreach($messages as $message)
                            <p>{{$message}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection