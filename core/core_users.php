<?php 
include("dbcon.php");

if (isset($_POST['save'])) {
    $trigger_error = 0;
    $mysqli = $conn_hotel;

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $query = "INSERT INTO login (username, email, password) VALUES (?,?,?)";

     /* Prepare statement */
     $stmt = $mysqli->prepare($query);

     if ($stmt === false) {
         trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
     }
     $stmt->bind_param(
        'sss',
        $username,
        $email,
        $password
     
    );
 //execute the query
 if ($stmt->execute()) {
    //if saving success
   // $message = 'Customers added successfully!';
   // $message = '<div class="alert alert-success" role="alert">Customers added successfully!</div>';
    echo "order added successfully!'";
} else {
    //if unable to create new record
    http_response_code(500);
    echo  'There has been an error, please try again.<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>';
}
//close database connection
$mysqli->close();

}

?>