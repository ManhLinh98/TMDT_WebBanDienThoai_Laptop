<?php
		include ('slide.php');
		include ('hangdt.php');

?>
<script src='js/slideanh.js'></script>
<script src='js/hover-sp.js'></script>
<div class="section">
				<div class="product">
					<div class="container">
						<div class="row inner-sp">
									<?php
										include ('MYSQL/connectmysql.php');
										$size=18;
										$pages=$_GET['pages'];
										$start=($pages -1) * $size;
					                    $sql_sp="select * from sanpham  where chuyen_muc='Dien_Thoai' limit $start,$size";
					                    $sql_query_sp=mysqli_query($connection,$sql_sp);
					                    $sql_row_sp=mysqli_num_rows($sql_query_sp);
					                    if(!$pages || $pages<1){
					                    	header('location:index.php?pages=1&trang=1');
					                    }
					                    if($sql_row_sp>0){
					                        while ($row_sp=mysqli_fetch_array($sql_query_sp)){

										
								?>
							<div class="col-xs-6 col-sm-3 col-md-2 img-product">
							<div class='anh_dt'>	
								<a href="index.php?page=product&id_sp=<?php echo $row_sp['id_sp']; ?>" class="thumbnail"><img src="puclic/<?php  echo $row_sp['anh_sp']; ?>" alt=""  width='100%'></a>
								</div>
								<p class="tensp"><?php echo  $row_sp['ten_sp']; ?></p>
								<p class="giall"><?php  echo $row_sp['gia_sp']; ?> đ</p>
								<div class="h-buycc">
										<a href="index.php?page=product&id_sp=<?php echo $row_sp['id_sp']; ?>">Mua Ngay</a>
									</div>
									<div class="cart">
									<a href="cart_shop.php?id=<?php echo $row_sp['id_sp']; ?>" class="add-cart"><span class="glyphicon glyphicon-shopping-cart"></span> Thêm Vào Giỏ Hàng</a>
						</div>	
								<div class="hover-sp">
								<a href='index.php?page=product&id_sp=<?php echo $row_sp['id_sp']; ?>'>
									<p class="tensplp"><?php echo  $row_sp['ten_sp']; ?></p>
									<p class="gia"><?php  echo $row_sp['gia_sp']; ?> đ</p>
									<p class="txt">Miên phí dán cường lực màn hình 1 năm miễn phí</p>
									<p class="txt">Tặng ốp lưng trị giá 150.000đ</p>
									<p class="txt">Khách hàng cũ LQShop được chiết khấu 0.2%</p>
									<p class="txt">Có thẻ sinh viên được chiết khấu 0.5%</p>
									</a>
									<div class="h-buy">
										<a href="index.php?page=product&id_sp=<?php echo $row_sp['id_sp']; ?>"">Mua Ngay</a>
									</div>

									<div class="cart">
									<a href="cart_shop.php?id=<?php echo $row_sp['id_sp']; ?>" class="add-cart"><span class="glyphicon glyphicon-shopping-cart"></span> Thêm Vào Giỏ Hàng</a>
						</div>	
					</div>
				</div>	
					<?php
						}
					}
					?>


					<?php
						$sql="select count(*) from sanpham";
						$query=mysqli_query($connection,$sql);
						$row=mysqli_fetch_array($query);
						$tongsosp=$row[0];
						$tongsotrang=ceil($tongsosp / $size);

					?>
					<div class="sotrang" align='center' style='clear: both;'>
					<?php 
					if($pages>1){
							
						?>
						<a class='phantrang' href="index.php?pages=<?php echo $pages-1 ?>&trang=1" title=""><span class='glyphicon glyphicon-menu-left'></span></a>
					<?php
						}

					?>
					<?php
						for($i=1;$i<=$tongsotrang;$i++){
							if($i==$pages){
								echo "<a class='phantrang' style='background:red;' href='?pages=$i&trang=1' title=''><b>$i</b></a>";
							}
							else{
								echo "<a class='phantrang'  href='?pages=$i&trang=1' title=''><b>$i</b></a>";
							}
						}

					 ?>

					 <?php 
					 	if($pages<$tongsotrang){

					  ?>
					  <a class='phantrang' href="index.php?pages=<?php echo $pages+1 ?>&trang=1" title=""><span class='glyphicon glyphicon-menu-right'></span></a>
					  <?php

					  	}

					  ?>
					</div>

			</div>
		</div>


		<!--sản phẩm đặc biệt-->
		<div class="container">
			<div class="spdb">
				<p>Sản Phẩm Đặc Biệt</p>
			</div>
		</div>

<script type="text/javascript">
$(document).ready(function(){
$(".auto .carousel").jCarouselLite({
auto: 10,
speed: 3000
});
});
//chình chiếu sp ngẫu nhiên
</script>
<center>
<div class="auto">
<div class="carousel" style='border:1px solid #ccc; padding: 20px 0px;border-radius: 5px;background: #fff'>
<?php 
	$sql_db="select * from sanpham where sanphamdacbiet=1";
	$query_db=mysqli_query($connection,$sql_db);
	$num_row=mysqli_num_rows($query_db);
	if($num_row>0){
		while($row_db=mysqli_fetch_array($query_db)){


 ?>
<ul>
<li><center>
<a href='index.php?page=product&id_sp=<?php echo $row_db['id_sp']; ?>'>
<img class='anhspauto' src="puclic/<?php echo $row_db['anh_sp'];?>" width='130px;' >
</center>
<center>
<div style='height: 42px;width: 100%;padding-right: 30px;padding-bottom: 10px;'>
<b style='text-align: center;'><?php echo $row_db['ten_sp'];?></b> <br/> <b style='color:red;padding-bottom: 30px;'><?php echo $row_db['gia_sp']; ?></b></div>
</a>
</center>
</li>
</ul>
<?php 
}
}

 ?>
</div>
<div class="clear"></div>
</div>
</center>
			
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
					header('location:index.php?pages=1&trang=1');
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
				<a href="index.php?page=product&id_sp=<?php echo $row_mt['id_sp']; ?>"><img src="puclic/<?php  echo $row_mt['anh_sp']; ?>" alt="" width='100%'></a>
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
						<a class='phantrang' href="index.php?pages=1&trang=<?php echo $trang-1 ?>" title=""><span class='glyphicon glyphicon-menu-left'></span></a>
					<?php
						}

					?>
					<?php
						for($a=1;$a<=$tongso;$a++){
							if($a==$trang){
								echo "<a class='phantrang' style='background:red;' href='?pages=1&trang=$a' title=''><b>$a</b></a>";
							}
							else{
								echo "<a class='phantrang'  href='?pages=1&trang=$a' title=''><b>$a</b></a>";
							}
						}

					 ?>

					 <?php 
					 	if($trang<$tongso){

					  ?>
					  <a class='phantrang' href="index.php?pages=1&trang=<?php echo $trang+1 ?>" title=""><span class='glyphicon glyphicon-menu-right'></span></a>
					  <?php

					  	}

					  ?>
					</div>
	</div>
</div>