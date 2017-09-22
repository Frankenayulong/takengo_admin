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
                               
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:50px;"> # </th>
                                    <th> Name </th>
                                    <th> Brand </th>
                                    <th class="center" style="width:100px;"> Status </th>
                                    <th style="width:150px;text-align:right"> Total Orders </th>
                                    <th> Created Date </th>
                                    <th style="width:120px;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars->data as $index => $car)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="{{url('/cars/'.$car->cid)}}">{{(($cars->current_page - 1) * $cars->per_page) + $index + 1}}</a>
                                    </td>
                                    <td>
                                        <a href="{{url('/cars/'.$car->cid)}}">{{$car->name}}</a>
                                    </td>
                                    <td>
                                        {{$car->brand->name or "Unspecified"}}
                                    </td>
                                    <td class="center"> 
                                        @if($car->active_order_count > 0)
                                        <span class="label label-sm label-success"> Active </span>
                                        @else
                                        <span class="label label-sm label-warning"> Asleep </span>
                                        @endif
                                        
                                    </td>
                                    <td style="text-align:right">{{$car->inactive_order_count}}</td>
                                    <td class="center"> {{\Carbon\Carbon::parse($car->created_at)->format('d M Y')}} </td>
                                    <td>
                                            <a href='{{url("/cars/".$car->cid)}}' class="btn btn-icon-only blue">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @if($car->active_order_count <= 0 && $car->inactive_order_count <= 0)
                                            <a href='javascript:;' ng-click="delete({{$car->cid}})" class="btn btn-icon-only red">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            @endif
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