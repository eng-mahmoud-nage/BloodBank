@extends('admin.dashboard')
@section('title')
    Donation
@endsection

@section('content')

    <div class="card"  style="width: 50%; margin-left: 25%">        <!-- /.card-header -->
                        <div class="card bg-gradient-primary">
                            <div class="card-header" style="border-bottom: 1px solid #000">
                                <h3 class="card-title">Donation Request</h3>

                                <div class="card-tools">
                                    <a href="{{url(route('donation.index'))}}" class="btn btn-tool">
                                        <i class="fa fa-arrow-alt-circle-right"></i>
                                    </a>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body justify-content-center row">
                                <div class="col-md-4">
                                    <label> Name: </label><br>
                                    <label> E_mail: </label><br>
                                    <label> Bags Num: </label><br>
                                    <label> Hospital Name: </label><br>
                                    <label> Hospital Address: </label><br>
                                    <label> Blood Type: </label><br>
                                    <label> City: </label><br>
                                </div>
                                <div class="col-md-6">
                                    <label style="box-shadow: -2px -3px 3px #127CFA inset; width:100%; text-align: center">
                                        {{$record->name}}
                                    </label>
                                    <label style="box-shadow: -2px -3px 3px #127CFA inset; width: 100%; text-align: center">
                                        {{$record->age}}
                                    </label>
                                    <label style="box-shadow: -2px -3px 3px #127CFA inset; width: 100%; text-align: center">
                                        {{$record->bags_num}}
                                    </label>
                                    <label style="box-shadow: -2px -3px 3px #127CFA inset; width: 100%; text-align: center">
                                        {{$record->hospital_name}}
                                    </label>
                                    <label style="box-shadow: -2px -3px 3px #127CFA inset; width: 100%; text-align: center">
                                        {{$record->hospital_address}}
                                    </label>
                                    <label style="box-shadow: -2px -3px 3px #127CFA inset; width: 100%; text-align: center">
                                        {{$record->blood_type()->where('id', $record->blood_type_id)->pluck('name')[0]}}
                                    </label>
                                    <label style="box-shadow: -2px -3px 3px #127CFA inset; width: 100%; text-align: center">
                                        {{$record->city()->where('id', $record->city_id)->pluck('name')[0]}}
                                    </label>
                            </div>
                            <div class="card-body">
                                <label> Notes: </label><br>
                                {{$record->notes}}

                            </div>
                            <hr>
                            <div class="card-body">
                                    <label> Location: </label><br>
                                    {{$record->latittude}}
                                    {{$record->longitude}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
    </div>

@endsection
