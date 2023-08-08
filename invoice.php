

<?php include("core/core_checkOut.php"); ?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Management System</title>

    <?php include("includes/header.html"); ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include("includes/navbar.html"); ?>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include("includes/sidebar.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        
            <div class="content">

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Checkout </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <!-- Logo & title -->
                <div class="clearfix">
                    <div class="float-left">
                        <div class="auth-logo">
                            <div class="logo logo-dark">
                                <span class="logo-lg">
                                    <img src="../assets/images/logo-dark.png" alt="" height="22">
                                </span>
                            </div>

                            <div class="logo logo-light">
                                <span class="logo-lg">
                                    <img src="../assets/images/logo-light.png" alt="" height="22">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <h4 class="m-0 d-print-none">Invoice</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <h2 class="text-success">Hotel </h2>
                        <div class="mt-3">
                        <input type="hidden" name="reservation_id" value="<?php echo $rid ?> ">
                            <p><b>Hello, <?php echo $full_name;?></b></p>
                            <p class="text-muted">Thanks a lot because you keep purchasing our products.
                                Our company
                                promises to provide high quality products for you as well as outstanding
                                customer service for every transaction. </p> <!-- On behalf of the YOUR HOTEL NAME, -->
                             
                        </div>

                    </div><!-- end col -->
                    <div class="col-md-4 offset-md-2">
                        <div class="mt-3 float-right">
                            <p class="m-b-10"><strong>Invoice Date : </strong> <span class="float-right">
                                   <?php echo $billing_date; ?></span></p>
                            <p class="m-b-10"><strong>Invoice Status : </strong> <span class="float-right"><span class="badge badge-success">Paid</span></span>
                            </p>
                            <p class="m-b-10"><strong>Invoice No. : </strong> <span class="float-right">INV1077 </span></p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <h6>Billing Address</h6>
                        <address>
                        <?php echo $full_name;?><br>

                            <abbr title="Phone">Phone: </abbr> <?php echo $mobile;?></address>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mt-4 table-centered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th style="width: 10%">Days</th>
                                        <th style="width: 10%">Days Rate</th>
                                        <th style="width: 10%" class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><b><?php echo $room_no; ?></b> <br><?php echo $room_type; ?></td>
                                        <td class="text-right"><?php echo $days ?></td>
                                        <td class="text-right"><?php echo $price; ?></td>
                                        <td class="text-right">$<?php echo $grand_total; ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><b><?php echo $type; ?></b></td>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                        <td class="text-right">$<?php echo $orders; ?></td>
                                    </tr>
                                                                                    </tbody>
                            </table>
                        </div> <!-- end table-responsive -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="clearfix pt-5">
                            <h6 class="text-muted">Notes:</h6>

                            <small class="text-muted">
                                All accounts are to be paid within 7 days from receipt of
                                invoice. To be paid by cheque or credit card or direct payment
                                online. If account is not paid within 7 days the credits details
                                supplied as confirmation of work undertaken will be charged the
                                agreed quoted fee noted above.
                            </small>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-sm-6">
                        <div class="float-right">
                            <p><b>Sub-total:</b> <span class="float-right">$<?php $overall =$grand_total + $orders;  echo $overall ; ?></span></p>
                            <p><b>Discount:</b> <span class="float-right"> &nbsp;&nbsp;&nbsp;
                                    $<?php echo $discount; ?></span></p>
                            <h3>$<?php echo $overall - $discount; ?> USD</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="mt-4 mb-1">
                    <div class="text-right d-print-none">
                        <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                        <a href="#" class="btn btn-info waves-effect waves-light" hidden="">Submit</a>
                    </div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->

</div>
            <!-- /.content -->
        </div>
      
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
        <?php include("includes/footer.html"); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <?php include("includes/footermeta.html"); ?>
</body>

</html>




