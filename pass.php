<?php
date_default_timezone_set ( "Canada/Saskatchewan" );
 include('header.php');
$users = "SELECT * FROM users where is_login='true'";
$res= mysqli_query($connection, $users);
$user=mysqli_fetch_assoc($res);
$user_id=$user['id'];
if (isset($_POST['add'])) {
	$name=$_POST['name'];
	$student_id=$_POST['student_id'];
	$number=rand();
	$startDate=date("Y-m-d");
	$date=date('Y-m-d', strtotime(date("Y-m-d", time()) . " + 365 day"));
	
	$query = "INSERT into user_pass ( user_id, pass_number, expiry_date ,name,student_id) VALUES('$user_id', '$number', '$date','$name','$student_id');";
	$results = mysqli_query($connection, $query);
	if ($results == FALSE) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
		echo "Database query failed. <br/>";
		echo "SQL command: " . $query;
		exit();
	}else{
		echo "Pass Added";
		header("location:pass.php");
	}
}elseif(isset($_POST['add_new'])){
	$name=$_POST['name'];
	$student_id=$_POST['student_id'];
	$number=rand();
	$startDate=date("Y-m-d");
	$date=date('Y-m-d', strtotime(date("Y-m-d", time()) . " + 365 day"));
	$query = "UPDATE user_pass set pass_number='$number', expiry_date='$date' where user_id='$user_id';";
	$results = mysqli_query($connection, $query);
	if ($results == FALSE) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br/>";
		echo "Database query failed. <br/>";
		echo "SQL command: " . $query;
		exit();
	}else{
		echo "Pass Added";
		header("location:pass.php");
	}
}elseif(isset($_POST['cancel'])){
	header("location:index.php");
}else{
	$query = "SELECT * from user_pass where user_id='$user_id'";
	$results = mysqli_query($connection, $query);
	$user_pass=mysqli_fetch_assoc($results);
	if($user_pass){
		if(strtotime($user_pass['expiry_date']) <= strtotime(date("m/y"))){
		?>
		<section class=" section clearfix">
			<div class="banner-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<div class="sec">
								<h1>Buy Pass</h1>
								<p style='color:red;'>Old Bus Pass Expired Buy New.</p>
								<form method="post">
									<input type="text" name="name" placeholder="Name" value="">
									<input type="text" name="student_id" placeholder="Student Id" value="">
									<input type="Submit" class="btn btn-primary" name="add_new" value="Buy">
									<input type="Submit" style="margin-top: 10px" class="btn btn-danger" name="cancel" value="Cancel">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
		}else{
			?>
			<section class=" section clearfix">
			<div class="banner-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<div class="sec">
								<h4>Pass Number: <?php echo $user_pass['pass_number']; ?></h4>
								<h4>Expiry Date: <?php echo $user_pass['expiry_date']; ?></h4>	
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
			<?php
		}

	}else{
		?>
		<section class=" section clearfix">
				<div class="banner-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-sm-offset-3 col-sm-6">
								<div class="sec">
									
									<h1>Buy Pass</h1>
									<form method="post">
										<input type="text" name="name" placeholder="Name" value="">
										<input type="text" name="student_id" placeholder="Student Id" value="">
										<input type="Submit" class="btn btn-primary" name="add" value="Buy">
										<input type="Submit" style="margin-top: 10px" class="btn btn-danger" name="cancel" value="Cancel">
									</form>

								</div>
							</div> 
						</div> 
					</div> 
				</div> 
			</section>

		<?php

	}
}
include('footer.php');?>