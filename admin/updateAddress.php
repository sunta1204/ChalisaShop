<?php 
session_start();
	include '../connect.php';
	
?>

<?php 

	$order_id = $_POST['order_id'];

	$stmt=$pdo->prepare("UPDATE address SET fullname = ? , phoneNumber = ? , address = ? , address_zip = ? , track = ? WHERE order_id = ?  ");

	$stmt->bindParam(1,$_POST["fullname"]);
	$stmt->bindParam(2,$_POST["phoneNumber"]);
	$stmt->bindParam(3,$_POST["address"]);
	$stmt->bindParam(4,$_POST["address_zip"]);
	$stmt->bindParam(5,$_POST["track"]);
	$stmt->bindParam(6,$order_id);



	if($stmt->execute()){		
		setcookie('update_success',1,time()+10,'/');
		echo "<script type='text/javascript'> window.location.href = 'order_detail.php?order_id=$order_id';</script>";
	}else{
		echo "Upload fail back to Home Page";
		echo "<a href='../index.php'> Upload Complete Goto index </a>";
	}
?>