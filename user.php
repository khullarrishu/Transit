<?php 
date_default_timezone_set ( "Canada/Eastern" );
$time= date('H:i:s');
$date = date("Y-m-d");
$weekendDay = false;
$day = date("D", strtotime($date));
if($day == 'Sat'){
    //Set our $weekendDay variable to TRUE.
    $weekendDay = true;
}
if($weekendDay){
    $query = "SELECT * from buses where Time > '$time' AND Day = 'ALL' ORDER BY `Time` ASC Limit 1 ";
} else{
    $query = "SELECT * from buses where Time > '$time' ORDER BY `Time` ASC Limit 1 ";
}

$results = mysqli_query($connection, $query);
$r = mysqli_fetch_assoc($results);
if($results==FALSE){
	
	echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
	echo "Database query failed. <br/>";
	echo "SQL command: " . $query;
	exit();
}
//echo date("h:i:sa");
 ?>
	<section class="banner section clearfix">
		<div class="banner-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						
						<?php 
							$users = "SELECT * FROM users where is_login='true'";
							$res= mysqli_query($connection, $users);
							$user=mysqli_fetch_assoc($res);
							$username=$user['username'];
							$user_id=$user['id'];
						 ?>
						 	<h1>Welcome <span style="text-transform: capitalize;"><?php echo $username; ?></span></h1>
							<p><strong>Current Time:</strong> <?php echo date("H:i:s");?></p>
							<?php if ($day == 'Sun') {?>
								<p style="float: left; background-color: yellow">Sorry no bus avialable today next bus will be avialable on Monday.</p>
							<?php }else{
								$id=$r['ID'];
								$check_ticket= "SELECT * FROM booked_tickets where user_id='$user_id' and date='$date' and bus_id='$id'";
								$c=mysqli_query($connection, $check_ticket);
								$ticket=mysqli_fetch_assoc($c);
								if($ticket){
									?>
										<p style="float: left;background-color: yellow">Next Bus from <?php echo $r['Pickup_Location']; ?> to <?php echo $r['Drop_Location']; ?> at <?php echo $r['Time']; ?> <a href="book.php?id=<?php echo $r['ID'] ?>">View Ticket</a></p>
									<?php
								}else{
								?>
								<p style="float: left;background-color: yellow">Next Bus from <?php echo $r['Pickup_Location']; ?> to <?php echo $r['Drop_Location']; ?> at <?php echo $r['Time']; ?> <a href="book.php?id=<?php echo $r['ID'] ?>">Book Seat now!!!</a></p>
							<?php
								}
							 } ?>
							
						
					</div> 
				</div> 
				<div class="row">
					<div class="col-sm-12"><h4>See Buses from:</h4></div>
					<div class="col-sm-4">
						<a class="bus_btn" href="buses.php?from=lambton">
						<div class="sec">
							<h4>Lambton College</h4>
						</div>
						</a>
					</div>
					<div class="col-sm-4">
						<a class="bus_btn" href="buses.php?from=brampton">
						<div class="sec">
							<h4>Brampton</h4>
						</div>
						</a>
					</div>
					<div class="col-sm-4">
						<a class="bus_btn" href="buses.php?from=missisuaga">
						<div class="sec">
							<h4>Missisuaga</h4>
						</div>
						</a>
					</div>
				</div>
			</div> 
		</div> 
	</section>
