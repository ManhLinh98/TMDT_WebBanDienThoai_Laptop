function check_dat_hang(){
	var hoten=document.getElementById('hoten').value;
	var resulthoten=document.getElementById('resulthoten').value;
	var sdt=document.getElementById('sdt').value;
	var resultsdt=document.getElementById('resultsdt').value
	var email=document.getElementById('email').value;
	var resultemail=document.getElementById('resultemail').value;
	var diachi=document.getElementById('diachi').value;
	var resultdiachi=document.getElementById('resultdiachi').value;

	if(hoten.length<2){
		document.getElementById('resulthoten').innerHTML="Mời Bạn Nhập Họ Tên Hợp Lệ";
		$('#hoten').attr("style","border:1px solid red");
		return false;
	}else{
		document.getElementById('resulthoten').innerHTML="";
		$('#hoten').removeAttr("style");	
}

if(sdt.length<10){
		document.getElementById('resultsdt').innerHTML="Số Điện Thoại Không Hợp Lệ";
		$('#sdt').attr("style","border:1px solid red");
		return false;
	}else{
		document.getElementById('resultsdt').innerHTML="";
		$('#sdt').removeAttr("style");	
}

if(email.length<6){
		document.getElementById('resultemail').innerHTML="Email Không Hợp Lệ";
		$('#email').attr("style","border:1px solid red");
		return false;
	}else{
		document.getElementById('resultemail').innerHTML="";
		$('#email').removeAttr("style");	
}

if(diachi.length==""){
		document.getElementById('resultdiachi').innerHTML="Mời Bạn Nhập Địa Chỉ";
		$('#diachi').attr("style","border:1px solid red");
		return false;
	}else{
		document.getElementById('resultdiachi').innerHTML="";
		$('#diachi').removeAttr("style");	
}

}