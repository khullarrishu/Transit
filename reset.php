<?php include('header.php');
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$query = "UPDATE buses set seats_taken='0' WHERE ID='$id'";
	$results = mysqli_query($connection, $query);
	if ($results == FALSE) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
		echo "Database query failed. <br/>";
		echo "SQL command: " . $query;
		exit();
	}else{
		header("location:index.php");
	}
}else{
	header("location:index.php");
}
?>
<?php include('footer.php');?>