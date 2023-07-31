<?php/* include('core/dbcon.php');


session_start();

$email = $password ='';


                 

if (isset($_POST['login'])){

  if(empty($_POST['email'])){
    $errorMsg['email'] ='email is required <br/>';
}else{
    $email=$_POST['email'];
    
    }

    if(empty($_POST['password'])){
        $errorMsg['password'] ='password is required <br/>';
    }else{
        $password=$_POST['password'];
        
        }
    //fetching all data from db
    $query ="SELECT * FROM login WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn_hotel, $query);

    if (mysqli_num_rows($result) == 1){
        $row = $result->fetch_assoc();
        $_SESSION['ID'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['PASS'] = $row['password'];
    
      header("location:index.php");


    }else{
      echo "Invalid Account<";
     //   $msg="<div class='alert alert-warning'>Invalid Account</div>";
    }
        

}

?>



<?php include('includes/header.html'); ?>

<h1>Login</h1>
<form method="post" action="" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4">
    </div>
  </div>

  <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>*/