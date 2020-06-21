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
                    $sql_sp="select * from sanpham where thuocdanhmuc='microsolf'";
                    $sql_query_sp=mysqli_query($connection,$sql_sp);
                    $sql_row_sp=mysqli_num_rows($sql_query_sp);
                    if($sql_row_sp>0){
                        while ($row_sp=mysqli_fetch_array($sql_query_sp)){

										
								?>


							<div class="col-xs-6 col-sm-3 col-md-2 img-product">
								<a href="index.php?page=product&id_sp=<?php echo $row_sp['id_sp']; ?>" class="thumbnail"><img src="puclic/<?php  echo $row_sp['anh_sp']; ?>" alt=""  width='100%'></a>
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
							
						</div>
						</div>