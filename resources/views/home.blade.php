@extends('layouts.master')

@section('content')
 <!-- BEGIN PAGE HEADER-->
 <h1 class="page-title"> Home
        <small>admin dashboard</small>
    </h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <span>Home</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div ng-controller="homeController" class="car-list-page">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</div>
@endsection