<?php include('header.php');

if (isset($_POST['register'])) {
	

	$username=$_POST['username'];
	$phone=$_POST['phone'];
	$password=base64_encode($_POST['password']);
	$check= "select * from users where username='$username'";
	$r=mysqli_query($connection, $check);

	if(mysqli_fetch_assoc($r)){
		echo "<p style='color:red;text-align:center;'>Username already taken</p>";
	}else{
		$query = "INSERT INTO users ( username, password, phone , type) VALUES( '$username', '$password', '$phone','user');";
		$results = mysqli_query($connection, $query);

		if ($results == FALSE) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
			echo "Database query failed. <br/>";
			echo "SQL command: " . $query;
			exit();
		}else{
			echo "<p style='color:green;text-align:center;'>Registered Successfully</p>";
			//sleep(10);
			echo"<script language='javascript'>
					setTimeout(function(){ window.location = 'login.php';}, 2000);
				</script>";
			
				
		}
	}
      
}


?>
	<section class="section">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					
						
					<iframe width="100%" height="310" src="https://www.youtube.com/embed/dXSYaH-6Vw4?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

				</div>
				<div class="col-sm-6">
					<div class="sec">
						
						<h1 style="text-align: center;">Register</h1>
						<form method="post">
							<input type="text" name="username" required="required" placeholder="username">
							<input type="password" placeholder="Password" required="required" name="password">
							<input type="text" placeholder="Phone Number" required="required" name="phone">
							<input class="btn btn-primary" type="submit" name="register" value="Register">
						</form>

					</div>
				</div>
			</div>
		</div>
	</section>
<?php include('footer.php');?>