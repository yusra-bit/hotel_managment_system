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
        
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3>Rooms </h3>
                        </div>
                      
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-8">
                        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
                        <div class="card ">

                            <input type="text" name="total" value="<?php echo $grand_total ;?>">

                   
                         
                           


                        <div class="form-group">

                                                        <label for="">Customer Name</label>
                                                        <input class="form-control" type="text" name="full_name" placeholder="Enter your first name" value="<?php echo (isset($full_name) ? $full_name : "") ?>">
                                                    </div>
                                               
                            <div class="form-group">
                            <input type="hidden" name="reservation_id" value="<?php echo $rid ?> ">

                        <label for="email">Email Address
                            <span class="text-danger">*</span></label>
                        <input class="form-control" name="email" type="email" placeholder="Enter your email" value="<?php echo (isset($email) ? $email : "") ?>">
                        </div>
                       
                                                    <div class="form-group">
                                                        <label for="billing-address">Email</label>
                                                        <input class="form-control" name="id_card_no" type="text"  placeholder="Enter full address" value="<?php echo (isset($id_card) ? $id_card : "") ?>">
                                                    </div>
                                             
                                                    <div class="form-group">
                                                        <label for="billing-phone">Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="mobile" type="text"  placeholder="(xx) xxx xxxx xxx" value="<?php echo (isset($mobile) ? $mobile : "") ?>">
                                                    </div>
                                             


                                                    <div class="form-group">
                                                        <label for="billing-address">ID</label>
                                                        <input class="form-control" name="id_card_no" type="text"  placeholder="Enter full address" value="<?php echo (isset($id_card) ? $id_card : "") ?>">
                                                    </div>

                                <div class="form-group">
                                                        <label for="billing_type">Billing Type</label>
                                                        <select name="billing_type" id="" class="form-control">
                                                        <option selected> Select Payment Type</option>
                                                            <option value="ZAAD"> Zaad</option>
                                                            <option value="CASH"> Cash</option>
                                                            <option value="EDahab"> EDahab</option>
                                                        </select>
                                                    </div>

                               
                            </div>
</div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="row">
                        <div class="col-12">
                                <a hidden href="#" class="btn btn-secondary float-right">Back</a>
                                <input type="submit" name="save" value="Checkout"
                                    class="btn btn-success float-right" >
                                   
                            </div>
                        </div>
                        </form>
                    </div>

                </div>

            </section>
            <br>
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




