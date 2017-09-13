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
                <span>Cars</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div ng-controller="carListController" class="car-list-page">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Car List</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{url('/cars/new')}}" id="sample_editable_1_new" class="btn sbold green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-print"></i> Print </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Brand </th>
                                    <th> Active Bookings </th>
                                    <th> Canceled Bookings </th>
                                    <th> Created Date </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars->data as $index => $car)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">{{(($cars->current_page - 1) * $cars->per_page) + $index + 1}}</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">{{$car->name}}</a>
                                    </td>
                                    <td>
                                        {{$car->brand->name or "Unspecified"}}
                                    </td>
                                    <td> {{$car->active_order_count}} </td>
                                    <td>
                                        {{$car->inactive_order_count}}
                                    </td>
                                    <td class="center"> {{\Carbon\Carbon::parse($car->created_at)->format('d M Y')}} </td>
                                    <td>
                                        <span class="label label-sm label-warning"> New </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <ul class="pagination pagination-sm">
                                    @if($cars->current_page > 1)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$cars->current_page-1}}">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @for($i = 1; $i <= $cars->last_page; $i++)
                                        <li class="{{$i == $cars->current_page ? 'active' : ''}}"><a href="{{Request::url()}}?page={{$i}}">{{$i}}</a></li>
                                    @endfor
                                    @if($cars->current_page < $cars->last_page)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$cars->current_page+1}}">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection