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
							$doimj=$fuc['matkhau'];


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
				<div class="vn">Đổi Mật Khẩu</div>
				</div>


					<?php
						if(isset($_POST['submit'])){
							$mkcu=$_POST['mkcu'];
							$mkmoi=$_POST['mkmoi'];
							$nlaimk=$_POST['nlaimk'];
							$matkhau=$_SESSION['passs'];
							if($mkcu==$matkhau){
								if($nlaimk==$mkmoi){
								$doimatkhau="update thanhvienlqshop set matkhau='$mkmoi' where id_tv='$id_tv'";
								$quedoi=mysqli_query($connection,$doimatkhau);
								echo "<p class='ktr'>Thay Đổi Mật Khẩu Thành Công</p>";
							}
							else{
								echo '<p class="ktr">Nhập Lại Mật Khẩu Mới Không Khớp</p>';
							}
						}
							else{
								echo '<p class="ktr">Mật khẩu Cũ Bạn Nhập Không Hợp Lệ</p>';
							}
						}
					?>
					<div class='doimk'>
						<form method='post'>
							<div class='row'>
							<p id='result'></p>
								<div class='col-xs-12'>
								<p class='nhap'>Mật khẩu hiện tại:</p>
									<input type='password' name='mkcu' class='form-control' id='mkcu'>
								</div>
								<div class='col-xs-12'>
								<p class='nhap'>Nhập khẩu mới:</p>
									<input type='password' name='mkmoi' class='form-control' id='mkmoi'>
								</div>
								<div class='col-xs-12'>
								<p class='nhap'>Nhập lại mật khẩu:</p>
									<input type='password' name='nlaimk' class='form-control' id='nlaimk'>
								</div>
								<div class='col-xs-12 vbd'>
									<input type='submit' name='submit' id='doio' value='Đổi Mật Khẩu'>
									<a href="index.php?page=thongtinnguoidung" title="" id='doiso'>HỦY</a>
								</div>
							</div>
						</form>
					</div>
					<?php


					?>
				

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