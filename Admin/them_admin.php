
<?php 
     include ('MYSQL/connectmysql.php');
                     if(isset($_POST['submit_them'])){
                        $ten=trim($_POST['ten']);
                        $mk=trim($_POST['mk']);
                        $email=trim($_POST['email']);
                      
                        //check tài khoản tồn tại
                        $checktk="select * from admin where Name='$ten'";
                        $querycheck=mysqli_query($connection,$checktk);
                        $rowcheck=mysqli_num_rows($querycheck);
                        if($rowcheck>0){
                            echo "<p class=\"error\">Tên đăng nhập '$ten' bị trùng<p>";
                            // echo "<script> alert('Tên Tài Khoản Bạn Thêm Đã Tồn Tại Rồi..Bạn Vui Lòng Chọn Tên Khác'); </script>";
                        }
                        //check tồn tại email
                        $checkmail="select * from admin where email='$email'";
                        $query_mail=mysqli_query($connection,$checkmail);
                        $row_mail=mysqli_num_rows($query_mail);
                        if($row_mail>0){
                            echo "<p class=\"error\"> Email '$email' đã có người sử dụng</p>";
                            // echo "<script> alert('Email Bạn Thêm Đã Tồn Tại Rồi..Bạn Vui Lòng Chọn Email Khác'); </script>";
                        }
                        else{
                        $sql_them="insert into admin (Name,Pass,email) values ('$ten','$mk','$email')";
                        $sql_query_them=mysqli_query($connection,$sql_them);
                        header('location:adminstrator.php?page=thietlap_admin');
                    }
                }
                     

 ?>


<link rel="stylesheet" type="text/css" href="css/themthanhvien.css">

           <!-- Main Content -->
            <form method="post" enctype="multipart/form-data">
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
                <tr id="main-navbar" height="36px">
                    <td colspan="6" style='background: #4471c2;'>thêm admin</td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Tên Admin</label><br><input type="text" name="ten" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Mật Khẩu</label><br><input type="password" name="mk" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Email</label><br><input type="text" name="email" class='form-conp' /></td>
                </tr>
                <!-- <tr height="50">
                    <td class="form"><label>Quyền Truy Cập</label><br><input type="text" name='quyen' class='form-conp' /></td>
                </tr> -->
                <tr height="50">
                    <td class="form"><input type="submit" name="submit_them" value="Thêm Thành Viên" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
                </tr>
            </table>
            </form>