                      <?php 
    if($_SESSION['user'] && $_SESSION['pass']){
            

 ?>




            <link rel="stylesheet" type="text/css" href="css/sanpham.css">
            <!-- Main Content -->
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
                <tr id="main-navbar" height="36px">
                    <td colspan="12" style='background: #4471c2;'>quản lý sản phẩm <a href="adminstrator.php?page=them_maytinh">thêm sản phẩm mới (+)</a></td>
                </tr>
                <tr height="30px" id="navbar-title">
                    <td width="30%">tên sản phẩm</td>
                    <td width="10%">giá sản phẩm</td>
                    <td width="10%">Hiện Trạng</td>
                    <td width="15%">Ảnh Sản Phẩm</td>
                    <td width="10%">Chuyên Mục</td>
                    <td width="5%">sửa</td>
                    <td width="5%">xóa</td>
                </tr>   
                 <?php


                    include ('MYSQL/connectmysql.php');
                    $size=10;
                    $trang=$_GET['trang'];
                    $start=($trang -1) * $size;
                    $sql_sp="select * from sanpham  where chuyen_muc='May_Tinh' limit $start,$size";
                    $sql_query_sp=mysqli_query($connection,$sql_sp);
                    $sql_row_sp=mysqli_num_rows($sql_query_sp);
                    if(!$trang || $trang<1){
                        header('location:adminstrator.php?page=sp_maytinh&trang=1');
                     }
                    if($sql_row_sp>0){
                        while ($row_sp=mysqli_fetch_array($sql_query_sp)){

                     

            ?>                                       
                <tr class="product-item">
                    <td class="text"><?php echo  $row_sp['ten_sp']; ?></td>
                    <td class="red text"><?php  echo $row_sp['gia_sp']; ?></td>
                    <td class="text"><?php echo  $row_sp['hien_trang']; ?></td>
                    <td class="text" align='center'><img src='<?php  echo $row_sp['anh_sp']; ?>' width='50px'/></td>
                    <td class="text"><?php  echo $row_sp['chuyen_muc'];?></td>
                    <td class="link"><a href="adminstrator.php?page=sua_maytinh&id_sp=<?php echo $row_sp['id_sp'] ?>">sửa</a></td>
                    <td class="link"><a class="red" href="adminstrator.php?page=xoa_maytinh&id_sp=<?php echo $row_sp['id_sp'] ?>">xóa</a></td>
                </tr> 

                <?php


                   }
                    }
                     else{
                        echo '<script>alert("Không Có Sản Phẩm Nào Nào");</script>';
                    }
                    ?>



                        <?php
                        $sql="select count(*) from sanpham where chuyen_muc='May_Tinh'";
                        $query=mysqli_query($connection,$sql);
                        $row=mysqli_fetch_array($query);
                        $tongsosp=$row[0];
                        $tongsotrang=ceil($tongsosp / $size);

                    ?>


<tr id="list-num" height="30px">
<td align="right" colspan="12">
                    <?php 
                    if($trang>1){
                            
                        ?>
                         <a style='font-size:14px;color:blue;' href="adminstrator.php?page=sp_maytinh&trang=<?php echo $trang-1 ?>">Pre</a>
                    <?php
                        }

                    ?>


                    <?php
                        for($i=1;$i<=$tongsotrang;$i++){
                            if($i==$trang){
                                echo "<a style='color:red;font-size:14px;' href='adminstrator.php?page=sp_maytinh&trang=$i'><b>$i</b></a>";
                            }
                            else{
                                echo "<a style='font-size:14px;color:blue;' href='adminstrator.php?page=sp_maytinh&trang=$i'>$i</a>";
                            }
                        }

                     ?>




                    <?php 
                        if($trang<$tongsotrang){

                      ?>
                      <a style='font-size:14px;color:blue;' href="adminstrator.php?page=sp_maytinh&trang=<?php echo $trang+1 ?>">Next</a>
                      <?php

                        }

                      ?>




</td>
                </tr>
</table>
<?php
}
else{
   header('location:index.php');
}
?>