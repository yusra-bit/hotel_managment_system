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
   
    $room_type_id = $_POST['room_type_id'];
    $room_no = $_POST['room_no'];

    

    $query = "INSERT INTO room (room_type_id, room_no) VALUES (?,?)";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'ii',
        $room_type_id,
        $room_no
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
    $id = $_GET['delete'];

    $query = "DELETE FROM room WHERE id = ?";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'i',
        $id
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

function getRooms()
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
    $query = "SELECT r.id, t.room_type, r.room_no, t.price, t.description from room r 
              INNER JOIN room_type t
              ON r.room_type_id = t.id";

   // $query = "SELECT * FROM class cINNER JOIN teacher tON c.teacher_id = t.id";

    // mysqli select query
    $results = $mysqli->query($query);
    // mysqli select query
    if ($results) {

        print '<table id="example" class="display" style="width:100%">

            <thead>
                <tr>
               
  <th>#</th>
				    <th>Room Type</th>
                    <th>Room No</th>
                    <th>Description</th> 
                    <th>Price </th>
             
                    

				    <th>Action</th>

			  </tr>
            </thead>
              <tbody>';

        while ($row = $results->fetch_assoc()) {
            print '
				<tr>                    
                <td>'.$no++.'</td>

                    <td>'.$row['room_type'].'</td>
					<td>' . $row["room_no"] .'</td>
					<td>' . $row["description"] .'</td>
                    <td>' .$row['price'].'</td>
                
                    

                    <td class=" py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <a href="room.php?id='.$row['id'].'" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="room_list.php?delete='.$row['id'].'" class="btn btn-danger"><i
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

    $id = $_GET['id'];
    // the query
    $query = "SELECT * FROM room WHERE id=".$id;
    $results = $mysqli->query($query);
   if ($results) {
       $list = mysqli_fetch_array($results);

       extract($list);
       $room_type_id = $list['room_type'];
       $room_no = $list['room_no'];
     

       
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

    $id = $_GET['id'];
    // merchant information
    $room_type_id = $_POST['room_type_id'];
    $room_no = $_POST['room_no'];
    
  


    $query = "UPDATE room set room_type_id=?, room_no=? WHERE id=?";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'iii',
        $room_type_id,
        $room_no,
        $id
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

