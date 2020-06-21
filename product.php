<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản Phẩm</title>
	<meta property="fb:app_id" content="1649863875337618" />
	<meta property="fb:admins" content="11622205414759792" />
	<link rel="stylesheet" href="css/product.css">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="css/reponsive-menu.css">
	 <script src='js/slide_product.js'></script>
	 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1649863875337618";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>	
<div class="main" style='overflow: hidden;'>
	<div class="products">
		<div class="container">
		<?php 
							$id_sp=$_GET['id_sp'];

							include ('MYSQL/connectmysql.php');
							$sql_product="select * from sanpham where id_sp='$id_sp'";
							$query_product=mysqli_query($connection,$sql_product);
							$row_product=mysqli_num_rows($query_product);
							if($row_product>0){
								while($anh=mysqli_fetch_array($query_product)){
									$fuk=$anh['id_sp'];
									$kl="select * from anhsanpham where id_sp='$fuk'";
									$que=mysqli_query($connection,$kl);
									$num=mysqli_num_rows($que);
									if($num>0){
										while($fg=mysqli_fetch_array($que)){




					 ?>
			<div class="row hangd">
				<div class="col-sm-6 col col-md-4 jk khung1">
				<center>
			<div id="bigPic">
			<div class="col-xs-12">
				<img src="puclic/<?php echo $anh['anh_sp'] ?>" alt="" width='100%' />
				</div>
				<div class="col-xs-12">
				<img src="puclic/<?php echo $fg['anhsanpham2'] ?>" alt="" width='100%' />
				</div>
				<div class="col-xs-12">
				<img src="puclic/<?php echo $fg['anhsanpham3'] ?>" alt="" width='100%' />
				</div>
			</div>
			</center>
			
			<ul id="thumbs">
			<div class="col-xs-4">
				<li class='active' rel='1' style='margin-left: 12px;'><img src="puclic/<?php echo $anh['anh_sp'] ?>" alt="" width='100%' /></li>
				</div>
				<div class="col-xs-4">
				<li rel='2' style='margin-left: 12px;'><img src="puclic/<?php echo $fg['anhsanpham2'] ?>" alt="" width='100%' /></li>
				</div>
				<div class="col-xs-4">
				<li rel='3' style='margin-left: 12px;'><img src="puclic/<?php echo $fg['anhsanpham3'] ?>" alt="" width='100%' /></li>
				</div>
			</ul>
	</div>
				<div class="col-sm-6 col-md-5 jk khung1">
					<p class="tsp"><?php echo $anh['ten_sp'] ?></p>
					<p class="gsp"><?php echo $anh['gia_sp'] ?> ₫ </p>
					<div class="tls">
					<ul class='ttx'>
					<li>
					<p class='msac' style='float: left;'>Màu Sắc: </p>
					<p class='mauvang' style='float: left;padding: 0px 5px;'>
					<label for="label01"><img id='mvang' src="img/mauvang.jpg" width='20px' alt=""></label> <input style='display: none;' type="radio" id="label01" name="label" value="" />
					</p>

					<p class='mhong' style='float: left;padding: 0px 5px;'><label for="label02"><img id='mhong' src="img/mauhong.jpg" width='20px' alt=""></label> <input style='display: none;' type="radio" id="label02" name="label" value="" />
					</p>

					<p class='mden' style='float: left;padding: 0px 5px;'><label for="label03"><img id='mden' src="img/mauden.jpg" width='20px' alt=""></label> <input style='display: none;' type="radio" id="label03" name="label" value="" />
					</p>

					</li>
					<li><p class="stt" style='clear: both;'>Trạng Thái: <span><?php echo $anh['hien_trang'] ?></span></p></li>
					<li><p class="stt">Bộ sản phẩm chuẩn: <span>Hộp, Sạc, Cáp, Tai nghe, Sách hướng dẫn.</span></p></li>
					</ul>
					</div>
					<div class="add">
						<a href="cart_shop.php?id=<?php echo $anh['id_sp']; ?>"><img src="img/them-vao-gh_03.png" alt="" width='100%'></a>
					</div>
					<div class="add">
						<a id ="check_dangnhap" data-toggle="modal" data-target="#dangnhap" onclick='check_dang_nhap()' value ="<?php echo $anh['id_sp'] ?>"><img src="img/order.png" alt="" width='100%'></a>

						<!-- <a href="index.php?page=dathang&id_sp=<?php echo $anh['id_sp'] ?>"><img src="img/order.png" alt="" width='100%'></a> -->
					</div>
					<div class="fb-like" data-href="https://www.facebook.com/lqshop24hh/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

					<div class="ttsp">
						<ul class="ttvl">
							<li>Tặng PMH 1,5 triệu HOẶC Trả góp 0% (đến 31/07)</li>
							<li>Cơ hội trúng 20 suất du lịch Mỹ (đến 31/07)</li>
							<li>Cơ hội trúng 1 trong 3 xe Liberty dành cho KH khu vực Hà Nội (đến 31/07)</li>
							<li>Giảm ngay 5% khi Mua Laptop/ Tablet (đến 31/07)</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 jk">
					<div class="gift">
                                    <div class="title">
                                        <i class="glyphicon glyphicon-gift"></i>
                                        QUÀ TẶNG
                                    </div>
                                    <div class="content">
                                        
                                        - Trả góp lãi suất 0% dành cho chủ thẻ HSBC và Home Credit.<br>
- Trả góp lãi suất 1% cùng FE Credit<br>
Giá mua trả góp: 18.490.000đ <em>(Áp dụng từ 01/07 đến 31/07/2016)</em><br>- Ưu đãi trả góp: trả trước 0đ, lãi suất 1% (Áp dụng từ 01/07 đến 31/07/2016)</br>- Bảo hành 1 đổi 1 trong 1 tháng nếu hàng lỗi. (Áp dụng từ 01/07 đến 31/07/2016)
                                        
                                    </div>
                                </div>

                                <div class="guarantee" style="margin-top: 0px;">
                                    <table cellspacing="0" cellpadding="0">
                                        <tbody><tr>
                                            <td style="width: 25px;">
                                                <img src="img/ico1.png" alt="" width='20px'>
                                            </td>
                                            <td>Bảo hành chính hãng
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/ico2.png" alt="" width='20px'>
                                            </td>
                                            <td>Tư vấn bán hàng: 1800 8123</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/ico3.png" alt="" width='25px'>
                                            </td>
                                            <td>Giao hàng miễn phí (nếu cách LQShop dưới 10km)</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
							</div>


			</div>


				


				<div class="row dacdiem">
							<div class='container'>
						<div class="col-sm-12 col-md-9 lpi">
							<h4 class='tddd'>Đặc điểm nổi bật</h4>
							<div class='mota' style='padding-bottom: 20px;'><?php echo $anh['mota']; ?>
								<img class='anhvlk' src="public/<?php echo $fg['anhmota']; ?>" alt="">
							</div>

							<h4 class='tddd'>Thông Số Kĩ Thuật</h4>
							<div class='thongso'><?php echo $anh['thongso_kithuat']; ?></div>
						</div>
						<div class=" col-sm-12 col-md-3">
							<p class='sptt'>Sản Phẩm Tương Thích</p>

							<?php
							$sptt="select * from sanpham order by rand() limit 5";
							$quey=mysqli_query($connection,$sptt);
							$tt_num=mysqli_num_rows($quey);
							if($tt_num>0){
								while($tt_sp=mysqli_fetch_array($quey)){

							?>

							<div class='col-xs-4 col-sm-4 col-md-12 liu'>
									<a class='vklps' href="index.php?page=product&id_sp=<?php echo $tt_sp['id_sp']; ?>" title="">
								<div class='anhtt'>
									<img src="puclic/<?php echo  $tt_sp['anh_sp']; ?>" alt="" width='100%'>
								</div>
								<p class='tentt'><?php echo  $tt_sp['ten_sp']; ?></p>
								<p class='giatt'><?php echo  $tt_sp['gia_sp']; ?> ₫</p>
								</a>
							</div>

							<?php
								}
							}

							?>


						</div>
						</div>
					</div>

					

					<?php
						}
					}
				}
					}
				
					?>
		</div>
		<div class="cmt-fb">
		<div class="container">
		<h4 class='danhgia'>Đánh Giá,Bình Luận Về Sản Phẩm</h4>
			<div class="fb-comments" data-href="https://www.facebook.com/lqshop24hh/" data-width="100%" data-numposts="10"></div>
		</div>
		</div>




	</div>
	</div>
	</div>

	<script src='js/menu.js'></script>
  	<script src='js/jquery.reveal.js'></script>
  	<script src='js/checkdangnhap.js'></script>
 	<script >
		<?php 
			$flag = empty($_SESSION['hoten']);
			
			?>
		function check_dang_nhap() {
		var user = "<?php echo $flag;?>" ;
		if(user==1){
			return true;
		}	else{
			// document.getElementById('thongbao').innerHTML="";
			window.location="index.php?page=thanhtoan_cart";
		}
		}
  </script>
</body>
</html>


