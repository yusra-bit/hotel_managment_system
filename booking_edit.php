<?php include("core/core_bookingHistory.php"); ?>
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
                            <h3>EDIT BOOKING DETAILS</h3>
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
                           

                          
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="customer_id">Customer</label>
                                    <select name="customer_id" id='customer_id' class="form-control">
                                    <option selected>Select..</option>
                                    <?php
                                        $query="SELECT * FROM customers_tbl";
                                        $result=mysqli_query($conn_hotel,$query);
                                        if(mysqli_num_rows($result)>0){

                                        while ($row=mysqli_fetch_assoc($result)) {
                                            ?>
                                  <option value="<?php echo $row['id']; ?>" <?php echo (isset($customer_id) && $customer_id == $row['id'] ? "selected" : "") ?>><?php echo $row['full_name']; ?></option>
                                    <?php
                                           }
                                     }
                                ?>            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="booking_date">Booking date</label>
                                    <input type="date" name="booking_date" class="form-control" value=" <?php echo (isset($booking_date) && $booking_date == $row['id'] ? "selected" : "") ?>">
                                </div>

                                <div class="form-group">
                                    <label for="room_id">Room </label>
                                    <select name="room_id" id='room_id' class="form-control">
                                    <option selected>Select..</option>
                                    <?php
                                        $query="SELECT * FROM room";
                                        $result=mysqli_query($conn_hotel,$query);
                                        if(mysqli_num_rows($result)>0){

                                        while ($row=mysqli_fetch_assoc($result)) {
                                            ?>
                                    <option value="<?php echo $row['id']; ?>" <?php echo (isset($room_id) && $room_id == $row['id'] ? "selected" : "") ?>><?php echo $row['room_no']; ?></option>
                                    <?php
                                           }
                                     }

                                ?>            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_people">Number of People </label>
                                    <select name="no_people" id="no_people" class="form-control">
                                    <option value="1" <?php echo (isset($no_people) && $no_people == "1" ? "selected" : "") ?>>1</option>  
                                    <option value="2" <?php echo (isset($no_people) && $no_people == "2" ? "selected" : "") ?>>2</option>
                                    <option value="2" <?php echo (isset($no_people) && $no_people == "2" ? "selected" : "") ?>>1 with one child</option>  
                                    <option value="3" <?php echo (isset($no_people) && $no_people == "3" ? "selected" : "") ?>>2 with one child</option>  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">notes</label>
                                    <textarea name="description" id="description" cols="12" rows="4" class="form-control" ><?php echo (isset($description) ? $description : "") ?></textarea>
                                </div>
                                
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="row">
                        <div class="col-12">
                                <a hidden href="#" class="btn btn-secondary float-right">Back</a>
                                    <input type="submit" name="update" value="Update Booking"
                                    class="btn btn-success float-right">
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