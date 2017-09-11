@extends('layouts.master')

@section('content')
 <!-- BEGIN PAGE HEADER-->
 <h1 class="page-title"> Takengo Users
        <small>all of our users</small>
    </h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Users</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div class="car-list-page">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">User List</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-6">
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
                                    <th> First Name </th>
                                    <th> Last Name </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    <th> Birth Date </th>
                                    <th> Driver License Number </th>
                                    <th> Total Order </th>
                                    <th> Registered On </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users->data as $index => $user)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">{{$index+1}}</a>
                                    </td>
                                    <td>
                                        {{$user->first_name}}
                                    </td>
                                    <td> {{$user->last_name}} </td>
                                    <td>
                                        <a href="mailto:{{$user->email}}"> {{$user->email}} </a>
                                    </td>
                                    <td>
                                        @if($user->phone)
                                        <a href="tel:{{$user->phone}}"> {{$user->phone}} </a>
                                        @else
                                        <span class="label label-sm label-warning"> Unspecified </span>
                                        @endif
                                    </td>
                                    <td class="center">
                                        @if($user->birth_date)
                                        {{\Carbon\Carbon::parse($user->birth_date)->format('d M Y')}}
                                        @else
                                        <span class="label label-sm label-warning"> Unspecified </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->driver_license_number)
                                        {{$user->driver_license_number}}
                                        @else
                                        <span class="label label-sm label-warning"> Unspecified </span>
                                        @endif
                                    </td>
                                    <td> {{$user->bookings_count}} </td>
                                    <td class="center"> {{\Carbon\Carbon::parse($user->created_at)->format('d M Y h:i:s A')}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <ul class="pagination pagination-sm">
                                    @if($users->current_page > 1)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$users->current_page-1}}">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @for($i = 1; $i <= $users->last_page; $i++)
                                        <li class="{{$i == $users->current_page ? 'active' : ''}}"><a href="{{Request::url()}}?page={{$i}}">{{$i}}</a></li>
                                    @endfor
                                    @if($users->current_page < $users->last_page)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$users->current_page+1}}">
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