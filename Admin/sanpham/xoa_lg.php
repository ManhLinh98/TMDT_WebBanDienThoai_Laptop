<?php 
		include ('MYSQL/connectmysql.php');
		$id_sp=$_GET['id_sp'];
		$sql_xoa_sp="delete from sanpham where id_sp='$id_sp'";
		$sql_query=mysqli_query($connection,$sql_xoa_sp);
		header('location:adminstrator.php?page=sp_lg');



 ?>