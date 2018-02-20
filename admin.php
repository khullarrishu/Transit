<?php 
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
						<h1>List Of All Busses</h1>
						<table class="table">
				            <tr>
				              <th>ID</th>
				              <th>Pick Up Location</th>
				              <th>Drop Location</th>
				              <th>Time</th>
				              <th>Day</th>
				              <th>Number of seats</th>
				              <th>Booked seats</th>
				              <th>&nbsp;</th>
				              <th>&nbsp;</th>
				              <th>&nbsp;</th>
				            </tr>

				            <!-- we got a results from the database, so put them into the table -->
				            <?php while ($bus = mysqli_fetch_assoc($results)) { ?>
				              <tr>
				                <td><?php echo $bus['ID']; ?></td>
				                <td><?php echo $bus['Pickup_Location']; ?></td>
				                <td><?php echo $bus['Drop_Location']; ?></td>
				                <td><?php echo $bus['Time']; ?></td>
				                <td><?php echo $bus['Day']; ?></td>
				                <td><?php echo $bus['number_of_tickets']; ?></td>
				                <td><?php echo $bus['seats_taken']; ?></td>
				                <td><a class="action" href="<?php echo 'edit.php?id=' . $bus['ID']; ?>">Update</a></td>
				                <td><a class="action" href="<?php echo 'delete.php?id='. $bus["ID"]; ?>">Delete</a></td>
				                <td><a class="action" href="<?php echo 'reset.php?id='. $bus["ID"]; ?>">Reset Seats</a></td>
				              </tr>
				            <?php } ?>

				          </table> 
					</div> 
				</div> 
			</div> 
		</div> 
	</section>