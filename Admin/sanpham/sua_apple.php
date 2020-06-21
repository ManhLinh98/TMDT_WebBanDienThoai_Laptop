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
                $dulieu_row=mysqli_fetch_array($sp);
                if(isset($_POST['submit_suasp'])){
                    $ten_sp=$_POST['ten_sp'];
                    $gia_sp=$_POST['gia_sp'];
                    $hien_trang=$_POST['hien_trang'];
                    $dmsp=$_POST['id_dm'];

                    $file_path=$_FILES['image_upload']['tmp_name'];
                    $file_name=$_FILES['image_upload']['name'];
                    $new_path='../upload/'.$file_name;
                    $upload=move_uploaded_file($file_path,$new_path);

                    $sql_sua="update sanpham set ten_sp='$ten_sp',gia_sp='$gia_sp',thuocdanhmuc='$dmsp',hien_trang='$hien_trang',anh_sp='$new_path' where id_sp='$id_sp'";
                    $query_sua=mysqli_query($connection,$sql_sua);
                    header('location:adminstrator.php?page=sp_apple');
                }


        ?>

	<link rel="stylesheet" type="text/css" href="css/sua_all.css">
      <!-- Main Content -->
            <form method="post" enctype="multipart/form-data">
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="12">Sửa Sản Phẩm</td>
                </tr>
                <tr height="50">
                	<td class="form"><label>tên của sản phẩm</label><br><input type="text" class='form-conp' name="ten_sp" value='<?php echo $dulieu_row[1];  ?>' /></td>
                </tr>
                <tr height="50">
                	<td class="form"><label>giá của sản phẩm</label><br><input type="text" class='form-conp' name="gia_sp" value='<?php echo $dulieu_row[2];  ?>' /></td>
                </tr>
                <tr height="50">
                	<td class="form"><label>sản phẩm thuộc danh mục</label><br>
                    	<select name="id_dm">
                        	<option value=0>--- lựa chọn danh mục ---</option>
                        	<?php
                        		while($row=mysqli_fetch_array($query_dmsp)){
                                    $selected='';
                                    if($row['ten_dm']==$dulieu_row['thuocdanhmuc']){
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
                    <td class="form"><label>Hiện Trạng</label><br><input type="text" name="hien_trang" class='form-conp' value='<?php echo $dulieu_row[5];  ?>' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Ảnh Sản Phẩm</label><br><img src='<?php echo $dulieu_row['anh_sp'];  ?>' alt='vv' width='70px;'><br/><input type="file" name="image_upload"/></td>
                </tr>
                <tr height="50">
                	<td class="form"><input type="submit" name="submit_suasp" value="Sửa sản phẩm" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
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