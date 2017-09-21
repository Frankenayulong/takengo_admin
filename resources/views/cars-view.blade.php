@extends('layouts.master')

@section('content')
 <!-- BEGIN PAGE HEADER-->
    <h1 class="page-title"> {{$car->name}}</h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{url('/')}}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <i class="icon-grid"></i>
                <a href="{{url('/cars')}}">Cars</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{{$car->name}}</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div class="car-list-page">
        <div class="row">
            <div class="col-md-12">
                <div ng-controller="carViewController" class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">{{$car->name}}</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                    <form role="form" method="POST" action="{{url('/cars')}}" >
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('name') ? 'has-error' : ''}}">
                                    <input name="name" value="{{old('name', $car->name)}}" type="text" class="form-control" id="name">
                                    <label for="name">Name</label>
                                    <span class="help-block">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('cbid') ? 'has-error' : ''}}">
                                    <select name="cbid" value="{{old('cbid', $car->cbid)}}" class="form-control edited" id="brand">
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
                                    <input value="{{old('model', $car->model)}}" name="model" type="text" class="form-control" id="model">
                                    <label for="model">Model</label>
                                    <span class="help-block">{{$errors->first('model')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('release_year') ? 'has-error' : ''}}">
                                    <input value="{{old('release_year', $car->release_year)}}" name="release_year" maxlength="4" type="text" class="form-control" id="year">
                                    <label for="year">Year</label>
                                    <span class="help-block">{{$errors->first('release_year')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('car_types') ? 'has-error' : ''}}">
                                    <select value="{{old('car_types', $car->car_types)}}" name="car_types" class="form-control edited" id="type">
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
                                    <select value="{{old('transition_mode', $car->transition_mode)}}" name="transition_mode" class="form-control edited" id="transition">
                                        <option value="AUTO" selected>Automatic</option>
                                        <option value="MANUAL">Manual</option>
                                    </select>
                                    <label for="transition">Transition Mode</label>
                                    <span class="help-block">{{$errors->first('transition_mode')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('price') ? 'has-error' : ''}}">
                                    <input value="{{old('price', $car->price)}}" name="price" type="text" class="form-control" id="price">
                                    <label for="price">Price per Day</label>
                                    <span class="help-block">{{$errors->first('price')}}</span>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('capacity') ? 'has-error' : ''}}">
                                    <input value="{{old('capacity', $car->capacity)}}" name="capacity" type="text" class="form-control" id="capacity">
                                    <label for="capacity">Capacity</label>
                                    <span class="help-block">{{$errors->first('capacity')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('doors') ? 'has-error' : ''}}">
                                    <input value="{{old('doors', $car->doors)}}" name="doors" type="text" class="form-control" id="doors">
                                    <label for="doors">Doors</label>
                                    <span class="help-block">{{$errors->first('doors')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('large_bags') ? 'has-error' : ''}}">
                                    <input value="{{old('large_bags', $car->large_bags)}}" name="large_bags" type="text" class="form-control" id="large_bags">
                                    <label for="large_bags">Large Bags</label>
                                    <span class="help-block">{{$errors->first('large_bags')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('small_bags') ? 'has-error' : ''}}">
                                    <input value="{{old('small_bags', $car->small_bags)}}" name="small_bags" type="text" class="form-control" id="small_bags">
                                    <label for="small_bags">Small Bags</label>
                                    <span class="help-block">{{$errors->first('small_bags')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('air_conditioned') ? 'has-error' : ''}}">
                                    <select value="{{old('air_conditioned', $car->air_conditioned ? '1' : '0')}}" name="air_conditioned" class="form-control edited" id="air_conditioned">
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label for="air_conditioned">Air Conditioned</label>
                                    <span class="help-block">{{$errors->first('air_conditioned')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('fuel_policy') ? 'has-error' : ''}}">
                                    <input value="{{old('fuel_policy', $car->fuel_policy)}}" name="fuel_policy" type="text" class="form-control" id="fuel_policy">
                                    <label for="fuel_policy">Fuel Policy</label>
                                    <span class="help-block">{{$errors->first('fuel_policy')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('unlimited_mileage') ? 'has-error' : ''}}">
                                    <select value="{{old('unlimited_mileage', $car->unlimited_mileage ? '1' : '0')}}" ng-init="mileage.unlimited = '{{old('unlimited_mileage', '0')}}'" ng-model="mileage.unlimited" name="unlimited_mileage" class="form-control edited" id="unlimited_mileage">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label for="unlimited_mileage">Unlimited Mileage</label>
                                    <span class="help-block">{{$errors->first('unlimited_mileage')}}</span>
                                </div>
                            </div>
                            <div ng-show="mileage.unlimited == '0'" class="col-xs-12 col-md-6">
                                <div class="form-group form-md-line-input form-md-floating-label {{$errors->has('limit_mileage') ? 'has-error' : ''}}">
                                    <input value="{{old('limit_mileage', $car->limit_mileage)}}" ng-model="mileage.limit" ng-init="mileage.limit = '{{old('limit_mileage')}}'" name="limit_mileage" type="text" class="form-control" id="mileage_limit">
                                    <label for="mileage_limit">Mileage Limit</label>
                                    <span class="help-block">{{$errors->first('limit_mileage')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions noborder text-right">
                            <button type="button" class="btn default">Cancel</button>
                            <button type="submit" class="btn blue">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div ng-controller="carPictureController" ng-init="cid = {{$car->cid}}" class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Pictures</span>
                        </div>
                    </div>
                    <div class="portlet-body" ng-init="pictures = {{json_encode($car->pictures)}}">
                        <div class="row">
                            <div class="portfolio-content portfolio-1">
                                <div id="js-grid-juicy-projects" class="cbp">
                                    
                                    <div ng-repeat="picture in pictures | orderBy:'cpid'" class="cbp-item">
                                        <div class="cbp-caption">
                                            <div class="cbp-caption-defaultWrap">
                                                <div style="height:275px;background-image:url('{{config('api.api_url') . 'img/cars' . '/' . $car->cid}}/@{{picture.pic_name}}');background-size:contain;background-position:center center;background-repeat:no-repeat;"></div>
                                            </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <div class="cbp-l-caption-body">
                                                        <a href="javascript:;" ng-click="deletePicture(picture.pic_name)" class="cbp-l-caption-buttonLeft btn red uppercase">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-4 col-sm-12 col-md-offset-4">
                                <h4 style="text-align:center">Upload new picture</h4>
                                <slim id="car-picture-slim" data-ratio="16:9"
                                    data-size="400,225"
                                    data-service="slim.api_url"
                                    data-filter-sharpen="20"
                                    data-post="output"
                                    data-will-request="slim.will_request"
                                    data-did-upload="slim.upload"
                                    data-did-init="slim.init">
                                    <input type="file" name="picture"/>
                                </slim>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div ng-controller="carMapController" ng-init="cid = {{$car->cid}}" class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Current Location</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                    <ng-map id="cars-collection-map" center="{{$car->last_location[0]->lat or '-37.800426'}}, {{$car->last_location[0]->long or '144.9352466'}}" zoom="13">
                        
                        <marker position="[{{$car->last_location[0]->lat or '-37.800426'}}, {{$car->last_location[0]->long or '144.9352466'}}]"
                             centered="true" title="Current Location"
                            draggable="true" on-dragend="setCurrentLocation()"
                            >
                        </marker>
                        
                    </ng-map>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection