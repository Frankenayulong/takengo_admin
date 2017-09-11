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
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Cars</span>
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
                            <span class="caption-subject font-blue-madison bold uppercase">Car List</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </button>
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
                                    <th> Future Bookings </th>
                                    <th> Total Bookings </th>
                                    <th> Created Date </th>
                                    <th> Status </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">1123</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">Changing Colors</a>
                                    </td>
                                    <td> Jane </td>
                                    <td>
                                        <a href="mailto:customer@gmail.com"> customer@gmail.com </a>
                                    </td>
                                    <td class="center"> 10/12/15 1:45pm </td>
                                    <td> Hugh Jackman </td>
                                    <td>
                                        <span class="label label-sm label-warning"> New </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">1134</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">Modals popup customization</a>
                                    </td>
                                    <td> Randy </td>
                                    <td>
                                        <a href="mailto:customer@gmail.com"> customer@gmail.com </a>
                                    </td>
                                    <td class="center"> 10/12/15 1:45pm </td>
                                    <td> Marcus Doe </td>
                                    <td>
                                        <span class="label label-sm label-info"> Processed </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">1144</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">Form Input styling</a>
                                    </td>
                                    <td> Samantha </td>
                                    <td>
                                        <a href="mailto:customer@gmail.com"> customer@gmail.com </a>
                                    </td>
                                    <td class="center"> 10/12/15 1:45pm </td>
                                    <td> Marcus Doe </td>
                                    <td>
                                        <span class="label label-sm label-success"> Completed </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">1243</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">Counter skipping numbers</a>
                                    </td>
                                    <td> Daniel </td>
                                    <td>
                                        <a href="mailto:customer@gmail.com"> customer@gmail.com </a>
                                    </td>
                                    <td class="center"> 10/12/15 1:45pm </td>
                                    <td> Marcus Doe </td>
                                    <td>
                                        <span class="label label-sm label-default"> Pending </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">1276</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">Menu not working</a>
                                    </td>
                                    <td> Billy </td>
                                    <td>
                                        <a href="mailto:customer@gmail.com"> customer@gmail.com </a>
                                    </td>
                                    <td class="center"> 10/12/15 1:45pm </td>
                                    <td> Hugh Jackman </td>
                                    <td>
                                        <span class="label label-sm label-default"> Pending </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">1345</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">Changing Colors</a>
                                    </td>
                                    <td> Jane </td>
                                    <td>
                                        <a href="mailto:customer@gmail.com"> customer@gmail.com </a>
                                    </td>
                                    <td class="center"> 10/12/15 1:45pm </td>
                                    <td> Hugh Jackman </td>
                                    <td>
                                        <span class="label label-sm label-warning"> New </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">1354</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">Modals popup customization</a>
                                    </td>
                                    <td> Randy </td>
                                    <td>
                                        <a href="mailto:customer@gmail.com"> customer@gmail.com </a>
                                    </td>
                                    <td class="center"> 10/12/15 1:45pm </td>
                                    <td> Marcus Doe </td>
                                    <td>
                                        <span class="label label-sm label-default"> Pending </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">1365</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">Form Input styling</a>
                                    </td>
                                    <td> Samantha </td>
                                    <td>
                                        <a href="mailto:customer@gmail.com"> customer@gmail.com </a>
                                    </td>
                                    <td class="center"> 10/12/15 1:45pm </td>
                                    <td> Marcus Doe </td>
                                    <td>
                                        <span class="label label-sm label-success"> Completed </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">1371</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">Counter skipping numbers</a>
                                    </td>
                                    <td> Daniel </td>
                                    <td>
                                        <a href="mailto:customer@gmail.com"> customer@gmail.com </a>
                                    </td>
                                    <td class="center"> 10/12/15 1:45pm </td>
                                    <td> Marcus Doe </td>
                                    <td>
                                        <span class="label label-sm label-default"> Pending </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="app_ticket_details.html">1373</a>
                                    </td>
                                    <td>
                                        <a href="app_ticket_details.html">Menu not working</a>
                                    </td>
                                    <td> Billy </td>
                                    <td>
                                        <a href="mailto:customer@gmail.com"> customer@gmail.com </a>
                                    </td>
                                    <td class="center"> 10/12/15 1:45pm </td>
                                    <td> Hugh Jackman </td>
                                    <td>
                                        <span class="label label-sm label-success"> Completed </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection