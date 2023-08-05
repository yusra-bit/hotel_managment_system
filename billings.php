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
                <h4 class="page-title">CUSTOMER CHECKOUT</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                               

                                <div class="border mt-4 rounded">
                                    <h4 class="header-title p-2 mb-0">Order Summary</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0">
                                            <tbody>

                                                <tr>
                                                    <td style="width: 90px;">
                                                        <!--<img src="../assets/images/products/product-1.png" alt="product-img" title="product-img" class="rounded" height="48" />-->
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-body font-weight-semibold"><?php echo $room_type; ?> <?php echo $room_no; ?></a>
                                                        <small class="d-block"><?php echo $price; ?> USD</small>
                                                    </td>

                                                    <td class="text-right"> <?php echo $grand_total; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 90px;"></td>
                                                    <td>
                                                        <a href="#" class="text-body font-weight-semibold"><?php echo $type; ?></a>
                                                    </td>

                                                    <td class="text-right"><?php echo $orders; ?></td>
                                                </tr>


                                                <tr class="text-right">
                                                    <td colspan="2">
                                                        <h6 class="m-0">Sub Total:</h6>
                                                    </td>
                                                    <td class="text-right"><?php $overall =$grand_total + $orders; echo $overall ; ?></td>
                                                </tr>
                                                <tr class="text-right">
                                                    <td colspan="2">
                                                        <h6 class="m-0">TAX:</h6>
                                                    </td>
                                                    <td class="text-right">0.00</td>
                                                </tr>

                                                <tr class="text-right">
                                                    <td colspan="2">
                                                        <h6 class="m-0">Discount:</h6>
                                                    </td>
                                                    <td class="text-right"> <?php echo $discount; ?></td>
                                                </tr>
                                                <tr class="text-right">
                                                    <td colspan="2">
                                                        <h5 class="m-0">Grand Total:</h5>
                                                    </td>                    
                                                 <input type="hidden" name="total" value="<?php echo $overall - $discount; ?>">

                                                    <td class="text-right font-weight-semibold"> <?php echo $overall - $discount; ?>    </td>
                                                    
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div> <!-- end .border-->
                            </div> <!-- end col-->
                            <div class="col-lg-8">
                                <div class="tab-content p-3">
                                        <div>
                                            <h4 class="header-title">Billing Information</h4>

                                            <p class="sub-header">Fill the form below in order to
                                                send you the order's invoice.</p>
                                            <!--                                                            <form>-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="billing-first-name">Customer
                                                            Name</label>

                                                            <input type="hidden" name="reservation_id" value="<?php echo $rid ?> ">
                                                            <input class="form-control" type="text" name="full_name" placeholder="Enter your first name" value="<?php echo (isset($full_name) ? $full_name : "") ?>">
                                                    </div>
                                                </div>

                                            </div> <!-- end row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="billing-email-address">Email Address
                                                            <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="email" placeholder="Enter your email" value="<?php echo (isset($email) ? $email : "") ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="billing-phone">Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="number" name="mobile" placeholder="Enter your email" value="<?php echo (isset($mobile) ? $mobile : "") ?>">

                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="billing-address">ID/Passport</label>
                                                        <input class="form-control" type="number" name="id_card_no" placeholder="Enter your ID" value="<?php echo (isset($id_card_no) ? $id_card_no : "") ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                <div class="form-group">
                                                        <label for="billing_type">Billing Type</label>
                                                        <select name="billing_type" class="form-control" required>
                                                        <option selected> Select Payment Type</option>
                                                            <option value="ZAAD"> Zaad</option>
                                                            <option value="CASH"> Cash</option>
                                                            <option value="EDahab"> EDahab</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- end row -->



 <!-- end row -->

                                            <div class="row">
                                                <div class="col-sm-6">
                                                <input type="submit" name="save" value="Checkout" class="btn btn-success float-right" >
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                            <!--</form>-->
                                        </div>
                                    </div>

                                    
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row-->

                    </div>
                </div>
            </div>

        </div>
                        </form>
    <!-- end row -->

</div> <!-- container -->

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




