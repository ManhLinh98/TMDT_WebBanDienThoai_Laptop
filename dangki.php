<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>



<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LQSHOP-Đăng Kí</title>
	<link rel="stylesheet" href="css/dangki.css">
	<script src='js/checkdangki.js'></script>
</head>
<body>
<?php 
	include 'menu.php';
 ?>
<div class="main">
	<div class="dangki" style='background:url(img/bg.jpg);'>
		<div class="container">
		<div class="form-dk">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="dk">ĐĂNG KÍ THÀNH VIÊN <span class='t1'>ID</span> <span class='t2'>LQSHOP</span></h3>
			</div>
			<div class="col-xs-12 col-md-12">
			<?php 

			include ("MYSQL/connectmysql.php");
			if(isset($_POST['submitreg'])){
			$user=trim($_POST['user']);
			$pass=trim($_POST['pass']);
			$nlaipass=trim($_POST['nlaipass']);
			$email=trim($_POST['email']);
			$ngaysinh=trim($_POST['ngaysinh']);
			$ngaysinh= date("d/m/Y",strtotime($ngaysinh));
			$sdt=trim($_POST['sdt']);
			$hoten=trim($_POST['hoten']);
			$cmnd=trim($_POST['cmnd']);
			$diachi=trim($_POST['diachi']);
			$tinh=trim($_POST['tinh']);
			$quan=trim($_POST['quan']);
			// $capcha=$_POST['capcha'];
			date_default_timezone_set('Asia/Ho_Chi_Minh');
		
			//check tendangnhap tồn tại
			$checkuser="select * from thanhvienlqshop where tentaikhoan='$user'";
			$querycheckuser=mysqli_query($connection,$checkuser);
			$rowcheckuser=mysqli_num_rows($querycheckuser);
			if($rowcheckuser>0){
				echo "<p class=\"error\">Tên đăng nhập '$user' bị trùng<p>";
			}
			//check email tồn tại
			$checkemail="select * from thanhvienlqshop where email='$email'";
			$query_checkemail=mysqli_query($connection,$checkemail);
			$row_email=mysqli_num_rows($query_checkemail);
			if($row_email>0){
				echo "<p class=\"error\"> Email '$email' đã có người sử dụng</p>";
			}
			if($pass != $nlaipass){
				echo "<p class=\"error\">Nhập lại pass không khớp</p>";
			}
			if($user=="" || $pass=="" || $nlaipass=="" || $email=="" || $ngaysinh=="" || $sdt=="" || $hoten == "" || $cmnd=="" || $diachi=="" || $tinh==""||$quan==""){
				echo "<p class=\"error\">Các thông tin không được để trống !</p>";

			}
			else{
				//if($capcha==$_SESSION['code']){
				if($user!="" && $pass!="" && $nlaipass!="" && $email!="" && $ngaysinh!=""&& $sdt!="" && $hoten != "" && $cmnd!="" && $diachi!="" && $tinh!=""&&$quan!=""){
						$sqlreg = "INSERT INTO thanhvienlqshop  (tentaikhoan,matkhau,email,ngaysinh,sodienthoai,ho_ten,CMND,dia_chi,tinh_thanh,quan_huyen,ngaydangki)";
						$sqlreg .= " VALUES('$user','$pass ','$email','$ngaysinh','$sdt','$hoten','$cmnd','$diachi','$tinh','$quan','".date("Y-m-d H:i:s")."')";
						$queryreg=mysqli_query($connection,$sqlreg);
						$sel="select * from thanhvienlqshop where tentaikhoan='$user' and matkhau='$pass'";
						$que=mysqli_query($connection,$sel);
						$num=mysqli_num_rows($que);
						if($num>0){
						$_SESSION['users']=$user;
						$_SESSION['passs']=$pass;
						header('location:index.php');

					}
					// else{
					// 	echo "<p class=\"error\">Tên đăng nhập bị trùng<p>";
					// } 
				}
		
				
				
			//	}

			//	else{
			//		echo '<p class="ma" style="color:red;font-size: 14px;font-weight: bold;text-align: center;padding: 7px 0px;"">Mã Kiểm Tra Của Bạn Không Hợp Lệ</p>';
			//}

		}
			//			header('location:index.php');
	}

	 ?>
			<form action="" method="post">
				<div class="dk_left">
					<div class="col-xs-12">
						<label for="taikhoan">Tên đăng nhập:<span>*</span></label>
						<input type="text" class='form-control' id='username' name='user'>
						<span id="resultten"></span>
					</div>
					<div class="col-xs-12">
						<label for="matkhau">Mật Khẩu:<span>*</span></label>
						<input type="password" class='form-control' id='password' name='pass'>
						<span id="resultmk"></span>
					</div>
					<div class="col-xs-12">
						<label for="nhaplai">Nhập lại mật khẩu:<span>*</span></label>
						<input type="password" class='form-control' id='nhaplaipass' name='nlaipass'>
						<span id="resultnlpass"></span>
					</div>
					<div class="col-xs-12">
						<label for="email">Email:<span>*</span></label>
						<input type="email" class='form-control' id='email' name='email'>
						<span id="resultemail"></span>
					</div>
					<div class="col-xs-12">
						<label for="ngaysinh">Ngày Sinh:<span>*</span></label>
						<input type="text" class='form-control' id='ngaysinh' name='ngaysinh'>
						<span id="resultngaysinh"></span>
					</div>
					<div class="col-xs-12">
						<label for="SDT">Số Điện Thoại:<span>*</span></label>
						<input type="text" class='form-control' id='sdt' name='sdt'>
						<span id='resultsdt'></span>
					</div>
				</div>

				<div class="dk_right">
					<div class="col-xs-12">
						<label for="hoten">Họ Tên:<span>*</span></label>
						<input type="text" class='form-control' id='hoten' name='hoten'>
						<span id='resultsdt'></span>
					</div>
					<div class="col-xs-12">
						<label for="cmnd">CMND:<span>*</span></label>
						<input type="text" class='form-control' id='cmnd' name='cmnd'>
						<span id='resultsdt'></span>
					</div>
					<div class="col-xs-12">
						<label for="diachi">Địa Chỉ:<span>*</span></label>
						<input type="text" class='form-control' id='diachi' name='diachi'>
						<span id='resultsdt'></span>
					</div>
					<div class="col-xs-12">
						<label for="tinh">Tỉnh/Thành:<span>*</span></label>
						<input type="text" class='form-control' id='tinh' name='tinh'>
						<span id='resultsdt'></span>
					</div>
					<div class="col-xs-12">
						<label for="quan">Quận/Huyện:<span>*</span></label>
						<input type="text" class='form-control' id='quan' name='quan'>
						<span id='resultsdt'></span>
					</div>
					<div class="col-xs-12">
						<input type="checkbox" id='box'>
						<span class="check">Tôi đã đọc và đồng ý với <a href="">Điều Khoản Và Quy Định</a> Của LQSHOP</span>
					</div>		
					<div class="col-xs-12 sub">
						<input type="submit" id='sub-form' name='submitreg' value='Đăng Kí' onclick ="return checkdangki();">
					</div>
				</div>
					
				
				<!-- <div class="col-xs-12">
					<label for="email">Mã Kiểm Tra:<span>*</span></label>
					<div class="row">
					<div class="col-xs-6 col-sm-4 col-sm-offset-2">
						<img src="capcha.php" alt="">
					</div>
					<div class="col-xs-6 col-sm-4">
					<input type="text" class='form-control' id='capcha' name='capcha' placeholder="Nhập Mã">
					</div>
					</div>
					<span id='resultcapcha'></span>
				</div> -->
				<!-- <div class="col-xs-12">
					<span id="resultbox"></span>
				</div> -->
				<!-- <p class="error"></p> -->
				
			</form>
			</div>
		</div>
		</div>
		</div>
	</div>
	</div>

<?php 
 	include 'footer.php';
  ?>
</body>
</html>

