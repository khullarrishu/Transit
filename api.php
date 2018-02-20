<?php 
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	define("DBHOST", "localhost");
	define("DBUSER", "root");
	define("DBPASS", "");
	define("DBNAME", "lambton");

	$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	// show an error message if PHP cannot connect to the database
	if (!$connection)
	{
	  $output = array("error" => "Failed to connect to MySQL: " . mysqli_connect_error());
	  echo json_encode($output);
	  exit();
	}

	if (isset($_GET['location'])) {
		$location=$_GET['location'];
		$query = "SELECT * FROM buses where Drop_Location='$location'";

		$results = mysqli_query($connection, $query);

		// 4 - Handle the response from database
		if ($results == FALSE) {
		$output = array("error" => "Database quer failed. SQL command: " . $query);
		echo json_encode($output);
		exit();
		}
	}else{
		$query = "SELECT * FROM buses";

		$results = mysqli_query($connection, $query);

		// 4 - Handle the response from database
		if ($results == FALSE) {
		$output = array("error" => "Database quer failed. SQL command: " . $query);
		echo json_encode($output);
		exit();
		}
	}
	$buses=array();
	while ($row = mysqli_fetch_assoc($results)) {
	  $item = array(
	    "Pick_up_location" => $row["Pickup_Location"],
	    "Drop_Location" => $row["Drop_Location"],
	    "Time" => $row["Time"],
	    "Day" => $row["Day"]
	  );
	  array_push($buses, $item);
	}
	
	echo json_encode($buses);

?>