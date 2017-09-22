@extends('layouts.master')

@section('content')
 <!-- BEGIN PAGE HEADER-->
 <h1 class="page-title"> Newsletter
        <small>emails &amp; contents</small>
    </h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{url('/')}}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Newsletter</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div ng-controller="newsletterEmailListController" class="car-list-page">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Email Bank</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Email </th>
                                    <th> Registered At </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($emails->data as $index => $email)
                                <tr class="odd gradeX">
                                    <td>
                                        {{$index + 1}}
                                    </td>
                                    <td>
                                        <a href="mailto:{{$email->email}}">{{$email->email}}</a>
                                    </td>
                            
                                    <td class="center"> {{\Carbon\Carbon::parse($email->created_at)->format('d M Y h:i:s A')}} </td>
                      
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <ul class="pagination pagination-sm">
                                    @if($emails->current_page > 1)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$emails->current_page-1}}">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @for($i = 1; $i <= $emails->last_page; $i++)
                                        <li class="{{$i == $emails->current_page ? 'active' : ''}}"><a href="{{Request::url()}}?page={{$i}}">{{$i}}</a></li>
                                    @endfor
                                    @if($emails->current_page < $emails->last_page)
                                    <li>
                                        <a href="{{Request::url()}}?page={{$emails->current_page+1}}">
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