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
                $sqldmsp="select * from danhmuc_sp where ten_dm='Sony'";
                $query_dmsp=mysqli_query($connection,$sqldmsp);
                if(isset($_POST['submit_themsp'])){
                    $tensp=$_POST['ten_sp'];
                    $giasp=$_POST['gia_sp'];
                    $hien_trang=$_POST['hien_trang'];
                    $dmsp=$_POST['id_dm'];
                    $cm=$_POST['cm'];

                    $file_path=$_FILES['image_upload']['tmp_name'];
                    $file_name=$_FILES['image_upload']['name'];
                    $new_path='../upload/'.$file_name;
                    $upload=move_uploaded_file($file_path,$new_path);


                    $sql="insert into sanpham (ten_sp,gia_sp,thuocdanhmuc,hien_trang,chuyen_muc,anh_sp) VALUES ('$tensp','$giasp','$dmsp','$hien_trang','Dien_Thoai','$new_path')";
                    $sql_query=mysqli_query($connection,$sql);
					header('location:adminstrator.php?page=sp_sony');

				}


		 ?>


	<link rel="stylesheet" type="text/css" href="css/them_all.css">
      <!-- Main Content -->
            <form method="post" enctype="multipart/form-data">
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="12">thêm một sản phẩm mới</td>
                </tr>
                <tr height="50">
                	<td class="form"><label>tên của sản phẩm</label><br><input type="text" name="ten_sp" class='form-conp' /></td>
                </tr>
                <tr height="50">
                	<td class="form"><label>giá của sản phẩm</label><br><input type="text" name="gia_sp"  class='form-conp'/></td>
                </tr>
                <tr height="50">
                	<td class="form"><label>sản phẩm thuộc danh mục</label><br>
                    	<select name="id_dm">
                        	<option value=0 >--- lựa chọn danh mục ---</option>
                        	<?php
                        		while($row=mysqli_fetch_array($query_dmsp)){
                        	?>                         
                        	<option selected="selected" value=<?php echo $row["ten_dm"];?>><?php echo $row["ten_dm"];?></option>
                          <?php
                          	}

                          ?>
                        </select>                    	
                    </td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Hiện Trạng</label><br><input type="text" name="hien_trang" class='form-conp' /></td>
                </tr>
                <tr height="50">
                	<td class="form"><label>Ảnh Sản Phẩm</label><br><input type="file" name="image_upload" /></td>
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
