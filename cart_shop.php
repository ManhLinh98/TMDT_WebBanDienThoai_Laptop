<?php 
	session_start();
	include ('MYSQL/connectmysql.php');
	$id=$_GET['id'];
	if(isset($_GET['id'])){
		$sqlsp="select * from sanpham where id_sp='$id'";
		$querysp=mysqli_query($connection,$sqlsp);
		$data=mysqli_fetch_array($querysp);
		if(!empty($_SESSION['cart'])){
			if(array_key_exists($id,$_SESSION['cart'])){
				$_SESSION['cart'][$id]=array(
				"sl"=>(int)$_SESSION['cart'][$id]['sl']+1,
				"id_sp"=>$data['id_sp'],
				"ten_sp"=>$data['ten_sp'],
				"gia_sp"=>$data['gia_sp'],
				"anh_sp"=>$data['anh_sp']
				);
			}
			else{
				$_SESSION['cart'][$id]=array(
				"sl"=>1,
				"id_sp"=>$data['id_sp'],
				"ten_sp"=>$data['ten_sp'],
				"gia_sp"=>$data['gia_sp'],
				"anh_sp"=>$data['anh_sp']

				);
			}

		}
		else{
			$_SESSION['cart'][$id]=array(
				"sl"=>1,
				"id_sp"=>$data['id_sp'],
				"ten_sp"=>$data['ten_sp'],
				"gia_sp"=>$data['gia_sp'],
				"anh_sp"=>$data['anh_sp']
				);
		}
		?>
		<script>
    window.history.go(-1);
		</script>

		<?php
	}

 ?>