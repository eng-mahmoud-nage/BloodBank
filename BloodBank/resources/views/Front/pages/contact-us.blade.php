@extends('Front.layouts.master')
@section('title')
    Contact Us
@endsection
@section('content')

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Contact Us</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- login Start -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 call">
                    <div class="title">Head</div>
                    <img src="{{asset('/Front/imgs/logo.png')}}" alt="">
                    <hr>
                    <h4>Mobile: {{$setting->phone}}</h4>
                        <h4>Fax: {{$setting->fax}}</h4>
                            <h4>Email: {{$setting->e_mail}}</h4>
                                <hr>
                                <h3>Find Us On</h3>
                                <div class="icons">
                                    <i class="fab fa-facebook-square fa-3x"></i>
                                    <i class="fab fa-google-plus-square fa-3x"></i>
                                    <i class="fab fa-twitter-square fa-3x"></i>
                                    <i class="fab fa-whatsapp-square fa-3x"></i>
                                    <i class="fab fa-youtube-square fa-3x"></i>
                                </div>
                </div>
                <div class="col-md-6 info">
                    <div class="title">Head</div>
                    <form url="/contact_us" >
                        <input type="text" name="name" id="" placeholder="Name" required="">
                        <input type="email" name="e_mail" id="" placeholder="Email" required="">
                        <input type="number" name="phone" id="" placeholder="Phone" required="">
                        <input type="text" name="subject" id="" placeholder="Title" required="">
                        <textarea name="message" id="" cols="10" rows="5" placeholder="Message"></textarea>
                        <div class="reg-group">
                            <button type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- login End -->
@endsection
