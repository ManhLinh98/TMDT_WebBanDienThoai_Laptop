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
                    <td colspan="20" style='background: #4471c2'>Quản Lí Đơn Hàng</td>
                </tr>
                <tr height="30px" id="navbar-title">
                    <td width='3%'>STT</td>
                    <td width="10%">Tên Khách Hàng</td>
                    <td width="10%">Số Điện Thoại</td>
                    <td width="8%">Email</td>
                    <td width="10%">Địa Chỉ</td>
                    <td width="10%">Tên Sản Phẩm Đặt Mua</td>
                    <td width="8%">Giá Sản Phẩm</td>
                    <td width="8%">Màu Sắc</td>
                    <td width="10%">Ảnh Sản Phẩm</td>
                    <td width="3%">Số Lượng</td>
                    <td width="8%">Thành Tiền</td>
                    <td width="10%">Hình Thức Mua Hàng</td>
                    <td width="15%">Ngày Đặt Hàng</td>
                    <td width='7%'>Xóa</td>
                </tr>  
                <?php
                include ('MYSQL/connectmysql.php');
                    $size=7;
                    $trang=$_GET['trang'];
                    $start=($trang -1) * $size;
                    $sql="select * from donhang  order by id_dh desc limit $start,$size";
                    $query=mysqli_query($connection,$sql);
                    
                    $i=1;
                     date_default_timezone_set("Asia/Ho_Chi_Minh");

                    if(!$trang || $trang<1){
                        header('location:adminstrator.php?page=quanlidonhang&trang=1');
                     }
                   

                    while($row=mysqli_fetch_array($query)){
                        $id_dh=$row['id_dh'];
                        $chitiet="select * from chi_tiet_donhang where id_dh='$id_dh' order by id_dh desc limit $start,$size";
                    $que_chitiet=mysqli_query($connection,$chitiet);
                    $num=mysqli_num_rows($que_chitiet);
                    if($num>0){
                        while($ct=mysqli_fetch_array($que_chitiet)){
                            $date=$ct['Thoi_gian'];
                            $datex = date("d-m-Y H:i:s", strtotime($date));




                ?>                                    
                <tr class="product-item">
                    <td class="text" style='text-align:center;'><?php echo $i++; ?></td>
                    <td class="text" style='text-align:center;'><?php echo $row['ho_ten'] ?></td>
                    <td class="text" style='text-align:center;'><?php echo $row['so_dien_thoai'] ?></td>
                    <td class="text" style='text-align:center;'><?php echo $row['email'] ?></td>
                    <td class="text" style='text-align:center;'><?php echo $row['dia_chi'] ?></td>
                    <td class="text" style='text-align:center;'><?php echo $ct['Ten_sp_mua_hang']; ?></td>
                    <td class="text" style='text-align:center;'><?php echo $ct['Gia_don_hang']; ?></td>
                    <td class="text" style='text-align:center;'><?php  if($ct['mau_sac']==0){
                        echo 'Màu Vàng';
                    }else if($ct['mau_sac']==1){
                        echo 'Màu Vàng';
                    }else if($ct['mau_sac']==2){
                        echo 'Màu Hồng';
                    }else if($ct['mau_sac']==3){
                        echo 'Màu Đen';
                    } ?></td>
                    <td class="text" style='text-align:center;'><img src='<?php echo $ct['anh_sp']; ?>' title='jdjd' width='50px;'></td>
                    <td class="text" style='text-align:center;'><?php echo $ct['so_luong']; ?></td>
                    <td class="text" style='text-align:center;'><?php echo $ct['thanh_tien']; ?></td>
                    <td class="text" style='text-align:center;'><?php if($row['hinh_thuc_mua_hang']==1){
                    echo 'Thanh toán trực tiếp tại nhà';
                    }else if($row['hinh_thuc_mua_hang']==2){
                    echo ' Thanh toán tại cửa hàng (giữ hàng)';
                    }else{
                    echo 'Hình Thức Khác';
                    }  ?></td>
                    <td class="text" style='text-align:center;'><?php echo $datex; ?></td>
                    <td class="link" style='text-align:center;'><a class="red" href="adminstrator.php?page=xoa_donhang&id_dh=<?php echo $row['id_dh'];  ?>">xóa</a></td>
                </tr>  
                <?php
                }
                   }
                    }

            ?>           
                


                <?php
                        $sql="select count(*) from donhang";
                        $query=mysqli_query($connection,$sql);
                        $row=mysqli_fetch_array($query);
                        $tongsosp=$row[0];
                        $tongsotrang=ceil($tongsosp / $size);

                    ?>

                    <tr id="list-num" height="30px">
<td align="right" colspan="20">
                    <?php 
                    if($trang>1){
                            
                        ?>
                         <a style='font-size:14px;color:blue;' href="adminstrator.php?page=quanlidonhang&trang=<?php echo $trang-1 ?>">Pre</a>
                    <?php
                        }

                    ?>


                    <?php
                        for($i=1;$i<=$tongsotrang;$i++){
                            if($i==$trang){
                                echo "<a style='color:red;font-size:14px;' href='adminstrator.php?page=quanlidonhang&trang=$i'><b>$i</b></a>";
                            }
                            else{
                                echo "<a style='font-size:14px;color:blue;' href='adminstrator.php?page=quanlidonhang&trang=$i'>$i</a>";
                            }
                        }

                     ?>




                    <?php 
                        if($trang<$tongsotrang){

                      ?>
                      <a style='font-size:14px;color:blue;' href="adminstrator.php?page=quanlidonhang&trang=<?php echo $trang+1 ?>">Next</a>
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