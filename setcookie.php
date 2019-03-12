<?php 
	if (setcookie("order_success", 1, time() + 600)) {
		echo "<script type='text/javascript'> window.location.href = 'index.php';</script>";
	}else{
		echo "222222";
	}
	
?>