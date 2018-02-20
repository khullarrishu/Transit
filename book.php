<?php 
date_default_timezone_set ( "Canada/Saskatchewan" );
include('header.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$users = "SELECT * FROM users where is_login='true'";
		$res= mysqli_query($connection, $users);
		$user=mysqli_fetch_assoc($res);
		$user_id=$user['id'];
		$query = "SELECT * FROM buses where ID='$id'";

		$results = mysqli_query($connection, $query);
		if ($results == FALSE) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
 
			echo "Database query failed. <br/>";
			echo "SQL command: " . $query;
			exit();
		}
		$bus = mysqli_fetch_assoc($results);
		$seats=$bus['seats_taken'];
		$new_seats=$seats+1;
		$update_seats = "UPDATE buses set seats_taken='$new_seats' where ID='$id'";

		$results1 = mysqli_query($connection, $update_seats);
		if ($results1 == FALSE) {
			echo "Database query failed. <br/>";
			echo "SQL command: " . $update_seats;
			exit();
		}else{	
			$date=date("Y-m-d");
			$check_ticket= "SELECT * FROM booked_tickets where user_id='$user_id' and date='$date' and bus_id='$id'";
			$c=mysqli_query($connection, $check_ticket);
			$ticket=mysqli_fetch_assoc($c);
			$username=$user['username'];
			if($ticket){
				$random=$ticket['ticket_number'];
				$id1=$ticket['bus_id'];
				$booked_buses="SELECT * FROM buses where ID='$id1'";
				$resul=mysqli_query($connection, $booked_buses);
				$booked_bus=mysqli_fetch_assoc($resul);
				$pick=$booked_bus['Pickup_Location'];
				$drop=$booked_bus['Drop_Location'];
				$time=$booked_bus['Time'];
				$date=$ticket['date'];
			}else{
				$random=$username.rand();
				$pick=$bus['Pickup_Location'];
				$drop=$bus['Drop_Location'];
				$time=$bus['Time'];
				$date=date("Y-m-d");
				$insert_ticket="INSERT into booked_tickets (user_id,bus_id,ticket_number,date) VALUES('$user_id','$id','$random','$date')";
				if(mysqli_query($connection, $insert_ticket)==False){
					echo "Database query failed. <br/>";
					exit();
				}
			}
			
		}
	}else{
		header("location:index.php");
	}
 ?>
 	<section class=" section clearfix">
		<div class="banner-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-3 col-sm-6">
						<div class="sec">
							<div class="col-sm-6"><div id="qrcode"></div></div>
							<div class="col-sm-6">
								<p><strong>Student Name:</strong> <?php echo $username; ?></p>
								<p><strong>Bus:</strong> <?php echo $pick." to " . $drop; ?></p>
								<p><strong>Time:</strong> <?php echo $time; ?></p>
								<p><strong>Date:</strong> <?php echo $date; ?></p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript" src="jquery.qrcode.min.js"></script>
	<script type="text/javascript">
		jQuery('#qrcode').qrcode("<?php echo $random; ?>");
	</script>

<?php include('footer.php');?>