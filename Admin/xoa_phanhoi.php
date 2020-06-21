<?php 
		include ('MYSQL/connectmysql.php');
		$id_lh=$_GET['id_lh'];
		$sql_xoa_sp="delete from lienhe where id_lh='$id_lh'";
		$sql_query=mysqli_query($connection,$sql_xoa_sp);
		header('location:adminstrator.php?page=phanhoi');



 ?>