<?php include('header.php');
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$query = "DELETE from buses WHERE ID='$id'";
	$results = mysqli_query($connection, $query);
	if ($results == FALSE) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
		echo "Database query failed. <br/>";
		echo "SQL command: " . $query;
		exit();
	}else{
		echo "<p style='color:red;text-align:center;'>Deleted</p>";
		echo"<script language='javascript'>
			setTimeout(function(){ window.location = 'index.php';}, 2000);
		</script>";
	}
}else{
	header("location:index.php");
}
?>
<?php include('footer.php');?>