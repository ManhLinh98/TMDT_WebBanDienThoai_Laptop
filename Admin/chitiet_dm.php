                      <?php 
    if($_SESSION['user'] && $_SESSION['pass']){
            

 ?>




            <link rel="stylesheet" type="text/css" href="css/sanpham.css">
            <!-- Main Content -->
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="12" style='background: #4471c2;'>quản lý sản phẩm <a href="adminstrator.php?page=themsanpham">thêm sản phẩm mới (+)</a></td>
                </tr>
                <tr height="30px" id="navbar-title">
                	<td width="30%">tên sản phẩm</td>
                    <td width="10%">giá sản phẩm</td>
                    <td width="10%">Thuộc Danh Mục</td>
                    <td width="10%">Hiện Trạng</td>
                    <td width="15%">Ảnh Sản Phẩm</td>
                    <td width="10%">Chuyên Mục</td>
                    <td width="5%">sửa</td>
                    <td width="5%">xóa</td>
                </tr>   
                 <?php


                    include ('MYSQL/connectmysql.php');
                    $ten_dm=$_GET['ten_dm'];
                    $sql_sp="select * from sanpham where thuocdanhmuc='$ten_dm'";
                    $sql_query_sp=mysqli_query($connection,$sql_sp);
                    $sql_row_sp=mysqli_num_rows($sql_query_sp);
                    if($sql_row_sp>0){
                        while ($row_sp=mysqli_fetch_array($sql_query_sp)){

                     

            ?>                                       
                <tr class="product-item">
                	<td class="text"><?php echo  $row_sp['ten_sp']; ?></td>
                    <td class="red text"><?php  echo $row_sp['gia_sp']; ?></td>
                    <td class="img"><?php  echo $row_sp['thuocdanhmuc'];  ?></td>
                    <td class="text"><?php echo  $row_sp['hien_trang']; ?></td>
                    <td class="text" align='center'><img src='<?php  echo $row_sp['anh_sp']; ?>' width='50px'/></td>
                    <td class="text"><?php  echo $row_sp['chuyen_muc'];?></td>
                    <td class="link"><a href="adminstrator.php?page=suachitiet_dm&id_sp=<?php echo $row_sp['id_sp'] ?>">sửa</a></td>
                    <td class="link"><a class="red" href="adminstrator.php?page=xoasanpham&id_sp=<?php echo $row_sp['id_sp'] ?>">xóa</a></td>
                </tr> 

                <?php


                   }
                    }
                     else{
                        echo '<script>alert("Không Có Sản Phẩm Nào Nào");</script>';
                    }
                    ?>
            <!-- End Main Content -->
<?php
}
else{
   header('location:index.php');
}
?>
</table>