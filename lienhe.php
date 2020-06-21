<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Liên Hệ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<link rel="stylesheet" href="css/lienhe.css">
	<script src='js/lienhe.js'></script>
</head>
<body>
<div class="main">
	<div class="lienhe">
		<div class="container-fluid">
				<div class="bando">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.521550403442!2d106.78394331474955!3d10.84787949227302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175276bb276eaf7%3A0x56a6a0eafe0e3b09!2zOTcgxJDGsOG7nW5nIE1hbiBUaGnhu4duLCBIaeG7h3AgUGjDuiwgUXXhuq1uIDksIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1588167171002!5m2!1svi!2s" width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

			<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14898.128606089082!2d105.87013165!3d21.011383000000002!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1465579316838" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe> -->
			</div>

			<div class="lhct">
				<div class="container">
					<h3 class="lh">LIÊN HỆ CHÚNG TÔI</h3>
					<p class="tbn">Mọi ý kiến đóng góp của Quý khách hàng là RẤT QUAN TRỌNG với chúng tôi</p>


					<?php
					include ('MYSQL/connectmysql.php');
						if(isset($_POST['gui'])){
							$hoten=$_POST['hoten'];
							$sdt=$_POST['sdt'];
							$email=$_POST['email'];
							$danhmuc=$_POST['danhmuc'];
							$noidung=$_POST['noidung'];
							$sql="insert into lienhe(hoten,sdt,email,danhmuc_hotro,noi_dung) VALUES ('$hoten','$sdt','$email','$danhmuc','$noidung')";
							$query=mysqli_query($connection,$sql);
							echo "<script> alert('Cảm ơn bạn đã phản hồi'); </script>";
						}


					?>



					<div class="form">
					<p id='result'></p>
						<form action="" method='post'>
							<div class="row">
								<div class="form-group col-sm-6">
									<input type="text" name='hoten' class='form-control' id='hoten' value ="<?php echo $_SESSION['hoten'];?>" placeholder="Họ tên *" maxlength="30">
									
								</div>
								<div class="form-group col-sm-6">
									<input type="text" name='sdt' class='form-control' id='sdt' value ="<?php echo $_SESSION['sdt'];?>" placeholder="Số điện thoại *" maxlength="11">
								</div>
								<div class="form-group col-sm-6">
									<input type="email" name='email' class='form-control' id='email' value ="<?php echo $_SESSION['email'];?>" placeholder="Email *" maxlength="30">
								</div>
								<div class="form-group col-sm-6"  id='poi'>
									<select name="danhmuc" id="fuk">
										<option value="1" selected="selected">Thắc mắc-Tư vấn</option>
										<option value="2">Phản ánh-Khiếu nại</option>
										<option value="3">Yêu cầu xử lí</option>
										<option value="4">Khác</option>
									</select>
								</div>
								<div class="form-group col-sm-12">
									<textarea name="noidung" id="noidung" cols="30" rows="7" class='form-control'></textarea>
								</div>
								<div class="gui-tt">
									<input type="submit" id='sub' name='gui' value="Gửi Đi" onclick='return check_lienhe();'>
								</div>
							</div>
						</form>
					</div>







				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>