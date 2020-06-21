function check_lienhe(){
	var hoten=document.getElementById('hoten').value;
	var sdt=document.getElementById('sdt').value;
	var email=document.getElementById('email').value;
	var noidung=document.getElementById('noidung').value;
	var result=document.getElementById('result').value;

	if(hoten.length<2){
		document.getElementById('result').innerHTML="Mời Bạn Nhập Họ Tên Hợp Lệ";
		$('#hoten').attr("style","border:1px solid red");
		return false;
	}else{
		document.getElementById('result').innerHTML="";
		$('#hoten').removeAttr("style");	
}

if(sdt.length<10){
		document.getElementById('result').innerHTML="Số Điện Thoại Không Hợp Lệ";
		$('#sdt').attr("style","border:1px solid red");
		return false;
	}else{
		document.getElementById('result').innerHTML="";
		$('#sdt').removeAttr("style");	
}

if(email.length<6){
		document.getElementById('result').innerHTML="Email Không Hợp Lệ";
		$('#email').attr("style","border:1px solid red");
		return false;
	}else{
		document.getElementById('result').innerHTML="";
		$('#email').removeAttr("style");	
}

if(noidung.length==""){
		document.getElementById('result').innerHTML="Mời Bạn Nhập Nội Dung,Ý Kiến";
		$('#noidung').attr("style","border:1px solid red");
		return false;
	}else{
		document.getElementById('result').innerHTML="";
		$('#noidung').removeAttr("style");	
}

}