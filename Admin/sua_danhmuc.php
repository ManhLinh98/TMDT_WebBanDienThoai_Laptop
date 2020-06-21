      <?php 
    if($_SESSION['user'] && $_SESSION['pass']){
            

 ?>

<?php 
            $ten_dm=$_GET['ten_dm'];
            include ('MYSQL/connectmysql.php');
            if(isset($_POST['submit_update'])){
                $update_dm=$_POST['sua_dm'];
                //check danh mục tồn tại
                $sql_checkdm="select *  from danhmuc_sp where ten_dm='$update_dm'";
                $sql_check_query=mysqli_query($connection,$sql_checkdm);
                $row_querydm=mysqli_num_rows($sql_check_query);
                if($row_querydm>0){
                    echo "<script> alert('Tên Danh Mục  Bạn Sửa Đã Tồn Tại Rồi..Bạn Vui Lòng Chọn Tên Danh Mục Khác'); </script>";
                }
                else{
                $sql_update="update danhmuc_sp set ten_dm='$update_dm' where ten_dm='$ten_dm'";
                $sql_query_update=mysqli_query($connection,$sql_update);
                header('location:adminstrator.php?page=danhmucsp');
            }
        }


 ?>


<form method="post">
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="6">Sửa Danh Mục</td>
                </tr>
                <tr height="50">
                	<td class="form"><label>Sửa Danh Mục</label><br><input type="text" name="sua_dm" value="<?php  echo $ten_dm ?>" /></td>
                </tr>
                <tr height="50">
                	<td class="form"><input type="submit" name="submit_update" value="Sửa danh mục" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
                </tr>
            </table>
            </form>

                    <?php
}
else{
   header('location:index.php');
}
?>