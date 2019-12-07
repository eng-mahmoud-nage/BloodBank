@inject('bloods', "App\BloodType")
@inject('governorates', "App\Governorate")
@inject('cities', "App\City")
@extends('Front.layouts.master')
@section('title')
    New Request
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
            <form url="/new_request" method="POST">
                @csrf
                <input name="name" type="text" class="@error('name') is_invalid @enderror" placeholder="Name" required>
                @error('name')
                <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small"
                     class="small-box text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </div>
                @enderror

                <input name="age" type="text" class="@error('age') is_invalid @enderror" placeholder="Age" required>
                @error('age')
                <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small"
                     class="small-box text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </div>
                @enderror

                <input name="bags_num" type="text" class="@error('bags_num') is_invalid @enderror"
                       placeholder="Bags Num" required>
                @error('bags_num')
                <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small"
                     class="small-box text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </div>
                @enderror

                <input name="hospital_name" type="text" class="@error('hospital_name') is_invalid @enderror"
                       placeholder="Hospital Name" required>
                @error('hospital_name')
                <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small"
                     class="small-box text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </div>
                @enderror

                <input name="hospital_address" type="text" class="@error('hospital_address') is_invalid @enderror"
                       placeholder="Hospital Address" required>
                @error('hospital_address')
                <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small"
                     class="small-box text-danger" role="alert">
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
                <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small"
                     class="small-box text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </div>
                @enderror

                <select name="governorate_id" id="governorate" class="@error('governorate_id') is_invalid @enderror"
                        required>
                    <option>Governorates</option>
                    @foreach($governorates->all() as $governorate)
                        <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                    @endforeach
                </select>
                @error('governorate_id')
                <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small"
                     class="small-box text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </div>
                @enderror

                <select name="city_id" id="city" class="@error('city_id') is_invalid @enderror" required>
                </select>
                @error('city_id')
                <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small"
                     class="small-box text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </div>
                @enderror

                <input name="phone" type="text" class="@error('phone') is_invalid @enderror" placeholder="Phone Number"
                       required>
                @error('phone')
                <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small"
                     class="small-box text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </div>
                @enderror

                <textarea name="notes" class="@error('notes') is_invalid @enderror" placeholder="Your Notes"></textarea>
                @error('notes')
                <div style="width: 70%; height: 20px; margin-left: 16%; font-size: x-small"
                     class="small-box text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </div>
                @enderror

                <div class="reg-group">
                    <button class="submit" type="submit" style="background-color: rgb(51, 58, 65);">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Sign Up End -->
    @push('scripts')
        <script>
            $("#governorate").change(function (e) {
                var governorate_id = $("#governorate").val();
                if (governorate_id) {
                    $.ajax({
                        url: '{{url("/api/v1/cities?governorate_id=")}}' + governorate_id,
                        type: 'get',
                        success: function (data) {
                            if (data.status === 1) {
                                $("#city").empty();
                                $("#city").append('<option value="">Cities</option>');
                                $.each(data.data.record, function (index, city) {
                                    $("#city").append('<option value="' + city.id + '">' + city.name + '</option>');
                                });
                            }

                        }
                    });
                } else {
                    $("#city").empty();
                    $("#city").append('<option value="">Cities</option>');
                }

            });
        </script>
    @endpush
@endsection
