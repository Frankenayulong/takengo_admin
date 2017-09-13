@extends('layouts.master')

@section('content')
 <!-- BEGIN PAGE HEADER-->
 <h1 class="page-title"> Messages
        <small>query from our website</small>
    </h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{url('/')}}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Messages</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div ng-controller="messageListController" class="car-list-page">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Message List</span>
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
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    <th> Date </th>
                                    <th> Content </th>
                                    <th> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages->data as $index => $message)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">{{$index + 1}}</a>
                                    </td>
                                    <td>
                                    {{$message->name}}
                                    </td>
                                    <td>
                                        <a href="mailto:{{$message->email}}"> {{$message->email}} </a>
                                    </td>
                                    <td> <a href="tel:{{$message->phone}}">{{$message->phone}}</a> </td>
                                    <td class="center"> {{\Carbon\Carbon::parse($message->created_at)->format('d M Y h:i:s A')}} </td>
                                    <td>{{ str_limit($message->content, $limit = 30, $end = '...') }} </td>
                                    <td>
                                        @if($message->resolved)
                                        <span class="label label-sm label-success"> Resolved </span>
                                        @else
                                        <span class="label label-sm label-warning"> Unresolved </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <ul class="pagination pagination-sm">
                                    @if($messages->current_page > 1)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$messages->current_page-1}}">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @for($i = 1; $i <= $messages->last_page; $i++)
                                        <li class="{{$i == $messages->current_page ? 'active' : ''}}"><a href="{{Request::url()}}?page={{$i}}">{{$i}}</a></li>
                                    @endfor
                                    @if($messages->current_page < $messages->last_page)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$messages->current_page+1}}">
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