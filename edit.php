<?php include('header.php');
if (isset($_GET['id'])) {
	$id=$_GET['id'];
}else{
	header("location:index.php");
}
if (isset($_POST['update'])) {
	$pick=$_POST['pickup'];
	$drop=$_POST['drop'];
	$time=$_POST['time'];
	$day=$_POST['day'];
	$seats=$_POST['seats'];
	$query = "UPDATE  buses set Pickup_Location='$pick', Drop_Location='$drop', Time='$time', Day='$day', number_of_tickets='$seats' WHERE ID='$id';";
	$results = mysqli_query($connection, $query);
	if ($results == FALSE) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
		echo "Database query failed. <br/>";
		echo "SQL command: " . $query;
		exit();
	}else{
		header("location:sendSMS.php?id=$id");
	}
}elseif(isset($_POST['cancel'])){
	header("location:index.php");
}else{
	$query = "SELECT * from buses where ID='$id'";
	$results = mysqli_query($connection, $query);
	$bus=mysqli_fetch_assoc($results);
}
?>
	<section class=" section clearfix">
		<div class="banner-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-3 col-sm-6">
						<form method="post">
							<input type="text" name="pickup" placeholder="Pickup Location" value="<?php echo $bus['Pickup_Location'] ?>">
							<input type="text" name="drop" placeholder="Drop Location" value="<?php echo $bus['Drop_Location']; ?>">
							<input type="text" name="time" placeholder="Time" value="<?php echo $bus['Time']; ?>">
							<input type="text" name="day" placeholder="Day" value="<?php echo $bus['Day'];?>">
							<input type="text" name="seats" placeholder="Number Of Seats" value="<?php echo $bus['number_of_tickets'];?>">
							<input type="Submit" class="btn btn-primary" name="update" value="Update">
							<input type="Submit" style="margin-top: 10px" class="btn btn-danger" name="cancel" value="Cancel">
						</form>
					</div> 
				</div> 
			</div> 
		</div> 
	</section>
<?php include('footer.php');?>