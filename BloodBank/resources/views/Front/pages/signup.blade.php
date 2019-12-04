@inject('bloods', "App\BloodType")
@inject('governorates', "App\Governorate")
@inject('cities', "App\City")
@extends('Front.layouts.master')
@section('title')
    Sign Up
@endsection
@section('content')
    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Sign up</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Sign Up Start -->
    <section id="sign-up">
        <div class="container">
                <img src="{{asset('/Front/imgs/logo.png')}}" alt="">
                <form url="/client-signup" method="POST">
                    @csrf
                    <input name="name" type="name" class="@error('name') is_invalid @enderror" placeholder="Name" required>
                        @error('name')
                            <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small" class="small-box text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                        @enderror

                    <input name="e_mail" type="email" class="@error('e_mail') is_invalid @enderror" placeholder="Email" required>
                    @error('e_mail')
                        <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small" class="small-box text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </div>
                    @enderror

                    <input name="password" type="password" class="@error('password') is_invalid @enderror" placeholder="Password" required>
                    @error('password')
                        <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small" class="small-box text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </div>
                    @enderror

                    <input name="date_of_birth" type="date" class="@error('date_of_birth') is_invalid @enderror" placeholder="Birth date" required>
                        @error('date_of_birth')
                            <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small" class="small-box text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                        @enderror

                    <select name="blood_type_id" id="type" class="@error('blood_type_id') is_invalid @enderror" required>
                        <option>Blood Type</option>
                        @foreach($bloods->all() as $blood)
                            <option value="{{$blood->id}}">{{$blood->name}}</option>
                        @endforeach
                    </select>
                    @error('blood_type_id')
                    <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small" class="small-box text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror

                    <select name="governorate_id" id="governorate" class="@error('governorate_id') is_invalid @enderror" required>
                        <option>Governorates</option>
                        @foreach($governorates->all() as $governorate)
                            <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                        @endforeach
                    </select>
                    @error('governorate_id')
                    <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small" class="small-box text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror

                    <select name="city_id" id="city" class="@error('city_id') is_invalid @enderror" required>
                    </select>
                    @error('city_id')
                    <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small" class="small-box text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror

                    <input name="phone" type="Phone" class="@error('phone') is_invalid @enderror" placeholder="Phone Number" required>
                    @error('phone')
                    <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small" class="small-box text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror

                    <input name="last_donation_date" type="date" class="@error('last_donation_date') is_invalid @enderror" required>
                    @error('last_donation_date')
                    <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small" class="small-box text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror

                    <div class="reg-group">
                        <input class="check" type="checkbox" required="" style="height: auto; display:inline; margin: 0 auto;">Agree on terms and conditions<br>
                        <button class="submit" type="submit" style="background-color: rgb(51, 58, 65);">Submit</button>
                    </div>
                </form>
        </div>
    </section>
    <!-- Sign Up End -->
    @push('scripts')
        <script>
            $("#governorate").change(function (e) {
                var governorate_id  = $("#governorate").val();
                if(governorate_id){
                    $.ajax({
                        url : '{{url("/api/v1/cities?governorate_id=")}}' + governorate_id,
                        type : 'get',
                        success : function (data) {
                            if(data.status === 1){
                                $("#city").empty();
                                $("#city").append('<option value="">Cities</option>');
                                $.each(data.data.record, function (index, city) {
                                    $("#city").append('<option value="'+ city.id +'">'+ city.name +'</option>');
                                });
                            }

                        }
                    });
                }else{
                    $("#city").empty();
                    $("#city").append('<option value="">Cities</option>');
                }

            });
        </script>
    @endpush
@endsection
