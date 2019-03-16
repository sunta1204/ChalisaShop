<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("DELETE FROM orders WHERE order_id = ?");
	$stmt->bindParam(1,$_POST['order_id']);

	$stmt2=$pdo->prepare("DELETE FROM address WHERE order_id = ?");
	$stmt2->bindParam(1,$_POST['order_id']);

	if ($stmt->execute() && $stmt2->execute()) {
		setcookie('delete_success',1,time()+10,'/');
		echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
	}else {
		setcookie('delete_error',1,time()+10,'/');
		echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
	}
?>