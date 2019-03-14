<?php 
session_start();
	include '../connect.php';
	
?>

<?php 

	$stmt=$pdo->prepare("INSERT INTO address (order_id , fullname , address , address_zip , phoneNumber ) VALUES (?,?,?,?,?)");

	$stmt->bindParam(1,$_SESSION["order_id"]);
	$stmt->bindParam(2,$_POST["fullname"]);
	$stmt->bindParam(3,$_POST["address"]);
	$stmt->bindParam(4,$_POST["address_zip"]);
	$stmt->bindParam(5,$_POST["phoneNumber"]);

	if($stmt->execute()){
		setcookie('order_success',1,time()+60,'/');
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	}else{
		echo "Upload fail back to Home Page";
		echo "<a href='../index.php'> Upload Complete Goto index </a>";
	}
?>