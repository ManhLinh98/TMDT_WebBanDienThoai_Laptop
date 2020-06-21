<?php
						error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  
						if($_SESSION['users'] && $_SESSION['passs']){
						?>
<link rel="stylesheet" href="css/thongtinnguoidung.css">
<div class="main" style='overflow: hidden;'>
	<div class="taikhoan">
		<div class="container">
			<div class="row plm">
				<div class="col-md-3 col-sm-4">
					
						
						<div class="mn">
                    <div class="cnhan">
                        <div class="t"><img src="img/tk1.png" alt=""> <span>Thông tin tài khoản</span></div>
                    </div>

                    <?php
					  include ('MYSQL/connectmysql.php');
					  $id_tv=$_GET['id_tv'];
					$sql="select * from thanhvienlqshop where id_tv='$id_tv'";
					$query=mysqli_query($connection,$sql);
					$num=mysqli_num_rows($query);
					if($num>0){
						while($fuc=mysqli_fetch_array($query)){


				?>
               <div class="bd">
                    <div class='qlk'>Quản lý tài khoản</div>
                    <ul class='ttcn'>
                        <li class="sp-3">
                        <img src="img/tk2.png" alt="">
                            <a href="index.php?page=thongtinnguoidung&id_tv=<?php echo $fuc['id_tv'] ?>" class="active">Thông tin cá nhân</a>
                        </li>
                        <li class="sp-4">
                        <img src="img/tk3.png" alt="">
                            <a href="index.php?page=doimatkhau_nguoidung&id_tv=<?php echo $fuc['id_tv'] ?>"  class="">Đổi mật khẩu</a>
                        </li>
                       
                    </ul>
                </div>
            </div>


				</div>
				<div class="col-sm-8 col-md-9 lpk">
					<div class="tkn">
				<div class="vn">Cập Nhật Thông Tin</div>
			</div>

			<div class='thn'>

					<?php
						$id_tv=$_GET['id_tv'];
						if(isset($_POST['submit'])){
							$ho_ten=$_POST['ho_ten'];
							$cmnd=$_POST['cmnd'];
							$email=$_POST['email'];
							$sdt=$_POST['sdt'];
							$dia_chi=$_POST['dia_chi'];
							$ngaysinh=$_POST['ngaysinh'];
							$tinh_thanh=$_POST['tinh_thanh'];
							$quan_huyen=$_POST['quan_huyen'];

							$tv="update thanhvienlqshop set ho_ten='$ho_ten',CMND='$cmnd',email='$email',ngaysinh='$ngaysinh',sodienthoai='$sdt',dia_chi='$dia_chi',tinh_thanh='$tinh_thanh',quan_huyen='$quan_huyen' where id_tv='$id_tv'";
							$que=mysqli_query($connection,$tv);
							echo "<script> window.history.go(-2); </script>";
						}
					

					?>
					<form method='post'>
				<ul class='dstk'>
					<li>Tên Tài Khoản: <input style='text-align: center;' type="text" name="" value="<?php echo $fuc['tentaikhoan'] ?>" disabled='disabled' class='form-control'></li>
					<li>Họ & tên: <input type="text" name="ho_ten" value="<?php echo $fuc['ho_ten'] ?>" class='form-control'></li>
					<li>CMND: <input type="text" name="cmnd" value="<?php echo $fuc['CMND'] ?>" class='form-control'></li>
					<li>Email: <input type="text" name="email" value="<?php echo $fuc['email'] ?>" class='form-control'></li>
					<li>Số điện thoại: <input type="text" name="sdt" value="<?php echo $fuc['sodienthoai'] ?>" class='form-control'></li>
					<li>Ngày sinh: <input type="text" name="ngaysinh" value="<?php echo $fuc['ngaysinh'] ?>" class='form-control'></li>
					<li>Địa chỉ: <input type="text" name="dia_chi" value="<?php echo $fuc['dia_chi'] ?>" class='form-control'></li>
					<li>Tỉnh/thành: <input type="text" name="tinh_thanh" value="<?php echo $fuc['tinh_thanh'] ?>" class='form-control'></li>
					<li>Quận huyện: <input type="text" name="quan_huyen" value="<?php echo $fuc['quan_huyen'] ?>" class='form-control'></li>
				</ul>


					<div class='capnhattv'>
						<input type='submit' name='submit' id='subp' value='cập nhật thông tin'>
						<a href="index.php?page=thongtinnguoidung" title="">HỦY</a>
					</div>
					</form>
				</div>
				<?php
					}
				}

				?>


				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
else{
	header('location:index.php');
}

?>