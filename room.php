<?php include("core/core_rooms.php"); ?>
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
                            <h3>Add New Room </h3>
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
                                    <label for="room_type">Room Size</label>
                                    <select name="room_type_id" id='room_type_id' class="form-control">
                                    <option selected>Choose the Room</option>
                                    <?php
                                        $query="SELECT * FROM room_type";
                                        $result=mysqli_query($conn_hotel,$query);
                                        if(mysqli_num_rows($result)>0){

                                        while ($row=mysqli_fetch_assoc($result)) {
                                            ?>
                                    <option value="<?php echo $row['id']; ?>" <?php echo (isset($room_type_id) && $room_type_id == $row['id'] ? "selected" : "") ?>><?php echo $row['room_type']; ?></option>
                                    <?php
                                           }
                                     }

                                ?>            
                                    </select>
                                </div>

                           

                                <div class="form-group">
                                    <label for="room_no">Room Number </label>
                                    <input type="number" id="room_no" name="room_no" required class="form-control" value="<?php echo (isset($room_no) ? $room_no : "") ?>">
                                </div>

                               
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="row">
                        <div class="col-12">
                                <a hidden href="#" class="btn btn-secondary float-right">Back</a>
                                <input type="submit" name="save" value="Create new Room"
                                    class="btn btn-success float-right" <?php echo (isset($_GET['id']) ? "hidden" : "") ?>>
                                    <input type="submit" name="update" value="Update Room"
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