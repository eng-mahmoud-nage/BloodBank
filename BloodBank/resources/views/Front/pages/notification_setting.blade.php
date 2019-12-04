@inject('bloods', "App\BloodType")
@inject('governorates', "App\Governorate")
@inject('cities', "App\City")
@extends('Front.layouts.master')
@section('title')
    Notification Setting
@endsection
@section('content')
    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Notification Setting</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Notification Setting Start -->
        <div class="container">
                <form url="/notification_setting" method="POST">
                    @csrf
                    <div class="card" style="border-color:  rgba(142, 47, 55,0.7)">
                        <h5 class="card-header text-center font-weight-bold" style="background-color: rgba(142, 47, 55,0.7)">Notification Setting</h5>
                        <div class="card-body">
                            <label style="width: 70%; margin-left: 15%;" class="text-center">
                                {{$setting->notification_setting_text}}
                            </label>
                        </div>
                    </div><br>

                    <div class="card" style="border-color:  rgba(142, 47, 55,0.7)">
                        <h5 class="card-header text-center font-weight-bold" style="background-color: rgba(142, 47, 55,0.7)">Blood Types</h5>
                        <div class="card-body">
                            <div class="row">
                                @foreach($bloods->all() as $p)
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label style="width: 70%; margin-left: 15%" class="text-center">
                                                <input  type="checkbox" id="blood_types_id"  name="blood_types_id[]" value={{$p->id}}
                                                @forelse($blood_types as $record)
                                                @if($p->id == $record->id)
                                                    checked
                                                    @endif
                                                @empty
                                                    @endforelse
                                                >
                                                {{$p->name}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div><br>

                    <div class="card" style="border-color:  rgba(142, 47, 55,0.7)">
                        <h5 class="card-header text-center font-weight-bold" style="background-color: rgba(142, 47, 55,0.7)">Governorates</h5>
                        <div class="card-body">
                        <div class="row">
                            @foreach($governorates->all() as $p)
                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label style="width: 70%; margin-left: 15%" class="text-center">
                                            <input type="checkbox" id="governorates_id"  name="governorates_id[]" value={{$p->id}}
                                            @forelse($client_governorate as $record)
                                                @if($p->id === $record->id)
                                                    checked
                                                @endif
                                                @empty
                                            @endforelse
                                            >
                                            {{$p->name}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <button class="btn btn-dark"  type="submit">Submit</button>
                    </div>
                </form>
        </div>
    <!-- Notification Setting End -->
@endsection
