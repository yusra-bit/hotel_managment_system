<?php include("core/core_reservation.php");

$query ="SELECT r.id, r.room_no, rt.room_type, rt.price, ifnull(rs.is_checkout, 1) as is_checkout 
            from room r 
            inner JOIN room_type rt on rt.id = r.room_type_id 
            left join reservation rs on rs.room_id = r.id";
            		$result = mysqli_query($conn_hotel, $query);
                // fetch result in array format
                $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
                mysqli_free_result($result);
                mysqli_close($conn_hotel);
              ?>
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
        <?php include("includes/navbar.php"); ?>
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
                            <h3>Dashboard </h3>
                        </div>
                      
                    </div>
                </div><!-- /.container-fluid -->
            </section>
   
<div class="grey-bg container-fluid">
 
  
  <section id="stats-subtitle">
  

  <div class="row">
    <div class="col-xl-6 col-md-12">
      <div class="card overflow-hidden">
        <div class="card-content">
          <div class="card-body cleartfix">
            <div class="media align-items-stretch">
              <div class="align-self-center">
                <i class="icon-wallet primary font-large-2 mr-2"></i>
              </div>
              <div class="media-body">
               
              </div>
              <div class="align-self-center">
                <h1>18,000</h1> 
                <span>Total Revenue</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>
</div>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col">
                        <div class="card ">
                          
                         <div class="card-body">
                                
                      
                                    <h4 class="header-title mb-3">Live Rooms Status</h4>

                                     <div class="grid-structure">
                                        <div class="row">
                                                                                       
                                            <div class="col-lg-12 col-md-6">
                                             <div class="grid-container">
                                             <?php foreach($users as $user): ?>
                            
   
                            <div class="card text-white bg-dark ">
                              <div class="card-body">
                                
                                <b class="card-text"><?php echo $user['room_no']; ?></b>
                                <p class="card-text"><?php echo $user['room_type']; ?></p>
                                <p class="card-text"><?php echo $user['is_checkout'] == 1 ? "Available" : "Booked"?></p>
                              </div>
                            </div>
                            <?php endforeach; ?>
                                                 
                                                                                       
                                         
                                </div>
                        </div>
                        <!-- /.card -->
                      
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