<?php

require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

use Twilio\Rest\Client;
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "lambton";
	// 2 - Connect to the database and handle any connection errors
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$query = "SELECT * from buses where ID='$id'";
	$results = mysqli_query($connection, $query);
	$bus=mysqli_fetch_assoc($results);
	if ($results == FALSE) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
		echo "Database query failed. <br/>";
		echo "SQL command: " . $query;
		exit();
	}
	echo "Sending SMS! <br>";
	// Your Account SID and Auth Token from twilio.com/console
	$account_sid = 'ACfac3b32c542539cc2fe540c3a5598f10';
	$auth_token = 'd472b10cb99c2c75df79f6446243cbc8';

	// A Twilio number you own with SMS capabilities
	$twilio_number = "+15146138572";
	$msg = "Hello, Following updates have been made in bus schedule Pick Up Location: ".$bus['Pickup_Location']." Drop Location: ".$bus['Drop_Location']." Time: ".$bus['Time']." Day: ".$bus['Day'];
	$client = new Client($account_sid, $auth_token);
	$client->messages->create(
	    // Where to send a text message (your cell phone?)
	    '+13657789438',
	    array(
	        'from' => $twilio_number,
	        'body' => $msg
	    )
	);

	echo "Done sending SMS! <br>";
	echo"<script language='javascript'>
			setTimeout(function(){ window.location = 'index.php';}, 2000);
		</script>";
}else{
	header("location:index.php");
}
?>