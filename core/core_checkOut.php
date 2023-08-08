<?php 
include('dbcon.php');


if (isset($_POST['save'])) {
    $trigger_error = 0;
    $mysqli = $conn_hotel;

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // merchant information
   
    $reservation = $_POST['reservation_id'];
    $customer_id = $_POST['customer_id'];
    $billing_type = $_POST['billing_type'];
    $grand_total = $_POST['total'];
  //  $billing_date = new DateTime();
    

    $query = "INSERT INTO billing (reservation_id,customer_id,billing_type,grand_total) VALUES (?,?,?,?)";

    /* Prepare statement */
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->error, E_USER_ERROR);
    }

    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param(
        'iisi',
        $reservation,
        $customer_id,
        $billing_type,
        $grand_total,
     //   $billing_date
    );

    //execute the query
    if ($stmt->execute()) {
        $query1 = "UPDATE reservation SET room_id=NULL, is_checkout=1 WHERE id=?";

        $stmt1 = $mysqli->prepare($query1);
        $stmt1->bind_param('i', $reservation);
        $stmt1->execute();
      
     //header("Location: invoice.php?id=$reservation");

       echo " added successfully!'";
    } else {
        //if unable to create new record
        echo  'There has been an error, please try again.<pre>' . $mysqli->error . '</pre><pre>' . $query . '</pre>';
    }
    //close database connection
    $mysqli->close();
}

function getCheckOut()
{

    // Connect to the database
    $mysqli = $GLOBALS['conn_hotel'];

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // the query
$no =1;
   

            $query =" SELECT v.id, r.room_no, rt.room_type, rt.price, v.booking_date, c.full_name, c.mobile
            FROM reservation AS v 
            LEFT JOIN room AS r ON r.id = v.room_id 
            inner JOIN room_type AS rt ON rt.id = r.room_type_id 
            LEFT JOIN customers_tbl AS c ON c.id = v.customer_id WHERE is_checkout= 0";
    
              
          
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
                    <th>Checkout<th>
             

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
                    <div class="btn-group btn-group-sm" '. ($row['booking_date'] >  date("Y-m-d")? "hidden" : "").'>
                        <a href="billings.php?id='.$row['id'].'" class="btn btn-info">Check out</i></a>
                        
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
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Connect to the database
    $mysqli = $GLOBALS['conn_hotel'];

    // output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $rid = $_GET['id'];
    // the query
        $query = "SELECT rs.id, r.room_no, rt.price, rt.room_type,NOW(),CONVERT( rs.booking_date, DATE) AS booking_date,  DATEDIFF(NOW(), booking_date) * rt.price AS total ,DATEDIFF(NOW(), booking_date) AS days, 
        c.full_name, c.mobile,c.email,c.id_card_no, c.discount, o.type, o.oprice, c.id AS customer_id
           from room r 
           inner JOIN room_type rt on rt.id = r.room_type_id 
           left join reservation rs on rs.room_id = r.id
           inner join customers_tbl c on c.id = rs.customer_id
           left join tbl_order o on o.customer_id = c.id WHERE rs.id=".$rid;

    $results = $mysqli->query($query);
   if ($results) {
       $list = mysqli_fetch_array($results);

       extract($list);
      
       $full_name = $list['full_name'];
       $email = $list['email'];
       $mobile = $list['mobile'];
       $discount = $list['discount'];
       $id_card = $list['id_card_no'];
       $booking_date = $list['booking_date'];
       
       $days = $list['days'];
       $customer_id = $list['customer_id'];
       $room_no = $list['room_no'];
       $room_type = $list['room_type'];
       $grand_total = $list['total'];
       $orders = $list['oprice'];
       $type = $list['type'];


       
     

       
   } else {
       echo $mysqli->error;
   }
}

?>