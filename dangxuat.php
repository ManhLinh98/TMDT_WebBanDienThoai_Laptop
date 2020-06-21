<?php 
	session_start();
	ob_start();
 ?>

<?php 

		include ('MYSQL/connectmysql.php');
		if($_SESSION['users'] && $_SESSION['passs']){
			session_destroy();
			header('location:index.php');
		}
		else{
			header('location:index.php');
		}


 ?>