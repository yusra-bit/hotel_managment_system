<?php include("core/core_reservation.php"); ?>
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
                    <div class="col-md-12">
                        <div class="card ">
                          
                         <div class="card-body">
                                
                           <h5>Live room Status</h5>    
                            <div class="card-deck">


  <div class="card text-white bg-success ">
    <div class="card-body">
      <b class="card-text">Room no</b>
      <p class="card-text">Room type</p>
      <p class="card-text">Room Availability</p>
    </div>
  </div>
  <div class="card text-white bg-success">
    <div class="card-body">
      <b class="card-text">Room no</b>
      <p class="card-text">Room type</p>
      <p class="card-text">Room Availability</p>
    </div>
  </div>
</div>

                            </div>
                            <!-- /.card-body -->
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