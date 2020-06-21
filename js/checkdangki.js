function checkdangki(){
	var username = document.getElementById('username').value;
	var resultten = document.getElementById('resultten').value;
	var password=document.getElementById('password').value;
	var resultmk=document.getElementById('resultmk').value;
	var nhaplaipass=document.getElementById('nhaplaipass').value;
	var resultnlpass=document.getElementById('resultnlpass').value;
	var sdt=document.getElementById('sdt').value;
	var resultsdt=document.getElementById('resultsdt').value;
	var capcha=document.getElementById('capcha').value;
	var resultcapcha=document.getElementById('resultcapcha').value;
	var box=document.getElementById('box').value;
	var resultbox=document.getElementById('resultbox').value;

	var email=document.getElementById('email');
	var resultemail=document.getElementById('resultemail');
	var chuanmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if(username.length<3){
		document.getElementById('resultten').innerHTML="Tên Tài Khoản Phải Có 6 Kí Tự";
		$('#username').attr("style","border:1px solid red");
		return false;
	}else{
		document.getElementById('resultten').innerHTML="";
		$('#username').removeAttr("style");	
}
	if(password.length<6){
		document.getElementById('resultmk').innerHTML='Mật Khẩu Phải Có 6 Kí Tự';
		$('#password').attr('style','border:1px solid red');
		return false;
	}
	else{
		document.getElementById('resultmk').innerHTML='';
		$('#password').removeAttr("style");	
	}
	if(password != nhaplaipass){
		document.getElementById('resultnlpass').innerHTML="Bạn Cần Nhập Khớp Mật Khẩu Trên";
		$('#nhaplaipass').attr("style","border:1px solid red");
		return false;
	}
	else{
		document.getElementById('resultnlpass').innerHTML="";
		$('#nhaplaipass').removeAttr("style");	
	}
	if (!chuanmail.test(email.value)) {
		document.getElementById('resultemail').innerHTML="Bạn Cần Nhập Đúng Dạng Của Email";
		$('#email').attr("style","border:1px solid red");
		return false;
		} 
		else{
		document.getElementById('resultemail').innerHTML="";
		$('#email').removeAttr("style");	
	}
	if(sdt.length<10){
		document.getElementById('resultsdt').innerHTML='Số Điện Thoại Phải Có 10 hoặc 11 Số';
		$('#sdt').attr('style','border:1px solid red');
		return false;
	}
	else{
		document.getElementById('resultsdt').innerHTML='';
		$('#sdt').removeAttr("style");	
	}
	if(capcha.length==''){
		document.getElementById('resultcapcha').innerHTML='Bạn Chưa Nhập Mã Kiểm Tra';
		$('#capcha').attr('style','border:1px solid red');
		return false;
	}
	else{
		document.getElementById('resultcapcha').innerHTML='';
		$('#capcha').removeAttr("style");	
	}

	if(!box.checked){
		document.getElementById('resultbox').innerHTML="Vui lòng đọc và chấp nhận Điều Khoản Và Quy Định LQSHOP";
		
	}
	else document.getElementById('resultbox').innerHTML="";
}

