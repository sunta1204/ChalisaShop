<?php 
session_start();
	include '../connect.php';
	

	$stmt=$pdo->prepare("SELECT * FROM orders , address WHERE orders.order_id = address.order_id GROUP BY address.order_id");
	$stmt->execute();

	$stmt2=$pdo->prepare("SELECT * FROM member WHERE member_username = ? ");
	$stmt2->bindParam(1,$_SESSION["username"]);
	$stmt2->execute();
	while ($row2=$stmt2->fetch()) {
	 	$username["member_username"] = $row2["member_username"];
	 	$name["member_name"] = $row2["member_name"];
	 	$email["member_email"] = $row2["member_email"];
	 } 

	 $stmt3=$pdo->prepare("SELECT * FROM orders , address WHERE orders.order_id = address.order_id GROUP BY address.order_id");
	$stmt3->execute();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
		.zoom{
			width: 300px;
			height: 600px;		
			transition: transform .2s;
		}
		.zoom:hover{
			transform: scale(1.05);
			box-shadow: 0px 0px 20px 10px #1e272e;
		}
	</style>
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
		    
		    <form class="form-inline my-2 my-lg-0 mr-sm-2 search-box">
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

	<?php 
		if (!empty($_COOKIE["login_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#success').alert('fade');
        				setTimeout(function(){
        					$('#success').alert('close');
        				}, 3000);
    				});
    				$('#success').click(function(){
    					$('success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="success">
				<center>
					<strong>Login Success!</strong> สวัสดี คุณ <?= $name["member_name"] ?>
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["logout_error"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#logout_error').alert('fade');
        				setTimeout(function(){
        					$('#logout_error').alert('close');
        				}, 3000);
    				});
    				$('#logout_error').click(function(){
    					$('logout_error').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="logout_error">
				<center>
					<strong>Login Error!</strong> โปรดลองอีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["delete_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#delete_success').alert('fade');
        				setTimeout(function(){
        					$('#delete_success').alert('close');
        				}, 3000);
    				});
    				$('#delete_success').click(function(){
    					$('delete_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="delete_success">
				<center>
					<strong>Delete Success!</strong> ลบรายการการสั่งซื้อสำเร็จ
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["delete_error"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#delete_error').alert('fade');
        				setTimeout(function(){
        					$('#delete_error').alert('close');
        				}, 3000);
    				});
    				$('#delete_error').click(function(){
    					$('delete_error').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="delete_error">
				<center>
					<strong>Delete Error!</strong> เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<div style="margin-top: 50px;margin-bottom: 50px; padding-left: 10%;padding-right: 10%;">
		<div class="form-inline d-flex justify-content-center">
			<?php while ($row=$stmt->fetch()) { ?>
				<div class="card-deck my-2 my-lg-0 mr-sm-2" style="padding-bottom: 30px;">				  
				  	<div class="card bg-light zoom">
						<div class="card-header" style="font-size: 20px;"> <?= $row["facebookName"] ?> </div>							
					    	<a href="order_detail.php?order_id=<?=$row['order_id']?>" target="_blank">
					    		<img class="card-img-top" src="../proofPayment/<?=$row['proofPayment']?>" alt="Card image cap" style="width: 100px; display: block; margin-left: auto; margin-right: auto; margin-top: 15px; margin-bottom: 15px;">	
					    	</a>
					    	<div class="card-body">
					      		<h5 class="card-title"> <?= $row["order_id"] ?> </h5>
					      		<p class="card-text"> <?= $row["fullname"] ?> </p>
					      		<p class="card-text"> <?= $row["phoneNumber"] ?> </p>
					      		<?php if ($row['transport'] == 1) { ?>
					      			<p class="card-text"> ไปรษณีย์ </p>
					      		<?php } elseif ($row['transport']== 2) { ?>
					      			<p class="card-text"> EMS </p>
					      		<?php }elseif ($row['transport'] == 3) { ?>
					      			<p class="card-text"> Kerry </p>
					      		<?php }  ?>					      		
					      		<p class="card-text form-inline "> 
					      			<a href="order_detail.php?order_id=<?=$row['order_id']?>" target="_blank" class=" btn btn-outline-primary btn-lg mr-sm-2"> รายละเอียด </a> 
					      			<button class="btn btn-outline-danger btn-lg" data-target="#delete_order" data-toggle="modal"> ลบรายการ </button>
					      		</p>					      		
					    	</div>					    	
					</div>				  		  
				</div>
		<?php } ?>
		</div>
	</div>

	<!-- Modal Delete -->
	<form action="delete_order.php" method="post">
		<div class="modal fade" id="delete_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 24px;">ลบรายการการสั่งซื้อ</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="form-group">
		      		<label class="text-primary" style="font-size: 20px;"> คุณแน่ใจหรือไม่ที่จะลบรายการสั่งซื้อนี้ ?? </label>
		      		<?php 
		      			while ( $row3=$stmt3->fetch()) { ?>
		      				<input type="hidden" name="order_id" value="<?=$row3['order_id']?>">
		      			<?php } ?>
		      		
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

	<footer style="background-color: #747d8c; padding: 24px;">
		<div style="text-align: center;">
			<label style="font-size: 18px; color: white; padding: 50px;">@Copyright By Suriyapong Monkham</label>
		</div>	
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>