<?php 
include('dbcon.php');

function getBookingHistory()
{

    // Connect to the database
    $mysqli = $GLOBALS['conn_hotel'];

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // the query
$no =1;
   

            $query =" SELECT rs.id, r.room_no, rt.price, rt.room_type,CONVERT( rs.booking_date, DATE) AS booking_date, c.full_name, c.mobile
            from room r 
            inner JOIN room_type rt on rt.id = r.room_type_id 
            left join reservation rs on rs.room_id = r.id
            inner join customers_tbl c on c.id = rs.customer_id";
    
              
          
    // mysqli select query
    $results = $mysqli->query($query);
    // mysqli select query
    if ($results) {

        print '<table id="example" class="display" style="width:100%">

            <thead>
                <tr>
               
                     <th>#</th>
				    <th>Customer Name</th>
                    <th>Customer Mobile</th>
                    <th>Room Type</th>
                    <th>Price</th>
                    <th>Booking Date</th>
                    <th>Action</th>
                   
             

			  </tr>
            </thead>
              <tbody>';

        while ($row = $results->fetch_assoc()) {
            print '
				<tr>                    
                <td>'.$no++.'</td>
                    <td>'. $row["full_name"].'</td>
                    <td>'. $row["mobile"].'</td>


                    <td>'.$row['room_no'].'-'. $row["room_type"] .'</td>
                    <td>'. $row["price"].'</td>
                    <td>'. $row["booking_date"].'</td>
                    <td class=" py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <a href="booking_edit.php?id='.$row['id'].'" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="booking_history.php?delete='.$row['id'].'" class="btn btn-danger"><i
                                class="fas fa-trash"></i></a>
                    </div>
                </td>
                  
			    </tr>
			';
        }

        print '</tr></tbody></table>';
    } else {

        echo "<p>There are no invoices to display.</p>";
    }
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
    $query = "SELECT * FROM reservation WHERE id=".$id;

    $results = $mysqli->query($query);
   if ($results) {
       $list = mysqli_fetch_array($results);

       extract($list);
       $customer_id = $list['customer_id'];
    $room_no = $list['room_id'];
    $room_type = $list['room_type'];
    $booking_date = $list['booking_date'];
    $no_people = $list['no_people'];
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

    $id = $_GET['id'];
    // merchant information
    $customer_id = $_POST['customer_id'];
    $room_id = $_POST['room_id'];
    //$room_type = $_POST['room_type'];
    $booking_date = $_POST['booking_date'];
    $no_people = $_POST['no_people'];
    $description = $_POST['description'];

    

    $query = "UPDATE reservation set customer_id=?, room_id=?, booking_date=?, no_people=?, description=? WHERE id=?";
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
        $id
    );

    //execute the query
    if ($stmt->execute()) {
        //if saving success

        echo "booking updated successfully!'";
    } else {
        //if unable to create new record
        echo  'There has been an error, please try .<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>';
    }
    //close database connection
    $mysqli->close();
}

?>