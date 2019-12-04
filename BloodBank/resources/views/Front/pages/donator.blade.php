@extends('Front.layouts.master')
@section('title')
    Donation
@endsection
@section('content')

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-main" style="color: darkred; display:inline-block;">/ Donations</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Donator Details</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- donator Start -->
    <section id="donator">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name:</th>
                            <td>{{$record->name}}</td>
                        </tr>
                        <tr>
                            <th>Age:</th>
                            <td>{{$record->age}}</td>
                        </tr>
                        <tr>
                            <th>Hospital:</th>
                            <td>{{$record->hospital_name}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Blood Type:</th>
                        <td>{{$record->blood_type->name}}</td>
                    </tr>
                    <tr>
                        <th>Number of Required Blood Bags:</th>
                        <td>{{$record->bags_num}}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{$record->phone}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Hospital Address:</th>
                        <td>{{$record->hospital_address}}</td>
                    </tr>
                </table>
            </div>
            </div>
            <div class="details-container">
                <p> {{$record->notes}} </p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13648.620397637154!2d29.9420796!3d31.2164321!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8476f62bb5008c82!2sAndalusia%20Smouha%20Hospital!5e0!3m2!1sen!2seg!4v1567936654125!5m2!1sen!2seg"
                width="1000" height="550" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </section>
    <!-- Who End -->
@endsection
