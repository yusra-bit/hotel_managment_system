<?php include("core/core_customers.php"); ?>
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
                            <h1> Customers</h1>
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
                           

                            <div class="alert" style="length:2px;">
                                <a class="close" data-dismiss="alert"><i class="icon-remove"></i></a>
                                <?php echo $message; ?>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" id="full_name" name="full_name" required class="form-control"  value="<?php echo (isset($full_name) ? $full_name : "") ?>">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email: </label>
                                    <input type="email" id="email" name="email" required class="form-control" value="<?php echo (isset($email) ? $email : "") ?>">
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile No: </label>
                                    <input type="text" id="mobile" name="mobile" required class="form-control"value="<?php echo (isset($mobile) ? $mobile : "") ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="discount">Discount:</label>
                                    <input type="text" id="discount" name="discount" required class="form-control" value="<?php echo (isset($discount) ? $discount : "") ?>">
                                </div>
                                <div class="form-group">
                                    <label for="id_card_no">ID Card No:</label>
                                    <input type="text" id="id_card_no" name="id_card_no" required class="form-control" value="<?php echo (isset($id_card_no) ? $id_card_no : "") ?>">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="row">
                        <div class="col-12">
                                <a hidden href="#" class="btn btn-secondary float-right">Back</a>
                                <input type="submit" name="save" value="Create new Customer"
                                    class="btn btn-success float-right" <?php echo (isset($_GET['id']) ? "hidden" : "") ?>>
                                    <input type="submit" name="update" value="Update Customer"
                                    class="btn btn-success float-right" <?php echo (isset($_GET['id']) ? "" : "hidden") ?>>
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