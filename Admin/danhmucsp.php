      <?php 
    if($_SESSION['user'] && $_SESSION['pass']){
            

 ?>


       <link rel="stylesheet" type="text/css" href="css/danhmuc.css">
       <!-- Main Content -->

            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
                <tr id="main-navbar" height="36px">
                    <td colspan="6" style='background: #4471c2;'>quản lý danh mục sản phẩm <a href="adminstrator.php?page=adddanhmucsp">thêm danh mục mới (+)</a></td>
                </tr>
                <tr height="30px" id="navbar-title">
                    <td width="90%">tên danh mục</td>
                    <td width="5%">sửa</td>
                    <td width="5%">xóa</td>
                </tr>  
                <?php 
                    include ('MYSQL/connectmysql.php');
                     $sql_dmsp="select ten_dm from danhmuc_sp";
                    $dmsp_query=mysqli_query($connection,$sql_dmsp);
                    $numrow_dmsp=mysqli_num_rows($dmsp_query);
                    if($numrow_dmsp>0){
                        while($row_array=mysqli_fetch_array($dmsp_query)){
                 ?>         
                <tr class="cat-item" height="30px">
                    <td class="text"><a href="adminstrator.php?page=sp_<?php echo $row_array['ten_dm']; ?>" title=""><?php echo $row_array['ten_dm']; ?></a></td>
                    <td class="link"><a href="adminstrator.php?page=sua_danhmuc&ten_dm=<?php echo $row_array['ten_dm']; ?>">sửa</a></td>
             <td class="link"><a class="red" href="adminstrator.php?page=xoa_danhmuc&ten_dm=<?php echo $row_array['ten_dm']; ?>">xóa</a></td>
                    <?php
                        }
                    }
                    else{
                        echo '<script>alert("Không Có Danh Mục Nào");</script>';
                    }

                    ?>

                    </table>
            <!-- End Main Content -->
            <?php
}
else{
    header('location:index.php');
}
?>