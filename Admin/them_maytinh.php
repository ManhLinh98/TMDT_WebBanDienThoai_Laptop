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
                $id=$_GET['id'];
                $sqldmsp="select * from danhmuc_sp";
                $query_dmsp=mysqli_query($connection,$sqldmsp);
                $sql_sp="select * from sanpham";
                $query_sp=mysqli_query($connection,$sql_sp);
                if(isset($_POST['submit_themsp'])){
                    $tensp=$_POST['ten_sp'];
                    $giasp=$_POST['gia_sp'];
                    $hien_trang=$_POST['hien_trang'];
                    $dmsp=$_POST['id_dm'];
                    $cm=$_POST['cm'];
                    $mota=$_POST['mota'];
                    $thongso=$_POST['thongso'];
                    

                    $file_path=$_FILES['image_upload']['tmp_name'];
                    $file_name=$_FILES['image_upload']['name'];
                    $new_path='../upload/'.$file_name;
                    $upload=move_uploaded_file($file_path,$new_path);

                    $file_path2=$_FILES['image_upload2']['tmp_name'];
                    $file_name2=$_FILES['image_upload2']['name'];
                    $new_path2='../upload/'.$file_name2;
                    $upload2=move_uploaded_file($file_path2,$new_path2);


                     $file_path3=$_FILES['image_upload3']['tmp_name'];
                    $file_name3=$_FILES['image_upload3']['name'];
                    $new_path3='../upload/'.$file_name3;
                    $upload3=move_uploaded_file($file_path3,$new_path3);

                    $file_path4=$_FILES['image_upload4']['tmp_name'];
                    $file_name4=$_FILES['image_upload4']['name'];
                    $new_path4='../upload/'.$file_name4;
                    $upload4=move_uploaded_file($file_path4,$new_path4);

                    $sql="insert into sanpham (ten_sp,gia_sp,hien_trang,chuyen_muc,anh_sp,mota,thongso_kithuat) VALUES ('$tensp','$giasp','$hien_trang','May_Tinh','$new_path','$mota','$thongso')";
                    $sql_query=mysqli_query($connection,$sql);
                    $id_anhsp=mysqli_insert_id($connection);

                    $sql_dt="insert into anhsanpham(id_sp,anhsanpham2,anhsanpham3,anhmota) VALUES ('$id_anhsp','$new_path2','$new_path3','$new_path4')";
                    $anh_query=mysqli_query($connection,$sql_dt);
                    header('location:adminstrator.php?page=sp_maytinh');

                }


         ?>


    <link rel="stylesheet" type="text/css" href="css/themsanpham.css">
      <!-- Main Content -->
            <form method="post" enctype="multipart/form-data">
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
                <tr id="main-navbar" height="36px">
                    <td colspan="6">thêm một sản phẩm mới</td>
                </tr>
                <tr height="50">
                    <td class="form"><label>tên của sản phẩm</label><br><input type="text" name="ten_sp" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>giá của sản phẩm</label><br><input type="text" name="gia_sp" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Hiện Trạng</label><br><input type="text" name="hien_trang" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><br><label>Ảnh Sản Phẩm Chính</label><br><br><input type="file" name="image_upload" /></td>
                </tr>
                <tr height="50">
                    <td class="form"><br><label>Ảnh Sản Phẩm 2</label><br><br><input type="file" name="image_upload2" /></td>
                </tr>

                 <tr height="50">
                    <td class="form"><br><label>Ảnh Sản Phẩm 3</label><br><br><input type="file" name="image_upload3" /></td>
                </tr>
                <tr height="50">
                    <td class="form"><br><label>Ảnh Mô Tả</label><br><br><input type="file" name="image_upload4" /></td>
                </tr>
                <tr height="50">
                    <td class="form" ><br><label style='color:blue;font-size: 17px;'>Mô Tả,Minh Họa Cho Sản Phẩm</label><br><br><textarea id="elm1" name="mota"></textarea><br/></td>
                </tr>
                 <tr height="50">
                    <td class="form"><label style='color:blue;font-size: 17px;'>Thông Số Kĩ Thuật</label><br/><br><textarea id="elm1" name="thongso"></textarea></td>
                </tr>
                <tr height="50">
                    <td class="form"><input type="submit" name="submit_themsp" value="Thêm sản phẩm" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
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
