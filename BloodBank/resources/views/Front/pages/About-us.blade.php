@extends('Front.layouts.master')
@section('title')
    About Us
@endsection
@section('content')

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / About Us</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Who Start -->
    <section id="who">
        <div class="container">
                <img src="{{asset('/Front/imgs/logo.png')}}" alt="">
                <p> {{$setting->about_us}} </p>
        </div>
    </section>
    <!-- Who End -->
@endsection
