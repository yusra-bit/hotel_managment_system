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
   
    $customer_id = $_POST['customer_id'];
    $room_no = $_POST['room_id'];
    $booking_date = $_POST['booking_date'];
    $no_people = $_POST['no_people'];
    $description = $_POST['description'];
    $is_checkout = 0;

    

    $query = "INSERT INTO reservation (customer_id, room_id, booking_date, no_people, description,is_checkout) VALUES (?,?,?,?,?,?)";
    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'iisssi',
        $customer_id,
    $room_no,
    $booking_date, 
    $no_people,
    $description,
    $is_checkout

    );

    //execute the query
    if ($stmt->execute()) {
        //if saving success
       // $message = 'Customers added successfully!';
       // $message = '<div class="alert alert-success" role="alert">Room added successfully!</div>';

       //updating CHECKOUT & CHECKIN HERE
        echo "checked in successfully!'";
    } else {
        //if unable to create new record
        echo  'There has been an error, please try again.<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>';
    }
    //close database connection
    $mysqli->close();
}



function getCheckin()
{

    // Connect to the database
    $mysqli = $GLOBALS['conn_hotel'];

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // the query
$no =1;
   

            $query ="SELECT r.id, r.room_no, rt.room_type, rt.price, ifnull(rs.is_checkout, 1) as is_checkout 
            from room r 
            inner JOIN room_type rt on rt.id = r.room_type_id 
            left join reservation rs on rs.room_id = r.id";
              
              
          
    // mysqli select query
    $results = $mysqli->query($query);
    // mysqli select query
    if ($results) {

        print '<table id="example" class="display" style="width:100%">

            <thead>
                <tr>
               
  <th>#</th>
				    <th>Room No</th>
                    <th>Room Type</th>
                    <th>Price</th>
                    <th>Status</th>
             

             
                    

				    <th>Action</th>

			  </tr>
            </thead>
              <tbody>';

        while ($row = $results->fetch_assoc()) {
            print '
				<tr>                    
                <td>'.$no++.'</td>

                    <td>'.$row['room_no'].'</td>
					<td>'.$row["room_type"] .'</td>
                    <td>'. $row["price"].'</td>
                    <td>'. ($row['is_checkout'] == 1 ? "Available" : "Booked") .'</td>

                
                    <td class=" py-0 align-middle">
                    <div class="btn-group btn-group-sm" '. ($row['is_checkout'] == 0 ? "hidden" : "").'> 
                        <a href="check_in.php?id='.$row['id'].'" class="btn btn-info">Check in</i></a>
                        
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

    $room_id = $_GET['id'];

    // the query
    $query = "SELECT r.id, t.room_type, r.room_no, t.price 
    FROM room r 
    INNER JOIN room_type t
    ON r.room_type_id = t.id
     WHERE r.id=".$room_id;

    $results = $mysqli->query($query);
   if ($results) {
       $list = mysqli_fetch_array($results);

       extract($list);
     
       $room_no = $list['room_no'];
       $room_type= $list['room_type'];
       
     

       
   } else {
       echo $mysqli->error;
   }
}
?>