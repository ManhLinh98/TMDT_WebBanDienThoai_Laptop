       <?php 
    if($_SESSION['user'] && $_SESSION['pass']){
            

 ?>

 <style type="text/css" media="screen">
     .form-conp{
        width:500px;
        padding: 9px 5px;
        border-radius: 5px;
        border:1px solid #777;
        margin-top: 5px;
     }
 </style>

          <?php 

                     include ('MYSQL/connectmysql.php');
                     if(isset($_POST['submit_them'])){
                        $ten=trim($_POST['ten']);
                        $mk=trim($_POST['mk']);
                        $email=trim($_POST['email']);
                        $ngaysinh=trim($_POST['ngaysinh']);
                        $ngaysinh= date("d/m/Y",strtotime($ngaysinh));
                        $sdt=trim($_POST['sdt']);
                        $hoten=trim($_POST['hoten']);
                        $cmnd=trim($_POST['cmnd']);
                        $diachi=trim($_POST['diachi']);
                        $tinh=trim($_POST['tinh']);
                        $quan=trim($_POST['quan']);
			            date_default_timezone_set('Asia/Ho_Chi_Minh');

                        //check tài khoản tồn tại
                       
                        $checktk="select * from thanhvienlqshop where tentaikhoan='$ten'";
                        $querycheck=mysqli_query($connection,$checktk);
                        $rowcheck=mysqli_num_rows($querycheck);
                        if($rowcheck>0){
                            echo "<script> alert('Tên Tài Khoản Bạn Thêm Đã Tồn Tại Rồi..Bạn Vui Lòng Chọn Tên Khác'); </script>";
                        }
                        //check tồn tại email
                        $checkmail="select * from thanhvienlqshop where email='$email'";
                        $query_mail=mysqli_query($connection,$checkmail);
                        $row_mail=mysqli_num_rows($query_mail);
                        if($row_mail>0){
                            echo "<script> alert('Email Bạn Thêm Đã Tồn Tại Rồi..Bạn Vui Lòng Chọn Email Khác'); </script>";
                        }
                        else{
                        $sql_them="insert into thanhvienlqshop (tentaikhoan,matkhau,email,ngaysinh,sodienthoai,ho_ten,CMND,dia_chi,tinh_thanh,quan_huyen,ngaydangki)
                         values ('$ten','$mk','$email','$ngaysinh','$sdt','$hoten','$cmnd','$diachi','$tinh','$quan','".date("Y-m-d H:i:s")."')";
                        $sql_query_them=mysqli_query($connection,$sql_them);
                        header('location:adminstrator.php?page=quanlithanhvien');
                     }
                 }


           ?>



          <link rel="stylesheet" type="text/css" href="css/themthanhvien.css">

           <!-- Main Content -->
            <form method="post" enctype="multipart/form-data">
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
                <tr id="main-navbar" height="36px">
                    <td colspan="6" style='background: #4471c2;'>thêm một thành viên mới</td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Tên Tài Khoản</label><br><input type="text" name="ten" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Mật Khẩu</label><br><input type="text" name="mk" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Email</label><br><input type="text" name="email" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Ngày Sinh</label><br><input type="text" name="ngaysinh" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Số Điện Thoại</label><br><input type="text" name='sdt' class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Họ Tên</label><br><input type="text" name='hoten' class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>CMND</label><br><input type="text" name='cmnd' class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Địa Chỉ</label><br><input type="text" name='diachi' class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Tỉnh/Thành</label><br><input type="text" name='tinh' class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Quận/Huyện</label><br><input type="text" name='quan' class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><input type="submit" name="submit_them" value="Thêm Thành Viên" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
                </tr>
            </table>
            </form>
            <!-- End Main Content -->
                    <?php
}
else{
   header('location:index.php');
}
?>