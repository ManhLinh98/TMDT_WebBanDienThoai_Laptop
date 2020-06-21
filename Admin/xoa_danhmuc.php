<?php 
		 include ('MYSQL/connectmysql.php');
		 $ten_dm=$_GET['ten_dm'];
		 $delete_dm="delete from danhmuc_sp where ten_dm='$ten_dm'";
		 $query_dm=mysqli_query($connection,$delete_dm);
		 header('location:adminstrator.php?page=danhmucsp');


 ?>