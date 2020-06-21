<?php 
    session_start();
    ob_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Nhập</title>
<link rel="stylesheet" type="text/css" href="css/loginad.css">

</head>
<body>
<?php       
            include ('MYSQL/connectmysql.php');
            
            if(isset($_POST['submit_name'])){
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $sql_select_admin="select * from admin where Name='$user' and Pass='$pass'";
                $query_ad=mysqli_query($connection,$sql_select_admin);
                $row_ad=mysqli_num_rows($query_ad);
                if($row_ad>0){
                    $_SESSION['user']=$user;
                    $_SESSION['pass']=$pass;
                    header('location:adminstrator.php');
                }
                else{
                    echo '<script>alert ("Tên tài khoản hoặc mặt khẩu không chính xác")</script>';
                }
            }


 ?>


 <?php 
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  

                if((!$_SESSION['user'] && !$_SESSION['pass'])){

  ?>
  <div class='perr'>
  <div class='logo'>
      <!-- <div class='left'>
          <img src='images/logo.png'>
      </div> -->
      <div class='right'>
          LOGIN ADMIN
      </div>
  </div>
<form method="post">
<table id="login-main" border="0px" cellpadding="0px" cellspacing="0px">
    <tr height="50px">
    	<td id="login-key" rowspan="3" width="150px" align="center" valign="middle"><img src="images/khoa.jpg" width='180px' /></td>
        <td class="login-input">UserName:<br /><input type="text" name="user" class='user'/></td>
    </tr>
    <tr height="50px">
        <td class="login-input">Password:<br /><input type="password" name="pass" class='pass' /></td>
    </tr>
    <tr height="50px">
        <td id="login-button"><input type="submit" name="submit_name" value="Đăng Nhập"  class='nut'/> <input type="reset" name="reset_name" value="Làm Mới" class='lm' /></td>
    </tr>
</table>
</form>
</div>
<?php
    }
    else{
        header('location:adminstrator.php');
    }

?>
</body>
</html>
