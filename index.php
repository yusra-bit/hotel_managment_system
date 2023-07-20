<?php include('includes/header.html') ?>
<div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control border-0" id="dash-daterange">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-blue border-blue text-white">
                                                        <i class="mdi mdi-calendar-range"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                                        <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                            <i class="fe-heart font-22 avatar-title text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="mt-1">$<span data-plugin="counterup">20.00</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Total Revenue</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->



                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                            <i class="fe-shopping-cart font-22 avatar-title text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">0</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Today's Sales</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-3" hidden="">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                            <i class="fe-wind font-22 avatar-title text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="mt-1">
                                                <span data-plugin="counterup">0</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Total Expenses</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-3" hidden="">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                            <i class="fe-user font-22 avatar-title text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-6" hidden="">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">0</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Total Contacts</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <div class="col-xl-6" hidden="">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                        <a data-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Top 5 Passengers Balances</h4>

                                    <div id="cardCollpase5" class="collapse pt-3 show">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th hidden="">ID</th>
                                                        <th>Passenger Name</th>
                                                        <th>Payment Type</th>
                                                        <th>Balance</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr><td colspan="7"> No record was found! </td></tr>                                                </tbody>
                                            </table>
                                        </div> <!-- end table responsive-->
                                    </div> <!-- collapsed end -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <div class="row">


                    </div>
                    
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-3">Live Rooms Status</h4>

                                                                        <div class="grid-structure">
                                        <div class="row">
                                                                                       
                                            <div class="col-lg-2">
                                                                                                <div class="grid-container bg-success text-white">

                                                    <b>101</b> <br>
                                                    Living Room <br>
                                                    Available
                                                </div>
                                                                                            </div>

                                                                                       
                                            <div class="col-lg-2">
                                                                                                <div class="grid-container bg-danger text-white">

                                                    <b>102</b> <br>
                                                    Living Room <br>
                                                    Booked
                                                </div>
                                                                                            </div>

                                                                                       
                                            <div class="col-lg-2">
                                                                                                <div class="grid-container bg-danger text-white">

                                                    <b>103</b> <br>
                                                    Living Room <br>
                                                    Booked
                                                </div>
                                                                                            </div>

                                                                                       
                                            <div class="col-lg-2">
                                                                                                <div class="grid-container bg-danger text-white">

                                                    <b>104</b> <br>
                                                    single bed room <br>
                                                    Booked
                                                </div>
                                                                                            </div>

                                                                                    </div> <!-- end row -->
                                    </div> <!-- grid-structure -->

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row-->





                </div>
                <!-- end row -->
                            </div>