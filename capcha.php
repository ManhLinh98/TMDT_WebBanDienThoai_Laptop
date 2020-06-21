<?php 	
	session_start();
	$background=imagecreatefrompng('img/capcha.png');
	$white=imagecolorallocate($background,102, 102, 153);
	$font='font/marydale.ttf';
	$string=md5(microtime());
	$text=substr($string,0,4);
	$_SESSION['code']=$text;

	imagettftext($background, 22, 3, 28, 30,$white,$font,$text);
	header('content-type:image/png');
	imagepng($background);


 ?>