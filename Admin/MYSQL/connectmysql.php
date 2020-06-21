<?php 
//khai bao thong tin ket noi
	$servername = "localhost";
	$username='root';
	$password = "";
	$dbname = "abc";
	// Create connection
	//ket noi den co so du lieu
	$connection = mysqli_connect($servername, $username, $password,$dbname) or die("Database Không tồn tại");
	mysqli_set_charset($connection,"utf8");
	// Change character set to utf8
	//luon hien thi cho unicode

?>