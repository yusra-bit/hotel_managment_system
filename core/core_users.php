<?php 
include("dbcon.php");
/** */
if (isset($_POST['save'])) {
    $trigger_error = 0;
    $mysqli = $conn_hotel;

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $status = $_POST['status'];


    $query = "INSERT INTO tbl_login (full_name, email, phone, password, role, status) VALUES (?,?,?,?,?,?)";

     /* Prepare statement */
     $stmt = $mysqli->prepare($query);

     if ($stmt === false) {
         trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
     }
     $stmt->bind_param(
        'ssssss',
        $full_name,
        $email,
        $password,
        $phone,
        $role,
        $status
     
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

function getUsers()
{

    // Connect to the database
    $mysqli = $GLOBALS['conn_hotel'];

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // the query
   // $query = "SELECT * from student";
$no =1;
    $query = "SELECT * FROM tbl_login";

   // $query = "SELECT * FROM class cINNER JOIN teacher tON c.teacher_id = t.id";

    // mysqli select query
    $results = $mysqli->query($query);
    // mysqli select query
    if ($results) {

        print '<table id="example" class="display" style="width:100%">

            <thead>
                <tr>
               
  <th>#</th>
				    <th>Name </th>
                    <th>Email </th>
                    <th>Role</th> 
                    <th>Status </th>
             
                    

				    <th>Action</th>

			  </tr>
            </thead>
              <tbody>';

        while ($row = $results->fetch_assoc()) {
            print '
				<tr>                    
                <td>'.$no++.'</td>

                    <td>'.$row['full_name'].'</td>
					<td>' . $row['email'] .'</td>
					<td>' . $row['role'] .'</td>
                    <td>' .$row['status'].'</td>
                
                    

                    <td class=" py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <a href="user_edit.php?id='.$row['id'].'" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="users_list.php?delete='.$row['id'].'" class="btn btn-danger"><i
                                class="fas fa-trash"></i></a>
                    </div>
                </td>
                    </td>
			    </tr>
			';
        }

        print '</tr></tbody></table>';
    } else {

        echo "<p>There are no invoices to display.</p>";
    }

    // Frees the memory associated with a result
    // $results->free();

    // // close connection 
    // $mysqli->close();

}

?>