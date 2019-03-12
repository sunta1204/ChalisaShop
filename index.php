<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Payment Proof</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >

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
		    
		    <form class="form-inline  mr-sm-2 mb-3 search-box ">
		      	<input class="search-txt mr-sm-2" type="search">
		      	<button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
		    </form>  
		    <form action="login/login.php" method="post" class="form-inline">
		    	<input type="text" name="member_username" placeholder="username" required="" class="form-control mr-sm-2 mb-3">
		    	<input type="password" name="member_password" placeholder="password" required="" class="form-control mr-sm-2 mb-3">
		    	<button type="submit" class="btn btn-primary mr-sm-2 mb-3"> <i class="fas fa-location-arrow"></i> Login </button>
		    </form>
		    <div class="form-inline mr-sm-2 mb-3">
		    	<button class="btn btn-warning" data-target="#register" data-toggle="modal"><i class="fas fa-registered"></i> Register </button>
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
				<form action="uploadProof/uploadProof.php" method="post" enctype="multipart/form-data">
			<?php 
				if (!empty($_SESSION["order_success"])){ ?>
					<script type="text/javascript">
    					$(window).on('load',function(){
        					$('#success').modal('show');
    					});
					</script>
					<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  				<div class="modal-dialog" role="document">
		    				<div class="modal-content">
		      					<div class="modal-header">
		        					<h3 class="modal-title text-success" id="exampleModalLabel">การทำรายการสำเร็จ</h3>
		        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          						<span aria-hidden="true">&times;</span>
		        					</button>
		     				 	</div>
		      				<div class="modal-body">
		        				<label class="text-success" style="font-size: 20px; "> คำสั่งซื้อของท่านสำเร็จ </label><br>
		        				<label class="text-primary" style="font-size: 20px;"> รหัสคำสั่งซื้อของท่านคือ : </label> <label class="text-danger" style="font-size: 24px;"><?=$_SESSION["order_id"] ?></label><br>
		        				<label class="text-primary" style="font-size: 20px; "> โปรดจำรหัสคำสั่งซื้อนี้ เพื่อใช้ในการเช็คเลขพัสดุ. ขอบคุณค่ะ. </label>
		      				</div>
		      				<div class="modal-footer">
		        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      				</div>
		    				</div>
		  				</div>
					</div>
			<?php } ?>
			<div class="form-group" style="border: 5px solid; border-radius: 20px; border-color: white; padding: 10px;"> 
				<label class="text-primary col-sm-12" style="font-size: 30px; text-align: center;"> คำสั่งซื้อ </label>
			</div><br>
			<div class="form-group">
				<label class="text-primary col-sm-6" style="font-size: 18px; text-align: left;"> ชื่อ facebook : </label>
				<div class="col-sm-12">
					<input type="text" name="facebookName" class="form-control" placeholder="ชื่อ facebook" required="">
				</div>
			</div><br>

			<div class="form-group">
				<label class="text-primary col-sm-12" style="font-size: 18px; text-align: left;"> หลักฐานการ Confirm :  </label>
				<div class="col-sm-12">
					<input type="file" name="proofConfirm[]" class="form-control" required="" accept="image/jpeg , image/png" accept-charset="utf-8" multiple="">
					<small class="form-text text-muted"> (capture ส่วนชื่อและเสื้อที่ F) สามารถอัพได้หลายภาพ </small>
				</div>
			</div><br>

			<div class="form-group">
				<div class="col-sm-12 form-inline d-flex justify-content-center" >
					<div class="custom-control custom-radio custom-control-inline btn btn-outline-primary btn-lg mr-sm-4 mb-3 col-sm-3">
  						<input type="radio" id="transport1" name="transport" class="custom-control-input" value="1" required="">
  						<label class="custom-control-label" for="transport1"> ลงทะเบียน + 30 บาท </label>
					</div><br><br>
					<div class="custom-control custom-radio custom-control-inline btn btn-outline-primary btn-lg mr-sm-4 mb-3 col-sm-3">
  						<input type="radio" id="transport2" name="transport" class="custom-control-input" value="2" required="">
  						<label class="custom-control-label" for="transport2"> EMS + 50 บาท </label>
					</div><br><br>
					<div class="custom-control custom-radio custom-control-inline btn btn-outline-primary btn-lg mr-sm-4 mb-3 col-sm-3">
  						<input type="radio" id="transport3" name="transport" class="custom-control-input" value="3" required="">
  						<label class="custom-control-label" for="transport3"> Kerry + 60 บาท </label>
					</div>
				</div>				
			</div><br>
			
			
			<div class="form-group">
				<label class="text-primary col-sm-6" style="font-size: 18px; text-align: left;"> หลักฐานการโอนเงิน : </label>
					<div class="col-sm-12">
						<input type="file" name="proofPayment" class="form-control" required="" accept="image/jpeg , image/png" accept-charset="utf-8">
					</div><br> 
					<div class="col-sm-12"> 
						<div class="form-row">
							<div class="col">
								<button type="button" class="btn btn-outline-success col-12" data-toggle="modal" data-target="#qrcode"> <i class="fas fa-university"></i>  เลขที่บัญชี </button>
							</div>
							<div class="col">
								<button type="submit" class="btn btn-primary col-12"> <i class="fas fa-location-arrow"></i>  ส่งข้อมูล </button>
							</div>
						</div>						
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