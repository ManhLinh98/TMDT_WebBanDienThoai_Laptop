<?php 
		include ('MYSQL/connectmysql.php');
		$id_dh=$_GET['id_dh'];
		$sql_xoa_sp="delete from donhang where id_dh='$id_dh'";
		$sql_query=mysqli_query($connection,$sql_xoa_sp);
		$chitiet="delete from chi_tiet_donhang where id_dh='$id_dh'";
		$que=mysqli_query($connection,$chitiet);
		header('location:adminstrator.php?page=quanlidonhang');



 ?>