@extends('Front.layouts.master')
@section('title')
    {{config('app.name', 'Blood Bank')}}
@endsection
@section('content')
    <!-- Header Start -->
    <section id="header">
{{--        <div class="container">--}}
{{--             <h1>We are seeking for a better community health.</h1>--}}
{{--            <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora repellat inventore nemo repudiandae--}}
{{--                ipsum quos.</h4>--}}
{{--            <button class="btn more" onclick= "window.location.href = '{{url('/about_us')}}';">More</button>--}}
{{--        </div>--}}
    </section>
    <!-- Header End -->

    <!-- Sub Header Start -->
    <section id="sub-header">
        <div class="container">
            <h3>A SINGLE PINT CAN SAVE THREE LIVES, A SINGLE GESTURE CAN CREATE A MILLION SMILES.</h3>
        </div>
    </section>
    <!-- Sub Header End -->

    <!-- Articles Start -->
    @include('Front.inc.articles')
    <!-- Articles End -->

    <!-- Requests Start -->
        @include('Front.inc.donations')
    <!-- Requests End -->

    <!-- Call us Start -->
    <section id="call-us">
        <div class="layer">
            <div class="container">
                <h1>Call Us</h1>
                <h4>You can call us for your inquiries about any information.</h4>
                <div class="whats">
                    <img src="{{asset('/Front/imgs/whats.png')}}" alt="">
                    <h3>{{$setting->phone}}</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Call us End -->

    <!-- App Start -->
    <section id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="info">
                        <h1>Blood Bank Application</h1>
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae earum officiis et eligendi nam
                            harum corporis saepe deserunt.</h3>
                        <h4>Available On</h4>
                        <img src="{{asset('/Front/imgs/ios.png')}}" alt="">
                        <img src="{{asset('/Front/imgs/google.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="app-screen" src="{{asset('/Front/imgs/App.png')}}" alt="">
                </div>
            </div>
        </div>
        <!-- Example split danger button -->
    </section>
    <!-- App End -->
@endsection
