<?php 
			 include ('MYSQL/connectmysql.php');
			$id_ad=$_GET['id_ad'];
			$sql_delete_tv="delete from admin where id_ad='$id_ad'";
			$sql_query=mysqli_query($connection,$sql_delete_tv);
			header('location:adminstrator.php?page=thietlap_admin');


 ?>