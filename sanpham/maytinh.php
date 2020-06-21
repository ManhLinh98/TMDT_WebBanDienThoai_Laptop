<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<link rel="stylesheet" href="css/index.css">
<?php
	include ('slide.php');

?>
<div class="container">
			<div class="spdb">
				<p>CHUYÊN MỤC MÁY TÍNH</p>
			</div>
		</div>
<div class="maytinh">
	<div class="container">
		<div class="row">
		<?php 
				$sizes=8;
				$trang=$_GET['trang'];
				$begin=($trang -1) * $sizes;
				$sql_mt="select * from sanpham where chuyen_muc='May_Tinh' limit $begin,$sizes ";
				$query_mt=mysqli_query($connection,$sql_mt);
				$row_num=mysqli_num_rows($query_mt);
				
				
			 ?>
			 <?php
			 if(!$trang || $trang<1){
					header('location:index.php?page=maytinh&trang=1');
			 }
			 	if($row_num>0){
					while($row_mt=mysqli_fetch_array($query_mt)){
			 ?>
			<div class="col-xs-6 col-sm-4 col-md-3 spmt">
				<p class="ten_mt"><?php echo $row_mt['ten_sp'];?></p>
				<p class="gia_mt">Giá: <span><?php  echo $row_mt['gia_sp']; ?> đ</span></p>
				<div class="mua">
					<a href="index.php?page=product&id_sp=<?php echo $row_mt['id_sp']; ?>">MUA NGAY</a>
				</div>
				<div class='ha_sp'>
				<img src="puclic/<?php  echo $row_mt['anh_sp']; ?>" alt="" width='100%'>
				</div>
				<div class="them">
					<a href="cart_shop.php?id=<?php echo $row_mt['id_sp']; ?>"><span class="glyphicon glyphicon-shopping-cart kk"></span> GIỎ HÀNG <span class="glyphicon glyphicon-ok"></span></a>
				</div>
			</div>
				<?php
					}
				}


			?>

		</div>
		</div>
		<?php
						$sql="select count(*) from sanpham where chuyen_muc='May_Tinh'";
						$query=mysqli_query($connection,$sql);
						$row=mysqli_fetch_array($query);
						$tongsomt=$row[0];
						$tongso=ceil($tongsomt / $sizes);

					?>
					<div class="sotrang" align='center' style='clear: both;'>
					<?php 
					if($trang>1){
							
						?>
						<a class='phantrang' href="index.php?page=maytinh&trang=<?php echo $trang-1 ?>" title=""><span class='glyphicon glyphicon-menu-left'></span></a>
					<?php
						}

					?>
					<?php
						for($a=1;$a<=$tongso;$a++){
							if($a==$trang){
								echo "<a class='phantrang' style='background:red;' href='index.php?page=maytinh&trang=$a' title=''><b>$a</b></a>";
							}
							else{
								echo "<a class='phantrang'  href='index.php?page=maytinh&trang=$a' title=''><b>$a</b></a>";
							}
						}

					 ?>

					 <?php 
					 	if($trang<$tongso){

					  ?>
					  <a class='phantrang' href="index.php?page=maytinh&trang=<?php echo $trang+1 ?>" title=""><span class='glyphicon glyphicon-menu-right'></span></a>
					  <?php

					  	}

					  ?>
	</div>
</div>