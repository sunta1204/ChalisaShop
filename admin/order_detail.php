<?php 
session_start();
	include '../connect.php';
	

	$stmt=$pdo->prepare("SELECT proofConfirm FROM orders WHERE order_id = ? ");
	$stmt->bindParam(1,$_GET["order_id"]);
	$stmt->execute();


	$stmt2=$pdo->prepare("SELECT * FROM member WHERE member_username = ? ");
	$stmt2->bindParam(1,$_SESSION["username"]);
	$stmt2->execute();
	while ($row2=$stmt2->fetch()) {
	 	$username["member_username"] = $row2["member_username"];
	 	$name["member_name"] = $row2["member_name"];
	 	$email["member_email"] = $row2["member_email"];
	 } 

	$stmt3=$pdo->prepare("SELECT proofPayment FROM orders WHERE order_id = ? GROUP BY order_id");
	$stmt3->bindParam(1,$_GET["order_id"]);
	$stmt3->execute();
	$row3=$stmt3->fetch();

	$stmt4=$pdo->prepare("SELECT * FROM address WHERE order_id = ? ");
	$stmt4->bindParam(1,$_GET["order_id"]);
	$stmt4->execute();
	$row4=$stmt4->fetch();

	$stmt5=$pdo->prepare("SELECT * FROM orders WHERE order_id = ? ");
	$stmt5->bindParam(1,$_GET["order_id"]);
	$stmt5->execute();
	$row5=$stmt5->fetch();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Detail</title>
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
			<div class="form-inline my-2 my-lg-0 mr-sm-2 col-md-2">
		    	<a class="btn btn-primary dropdown-toggle col-12 text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user-tie"></i>&nbsp;&nbsp; <?= $_SESSION["name"] ?> </a>
		    	<div class="dropdown-menu col-10">
		    		<button class="dropdown-item" data-target="#profile" data-toggle="modal"> ข้อมูลส่วนตัว </button>
		    		<button class="dropdown-item" data-target="#editProfile" data-toggle="modal"> แก้ไขข้อมูลส่วนตัว </button>
		    		<div class="dropdown-divider"></div>
		    		<a href="../logout.php" class="dropdown-item"> ออกจากระบบ </a>
		    	</div>
		    </div>
		  </div>
	</nav>

	<!-- Modal Profile -->
	<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
		      <div class="modal-header">
		        <h3 class="modal-title" id="exampleModalLabel">Profile</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      	<div class="modal-body" style="background-color: #636e72; padding: 50px;">
			       	
		      </div>		      
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

	<!-- Modal EDIT Profile -->
	<form action="editPrfile.php" method="post">
	<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
		      <div class="modal-header">
		        <h3 class="modal-title" id="exampleModalLabel">Profile</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      	<div class="modal-body" style="background-color: #636e72; padding: 50px;">
			       	
		      </div>		      
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Submit</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>

	<div class="container" style="background-color: #f5f6fa; padding-top: 50px;padding-bottom: 100px;">
		<div class="form-inline d-flex justify-content-center">
			<?php while ($row=$stmt->fetch()) { ?>
				<div class="card-deck my-2 my-lg-0 mr-sm-2" style="padding-bottom: 30px;">				  
				  	<div class="card bg-light" style="height: 250px;">
						<div class="card-header" style="font-size: 20px;"> Proof Confirm </div>		    	
					    	<div class="card-body">
					      		<img class="card-img-top" src="../proofConfirm/<?=$row['proofConfirm']?>" alt="Card image cap" style="max-height: 150px; display: block; margin-left: auto; margin-right: auto; margin-top: 15px; margin-bottom: 15px; max-width: 150px;">		
					    	</div>					    	
					</div>				  		  
				</div>
		<?php } ?>
		<div class="card-deck my-2 my-lg-0 mr-sm-2" style="padding-bottom: 30px;">				  
				  	<div class="card bg-light" style="height: 250px;">
						<div class="card-header" style="font-size: 20px;"> Proof Payment </div>		    	
					    	<div class="card-body">
					      		<img class="card-img-top" src="../proofPayment/<?=$row3['proofPayment']?>" alt="Card image cap" style="max-height: 150px; display: block; margin-left: auto; margin-right: auto; margin-top: 15px; margin-bottom: 15px; max-width: 150px;">		
					    	</div>					    	
					</div>				  		  
				</div>			
		</div><br><br>

		<?php while ($row5=$stmt5->fetch()) { ?>
			<div class="form-row">
				<div class="form-group col-md-6">		
					<label class="text-primary col-sm-12" style="font-size: 18px; text-align: left;"> รหัสคำสั่งซื้อ : </label>
					<div class="col-sm-12">
						<input type="text" name="order_id" class="form-control" placeholder="ชื่อ facebook"  value="<?=$row5['order_id']?>" readonly>
					</div>
				</div><br>
				<div class="form-group col-md-6">		
					<label class="text-primary col-sm-12" style="font-size: 18px; text-align: left;"> ชื่อ facebook : </label>
					<div class="col-sm-12">
						<input type="text" name="facebookName" class="form-control" placeholder="ชื่อ facebook"  value="<?=$row5['facebookName']?>" readonly>
					</div>
				</div><br>		
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">		
					<label class="text-primary col-sm-6" style="font-size: 18px; text-align: left;"> การจัดส่ง : </label>
					<div class="col-sm-12">
						<?php if ($row5['transport'] == 1) { ?>
							<input type="text" name="transport" class="form-control" placeholder="ไปรษณีย์"  value="" readonly>
						<?php } elseif ($row5['transport'] == 2) { ?>
							<input type="text" name="transport" class="form-control" placeholder="EMS"  value="" readonly>
						<?php } elseif ($row5['transport'] == 3) { ?>
							<input type="text" name="transport" class="form-control" placeholder="Kerry"  value="" readonly>
						<?php } ?>					
					</div>
				</div><br>		
				<div class="form-group col-md-6">		
					<label class="text-primary col-sm-6" style="font-size: 18px; text-align: left;"> วันที่สั่ง : </label>
					<div class="col-sm-12">
						<input type="text" name="orderDate" class="form-control" placeholder=""  value="<?=$row5['orderDate']?>" readonly>
					</div>
				</div><br>			
			</div><br><br>						
		<?php } ?>

			<form action="updateAddress" method="post">

				<div class="form-row">
					<div class="form-group col-md-6">		
						<label class="text-primary col-sm-6" style="font-size: 18px; text-align: left;"> ชื่อผู้รับ : </label>
						<div class="col-sm-12">
							<input type="text" name="fullname" class="form-control" placeholder=""  value="<?=$row4['fullname']?>" >
						</div>
					</div><br>
					<div class="form-group col-md-6">		
						<label class="text-primary col-sm-6" style="font-size: 18px; text-align: left;"> เบอร์โทร : </label>
						<div class="col-sm-12">
							<input type="text" name="phoneNumber" class="form-control" placeholder=""  value="<?=$row4['phoneNumber']?>" >
						</div>
					</div><br>
				</div>

				<div class="form-group">		
					<label class="text-primary col-sm-6" style="font-size: 18px; text-align: left;"> ที่อยู่การจัดส่ง : </label>
					<div class="col-sm-12">
						<input type="text" name="address" class="form-control" placeholder=""  value="<?=$row4['address']?>" >
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">		
						<label class="text-primary col-sm-6" style="font-size: 18px; text-align: left;"> เลขไปรษณีย์ : </label>
						<div class="col-sm-12">
							<input type="text" name="address_zip" class="form-control" placeholder=""  value="<?=$row4['address_zip']?>" >
						</div>
					</div><br>
					<div class="form-group col-md-6">		
						<label class="text-primary col-sm-6" style="font-size: 18px; text-align: left;"> เลขที่พัสดุ : </label>
						<div class="col-sm-12">
							<?php if ($row4['track'] == NULL) { ?>
								<input type="text" name="track" class="form-control" placeholder="ยังไม่ระบุ"  value="">
							<?php } else { ?>
								<input type="text" name="track" class="form-control" placeholder="" value="<?=$row4['track']?>" >
							<?php } ?>
						</div>
					</div><br>
				</div><br>
									
				<div class="form-group col-sm-6">
					<button type="submit" class="btn btn-primary col-sm-6"><i class="fas fa-location-arrow"></i>&nbsp; Submit </button>
				</div>		
			</form>
			
		</div>

	<footer style="background-color: #747d8c; padding: 24px;">
		<div style="text-align: center;">
			<label style="font-size: 18px; color: white; padding: 50px;">@Copyright By Suriyapong Monkham</label>
		</div>	
	</footer>

</body>
</html>