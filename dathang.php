
<link rel="stylesheet" href="css/dathang.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src='js/check_dathang.js'></script>
   <link rel="stylesheet" href="css/reponsive-menu.css">
   <script src='js/slide_product.js'></script>
   <!-- <script src="https://www.paypal.com/sdk/js?client-id=sb"></script> -->
	<!-- <script>paypal.Buttons().render('body');</script> -->

<div class="main" style='overflow: hidden;'>
	<div class="muahang">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 tdmh">
					<p class="dhvl">ĐẶT HÀNG</p>
					<center>
					<div class="ghtn">
						<span class='vklo'>GIAO HÀNG MIỄN PHÍ THU TIỀN TẬN NƠI</span>
						<span class='vkll'>1 ĐỔI 1 TRONG 30 NGÀY CHO SẢN PHẨM LỖI</span>
					</div>
					</center>
				</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 ttdn jkl dfg">
					<div class="ttkl">
					<p class="thogtil">THÔNG TIN ĐƠN HÀNG</p>
					</div>

					<div class="ttdn">


					<?php
						include ('MYSQL/connectmysql.php');
						$id_sp=$_GET['id_sp'];
						$sql="select * from sanpham where id_sp='$id_sp'";
						$query=mysqli_query($connection,$sql);
						$num=mysqli_num_rows($query);
						if($num>0){
							$i=1;
							while($rows=mysqli_fetch_array($query)){
								$id_pp=$rows['id_sp'];
								$tenpp=$rows['ten_sp'];
								$giapp=$rows['gia_sp'];
								$anh_sp=$rows['anh_sp']



					?>

					 

					<form action="" method="post">
						<table class="table-responsive jklm" style='border:1px solid #ccc;'>
							<tr>
								<td><p class="stt"><?php echo $i++; ?></p></td>
								<td>
								<div class="anh-dh">
									<img src="puclic/<?php echo $rows['anh_sp']; ?>" alt="" width='100%'>
								</div>
								</td>
								<td style='text-align: center;'>
									<p class="namesp"><?php echo $rows['ten_sp']; ?></p>
									<p class="giamh"><?php echo $rows['gia_sp']; ?> đ</p>
									<p class='sluong'>Số Lượng: <span>1</span> </p>
									<div class="mausac">
									<p class='ms'>Màu Sắc:</p>
									<p class='mauvang' style='float: left;padding: 0px 3px;'>
									<label for="label01"><img id='mvang' src="img/mauvang.jpg" width='20px' alt=""></label> <input style='display: none;' type="radio" id="label01" name="mau" value="1" />
									</p>

									<p class='mhong' style='float: left;padding: 0px 3px;'><label for="label02"><img id='mhong' src="img/mauhong.jpg" width='20px' alt=""></label> <input style='display: none;' type="radio" id="label02" name="mau" value="2" />
									</p>

									<p class='mden' style='float: left;padding: 0px 3px;'><label for="label03"><img id='mden' src="img/mauden.jpg" width='20px' alt=""></label> <input style='display: none;' type="radio" id="label03" name="mau" value="3" />
									</p>
									</div>
								</td>
							</tr>
						</table>


							<?php
						}

							?>
							<p class='tongtientt'>TỔNG TIỀN BẠN PHẢI THANH TOÁN LÀ: <span><?php echo $giapp; ?> VNĐ</span></p>
							<?php

								}
							?>




						<div class="col-xs-12 lue">
							<div class="kmai">
							<div class="container">
							<p class="titlel">
                                        <i class="glyphicon glyphicon-gift"></i>
                                        KHUYẾN MẠI
                                    </p>
								<ul>
									<li>Miên phí dán cường lực màn hình 1 năm miễn phí </li>
									<li>Tặng ốp lưng trị giá 150.000đ</li>
									<li>Có thẻ sinh viên được chiết khấu 0.5%</li>
									<li>Khách hàng cũ LQShop được chiết khấu 0.2%</li>
									<li>Tặng Tai Nghe Bletooth giá 200.000đ</li>
								</ul>
								</div>
							</div>
						</div>
					</div>
					
				</div>

				
			<?php
			include ('MYSQL/connectmysql.php');
				if(isset($_POST['guihang'])){
					echo $hoten;
					$hoten=$_POST['hoten'];
					$sdt=$_POST['sdt'];
					$email=$_POST['email'];
					$diachi=$_POST['diachi'];
					$soluong=$_POST['soluong'];
					$mau=$_POST['mau'];
					$check=$_POST['check'];
					date_default_timezone_set('Asia/Ho_Chi_Minh');

					$sql_gui="INSERT INTO donhang(ho_ten,so_dien_thoai,email,dia_chi,hinh_thuc_mua_hang) VALUES ('$hoten','$sdt','$email','$diachi','$check')";
					$gui_query=mysqli_query($connection,$sql_gui);
					$id_dh=mysqli_insert_id($connection);
					$sql_sp="INSERT INTO chi_tiet_donhang(id_dh,id_sp,Ten_sp_mua_hang,Gia_don_hang,mau_sac,anh_sp,so_luong,thanh_tien,Thoi_gian) VALUES ('$id_dh','$id_pp','$tenpp','$giapp','$mau','$anh_sp',1,'$giapp','".date("Y-m-d H:i:s")."')";
					$sp_que=mysqli_query($connection,$sql_sp);
					header('location:index.php?page=dathang_thanhcong');

				}


			?>




				<div class="col-md-6 jkl">
					<div class="ttkl">
					<p class="thogtil">THÔNG TIN KHÁCH HÀNG</p>
					<div class="col-xs-12 k-hang">
							<p class="txtnm">Họ và tên <span>(*)</span>:</p>
							<p class='oiks'><input type="text" id='hoten' class='form-control' value ="<?php echo $_SESSION['hoten'];?>" placeholder="Họ và tên người mua hàng" name='hoten'></p>
							<p id="resulthoten" style='color:red;'></p>

							<p class="txtnm">Điện thoại <span>(*)</span>:</p>
							<p class='oiks'><input type="text" class='form-control' id='sdt' value ="<?php echo $_SESSION['sdt'];?>" placeholder="Điện thoại liên hệ" name='sdt'></p>
							<p id="resultsdt" style='color:red;'></p>

							<p class="txtnm">Email: <span>(*)</span>:</p>
							<p class='oiks'><input type="email" class='form-control' id='email' value ="<?php echo $_SESSION['email'];?>" placeholder="Email người mua hàng" name='email'></p>
							<p id="resultemail" style='color:red;'></p>


							<p class="txtnm">Địa Chỉ <span>(*)</span>:</p>
							<p class='oiks'><input type="text" class='form-control' id='diachi' value ="<?php echo $_SESSION['diachi'];?>" placeholder="Số nhà,tỉnh,thành phố" name='diachi'></p>
							<p id="resultdiachi" style='color:red;'></p>


							<p class="txtnm">Hình Thức Giao Hàng <span>(*)</span>:</p>
							<p><input type="radio" name='check' checked="checked" value='1'> Thanh toán trực tiếp tại nhà</p>
							<p><input type="radio" name='check' value='2'> Thanh toán qua Paypal</p>
							<!-- <p><input type="radio" name='check' value='2'> Thanh toán tại cửa hàng (giữ hàng)</p> -->

							<div class="xacnhan">
								<input type="submit" name='guihang' value='XÁC NHẬN ĐƠN HÀNG' id='xacnhan' onclick='return check_dat_hang();'>
							</div>

						
					</div>
					</div>
				</div>
				</div>
				</form>
			
		</div>
	</div>
</div>