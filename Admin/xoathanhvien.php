<?php 
			 include ('MYSQL/connectmysql.php');
			$id_tv=$_GET['id_tv'];
			$sql_delete_tv="delete from thanhvienlqshop where id_tv='$id_tv'";
			$sql_query=mysqli_query($connection,$sql_delete_tv);
			header('location:adminstrator.php?page=quanlithanhvien');


 ?>