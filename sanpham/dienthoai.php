<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<link rel="stylesheet" href="css/index.css">
<script src='js/hover-sp.js'></script>
<?php
	include ('slide.php');
	include ('hangdt.php');

?>
<div class="section">
				<div class="product">
					<div class="container">
						<div class="row inner-sp">
									<?php
										include ('MYSQL/connectmysql.php');
										$size=18;
										$trang=$_GET['trang'];
										$start=($trang -1) * $size;
					                    $sql_sp="select * from sanpham  where chuyen_muc='Dien_Thoai' limit $start,$size";
					                    $sql_query_sp=mysqli_query($connection,$sql_sp);
					                    $sql_row_sp=mysqli_num_rows($sql_query_sp);
					                    if(!$trang || $trang<1){
					                    	header('location:index.php?page=dienthoai&trang=1');
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
					if($trang>1){
							
						?>
						<a class='phantrang' href="index.php?pages=dienthoai&trang=<?php echo $trang-1 ?>" title=""><span class='glyphicon glyphicon-menu-left'></span></a>
					<?php
						}

					?>
					<?php
						for($i=1;$i<=$tongsotrang;$i++){
							if($i==$trang){
								echo "<a class='phantrang' style='background:red;' href='index.php?page=dienthoai&trang=$i' title=''><b>$i</b></a>";
							}
							else{
								echo "<a class='phantrang'  href='index.php?page=dienthoai&trang=$i' title=''><b>$i</b></a>";
							}
						}

					 ?>

					 <?php 
					 	if($trang<$tongsotrang){

					  ?>
					  <a class='phantrang' href="index.php?trang=dienthoai&trang=<?php echo $trang+1 ?>" title=""><span class='glyphicon glyphicon-menu-right'></span></a>
					  <?php

					  	}

					  ?>

			</div>
		</div>