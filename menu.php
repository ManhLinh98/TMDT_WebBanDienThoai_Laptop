<?php 
	session_start();
	ob_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LQ-Shop</title>
	<!--link liên kết boostrap-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
  <!--Link liên kêt Css/JS-->
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/sure.css">
  <link rel="stylesheet" href="css/reponsive-menu.css">
 
</head>
<body>
 <?php 
					include ('MYSQL/connectmysql.php');


					if(isset($_REQUEST['submitlogin'])){
						$users=$_POST['users'];
						$passs=$_POST['passs'];
						$sql_login="select * from thanhvienlqshop where tentaikhoan='$users' and matkhau='$passs'";
						$sql_query_login=mysqli_query($connection,$sql_login);
						$row_login=mysqli_num_rows($sql_query_login);
						if($row_login>0){
							$_SESSION['users']=$users;
							$_SESSION['passs']=$passs;
							while ($row = mysqli_fetch_assoc($sql_query_login)) {
								$_SESSION['sdt'] = $row['sodienthoai'] ;
								$_SESSION['hoten'] = $row['ho_ten'] ;
								$_SESSION['email'] = $row['email'] ;
								$_SESSION['diachi'] = $row['dia_chi'].$row['quan_huyen'].$row['tinh_thanh'] ;
							}

							if (!empty($_SESSION['cart'])) {
								header('location:index.php?page=thanhtoan_cart');
							}
							else{
							header('location:index.php');
							}
							// header('location:index.php');

						}
						else{
							echo  '<script>alert("Tên Tài Khoản Hoặc Mật Khẩu Không Chính Xác");</script>';
						}
						
					}
				 ?>
	<div class="main" style='background: url(img/bg-bluesky.jpg);'>
		<div class="header">
		<!--Menu Destop-->
		<!--Destop-->
		<div class="cskh-destop">
			<div class="container">
				<div class="cs1 xxx">
					<ul class="cb">
						<li><a href="">Hệ thống cửa hàng</a></li>
						<li><a href="">Trả Góp</a></li>
						<li><a href="baohanh.php">Sửa Chữa</a></li>
						<li><a href="">AppleCare</a></li>
					</ul>
				</div>
				<div class="cs2 xxx">
					<ul class='cb2'>
						<li><span class='glyphicon glyphicon-earphone'> Hotline:</span> 19001000</li>
						<?php
						error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  
						if(!$_SESSION['users'] && !$_SESSION['passs']){
						?>
						<li class='hotlin'><span class="glyphicon glyphicon-user"></span>
						<a href='dangki.php' style='font-size: 13px;color:#555;text-decoration: line-through;'>Đăng Kí</a>  / 
							<a href=''   data-toggle="modal" data-target="#dangnhap" style='font-size: 13px;color:#555;text-decoration: line-through;outline: none;background: none;border:none;'>Đăng Nhập</a> 
						</li>	
						<?php
					}
					else{

				?>	

					<?php
					  include ('MYSQL/connectmysql.php');
					  $fg=$_SESSION['users'];
					$sql="select * from thanhvienlqshop where tentaikhoan='$fg'";
					$query=mysqli_query($connection,$sql);
					$num=mysqli_num_rows($query);
					if($num>0){
						while($fuc=mysqli_fetch_array($query)){
							$id_tv=$fuc['id_tv'];
						}
					}
				?>

				<div class='xc'>
				<ul class='chaa'>
				<li>Xin Chào: <button class='us'><?php echo $_SESSION['users']; ?></button>
				<ul class='conn'>
					<li class='duk'><a href='index.php?page=thongtinnguoidung&id_tv=<?php echo $id_tv ?>'>Thông Tin Cá Nhân</a></li>
					<li class='duk'><a href='index.php?page=doimatkhau_nguoidung&id_tv=<?php echo $id_tv ?>'>Đổi Mật Khẩu</a></li>

				</ul>
				</li>
				<a class='xl' style='margin-left: -46px;color:blue' href='dangxuat.php' style='color:blue'>-Thoát-</a>
				</ul>



				</div>

				<?php
					}

				?>			
						</ul>
				</div>
				<div class="cs3 xxx">
					<ul class='cb3'>
						<li><a href="https://www.facebook.com/linhbathai123" target="_blank"><img src="img/face.jpg" alt="" width='20px'></a></li>
						<li><a href="https://www.youtube.com/watch?v=fndRs2zed4k"><img src="img/youtube.jpg" alt="" width='45px'></a></li>
						<?php 
							$sp=0;
							if(isset($_SESSION['cart'])){
								$sp=count($_SESSION['cart']);
							}
						 ?>
						<li class='ghct'><button style='border: none;background: none;outline: none;' type='button' data-toggle="modal" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="img/cart2.png" alt="" width='34px';><span style='color:#fff;background:red;padding:0px 6px;border-radius:30px;font-size: 15px;font-weight: bold;' class='gh'><?php echo $sp; ?></span></button></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Modal -->

<?php 
	if($_SESSION['cart'] != NULL){


 ?>


<div class="modal cat fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  		<div class="modal-header tde">
       <div class="thoat" data-dismiss="modal" aria-label="Close">X Đóng</div>
        <h4 class="modal-title title">GIỎ HÀNG CỦA BẠN (<?php echo $sp;?> SẢN PHẨM)</h4>
      </div>
      <div class="modal-content">
			<div class="col-xs-12">
			<table class="table-responsive bang" width='100%'>
				<tbody>
					<tr class='spx'>
						<th class='tsss'>SẢN PHẨM</th>
						<th class='tsss'>TÊN SẢN PHẨM</th>
						<th class='tsss'>ĐƠN GIÁ</th>
						<th class='tsss'>SỐ LƯỢNG</th>
						<th class='tsss'>THÀNH TIỀN</th>
						<th class="tsss">Xóa</th>
						<th></th>
					</tr>

					<?php
					$tongtien=0;
        		$id=$_GET['id'];
        		if(isset($_SESSION['cart']) != NULL){
        			foreach ($_SESSION['cart'] as $key => $value) {
        				$tongtien+=$_SESSION['cart'][$key]['gia_sp']*$_SESSION['cart'][$key]['sl'];


        		?>
					<tr class='chitiet_cart'>
						<td>
							<div class="anh_spp">
						<img src="puclic/<?php echo $_SESSION['cart'][$key]['anh_sp']; ?>" alt="" width='100%;'>
						</div>
						</td>
						<td style='padding: 0px 5px;'><p class="tsp_cart"><?php echo $_SESSION['cart'][$key]['ten_sp']; ?></p></td>
						<td><p class="gia_cart"><?php echo $_SESSION['cart'][$key]['gia_sp']; ?>₫</p></td>
						<td style='text-align: center;'>
        					<input class='sl' disabled  value='<?php echo $_SESSION['cart'][$key]['sl']; ?>'>
        				</td>
						<td><p class="gia_cart"><?php echo  $_SESSION['cart'][$key]['sl']*$_SESSION['cart'][$key]['gia_sp'] ; ?>0.000₫</p></td>
						<td style='text-align: center;'><div class='delete'><a id="delete" href="delete_cart.php?id=<?php echo $_SESSION['cart'][$key]['id_sp']; ?>"  title=""><span class='glyphicon glyphicon-trash icon-del'></span></a></div></td>
					</tr>
				<?php
					}
				}
				?>

				</tbody>
			</table>



			
			<div class='col-xs-12 ttc'>
						<p class='tongtien'>Tổng Tiền Thanh Toán: <span><?php echo $tongtien; ?>0.000 VNĐ</span></p>
				</div>
			</div>

</div>
      <div class="modal-footer" style='border:none'>
        	<div class="col-xs-12 gui">
				<a id ="check_dangnhap" data-toggle="modal" data-target="#dangnhap" class='ttp' onclick='check_dang_nhap()'>Gửi Đơn Hàng</a>
				<a href='delete_cart.php?id=0' class='ttk'>Hủy Tất Cả Giỏ Hàng</a>
        		<!-- <a href='index.php?page=thanhtoan_cart' class='ttp'>Gửi Đơn Hàng</a> -->
        		<!-- <a href='delete_cart.php?id=0' class='ttk'>Hủy Tất Cả Giỏ Hàng</a> -->
        	</div>
      </div>
      </div>
  </div>
</div>
<?php
	}
	else{
		
	
?>




<!-- Modal -->
<div class="modal cat fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title titi" id="myModalLabel">GIỎ HÀNG CỦA BẠN</h4>
      </div>
      <div class="modal-body">
        	<div class='col-xs-12'>
        		<p class='ght'>GIỎ HÀNG CỦA BẠN ĐANG TRỐNG</p>
        	</div>
        	<div class='ghvl' style='max-width: 140px;'>
        		<img src="img/ghvl.png" alt="" width='100%'>
        	</div>
        		<p class='spl'>LQshop có rất nhiều sản phẩm mà bạn cần tìm, bạn có thể chọn 
nút bên dưới để tiếp tục mua sắm</p>

		<div class='ttuc'>
			<button type="button" id="" class="nut-tt" data-dismiss="modal" aria-label="Close">Tiếp tục mua hàng</button>
		</div>
      </div>
    </div>
  </div>
</div>
<?php
}

?>



		<!--End Destop-->
		<!--Phone-->
		<div class="cskh-phone">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<ul>
							<li class='hotline'><span class='glyphicon glyphicon-earphone'> <strong> HOTLINE/CSKH: </strong></span><b> 19001000</b></li>

							<?php
						error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  
						if(!$_SESSION['users'] && !$_SESSION['passs']){
						?>

							<li class='hotline'><span class="glyphicon glyphicon-user"></span> 
							<a href='dangki.php' style='font-size: 13px;color:#555;text-decoration: line-through;'>Đăng Kí</a>  / 
							<a href=''   data-toggle="modal" data-target="#dangnhap" style='font-size: 13px;color:#555;text-decoration: line-through;outline: none;background: none;border:none;'>Đăng Nhập</a>  
						</li>
						<?php
					}
					else{
					?>
					<div class='lop' style='margin-bottom:5px;'>
					<div class='xv'>Xin Chào: 
					<button class='use'><a  style='color:#fff' href="index.php?page=thongtinnguoidung&id_tv=<?php echo $id_tv ?>" title=""><?php  echo $_SESSION['users'] ?></a></button>
					<a class='xl' href='dangxuat.php' style='color:blue'>-Thoát-</a>
					</div>
					</div>
					<?php
						}
					?>


						<?php 
							$sp=0;
							if(isset($_SESSION['cart'])){
								$sp=count($_SESSION['cart']);
							}
						 ?>
					<li style='text-align: center;list-style: none;'><button style='border: none;background: none;outline: none;' type='button' data-toggle="modal" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="img/cart2.png" alt="" width='37px';><span style='color:#fff;background:red;padding:0px 6px;border-radius:30px;font-size: 15px;font-weight: bold;' class='gh'><?php echo $sp; ?></span></button></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!--End Phone-->
			<div class="nav-menu-destop" style='background: url(img/header-bg.jpg) repeat-x;'>
			<div class="container">
				<div class="menu">
				<div class="left">
					<div class="logo">
						<a href="index.php"><p><span>LQ</span>SHOP</p></a>
					<!-- <a href="index.php"><img src="img/logo.png" alt="logo"></a> -->
					</div>
				</div>
				<div class="right">
					<ul>
						<li><a href="index.php">Trang Chủ</a></li>
						<li><a href="index.php?page=gioithieu">Giới Thiệu</a></li>
						<li><a href="javascript:void();">Sản Phẩm <span style='color:#fff;padding-left: 2px;' class="glyphicon glyphicon-chevron-down"></span></a>
						<ul class="con">
							<li><a href="index.php?page=dienthoai">Điện Thoại</a></li>
							<li><a href="index.php?page=maytinh">Máy Tính</a></li>
						</ul>
						</li>
						<li><a href="index.php?page=khuyenmai">Khuyến Mại</a></li>
						<li><a href="index.php?page=dichvu">Dịch Vụ</a></li>
						<li><a href="index.php?page=lienhe">Liên Hệ</a></li>
					</ul>
				</div>
				<div class="timkiem">
					<div class="nhap">
					<form action='search.php' method='get'>
					<input type="text" class="search" name='search' placeholder="Tên máy.hãng sản xuất,đời máy.." maxlength='40'>
					<div class="search-button">
						<button type='submit' name='submit_search' class='nut-tim'><span class="glyphicon glyphicon-search"></span></button>
					</div>
					</form>
					</div>
				</div>
				</div>
				</div>
			</div>
			<div class="clear"></div>

			<!--Menu Điện Thoại-->
			<div class="menu-phone">
			<div class="nav-smart">
				<div class="container">
				<div class="logo">
				<a href="index.php"><p><span>LQ</span>SHOP</p></a>
					<!-- <a href="index.php"><img src="img/logo.png" alt=""></a> -->
				</div>
				<div class="nut-menu">
					<p class="nut">MENU <span class="glyphicon glyphicon-menu-hamburger"></span></p>
				</div>
				</div>
				</div>
				<!--Click để xổ div menu-->
				<div class="xo-down">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 sanpham">
							<ul>
								<li><a href="index.php">Trang Chủ</a></li>
							</ul>
						</div>
						<div class="col-xs-6 sanpham">
							<ul>
								<li><a href="index.php?page=gioithieu">Giới Thiệu</a></li>
							</ul>
						</div>
						<div class="col-xs-6 sanpham">
							<ul>
								<li><a href="javascript:void();">Sản Phẩm</a></li>
							</ul>
						</div>
						<div class="col-xs-6 sanpham">
							<ul>
								<li><a href="index.php?page=khuyenmai">Khuyến Mại</a></li>
							</ul>
						</div>
						<div class="col-xs-6 sanpham">
							<ul>
								<li><a href="index.php?page=baohanh">Bảo Hành</a></li>
							</ul>
						</div>
						<div class="col-xs-6 sanpham">
							<ul>
								<li><a href="index.php?page=dichvu">Dịch Vụ</a></li>
							</ul>
						</div>
						<div class="col-xs-12 sanpham">
							<ul>
								<li><a href="index.php?page=lienhe">Liên Hệ</a></li>
							</ul>
						</div>
					</div>
				</div>
				</div>
				<!--End-->
				<!--Phần Tìm Kiếm-->
				<div class="search-phone">
				<div class="container">
						<div class="row all-form-search">
							<div class="col-xs-12 tim-kiem form-search">
							<form action="search.php" method='get'>
							<div class="col-xs-11 xoa">
								<input type="text" class='form-control' name='search' placeholder="Tìm Kiếm tên máy.hãng sản xuất.." maxlength="50" style='height:40px;border: none;''>
								</div>
								<div class="col-xs-1 xoa">
									<button type="submit" class='sub-form' name='submit_search'><span class="glyphicon glyphicon-search"></span>
								</div>
								</form>
							</div>
						</div>
						</div>
				</div>
			</div>
		</div>

	</div>
		<!-- Button dùng để gọi popup -->


<!-- popup -->
<!-- Modal -->
<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="tddn">
				<div class="tdk">Đăng Nhập</div>
				<div class="thoat" data-dismiss="modal" aria-label="Close">X Đóng</div>
			</div>
			<form action="" method='post'>
					<div class="ketqua"></div>
					<div class="tk">
							<label for="tkh">Tên Đăng Nhập:</label>
							<input type="text" class='form-control' name='users' id='user'>
							<div  id="resultuser"></div>
					</div>
					<div class="mk">
						<label for="mk">Mật Khẩu</label>
						<input type="password" class='form-control' name='passs' id='pass'>
						<div id="resultpass"></div>
					</div>
					<div class="addthem">
						<div class="ghinho">
							<input type="checkbox" name='checkbox' id='checkbox'> 
							Ghi Nhớ Đăng Nhập
						</div>
						<div class="quenmk">
							<a href='' class='qmk'>Quên Mật Khẩu ?</a>
						</div>
					</div>
					<div class="nut-sub">
						<input type="submit" id='subform' name='submitlogin' value='ĐĂNG NHẬP' onclick='return checkdangnhap();'>
					</div>
				</form>
				<div class="dk">
					<a href="dangki.php"><p class="cctk">BẠN CHƯA CÓ TÀI KHOẢN?</p>
					<div class="nut-bt">
					<button class='nut-dk'>Tạo Tài Khoản</button>
					</div>
					</a>
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