       <?php 
    if($_SESSION['user'] && $_SESSION['pass']){
            

 ?>


           <link rel="stylesheet" type="text/css" href="css/gioithieu.css">
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px">
                	<td colspan="6" style='background: #4471c2;'>giới thiệu</td>
                </tr>
				<tr>
                	<td align="justify" id="info">Chào mừng bạn đến với hệ thống quản trị website LQSHOP..Đây Là trang quản lí các sản phẩm và thông tin cá nhân của người dùng</td>
                </tr>
            </table>



                                <?php
}
else{
    header('location:index.php');
}
?>