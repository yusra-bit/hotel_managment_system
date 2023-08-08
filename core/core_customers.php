<?php
include("dbcon.php");


if (isset($_POST['save'])) {
    $trigger_error = 0;
    $mysqli = $conn_hotel;

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // merchant information
   
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $discount = $_POST['discount'];
    $id_card_no = $_POST['id_card_no'];
    

    $query = "INSERT INTO customers_tbl (full_name, email, mobile, discount, id_card_no) VALUES (?,?,?,?,?)";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'sssii',
        $full_name,
        $email,
        $mobile,
        $discount,
        $id_card_no
    );

    //execute the query
    if ($stmt->execute()) {
        //if saving success
       // $message = 'Customers added successfully!';
        $message = '<div class="alert alert-success" role="alert">Customers added successfully!</div>';
       // echo "Customers added successfully!'";
    } else {
        //if unable to create new record
        echo  'There has been an error, please try again.<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>';
    }
    //close database connection
    $mysqli->close();
}

if (isset($_GET['delete'])) {
    $trigger_error = 0;
    $mysqli = $conn_hotel;

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // merchant information
    $customer_id = $_GET['delete'];

    $query = "DELETE FROM customers_tbl WHERE id = ?";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'i',
        $customer_id
    );

    //execute the query
    if ($stmt->execute()) {
        //if saving success

        echo "Customer deleted successfully!'";
    } else {
        //if unable to create new record
        echo  'There has been an error, please try again.<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>';
    }
    //close database connection
    $mysqli->close();
}

function getCustomers()
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
    $query = "SELECT * from customers_tbl";

    // mysqli select query
    $results = $mysqli->query($query);
    // mysqli select query
    if ($results) {

        print '<table id="example" class="display" style="width:100%">

            <thead>
                <tr>
               
  <th>ID</th>
				    <th>Full Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    
                    <th>Id Card</th>
                  
                    
                  
				    <th>Action</th>

			  </tr>
            </thead>
              <tbody>';

        while ($row = $results->fetch_assoc()) {
            print '
				<tr>                    
                <td>'.$no++.'</td>

                    <td>'.$row['full_name'].'</td>
					<td>' . $row["email"] .'</td>
                    <td>' . $row["mobile"] . '</td>
                   
                    <td>' . $row["id_card_no"] . '</td>
                   
                    

                    <td class=" py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <a href="customers.php?id='.$row['id'].'" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="customer_list.php?delete='.$row['id'].'" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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

if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Connect to the database
    $mysqli = $GLOBALS['conn_hotel'];

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $customer_id = $_GET['id'];
    // the query
    $query = "SELECT * FROM customers_tbl WHERE id=".$customer_id;
    $results = $mysqli->query($query);
   if ($results) {
       $list = mysqli_fetch_array($results);

       extract($list);
       $full_name = $list['full_name'];
       $email = $list['email'];
       $mobile = $list['mobile'];
       $discount = $list['discount'];
       $id_card_no = $list['id_card_no'];


       
   } else {
       echo $mysqli->error;
   }
}

if (isset($_POST['update'])) {
    $trigger_error = 0;
    $mysqli = $conn_hotel;

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $customer_id = $_GET['id'];
    // merchant information
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $discount = $_POST['discount'];
    $id_card_no = $_POST['id_card_no'];

    

    $query = "UPDATE customers_tbl set full_name=?, email=?, mobile=?, discount=?, id_card_no=? WHERE id=?";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'sssiii',
        $full_name,
        $email,
        $mobile,
        $discount,
        $id_card_no,  
        $customer_id,
    );

    //execute the query
    if ($stmt->execute()) {
        //if saving success

        echo "Customer updated successfully!'";
    } else {
        //if unable to create new record
        echo  'There has been an error, please try .<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>';
    }
    //close database connection
    $mysqli->close();
}

?>

