@extends('layouts.master')

@section('content')
 <!-- BEGIN PAGE HEADER-->
    <h1 class="page-title"> {{$booking->car->name}}</h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{url('/')}}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <i class="icon-grid"></i>
                <a href="{{url('/orders')}}">Orders</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{{$booking->car->name}}</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div class="booking-list-page">
        <div ng-controller="orderMapController" ng-init="paths={{json_encode($locations)}};before_location={{json_encode($before_location)}};last_location={{$last_location == null ? json_encode($before_location): json_encode($last_location)}};cid={{$booking->car->cid}};started='{{$booking->started ? '1' : '0'}}';active='{{$booking->active ? '1' : '0'}}'" class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Track Locations</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                    <ng-map style="height:600px;" id="bookings-collection-map" center="@{{last_location.lat}}, @{{last_location.long}}" zoom="17">
                        
                        <marker position="[@{{last_location.lat}}, @{{last_location.long}}]"
                             centered="true" title="Current Location">
                        </marker>
                        <shape name="polyline" path="@{{paths_completed}}" geodesic="true" stroke-color="#FF0000" stroke-opacity="1.0" stroke-weight="2"></shape>
                    </ng-map>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection