<!Doctype html>
<?php date_default_timezone_set ( "Canada/Eastern" ); ?>
<html>
	<head>
		<title>Lambton Transit</title>
		<link rel="icon" href="images/transit.jpeg">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/style.css">
	    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	</head>
	<body>
		<?php 
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "";
			$dbname = "lambton";
			// 2 - Connect to the database and handle any connection errors
			$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		 ?>
		<header id="top" class="clearfix">
			<div class="wrapper">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="logo">
								<img src="images/logo.png" >
							</div>
							<div class="menu">
								<a href="index.php" class="">Home</a>
								
								<?php 
								$query = "SELECT * from users Where is_login='true';";
								$results = mysqli_query($connection, $query);
								$a=mysqli_fetch_assoc($results);

								if($a['type']=="admin"){
								 ?>
								<a href="add.php" class="">Add New Bus</a>
								

								 <?php }elseif ($a['type']=="user") {
								 	?>
								 	<a href="all.php" class="">Show All Bus</a>
								 	<a href="pass.php" class="">Buy Pass</a>
								 	<?php
								 } 
								if($a){
								 ?>
								<a href="logout.php" class="">Logout</a>
								<?php }else{ ?>
								<a href="register.php" class="">Register</a>
								<a href="login.php" class="">Login</a>
								<?php }?>
								
							</div> 
						</div> 
					</div> 
				</div> 
			</div> 
		</header> 