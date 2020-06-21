<?php 
session_start();
	$id=$_GET['id'];
	if($id==0){
		unset($_SESSION['cart']);
	}
	else{
		unset($_SESSION['cart'][$id]);
	}
	echo "
	<script>
    window.history.go(-1);
		</script>";
 ?>