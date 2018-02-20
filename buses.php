<?php include('header.php');
	if (isset($_GET['from'])) {
		$from = $_GET['from'];
		if($from=="lambton"){
			$location = "Lambton College";
			
		}elseif ($from=="brampton") {
			$location = "Brampton";
		}elseif ($from=="missisuaga") {
			$location = "Mississuaga";
		}else{
			header("location:index.php");
		}
		$query = "SELECT * FROM buses where Pickup_Location='$location'";

		$results = mysqli_query($connection, $query);

		// 4 - Handle the response from database
		if ($results == FALSE) {
		echo "Database query failed. <br/>";
		echo "SQL command: " . $query;
		exit();
		}
	}else{
		header("location:index.php");
	}
 ?>
	<section class=" section clearfix">
		<div class="banner-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h4>Buses from <?php echo $location ?></h4>
						<div class="sec">
				            <div class="bdr_t_b">
				              <div class="eql_width"><strong>Drop Location</strong></div>
				              <div class="eql_width"><strong>Time</strong></div>
				              <div class="eql_width"><strong>Day</strong></div>
				              <!-- <div class="eql_width"><strong>Book</strong></div> -->
				              
				            </div>

				            <!-- we got a results from the database, so put them into the table -->
				            <?php while ($bus = mysqli_fetch_assoc($results)) { ?>

				              <div class="bdr_t_b">
				                <div class="eql_width"><?php echo $bus['Drop_Location']; ?></div>
				                <div class="eql_width"><?php echo $bus['Time']; ?></div>
				                <div class="eql_width"><?php echo $bus['Day']; ?></div>
				                <!-- <?php if($bus['seats_taken'] >= $bus['number_of_tickets']){
				                	echo "No Seats Left";
				                } else{?>
				                	<div class="eql_width"><a href="book.php?id=<?php echo $bus['ID']; ?>" class="btn btn-primary">Book Seats</a></div>
				               <?php }?> -->
				              </div>
				            <?php } ?>

				          </div> 
					</div> 
				</div> 
			</div> 
		</div> 
	</section>
<?php include('footer.php');?>