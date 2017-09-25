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
        <form role="form" method="POST" action="{{url('/cars')}}" >
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
                    
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('name') ? 'has-error' : ''}}">
                                    <input name="name" value="{{old('name')}}" type="text" class="form-control" id="name">
                                    <label for="name">Name</label>
                                    <span class="help-block">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('cbid') ? 'has-error' : ''}}">
                                    <select name="cbid" value="{{old('cbid')}}" class="form-control edited" id="brand">
                                        <option value=" " selected>Please select...</option>
                                        @foreach($brands as $brand)
                                        <option value="{{$brand->cbid}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="brand">Brand</label>
                                    <span class="help-block">{{$errors->first('cbid')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('model') ? 'has-error' : ''}}">
                                    <input value="{{old('model')}}" name="model" type="text" class="form-control" id="model">
                                    <label for="model">Model</label>
                                    <span class="help-block">{{$errors->first('model')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('release_year') ? 'has-error' : ''}}">
                                    <input value="{{old('release_year')}}" name="release_year" maxlength="4" type="text" class="form-control" id="year">
                                    <label for="year">Year</label>
                                    <span class="help-block">{{$errors->first('release_year')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('car_types') ? 'has-error' : ''}}">
                                    <select value="{{old('car_types')}}" name="car_types" class="form-control edited" id="type">
                                        <option value=" " selected>Please select...</option>
                                        <option value="SEDAN">Sedan</option>
                                        <option value="SUV">SUV</option>
                                        <option value="HATCHBACK">Hatchback</option>
                                        <option value="SPORT">Sport</option>
                                    </select>
                                    <label for="type">Type</label>
                                    <span class="help-block">{{$errors->first('car_types')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('transition_mode') ? 'has-error' : ''}}">
                                    <select value="{{old('transition_mode')}}" name="transition_mode" class="form-control edited" id="transition">
                                        <option value="AUTO" selected>Automatic</option>
                                        <option value="MANUAL">Manual</option>
                                    </select>
                                    <label for="transition">Transition Mode</label>
                                    <span class="help-block">{{$errors->first('transition_mode')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('price') ? 'has-error' : ''}}">
                                    <input value="{{old('price')}}" name="price" type="text" class="form-control" id="price">
                                    <label for="price">Price per Day</label>
                                    <span class="help-block">{{$errors->first('price')}}</span>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('capacity') ? 'has-error' : ''}}">
                                    <input value="{{old('capacity')}}" name="capacity" type="text" class="form-control" id="capacity">
                                    <label for="capacity">Capacity</label>
                                    <span class="help-block">{{$errors->first('capacity')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('doors') ? 'has-error' : ''}}">
                                    <input value="{{old('doors')}}" name="doors" type="text" class="form-control" id="doors">
                                    <label for="doors">Doors</label>
                                    <span class="help-block">{{$errors->first('doors')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('large_bags') ? 'has-error' : ''}}">
                                    <input value="{{old('large_bags')}}" name="large_bags" type="text" class="form-control" id="large_bags">
                                    <label for="large_bags">Large Bags</label>
                                    <span class="help-block">{{$errors->first('large_bags')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('small_bags') ? 'has-error' : ''}}">
                                    <input value="{{old('small_bags')}}" name="small_bags" type="text" class="form-control" id="small_bags">
                                    <label for="small_bags">Small Bags</label>
                                    <span class="help-block">{{$errors->first('small_bags')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('air_conditioned') ? 'has-error' : ''}}">
                                    <select value="{{old('air_conditioned')}}" name="air_conditioned" class="form-control edited" id="air_conditioned">
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label for="air_conditioned">Air Conditioned</label>
                                    <span class="help-block">{{$errors->first('air_conditioned')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('fuel_policy') ? 'has-error' : ''}}">
                                    <input value="{{old('fuel_policy')}}" name="fuel_policy" type="text" class="form-control" id="fuel_policy">
                                    <label for="fuel_policy">Fuel Policy</label>
                                    <span class="help-block">{{$errors->first('fuel_policy')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('unlimited_mileage') ? 'has-error' : ''}}">
                                    <select value="{{old('unlimited_mileage', '0')}}" ng-init="mileage.unlimited = '{{old('unlimited_mileage', '0')}}'" ng-model="mileage.unlimited" name="unlimited_mileage" class="form-control edited" id="unlimited_mileage">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label for="unlimited_mileage">Unlimited Mileage</label>
                                    <span class="help-block">{{$errors->first('unlimited_mileage')}}</span>
                                </div>
                            </div>
                            <div ng-show="mileage.unlimited == '0'" class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('limit_mileage') ? 'has-error' : ''}}">
                                    <input value="{{old('limit_mileage')}}" ng-model="mileage.limit" ng-init="mileage.limit = '{{old('limit_mileage')}}'" name="limit_mileage" type="text" class="form-control" id="mileage_limit">
                                    <label for="mileage_limit">Mileage Limit</label>
                                    <span class="help-block">{{$errors->first('limit_mileage')}}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions noborder text-right">
                            <button type="button" class="btn default">Cancel</button>
                            <button type="submit" class="btn blue">Submit</button>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Current Location</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                    <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input ng-model="lc.lat" name="lat" type="text" class="form-control edited" id="lc_lat">
                            <label for="lc_lat">Latitude</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input ng-model="lc.long" name="long" type="text" class="form-control edited" id="lc_long">
                            <label for="lc_long">Longitude</label>
                        </div>
                    </div>
                    </div>
                    <ng-map id="cars-collection-map" center="@{{lc.lat}}, @{{lc.long}}" zoom="13">
                        
                        <marker position="[@{{lc.lat}}, @{{lc.long}}]"
                             centered="true" title="Current Location"
                            draggable="true" on-dragend="setCurrentLocation()"
                            >
                        </marker>
                        
                    </ng-map>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection