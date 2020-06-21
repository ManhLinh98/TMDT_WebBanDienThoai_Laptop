<?php 
    session_start();
    ob_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LQSHOP-ADMINCP</title>
<link rel="stylesheet" type="text/css" href="css/adminstrator.css">
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
tinymce.init({
    selector: "textarea#elm1",
    theme: "modern",
    width: 990,
    height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>
<script src='..//js/vi_VN.js'></script>
</head>
<body>

<?php 
    if($_SESSION['user'] && $_SESSION['pass']){
            

 ?>




<table id="wrapper" width="1300px" border="0px" cellpadding="0px" cellspacing="0px">
	<!-- Header -->
	   <header id="header">
           <div class='left'>
                <div class='logo'>
                <a href="index.php"><p><span>LQ</span>SHOP</p></a>
                </div>
           </div>
           <div class='right'>
               <div class='quantri'>
                       TRANG QUẢN TRỊ WEBSITE LQSHOP
               </div>
               <div class='menu'>
                   <ul>
                       <li class='bkl'><a href="adminstrator.php" title="">Trang Chủ</a></li>
                       <li class='bkl'><a href="" title="">Giới Thiệu</a></li>
                       <li class='bkl'><a href="adminstrator.php?page=thietlap_admin" title="">Thiết Lập Admin</a></li>
                       <li class='bkl'><a href="../index.php" title="">Xem WEBSITE</a></li>
                   </ul>
               </div>
           </div>
       </header><!-- /header -->
    <!-- End Header -->
    
    <!-- Body -->
    <tr id="body">
    	<td align="left" valign="top" width="250px">
        	<!-- Left Menu -->
            <table width="300px" class="left-menu" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr class="bg-leftbar" height="36px">
                	<td  align=center>Danh Mục Chính</td>
                </tr>
                <tr class="menu-item" height="30px">
                    <td style='border-bottom: 1px solid #ccc;padding-bottom: 5px; padding-top: 5px;'><a href="adminstrator.php" style='color:#FF6E00;font-size: 13px;font-weight:bold;'>- Trang chủ</a></td>
                </tr>
                <tr class="menu-item" height="30px">
                    <td style='border-bottom: 1px solid #ccc;padding-bottom: 5px; padding-top: 5px;'><a href="adminstrator.php?page=danhmucsp" style='color:#FF6E00;font-size: 13px;font-weight:bold;' >- Quản Lí Danh Mục Điện Thọai</a></td>
                </tr>
                 <tr class="menu-item" height="30px">
                    <td class='qlsp' style='border-bottom: 1px solid #ccc;padding-bottom: 5px; padding-top: 5px;'><a href="adminstrator.php?page=sanpham" style='color:#FF6E00;font-size: 13px;font-weight:bold;'>- Tất Cả sản phẩm Điện Thoại</a>

                            <?php
                            include ('MYSQL/connectmysql.php');
                                $sanpham="select * from danhmuc_sp";
                                $query=mysqli_query($connection,$sanpham);
                                $num_row=mysqli_num_rows($query);
                                if($num_row>0){
                                    while($row=mysqli_fetch_array($query)){


                            ?>
                        <div class='sp'>
                            <ul class='all'>
                 <li style='padding: 8px 0px;border-bottom: 1px  solid #ccc;'><a href="adminstrator.php?page=chitiet_dm&ten_dm=<?php echo $row['ten_dm']; ?>" title="" style='color:blue;'><?php echo $row['ten_dm']; ?></a></li>
                            </ul>
                        </div>
                        <?php
                    }
                }
                        ?>


                    </td>
                </tr>
                <tr class="menu-item" height="30px">
                    <td style='border-bottom: 1px solid #dedede;padding-bottom: 5px; padding-top: 5px;'><a href="adminstrator.php?page=sp_maytinh" style='color:#FF6E00;font-size: 13px;font-weight:bold;'>- Tất Cả Sản Phẩm Máy Tính</a></td>
                </tr>
                <tr class="menu-item" height="30px">
                    <td><a href="adminstrator.php?page=quanlithanhvien" style='color:#FF6E00;font-size: 13px;font-weight:bold;'>- Quản lý Thành Viên LQSHOP</a></td>
                </tr>

                <tr class="menu-item" height="30px">
                    <td><a href="adminstrator.php?page=quanlidonhang" style='color:#FF6E00;font-size: 13px;font-weight:bold;'>- Quản lý Đơn Hàng</a></td>
                </tr>
                <tr class="menu-item" height="30px">
                    <td><a href="adminstrator.php?page=phanhoi" style='color:#FF6E00;font-size: 13px;font-weight:bold;'>- Phản Hồi Khách Hàng</a></td>
                </tr>
            </table>
            <!-- End Left Menu -->
            
            <!-- User -->
            <table width="300px" class="left-menu" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr class="bg-leftbar" height="36px">
                	<td align='center'>Thông Tin Admin</td>
                </tr>
                <tr height="30px">
                	<td id="user-info">Xin chào quản trị viên <b><?php if($_SESSION['user']){echo $_SESSION['user'];} ?></b></td>
                </tr>
                <tr height="30px">
                	<td id="logout" align="right"><a href="dangxuat.php">Thoát Ra</a></td>
                </tr>
            </table>
            <!-- End User -->
        </td>
            
        <td float="right" valign="top" width="1050px" style='padding-left: 10px;'>
            <!-- Main Content -->
            <?php
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  
                    $page=$_GET['page'];
                    if(!isset($page)){
                        include ('gioithieu.php');
                    }
                    if($page=='danhmucsp'){
                        include ('danhmucsp.php');
                    }
                    if($page=='sanpham'){
                        include ('sanpham.php');
                    }
                     if($page=='chitiet_dm'){
                        include ('chitiet_dm.php');
                    }
                     if($page=='suachitiet_dm'){
                        include ('suachitiet_dm.php');
                    }
                    if($page=='quanlithanhvien'){
                        include ('thanhvien.php');
                    }
                    if($page=='adddanhmucsp'){
                        include ('add_danhmuc_sp.php');
                    }
                    if($page=='xoa_danhmuc'){
                        include ('xoa_danhmuc.php');
                    }
                    if($page=='sua_danhmuc'){
                        include ('sua_danhmuc.php');
                    }
                    if($page=='suathanhvien'){
                        include ('suathanhvien.php');
                    }
                    if($page=='xoathanhvien'){
                        include ('xoathanhvien.php');
                    }
                    if($page=='themthanhvien'){
                        include ('themthanhvien.php');
                    }
                    if($page=='themsanpham'){
                        include ('themsanpham.php');
                    }
                     if($page=='xoasanpham'){
                        include ('xoasanpham.php');
                    }
                     if($page=='suasanpham'){
                        include ('suasanpham.php');
                    }
                    if($page=='sp_apple' || $page=='sp_Apple'){
                        include ('sanpham/sp_apple.php');
                    }
                    if($page=='sp_samsung' || $page=='sp_Samsung'){
                        include ('sanpham/sp_samsung.php');
                    }
                    if($page=='sp_sony' || $page=='sp_Sony'){
                        include ('sanpham/sp_sony.php');
                    }
                    if($page=='sp_oppo' || $page=='sp_Oppo'){
                        include ('sanpham/sp_oppo.php');
                    }
                    if($page=='sp_microsolf' || $page=='sp_Microsolf'){
                        include ('sanpham/sp_microsolf.php');
                    }
                    if($page=='sp_lg' || $page=='sp_LG'){
                        include ('sanpham/sp_lg.php');
                    }
                    if($page=='sua_lg'){
                        include ('sanpham/sua_lg.php');
                    }
                    if($page=='xoa_lg'){
                        include ('sanpham/xoa_lg.php');
                    }
                    if($page=='sua_samsung'){
                        include ('sanpham/sua_samsung.php');
                    }
                    if($page=='xoa_samsung'){
                        include ('sanpham/xoa_samsung.php');
                    }
                    if($page=='sua_oppo'){
                        include ('sanpham/sua_oppo.php');
                    }
                    if($page=='xoa_oppo'){
                        include ('sanpham/xoa_oppo.php');
                    }
                     if($page=='sua_sony'){
                        include ('sanpham/sua_sony.php');
                    }
                    if($page=='xoa_sony'){
                        include ('sanpham/xoa_sony.php');
                    }
                     if($page=='sua_apple'){
                        include ('sanpham/sua_apple.php');
                    }
                    if($page=='xoa_apple'){
                        include ('sanpham/xoa_apple.php');
                    }
                     if($page=='sua_microsolf'){
                        include ('sanpham/sua_microsolf.php');
                    }
                    if($page=='xoa_microsolf'){
                        include ('sanpham/xoa_microsolf.php');
                    }
                    if($page=='them_apple'){
                        include ('sanpham/them_apple.php');
                    }
                    if($page=='them_samsung'){
                        include ('sanpham/them_samsung.php');
                    }
                    if($page=='them_lg'){
                        include ('sanpham/them_lg.php');
                    }
                    if($page=='them_sony'){
                        include ('sanpham/them_sony.php');
                    }
                    if($page=='them_oppo'){
                        include ('sanpham/them_oppo.php');
                    }
                    if($page=='them_microsolf'){
                        include ('sanpham/them_microsolf.php');
                    }
                    if($page=='sp_maytinh'){
                        include ('sp_maytinh.php');
                    }
                    if($page=='them_maytinh'){
                        include ('them_maytinh.php');
                    }
                    if($page=='sua_maytinh'){
                        include ('sua_maytinh.php');
                    }if($page=='xoa_maytinh'){
                        include ('xoa_maytinh.php');
                    }
                    if($page=='thietlap_admin'){
                        include ('set_admin.php');
                    }
                    if($page=='them_admin'){
                        include ('them_admin.php');
                    }
                    if($page=='xoa_admin'){
                        include ('xoa_admin.php');
                    }
                     if($page=='quanlidonhang'){
                        include ('quanlidonhang.php');
                    }
                     if($page=='phanhoi'){
                        include ('phanhoi.php');
                    }
                     if($page=='xoa_donhang'){
                        include ('xoa_donhang.php');
                    }
                     if($page=='xoa_phanhoi'){
                        include ('xoa_phanhoi.php');
                    }
            ?>
            <!-- End Main Content -->
        </td>
    </tr>
    <!-- End Body -->
    
    <!-- Footer -->
    <!-- End Footer -->
</table>
<div height="62px">
        <p id="footer" colspan="2" align="center" >LQSHOP-Niềm Tin Cậy Của Người Dùng</p>
    </div>

<?php
}
else{
   header('location:index.php');
}
?>

</body>
</html>

