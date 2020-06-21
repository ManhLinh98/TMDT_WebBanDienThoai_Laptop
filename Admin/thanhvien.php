      <?php 
    if($_SESSION['user'] && $_SESSION['pass']){
            

 ?>
 <link rel="stylesheet" type="text/css" href="css/thanhvien.css">
 <!-- Main Content -->

            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="12" style='background: #4471c2'>quản lí thành viên <a href="adminstrator.php?page=themthanhvien">thêm thành viên mới (+)</a></td>
                </tr>
                <tr height="30px" id="navbar-title">
                	<td width="20%">Tên Tài khoản</td>
                    <td width="15%">Mật Khẩu</td>
                    <td width="25%">Email</td>
                    <td width="10%">Ngày Sinh</td>
                    <td width="10%">Số Điện Thoại</td>
                    <td width="15%">Ngày Đăng Kí</td>
                    <td width="15%">Xóa Thành Viên</td>
                </tr>
                <?php 
                    include ('MYSQL/connectmysql.php');
                    $size=10;
                    $trang=$_GET['trang'];
                    $start=($trang -1) * $size;
                    $sql_thanhvien="select * from thanhvienlqshop limit $start,$size";
                    $query_thanhvien=mysqli_query($connection,$sql_thanhvien);
                    $row_thanhvien=mysqli_num_rows($query_thanhvien);
                    date_default_timezone_set("Asia/Ho_Chi_Minh");
                    if(!$trang || $trang<1){
                        header('location:adminstrator.php?page=quanlithanhvien&trang=1');
                     }
                    if($row_thanhvien>0){
                        while($row_tv=mysqli_fetch_array($query_thanhvien)){
                            $date=$row_tv['ngaydangki'];
                            $datex = date("d-m-Y H:i:s", strtotime($date));
                            

  ?>                                          
                <tr class="product-item">
                	<td class="text" style='text-align: center;'><?php echo $row_tv['tentaikhoan']; ?></td>
                    <td class="red text" style='text-align: center;'><?php echo  $row_tv['matkhau']; ?></td>
                    <td class="text" style='text-align: center;'><?php echo  $row_tv['email']; ?></td>
                    <td class="text" style='text-align: center;'><?php echo  $row_tv['ngaysinh']; ?></td>
                    <td class="sdt" style='text-align: center;'><?php echo  $row_tv['sodienthoai']; ?></td>
                    <td class="text" style='text-align: center;'><?php echo  $datex; ?></td>
                    <td class="link" style='text-align: center;'><a class="red" href="adminstrator.php?page=xoathanhvien&id_tv=<?php echo $row_tv['id_tv'];  ?>">xóa</a></td>
                </tr>  

                <?php

                    }
                }
                else{
                         echo '<script>alert("Không Có Thành viên Nào");</script>';
                    }
                ?>   








                        <?php
                        $sql="select count(*) from thanhvienlqshop";
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
                         <a style='font-size:14px;color:blue;' href="adminstrator.php?page=quanlithanhvien&trang=<?php echo $trang-1 ?>">Pre</a>
                    <?php
                        }

                    ?>


                    <?php
                        for($i=1;$i<=$tongsotrang;$i++){
                            if($i==$trang){
                                echo "<a style='color:red;font-size:14px;' href='adminstrator.php?page=quanlithanhvien&trang=$i'><b>$i</b></a>";
                            }
                            else{
                                echo "<a style='font-size:14px;color:blue;' href='adminstrator.php?page=quanlithanhvien&trang=$i'>$i</a>";
                            }
                        }

                     ?>




                    <?php 
                        if($trang<$tongsotrang){

                      ?>
                      <a style='font-size:14px;color:blue;' href="adminstrator.php?page=quanlithanhvien&trang=<?php echo $trang+1 ?>">Next</a>
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