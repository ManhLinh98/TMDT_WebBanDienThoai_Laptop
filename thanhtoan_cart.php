
<link rel="stylesheet" href="css/dathang.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src='js/check_dathang.js'></script>

  <!-- <script src="https://www.paypal.com/sdk/js?client-id=sb"></script> -->
<!-- <script>paypal.Buttons().render('body');</script> -->
   <link rel="stylesheet" href="css/reponsive-menu.css">
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
					$tongtien=0;
	        		$id=$_GET['id'];
        			if(isset($_SESSION['cart']) != NULL){
        			$i=1;
        			foreach ($_SESSION['cart'] as $key => $value) {
        				$tongtien+=$_SESSION['cart'][$key]['gia_sp']*$_SESSION['cart'][$key]['sl'];


        		?>


						<table class="table-responsive jklm" style='border:1px solid #ccc;'>
							<tr>
								<td><p class="stt"><?php echo $i++; ?></p></td>
								<td>
								<div class="anh-dh">
									<img src="puclic/<?php echo $_SESSION['cart'][$key]['anh_sp'] ?>" alt="" width='100%'>
								</div>
								</td>
								<td style='text-align: center;'>
									<p class="namesp"><?php echo $_SESSION['cart'][$key]['ten_sp']; ?></p>
									<p class='sluong'>Số Lượng: <span><?php echo $_SESSION['cart'][$key]['sl']; ?></span> </p>
									<p class="giamh"><?php echo $_SESSION['cart'][$key]['gia_sp']*$_SESSION['cart'][$key]['sl'] ?>0.000₫</p>
								</td>
							</tr>
						</table>
						<?php
							}

						?>
								<p class='tongtientt'>TỔNG TIỀN BẠN PHẢI THANH TOÁN LÀ: <span><?php echo $tongtien; ?>0.000 VNĐ</span></p>

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
				if(isset($_POST['guihang'])){
					$hoten=$_POST['hoten'];
					$sdt=$_POST['sdt'];
					$email=$_POST['email'];
					$diachi=$_POST['diachi'];
					$check=$_POST['check'];
					date_default_timezone_set('Asia/Ho_Chi_Minh');

					
					$sql_gui="insert into donhang(ho_ten,so_dien_thoai,email,dia_chi,hinh_thuc_mua_hang) VALUES ('$hoten','$sdt','$email','$diachi','$check')";
					$gui_query=mysqli_query($connection,$sql_gui);
					$id_dh=mysqli_insert_id($connection);
					foreach ($_SESSION['cart'] as $key => $value) {
						$chitiet="INSERT INTO chi_tiet_donhang (id_dh,id_sp,Ten_sp_mua_hang,Gia_don_hang,anh_sp,so_luong,thanh_tien,Thoi_gian)";
						$chitiet.="VALUES('".$id_dh."','".$key."','".$value['ten_sp']."','".$value['gia_sp']."','".$value['anh_sp']."','".$value['sl']."','".$value["gia_sp"]*$value["sl"]."0.000','".date("Y-m-d H:i:s")."')";
						$query_chitiet=mysqli_query($connection,$chitiet);
						unset($_SESSION['cart']);
					}
					header('location:index.php?page=dathang_thanhcong');
				}

				?>





				<div class="col-md-6 jkl">
					<div class="ttkl">
					<p class="thogtil">THÔNG TIN KHÁCH HÀNG</p>
					<form action="" method="post">
					<div class="col-xs-12 k-hang">
							<p class="txtnm">Họ và tên <span>(*)</span>:</p>
							<p class='oiks'><input type="text" id='hoten' class='form-control'  value ="<?php echo $_SESSION['hoten'];?>" placeholder="Họ và tên người mua hàng" name='hoten'></p>
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
							<p><input type="radio" name='check' value='2'> Thanh toán qua Paypal</p>							<!-- <p><input type="radio" name='check' value='2'> Thanh toán tại cửa hàng (giữ hàng)</p> -->
							<!-- <p><input type="radio" name='check' value='2' onclick='return thanh_toan_paypal();'> Thanh toán qua Paypal</p>							<p><input type="radio" name='check' value='2'> Thanh toán tại cửa hàng (giữ hàng)</p> -->

							<div class="xacnhan">
								<input type="submit" name='guihang' value='XÁC NHẬN ĐƠN HÀNG' id='xacnhan' onclick='return check_dat_hang();'>
							</div>

						
					</div>
					</form>
					</div>
				</div>
				</div>
			
		</div>
	</div>
</div>