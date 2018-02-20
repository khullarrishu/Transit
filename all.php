<?php include('header.php');
	$query = "SELECT * FROM buses";

	$results = mysqli_query($connection, $query);

	// 4 - Handle the response from database
	if ($results == FALSE) {
	echo "Database query failed. <br/>";
	echo "SQL command: " . $query;
	exit();
	}
 ?>
	<section id="product1" class=" section clearfix">
		<div class="banner-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<table class="table">
				            <tr>
				              <th>Pick Up Location</th>
				              <th>Drop Location</th>
				              <th>Time</th>
				              <th>Day</th>
				              
				            </tr>

				            <!-- we got a results from the database, so put them into the table -->
				            <?php while ($bus = mysqli_fetch_assoc($results)) { ?>
				              <tr>
				                <td><?php echo $bus['Pickup_Location']; ?></td>
				                <td><?php echo $bus['Drop_Location']; ?></td>
				                <td><?php echo $bus['Time']; ?></td>
				                <td><?php echo $bus['Day']; ?></td>
				              </tr>
				            <?php } ?>

				          </table> 
					</div> 
				</div> 
			</div> 
		</div> 
	</section>
<?php include('footer.php');?>