      <?php 
    if($_SESSION['user'] && $_SESSION['pass']){
            

 ?>
 <link rel="stylesheet" type="text/css" href="css/thanhvien.css">
 <!-- Main Content -->

            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
                <tr id="main-navbar" height="36px">
                    <td colspan="6" style='background: #4471c2'>Thiết Lập Admin<a href="adminstrator.php?page=them_admin">thêm Admin (+)</a></td>
                </tr>
                <tr height="30px" id="navbar-title">
                    <td width="20%">Tên Tài khoản</td>
                    <td width="12%">Mật Khẩu</td>
                    <td width="15%">Email</td>
                    <td width="10%">Xóa Admin</td>
                </tr>
                <?php 
                    include ('MYSQL/connectmysql.php');
                     $size=10;
                    $trang=$_GET['trang'];
                    $start=($trang -1) * $size;
                    $sql_thanhvien="select * from admin  limit $start,$size";
                    $query_thanhvien=mysqli_query($connection,$sql_thanhvien);
                    $row_thanhvien=mysqli_num_rows($query_thanhvien);
                    if(!$trang || $trang<1){
                        header('location:adminstrator.php?page=thietlap_admin&trang=1');
                     }
                   
                    if($row_thanhvien>0){
                        while($row_ad=mysqli_fetch_array($query_thanhvien)){
                            

  ?>                                          
                <tr class="product-item">
                    <td class="text"style='font-size:14px;;text-align:center;' ><?php echo $row_ad['Name']; ?></td>
                    <td class="text"style='font-size:14px;;text-align:center;' ><?php echo $row_ad['Pass']; ?></td>
                    <td class="text"style='font-size:14px;;text-align:center;' ><?php echo  $row_ad['Email']; ?></td>
                    <td class="link"><a style='font-size:14px;;text-align:center;' class="red" href="adminstrator.php?page=xoa_admin&id_ad=<?php echo $row_ad['id_ad'];  ?>">xóa</a></td>
                </tr>  

                <?php

                    }
                }
                else{
                         echo '<script>alert("Không Có Admin Nào");</script>';
                    }
                ?>             
                

                <?php
                        $sql="select count(*) from admin";
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
                         <a style='font-size:14px;color:blue;' href="adminstrator.php?page=thietlap_admin&trang=<?php echo $trang-1 ?>">Pre</a>
                    <?php
                        }

                    ?>


                    <?php
                        for($i=1;$i<=$tongsotrang;$i++){
                            if($i==$trang){
                                echo "<a style='color:red;font-size:14px;' href='adminstrator.php?page=thietlap_admin&trang=$i'><b>$i</b></a>";
                            }
                            else{
                                echo "<a style='font-size:14px;color:blue;' href='adminstrator.php?page=thietlap_admin&trang=$i'>$i</a>";
                            }
                        }

                     ?>




                    <?php 
                        if($trang<$tongsotrang){

                      ?>
                      <a style='font-size:14px;color:blue;' href="adminstrator.php?page=thietlap_admin&trang=<?php echo $trang+1 ?>">Next</a>
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