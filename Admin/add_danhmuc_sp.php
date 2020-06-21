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
			if(isset($_POST['submit_add'])){
					$dm_ten=$_POST['ten_dm'];
                    //check danh muc tồn tại
                    $checkdm="select * from danhmuc_sp where ten_dm='$dm_ten'";
                    $query_check=mysqli_query($connection,$checkdm);
                    $row_check=mysqli_num_rows($query_check);
                    if($row_check>0){
                         echo "<script> alert('Tên Danh Mục  Bạn Thêm Đã Tồn Tại Rồi..Bạn Vui Lòng Chọn Tên Danh Mục Khác'); </script>";
                    }
                    else{
					$add_dm="insert into danhmuc_sp (ten_dm) values ('$dm_ten')";
					$query_add_dm=mysqli_query($connection,$add_dm);
					header('location:adminstrator.php?page=danhmucsp');
			}
        }

		 ?>

		<link rel="stylesheet" type="text/css" href="css/add_danhmuc_sp.css">
            <!-- Main Content -->
            <form method="post">
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="6" style='background: #4471c2;'>thêm mới một danh mục sản phẩm</td>
                </tr>
                <tr height="50">
                	<td class="form"><label>tên danh mục sản phẩm mới</label><br><input class='form-conp' type="text" name="ten_dm" /></td>
                </tr>
                <tr height="50">
                	<td class="form"><input type="submit" name="submit_add" value="Thêm danh mục" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
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