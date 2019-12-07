@inject('bloods', "App\BloodType")
@inject('cities', "App\City")
@inject('records', "App\DonationRequest")
    <!-- Requests Start -->
    <section id="requests">
        <div class="title">
            <h2>Donations</h2>
            <hr class="line">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <select name="select_blood" id="">
                        <option value="" disabled selected>Select Blood Type</option>
                        @foreach($bloods->all() as $blood)
                            <option value="{{$blood->id}}">{{$blood->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-5">
                    <select name="City" id="">
                        <option value="" disabled selected>Select City</option>
                        @foreach($cities->all() as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search">
                    <button><i class="col-lg-2 fas fa-search"></i></button>
                </div>
            </div>
            @foreach($records->paginate(4)->load('blood_type', 'city') as $record)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="type">
                                    <h2>{{$record->blood_type->name}}</h2>
                                </div>
                            </div>
                            <div class="data col-lg-6">
                                <h4>Name: {{$record->name}}</h4>
                                <h4>Hospital: {{$record->hospital_name}}</h4>
                                <h4>City: {{$record->city->name}}</h4>
                            </div>
                            <div class="col-lg-3">
                                <button onclick= "window.location.href = '{{url('/donator', $record->id)}}';">Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="float-left">
                {{$records->paginate(4)->links()}}
            </div>
        </div>

    </section>
    <!-- Requests End -->
