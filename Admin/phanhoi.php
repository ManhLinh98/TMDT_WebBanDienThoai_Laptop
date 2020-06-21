      <?php 
    if($_SESSION['user'] && $_SESSION['pass']){
            

 ?>
 <link rel="stylesheet" type="text/css" href="css/thanhvien.css">
 <!-- Main Content -->

                
<style>
    
table tr .text{
    padding: 15px 0px;
}

</style>

            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
                <tr id="main-navbar" height="36px">
                    <td colspan="12" style='background: #4471c2'>Phản hồi của khách hàng</td>
                </tr>
                <tr height="30px" id="navbar-title">
                    <td width='3%'>STT</td>
                    <td width="13%">Tên Khách Hàng</td>
                    <td width="13%">Số Điện Thoại</td>
                    <td width="13%">Email</td>
                    <td width="13%">Hỗ Trợ Về</td>
                    <td width="20%">Nội Dung</td>
                    <td width='5%'>Xóa</td>
                </tr>  
                <?php
                include ('MYSQL/connectmysql.php');
                $size=10;
                    $trang=$_GET['trang'];
                    $start=($trang -1) * $size;
                    $sql="select * from lienhe";
                    $query=mysqli_query($connection,$sql);
                    $i=1;
                     if(!$trang || $trang<1){
                        header('location:adminstrator.php?page=phanhoi&trang=1');
                     }
                    
                    while($row=mysqli_fetch_array($query)){



                ?>                                    
                <tr class="product-item">
                    <td class="text" style='text-align:center;'><?php echo $i++; ?></td>
                    <td class="text" style='text-align:center;'><?php echo $row['hoten'] ?></td>
                    <td class="text" style='text-align:center;'><?php echo $row['sdt'] ?></td>
                    <td class="text" style='text-align:center;'><?php echo $row['email'] ?></td>
                    <td class="text" style='text-align:center;'><?php if($row['danhmuc_hotro']==1){
                    echo 'Thắc Mắc,Tư Vấn';
                    }else if($row['danhmuc_hotro']==2){ echo 'Phản Ánh Khiếu Nại'; }else if($row['danhmuc_hotro']==3){ echo 'Yêu Cầu Xử Lí'; }else if($row['danhmuc_hotro']==4){ echo 'Khác'; }else{
                    echo 'Khác';
                    } ?></td>
                    <td class="text" style='text-align:center;'><?php echo $row['noi_dung']; ?></td>
                    <td class="link" style='text-align:center;'><a class="red" href="adminstrator.php?page=xoa_phanhoi&id_lh=<?php echo $row['id_lh'];  ?>">xóa</a></td>
                </tr>  
                <?php
                }

            ?>    


                 <?php
                        $sql="select count(*) from lienhe";
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
                         <a style='font-size:14px;color:blue;' href="adminstrator.php?page=phanhoi&trang=<?php echo $trang-1 ?>">Pre</a>
                    <?php
                        }

                    ?>


                    <?php
                        for($i=1;$i<=$tongsotrang;$i++){
                            if($i==$trang){
                                echo "<a style='color:red;font-size:14px;' href='adminstrator.php?page=phanhoi&trang=$i'><b>$i</b></a>";
                            }
                            else{
                                echo "<a style='font-size:14px;color:blue;' href='adminstrator.php?page=phanhoi&trang=$i'>$i</a>";
                            }
                        }

                     ?>




                    <?php 
                        if($trang<$tongsotrang){

                      ?>
                      <a style='font-size:14px;color:blue;' href="adminstrator.php?page=phanhoi&trang=<?php echo $trang+1 ?>">Next</a>
                      <?php

                        }

                      ?>




</td>
                </tr> 
            </table>
            <!-- End Main Content -->
                    <?php
}
else{
   header('location:index.php');
}
?>