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
   
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    

    $query = "INSERT INTO room_type (room_type, price, description) VALUES (?,?,?)";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'sds',
        $room_type,
        $price,
        $description
    );

    //execute the query
    if ($stmt->execute()) {
        //if saving success
       // $message = 'Customers added successfully!';
        $message = '<div class="alert alert-success" role="alert">Room added successfully!</div>';
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
    $room_type_id = $_GET['delete'];

    $query = "DELETE FROM room_type WHERE id = ?";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'i',
        $room_type_id
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

function getRoomtypes()
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
    $query = "SELECT * from room_type";

    // mysqli select query
    $results = $mysqli->query($query);
    // mysqli select query
    if ($results) {

        print '<table id="example" class="display" style="width:100%">

            <thead>
                <tr>
               
  <th>#</th>
				    <th>Room Type</th>
                    <th>Price</th>
                    <th>Description No</th>
                    

				    <th>Action</th>

			  </tr>
            </thead>
              <tbody>';

        while ($row = $results->fetch_assoc()) {
            print '
				<tr>                    
                <td>'.$no++.'</td>

                    <td>'.$row['room_type'].'</td>
					<td>' . $row["price"] .'</td>
                    <td>' . $row["description"] . '</td>
                
                    

                    <td class=" py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <a href="room_type.php?id='.$row['id'].'" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="room_type_list.php?delete='.$row['id'].'" class="btn btn-danger"><i
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

    $room_type_id = $_GET['id'];
    // the query
    $query = "SELECT * FROM room_type WHERE id=".$room_type_id;
    $results = $mysqli->query($query);
   if ($results) {
       $list = mysqli_fetch_array($results);

       extract($list);
       $room_type = $list['room_type'];
       $price = $list['price'];
       $description = $list['description'];

       
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

    $room_type_id = $_GET['id'];
    // merchant information
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $description = $_POST['description'];
  


    $query = "UPDATE room_type set room_type=?, price=?, description=? WHERE id=?";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'sdsi',
        $room_type,
        $price,
        $description,
        $room_type_id
    );

    //execute the query
    if ($stmt->execute()) {
        //if saving success

        echo "Room updated successfully!'";
    } else {
        //if unable to create new record
        echo  'There has been an error, please try .<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>';
    }
    //close database connection
    $mysqli->close();
}

?>

