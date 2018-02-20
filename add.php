<?php include('header.php');

if (isset($_POST['add'])) {
	$pick=$_POST['pickup'];
	$drop=$_POST['drop'];
	$time=$_POST['time'];
	$day=$_POST['day'];
	$seats=$_POST['seats'];
	$query = "INSERT INTO buses (Pickup_Location ,Drop_Location ,Time,Day,number_of_tickets) Values ('$pick','$drop', '$time', '$day','$seats');";
	$results = mysqli_query($connection, $query);
	if ($results == FALSE) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
		echo "Database query failed. <br/>";
		echo "SQL command: " . $query;
		exit();
	}else{
		header("location:index.php");
	}
}elseif(isset($_POST['cancel'])){
	header("location:index.php");
}
?>
	<section class=" section clearfix">
		<div class="banner-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-3 col-sm-6">
						<form method="post">
							<input type="text" name="pickup" placeholder="Pickup Location">
							<input type="text" name="drop" placeholder="Drop Location">
							<input type="text" name="time" placeholder="Time">
							<input type="text" name="day" placeholder="Day">
							<input type="number" name="seats" placeholder="Number Of Seats">
							<input type="Submit" class="btn btn-primary" name="add" value="Add">
							<input type="Submit" style="margin-top: 10px" class="btn btn-danger" name="cancel" value="Cancel">
						</form>
					</div> 
				</div> 
			</div> 
		</div> 
	</section>
<?php include('footer.php');?>