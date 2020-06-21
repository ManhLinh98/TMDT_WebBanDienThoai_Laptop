//valuedate form dnhap

function checkdangnhap(){
	var user = document.getElementById('user').value;
	var resultuser = document.getElementById('resultuser').value;
	var pass=document.getElementById('pass').value;
	var resultpass = document.getElementById('resultpass').value;
		if(user.length<3){
		document.getElementById('resultuser').innerHTML="Yêu Cầu Bạn Nhập Tài Khoản Hợp Lệ";
		$('#user').attr("style","border:1px solid red");
		return false;
	}else{
		document.getElementById('resultuser').innerHTML="";
		$('#user').removeAttr("style");	
}
		if(pass.length<6){
		document.getElementById('resultpass').innerHTML="Yêu Cầu Bạn Nhập Mật Khẩu Hợp Lệ";
		$('#pass').attr("style","border:1px solid red");
		return false;
	}else{
		document.getElementById('resultpass').innerHTML="";
		$('#pass').removeAttr("style");	
}
}
