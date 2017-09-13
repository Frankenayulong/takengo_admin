@extends('layouts.master')

@section('content')
 <!-- BEGIN PAGE HEADER-->
    <h1 class="page-title"> Takengo Cars
        <small>these all are our cars</small>
    </h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{url('/')}}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <i class="icon-grid"></i>
                <a href="{{url('/cars')}}">cars</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Create</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div ng-controller="carNewController" class="car-list-page">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Add a car</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                    <form role="form">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input name="name" type="text" class="form-control" id="name">
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select name="cbid" class="form-control edited" id="brand">
                                        <option value=" " selected>Please select...</option>
                                        @foreach($brands as $brand)
                                        <option value="{{$brand->cbid}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="brand">Brand</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input name="model" type="text" class="form-control" id="model">
                                    <label for="model">Model</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input name="release_year" maxlength="4" type="text" class="form-control" id="year">
                                    <label for="year">Year</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select name="car_types" class="form-control edited" id="type">
                                        <option value=" " selected>Please select...</option>
                                        <option value="SEDAN">Sedan</option>
                                        <option value="SUV">SUV</option>
                                        <option value="HATCHBACK">Hatchback</option>
                                        <option value="SPORT">Sport</option>
                                    </select>
                                    <label for="type">Type</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select name="transition_mode" class="form-control edited" id="transition">
                                        <option value="AUTO" selected>Automatic</option>
                                        <option value="MANUAL">Manual</option>
                                    </select>
                                    <label for="transition">Transition Mode</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input name="price" type="text" class="form-control" id="price">
                                    <label for="price">Price per Day</label>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input name="capacity" type="text" class="form-control" id="capacity">
                                    <label for="capacity">Capacity</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input name="doors" type="text" class="form-control" id="doors">
                                    <label for="doors">Doors</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input name="large_bags" type="text" class="form-control" id="large_bags">
                                    <label for="large_bags">Large Bags</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input name="small_bags" type="text" class="form-control" id="small_bags">
                                    <label for="small_bags">Small Bags</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select name="air_conditioned" class="form-control edited" id="air_conditioned">
                                        <option value="true" selected>Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                    <label for="air_conditioned">Air Conditioned</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input name="fuel_policy" type="text" class="form-control" id="fuel_policy">
                                    <label for="fuel_policy">Fuel Policy</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select name="unlimited_mileage" class="form-control edited" id="unlimited_mileage">
                                        <option value="true" selected>Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                    <label for="unlimited_mileage">Unlimited Mileage</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input name="limit_mileage" type="text" class="form-control" id="mileage_limit">
                                    <label for="mileage_limit">Mileage Limit</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions noborder text-right">
                            <button type="button" class="btn default">Cancel</button>
                            <button type="button" class="btn blue">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection