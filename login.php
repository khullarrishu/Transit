<?php include('header.php');
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = base64_encode($_POST['password']);
		$query = "SELECT * from users where username='$username' AND password='$password'";
		$results = mysqli_query($connection, $query);
		if(mysqli_fetch_assoc($results)){
			$query = "UPDATE  users set is_login='true' WHERE username='$username';";
			$results = mysqli_query($connection, $query);
			if ($results == FALSE) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
			echo "Database query failed. <br/>";
			echo "SQL command: " . $query;
			exit();
		}else{
			
			echo "<p style='color:green;text-align:center;'>Loged in Successfully</p>";
			echo"<script language='javascript'>
					setTimeout(function(){ window.location = 'index.php';}, 2000);
				</script>";
			
				
		}
		}else{
			echo "<p style='color:red;text-align:center;'>Username Or Password Incorrect.</p>";
		}
	}
?>
	<section class="section">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					
						
					<iframe width="100%" height="300" src="https://www.youtube.com/embed/dXSYaH-6Vw4?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

				</div>
				<div class="col-sm-6">
					<div class="sec">
						<div style="height: 260px">
						<h1 style="text-align: center;">Login</h1>
						<form method="post">
							<input type="text" placeholder="Username" name="username">
							<input type="password" placeholder="Password" name="password">
							<input class="btn btn-primary" type="submit" name="login" value="Login">
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include('footer.php');?>