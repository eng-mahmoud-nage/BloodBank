@extends('Front.layouts.master')
@section('title')
    Articles
@endsection
@section('content')

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-main" style="color: darkred; display:inline-block;">/ Articles</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Disease Protection</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- article Start -->
    <section id="article">
        <div class="container">
            <img class="head-img" src="{{asset('/Front/'. $record->image)}}" alt="">
            <div class="details-container">
                <div class="title"> {{$record->title}} </div>
                <p> {{$record->content}} </p>
                <strong><a>Share this article:</a></strong>
                <div class="icons">
                    <i class="fab fa-facebook-square fa-3x"></i>
                    <i class="fab fa-google-plus-square fa-3x"></i>
                    <i class="fab fa-twitter-square fa-3x"></i>
                </div>

            </div>
        <!-- Articles Start -->
            @include('Front.inc.articles')
        <!-- Articles End -->
        </div>
    </section>
    <!-- Article End -->
@endsection
