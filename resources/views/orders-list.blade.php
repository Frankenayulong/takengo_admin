@extends('layouts.master')

@section('content')
 <!-- BEGIN PAGE HEADER-->
 <h1 class="page-title"> Orders
        <small>respond to these orders</small>
    </h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Orders</span>
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
                            <span class="caption-subject font-blue-madison bold uppercase">Order List</span>
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
                                    <th> Car Name </th>
                                    <th> Cust. Name </th>
                                    <th> Cust. Email </th>
                                    <th> Start Date </th>
                                    <th> End Date </th>
                                    <th> Order Date </th>
                                    <th> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders->data as $index => $order)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">{{$index + 1}}</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">{{$order->car->name or "Unspecified"}}</a>
                                    </td>
                                    <td> {{$order->customer->first_name or "Unspecified"}} {{$order->customer->last_name or ""}}</td>
                                    <td>
                                        <a href="mailto:{{$order->customer->email or "Unspecified"}}"> {{$order->customer->email or "Unspecified"}} </a>
                                    </td>
                                    <td class="center"> {{\Carbon\Carbon::parse($order->start_date)->format('d M Y')}} </td>
                                    <td class="center"> {{\Carbon\Carbon::parse($order->end_date)->format('d M Y')}} </td>
                                    <td class="center"> {{\Carbon\Carbon::parse($order->created_at)->format('d M Y h:i:s A')}} </td>
                                    <td>
                                        @if($order->transactions_count > 0)
                                        <span class="label label-sm label-success"> Paid </span>
                                        @elseif($order->active)
                                        <span class="label label-sm label-warning"> Pending </span>
                                        @else
                                        <span class="label label-sm label-danger"> Canceled </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <ul class="pagination pagination-sm">
                                    @if($orders->current_page > 1)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$orders->current_page-1}}">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @for($i = 1; $i <= $orders->last_page; $i++)
                                        <li class="{{$i == $orders->current_page ? 'active' : ''}}"><a href="{{Request::url()}}?page={{$i}}">{{$i}}</a></li>
                                    @endfor
                                    @if($orders->current_page < $orders->last_page)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$orders->current_page+1}}">
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