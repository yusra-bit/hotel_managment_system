<?php 
include("dbcon.php");

if (isset($_POST['save'])) {
    $trigger_error = 0;
    $mysqli = $conn_hotel;

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $customer_id = $_POST['customer_id'];
    $room_id = $_POST['room_id'];
    $type = $_POST['type'];
    $price= $_POST['price'];
    $note= $_POST['note'];


    $query = "INSERT INTO tbl_order (customer_id, room_id, type, price,note) VALUES (?,?,?,?,?)";

     /* Prepare statement */
     $stmt = $mysqli->prepare($query);

     if ($stmt === false) {
         trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
     }
     $stmt->bind_param(
        'iisis',
        $customer_id,
        $room_id,
        $type,
        $price,
        $note
     
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

if (isset($_GET['delete'])) {
    $trigger_error = 0;
    $mysqli = $conn_hotel;

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // merchant information
    $oid = $_GET['delete'];

    $query = "DELETE FROM tbl_order WHERE id = ?";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'i',
        $oid
    );

    //execute the query
    if ($stmt->execute()) {
        //if saving success

        echo "Order deleted successfully!'";
    } else {
        //if unable to create new record
        echo  'There has been an error, please try again.<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>';
    }
    //close database connection
    $mysqli->close();
}

function getOrders()
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
    $query = "SELECT o.id, c.full_name, r.room_no, o.type, o.price from tbl_order o
             INNER JOIN customers_tbl c
             ON o.customer_id = c.id
             INNER JOIN room r
             ON o.room_id = r.id ";

    // mysqli select query
    $results = $mysqli->query($query);
    // mysqli select query
    if ($results) {

        print '<table id="example" class="display" style="width:100%">

            <thead>
                <tr>
               
  <th>ID</th>
				    <th>Full Name</th>
                    <th>Room no</th>
                    <th>Order</th>
                    
                    <th>Price</th>
                  
                    
                  
				    <th>Action</th>

			  </tr>
            </thead>
              <tbody>';

        while ($row = $results->fetch_assoc()) {
            print '
				<tr>                    
                <td>'.$no++.'</td>

                    <td>'.$row['full_name'].'</td>
					<td>' . $row["room_no"] .'</td>
                    <td>' . $row["type"] . '</td>
                   
                    <td>' . $row["price"] . '</td>
                   
                    

                    <td class=" py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <a href="orders.php?id='.$row['id'].'" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="orders_list.php?delete='.$row['id'].'" class="btn btn-danger"><i
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

if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Connect to the database
    $mysqli = $GLOBALS['conn_hotel'];

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $oid = $_GET['id'];
    // the query
    $query = "SELECT * FROM tbl_order WHERE id=".$oid;
    $results = $mysqli->query($query);
   if ($results) {
       $list = mysqli_fetch_array($results);

       extract($list);
       $customer_id = $list['customer_id'];
       $room_id = $list['room_id'];
       $type = $list['type'];
       $price = $list['price'];
       $note = $list['note'];


       
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

    $oid = $_GET['id'];
    // merchant information
    $customer_id = $_POST['customer_id'];
    $room_id = $_POST['room_id'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $note = $_POST['note'];

    

    $query = "UPDATE tbl_order set customer_id=?, room_id=?, type=?, price=?, note=? WHERE id=?";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
  
        'iisisi',
        $customer_id,
        $room_id,
        $type,
        $price,
        $note,
        $oid
    );

    //execute the query
    if ($stmt->execute()) {
        //if saving success

        echo " updated successfully!'";
    } else {
        //if unable to create new record
        echo  'There has been an error, please try .<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>';
    }
    //close database connection
    $mysqli->close();
}

?>

