<?php include('header.php');

	$query = "SELECT id from users Where is_login='true';";
	$results = mysqli_query($connection, $query);
	$r=mysqli_fetch_assoc($results);
	if($r){
		$query1 = "UPDATE users set is_login = 'false' WHERE id='$id';";
			$results1 = mysqli_query($connection, $query);
		foreach ($r as $key => $value) {
			$id = $value;
			echo $query1 = "UPDATE users set is_login = 'false' WHERE id='$id';";
			$results1 = mysqli_query($connection, $query1);
			if ($results1 == FALSE) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
				echo "Database query failed. <br/>";
				echo "SQL command: " . $query;
				exit();
			}
		}
		header("location: login.php");
	}
	?>
<?php include('footer.php');?>