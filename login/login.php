<?php 
session_start();
	include '../connect.php' ;
	

	$stmt = $pdo->prepare("SELECT * FROM member WHERE member_username = ? AND member_password = ?");
	$stmt->bindParam(1,$_POST["member_username"]);
	$stmt->bindParam(2,$_POST["member_password"]);
	$stmt->execute();
	
	while($row=$stmt->fetch()){
		$_SESSION["username"] = $row["member_username"];
		$_SESSION["name"] = $row["member_name"];
		$_SESSION["permission"] = $row["member_permission"];
	}

	if ($_SESSION["permission"] == 1) {
		$_SESSION["login_success"] = 1;		
		echo "<script type='text/javascript'> window.location.href = '../admin/admin_home.php';</script>";
	}elseif ($_SESSION["permission"] == 0) {
		$_SESSION["login_success"] = 1;
		echo "<script type='text/javascript'> window.location.href = '../user/user_home.php';</script>";
	}elseif ($_SESSION["permission"] == NULL) {
		$_SESSION["login_success"] = 1 ;
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	}

?>