 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
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
                $id_sp=$_GET['id_sp'];
                $sqldmsp="select * from danhmuc_sp";
                $query_dmsp=mysqli_query($connection,$sqldmsp);
                $sql_sp="select * from sanpham where id_sp='$id_sp'";
                $sp=mysqli_query($connection,$sql_sp);
                $num=mysqli_num_rows($sp);


                if(isset($_POST['submit_suasp'])){
                    $ten_sp=$_POST['ten_sp'];
                    $gia_sp=$_POST['gia_sp'];
                    $hien_trang=$_POST['hien_trang'];
                    $dmsp=$_POST['id_dm'];
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

                    $sql_sua="update sanpham set ten_sp='$ten_sp',gia_sp='$gia_sp',thuocdanhmuc='$dmsp',hien_trang='$hien_trang',anh_sp='$new_path',mota='$thongso' where id_sp='$id_sp'";
                    $query_sua=mysqli_query($connection,$sql_sua);

                    $sua_anh="update anhsanpham set anhsanpham2='$new_path2',anhsanpham3='$new_path3' where id_sp='$id_sp'";
                    $query_anh=mysqli_query($connection,$sua_anh);
                     echo "<script>  window.history.go(-2); </script>";
                }


        ?>

    <link rel="stylesheet" type="text/css" href="css/suasanpham.css">
    <?php
         if($num>0){
        while($anh=mysqli_fetch_array($sp)){
            $fuc=$anh['id_sp'];
            $ql="select * from anhsanpham where id_sp='$fuc'";
            $que=mysqli_query($connection,$ql);
            $fg=mysqli_num_rows($que);
            if($fg>0){
                while($lo=mysqli_fetch_array($que)){
          
    ?>
      <!-- Main Content -->
            <form method="post" enctype="multipart/form-data">
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
                <tr id="main-navbar" height="36px">
                    <td colspan="6">Sửa Sản Phẩm</td>
                </tr>
                <tr height="50">
                    <td class="form"><label>tên của sản phẩm</label><br><input class='form-conp' type="text" name="ten_sp" value='<?php echo $anh['ten_sp'];  ?>' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>giá của sản phẩm</label><br><input class='form-conp' type="text" name="gia_sp" value='<?php echo $anh['gia_sp'];  ?>' /></td>
                </tr>
               <tr height="50">
                    <td class="form"><label>sản phẩm thuộc danh mục</label><br>
                        <select name="id_dm">
                            <option value=0>--- lựa chọn danh mục ---</option>
                            <?php
                                while($row=mysqli_fetch_array($query_dmsp)){
                                    $selected='';
                                    if($row['ten_dm']==$anh['thuocdanhmuc']){
                                        $selected='selected';
                                    }
                            ?>                         
                            <option <?php echo $selected; ?> value=<?php echo $row["ten_dm"];?>><?php echo $row["ten_dm"];?></option>
                          <?php
                            }

                          ?>
                        </select>                       
                    </td>
                </tr>
                 <tr height="50">
                    <td class="form"><label>Hiện Trạng</label><br><input class='form-conp' type="text" name="hien_trang" value='<?php echo $anh['hien_trang'];  ?>' /></td>
                </tr>
                 <tr height="50">
                    <td class="form"><label>Ảnh Sản Phẩm Chính</label><br><input type="file" name="image_upload" /><img src="<?php echo $anh['anh_sp'] ?>" width='70px' height='70px' alt=""></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Ảnh Sản Phẩm 2</label><br><input type="file" name="image_upload2" /><img src="<?php echo $lo['anhsanpham2'] ?>" width='70px' height='70px' alt=""></td>
                </tr>

                 <tr height="50">
                    <td class="form"><label>Ảnh Sản Phẩm 3</label><br><input type="file" name="image_upload3" /><img src="<?php echo $lo['anhsanpham3'] ?>" width='70px' height='70px' alt=""></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Thông Số Kĩ Thuật</label><br><textarea style='height: 300px;' name="thongso"><?php echo $anh['mota'] ?></textarea></td>
                </tr>
                <tr height="50">
                    <td class="form"><input type="submit" name="submit_suasp" value="Sửa sản phẩm" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
                </tr>
            </table>
            </form>
            <!-- End Main Content -->
            <?php
        }
        }
    }
}
            ?>


            
            <?php
}
else{
   header('location:index.php');
}
?>