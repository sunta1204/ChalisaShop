<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("SELECT * FROM orders , address WHERE orders.order_id = ? AND orders.order_id = address.order_id GROUP BY address.order_id");
	$stmt->bindParam(1,$_POST["track"]);
	$stmt->execute();
	$row=$stmt->fetch();

	if (!empty($row["order_id"])) { ?>
<!DOCTYPE html>
<html>
<head>
	<title>Check Track</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

	<!-- Navbar --> 
	<nav class="navbar sticky-top navbar-light navbar-expand-lg" style="background-color: #747d8c;">
 		<a class="navbar-brand text-light btn btn-outline-dark mr-sm-2 md-3" href="../index.php">ChalisaShop</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    	</button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active mr-sm-2 md-3">
		        <button class="nav-link text-white btn btn-outline-dark mr-sm-2 md-3" href="index.php">Home <span class="sr-only">(current)</span></button>
		      </li>
		      <li class="nav-item mr-sm-2 md-3">
		        <button class="nav-link btn btn-outline-dark text-white mr-sm-2 md-3" data-toggle="modal" data-target="#checkTrack">เช็คเลขพัสดุ</button>
		      </li>
		      <li class="nav-item dropdown mr-sm-2 md-3">
		        <button class="nav-link dropdown-toggle text-white btn btn-outline-dark disabled mr-sm-2 md-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Dropdown
		        </button>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>		      
		    </ul>
		    
		    <form class="form-inline  mr-sm-2 mb-3 search-box ">
		      	<input class="search-txt mr-sm-2" type="search">
		      	<button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
		    </form>  
		    <form action="../login/login.php" method="post" class="form-inline">
		    	<input type="text" name="member_username" placeholder="username" required="" class="form-control mr-sm-2 mb-3">
		    	<input type="password" name="member_password" placeholder="password" required="" class="form-control mr-sm-2 mb-3">
		    	<button type="submit" class="btn btn-primary mr-sm-2 mb-3"> <i class="fas fa-location-arrow"></i> Login </button>
		    </form>
		    <div class="form-inline mr-sm-2 mb-3">
		    	<button class="btn btn-warning disabled" data-target="#register" data-toggle="modal"><i class="fas fa-registered"></i> Register </button>
		    </div>
		  </div>
	</nav>

	<!-- Modal Check Track -->
	<form action="./check_track.php" method="post">
		<div class="modal fade" id="checkTrack" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 24px;">เช็คเลขพัสดุ</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="form-group">
		      		<label class="text-primary" style="font-size: 20px;"> เลขคำสั่งซื้อของท่าน : </label>
		      		<input type="text" name="track" placeholder="Track Number" required="" class="form-control">
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>

	<!-- Modal Register -->
	<form action="register.php" method="post">
		<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>

	<div class="container" style="background-color: #f5f6fa; padding-top: 50px;padding-bottom: 100px;">
		<div class="form-inline ">
			<table class="table table-hover col-md-6 ">			
				<tr>
					<th class="text-primary" style="font-size: 18px;"> เลขคำสั่งซื้อ </th>					
				</tr>
				<tr>
					<td> <?=$row["order_id"]?> </td>					
				</tr>
				<tr>
					<th class="text-primary" style="font-size: 18px;"> Facebook </th>
				</tr>
				<tr>
					<td> <?=$row["facebookName"]?> </td>
				</tr>
				<tr>
					<th class="text-primary" style="font-size: 18px;"> การจัดส่ง </th>
				</tr>
				<tr>
					<?php if ($row["transport"] == 1) {?>
						<td> ไปรษณีย์ </td>
					<?php }elseif ($row["transport"] == 2) { ?>
						<td> EMS </td>
					<?php }elseif ($row["transport"] == 3) {?>
						<td> Kerry </td>
					<?php } ?>			
				</tr>
				<tr>
					<th class="text-primary" style="font-size: 18px;"> วันที่สั่ง </th>
				</tr>
				<tr>
					<td > <?=$row["orderDate"]?> </td>
				</tr>
		</table><br><br>

		<table class="table table-hover col-md-6 ">
				<tr>
					<th class="text-primary" style="font-size: 18px;"> ชื่อผู้รับ </th>					
				</tr>
				<tr>
					<td> <?=$row["fullname"]?> </td>									
				</tr>
				<tr>
					<th class="text-primary" style="font-size: 18px;"> ที่อยู่จัดส่ง </th>
				</tr>
				<tr>
					<td> <?=$row["address"]?> </td>
				</tr>
				<tr>
					<th class="text-primary" style="font-size: 18px;"> เลขไปรษณีย์ </th>
				</tr>
				<tr>
					<td > <?=$row["address_zip"]?> </td>
				</tr>
				<tr>
					<th class="text-primary" style="font-size: 18px;"> เบอร์โทร </th>
				</tr>
				<tr>
					<td> <?=$row["phoneNumber"]?> </td>
				</tr>
				<tr>
					<th class="text-primary" style="font-size: 18px;"> เลขที่พัสดุ </th>
				</tr>
				<tr>
					<?php if ($row["track"] == NULL) { ?>
						<td> รอการตรวจสอบ และ ดำเนินการ </td>
					<?php } elseif ($row["track"] != NULL) { ?>
						<td> <?=$row["track"]?> </td>
					<?php } ?>	
				</tr>
		</table>
		</div>		
	</div>


	<footer style="background-color: #747d8c; padding: 24px;height: 200px;">
		<div style="text-align: center;">
			<label style="font-size: 18px; color: white; padding: 50px;">@Copyright By Suriyapong Monkham</label>
		</div>		
	</footer>

</body>
</html>		
	<?php } else {
		setcookie('checkTrackError',1,time()+10,'/');
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	} ?>
