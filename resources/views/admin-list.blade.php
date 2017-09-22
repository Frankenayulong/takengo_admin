@extends('layouts.master')

@section('content')
 <!-- BEGIN PAGE HEADER-->
 <h1 class="page-title"> Takengo Admins
        <small>staffs' account</small>
    </h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{url('/')}}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Admins</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div ng-controller="adminListController" class="car-list-page">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Admin List</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> First Name </th>
                                    <th> Last Name </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    <th> Last IP </th>
                                    <th> Created At </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins->data as $index => $admin)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">{{$index+1}}</a>
                                    </td>
                                    <td>
                                        {{$admin->first_name}}
                                    </td>
                                    <td> {{$admin->last_name}} </td>
                                    <td>
                                        <a href="mailto:{{$admin->email}}"> {{$admin->email}} </a>
                                    </td>
                                    <td>
                                        @if($admin->phone)
                                        <a href="tel:{{$admin->phone}}"> {{$admin->phone}} </a>
                                        @else
                                        <span class="label label-sm label-warning"> Unspecified </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($admin->last_ip)
                                        {{$admin->last_ip}}
                                        @else
                                        <span class="label label-sm label-warning"> Unspecified </span>
                                        @endif
                                    </td>
                                    <td class="center"> {{\Carbon\Carbon::parse($admin->created_at)->format('d M Y h:i:s A')}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <ul class="pagination pagination-sm">
                                    @if($admins->current_page > 1)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$admins->current_page-1}}">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @for($i = 1; $i <= $admins->last_page; $i++)
                                        <li class="{{$i == $admins->current_page ? 'active' : ''}}"><a href="{{Request::url()}}?page={{$i}}">{{$i}}</a></li>
                                    @endfor
                                    @if($admins->current_page < $admins->last_page)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$admins->current_page+1}}">
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