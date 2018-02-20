<?php include('header.php');
	$query = "SELECT * from users Where is_login='true';";
	$results = mysqli_query($connection, $query);
	$r=mysqli_fetch_assoc($results);
	if($r['type']=="admin"){
		include('admin.php');
	}elseif($r['type']=="user"){
		include('user.php');
	}else{
		?>
		<section class="banner section clearfix">
			<div class="banner-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<div id="poster">
								<img src="images/lambton.jpg" >
							</div> 
						</div> 
					</div> 
				</div> 
			</div> 
		</section>
		<?php
	}
 include('footer.php');?>