@inject('bloods', "App\BloodType")
@inject('cities', "App\City")
@extends('Front.layouts.master')
@section('title')
    Donation Requests
@endsection
@section('content')
    <!-- Requests Start -->
        @include('Front.inc.donations')
    <!-- Requests End -->
@endsection
