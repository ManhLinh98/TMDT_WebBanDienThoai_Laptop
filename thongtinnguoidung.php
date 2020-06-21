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
				$id_tv=$_GET['id_tv'];
					  include ('MYSQL/connectmysql.php');
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
				<div class="vn">quản lí tài khoản</div>
			</div>

			<div class='thn'>
				<ul class='dstk'>
					<li>Tên Tài Khoản: <span>"<?php echo $fuc['tentaikhoan'] ?>"</span></li>
					<li>Họ & tên: <span>"<?php  echo $fuc['ho_ten']?>"</span></li>
					<li>CMND: <span>"<?php echo $fuc['CMND'] ?>"</span></li>
					<li>Email: <span>"<?php echo $fuc['email'] ?>"</span></li>
					<li>Số điện thoại: <span>"<?php echo $fuc['sodienthoai'] ?>"</span></li>
					<li>Ngày sinh: <span>"<?php echo $fuc['ngaysinh'] ?>"</span></li>
					<li>Địa chỉ: <span>"<?php echo $fuc['dia_chi'] ?>"</span></li>
					<li>Tỉnh/thành: <span>"<?php echo $fuc['tinh_thanh'] ?>"</span></li>
					<li>Quận huyện: <span>"<?php echo $fuc['quan_huyen'] ?>"</span></li>
				</ul>
					<div class='capnhattv'>
						<a href="index.php?page=edit_thongtinnguoidung&id_tv=<?php echo $fuc['id_tv']; ?>" title="">Chỉnh Sửa Thông Tin</a>
					</div>
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