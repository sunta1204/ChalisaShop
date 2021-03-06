<?php 
session_start();
	include 'connect.php';
	
	//if (empty($_SESSION["orderi_id"])) {
	//	header("location: index.php");
	//}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Address</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<!-- Navbar --> 
	<nav class="navbar sticky-top navbar-light navbar-expand-lg" style="background-color: #747d8c;">
 		<a class="navbar-brand text-light" href="#">ChalisaShop</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    	</button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-white" href="#">Link</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Dropdown
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>		      
		    </ul>
		    
		    <form class="form-inline  mr-sm-2 mb-3 search-box">
		      	<input class="search-txt mr-sm-2" type="search">
		      	<button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
		    </form>  
		    <form action="login/login.php" method="post" class="form-inline">
		    	<input type="text" name="member_username" placeholder="username" required="" class="form-control mr-sm-2 mb-3">
		    	<input type="password" name="member_password" placeholder="password" required="" class="form-control mr-sm-2 mb-3">
		    	<button type="submit" class="btn btn-primary mr-sm-2 mb-3"> <i class="fas fa-location-arrow"></i> Login </button>
		    </form>
		    <div class="form-inline mr-sm-2 mb-3">
		    	<button class="btn btn-warning disabled" data-target="#register" data-toggle="modal"><i class="fas fa-registered"></i> Register </button>
		    </div>
		  </div>
	</nav>

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
		<form action="uploadAddress/uploadAddress.php" method="post" >
			<div class="form-group">
				<label class="text-primary col-sm-12" style="font-size: 18px; text-align: left;"> รหัสคำสั่งซื้อ : </label>
				<div class="col-sm-12">
					<?php if (!empty($_SESSION["order_id"])) { ?>
						<input type="text" readonly name="order_id" class="form-control" required="" value="<?=$_SESSION['order_id']?>">
					<?php } elseif (empty($_SESSION["order_id"])) { ?>
						<input type="text" readonly name="order_id" class="form-control" required="" placeholder="รหัสคำสั่งซื้อ">
					<?php } ?>
					
				</div>
			</div>
			<div class="form-group">
				<label class="text-primary col-sm-12" style="font-size: 18px; text-align: left;"> ชื่อ-นามสกุล : </label>
				<div class="col-sm-12">
					<input type="text" name="fullname" class="form-control" placeholder="ชื่อ-นามสกุล" required="">
				</div>
			</div>
			<div class="form-group">
				<label class="text-primary col-sm-12" style="font-size: 18px; text-align: left;"> ที่อยู่จัดส่ง :  </label>
				<div class="col-sm-12">
					<textarea name="address" placeholder="บ้านเลขที่ หมู่ที่ ถนน/ซอย บ้าน ตำบล อำเภอ จังหวัด" required="" class="form-control"> </textarea>
					<small class="text-muted form-text"> บ้านเลขที่ หมู่ที่ ถนน/ซอย บ้าน ตำบล อำเภอ จังหวัด </small>
				</div>
			</div>
			<div class="form-group">
				<label class="text-primary col-sm-12" style="font-size: 18px; text-align: left;"> รหัสไปรษณีย์ : </label>
					<div class="col-sm-12">
						<input type="text" name="address_zip" placeholder="รหัสไปรษณีย์" required="" pattern="\d{5}" class="form-control">
					</div>						
			</div>
			<div class="form-group">
				<label class="text-primary col-sm-12" style="font-size: 18px; text-align: left;"> เบอร์โทรศัพท์ : </label>
					<div class="col-sm-12">
						<input type="text" name="phoneNumber" placeholder="เบอร์โทรศัพท์ (ไม่ต้องใส่ขีด)" required="" pattern="0\d{9}" class="form-control">
					</div>						
			</div><br>
			<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-primary col-12"> <i class="fas fa-location-arrow"></i>  ส่งข้อมูล </button>			
					</div><br>						
			</div>					
		</div>
						
					<!-- Modal -->
					<div class="modal fade" id="qrcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">เลขที่บัญชี</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					      	<div style="text-align: center;">
						        <img src="img/1.png" style="max-height: 320px; max-width: 480px;"><br><br>
						        -------------------------------------------
						        <br><br>					        
					        	<label class="text-primary" style="font-size: 20px;"> เลขที่บัญชี : 307-2-88822-6 </label><br>
					        	<label class="text-primary" style="font-size: 20px;"> ชื่อบัญชี : นายสุริยพงศ์ มอญขาม </label><br>
					        	<label class="text-primary" style="font-size: 20px;"> ธนาคาร : กสิกรไทย </label><br>
					        	<label class="text-primary" style="font-size: 20px;"> พร้อมเพย์ : 086-0896847 </label><br><br>
					        	-------------------------------------------<br><br>
					        </div>					        
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
				</div>				
			</div>
		</form>
	</div>

	<footer style="background-color: #747d8c; padding: 24px;height: 200px;">
		<div style="text-align: center;">
			<label style="font-size: 18px; color: white; padding: 50px;">@Copyright By Suriyapong Monkham</label>
		</div>		
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>