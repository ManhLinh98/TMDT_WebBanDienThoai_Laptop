var currentImage;
    var currentIndex = -1;
    var interval;
    function showImage(index){
        if(index < $('#bigPic img').length){
        	var indexImage = $('#bigPic img')[index]
            if(currentImage){   
            	if(currentImage != indexImage ){
                    $(currentImage).css('z-index',2);
                    clearTimeout(myTimer);
                    $(currentImage).fadeOut(250, function() {
					    myTimer = setTimeout("showNext()", 10000000000000);
					    $(this).css({'display':'none','z-index':1})
					});
                }
            }
            $(indexImage).css({'display':'block', 'opacity':1});
            currentImage = indexImage;
            currentIndex = index;
            $('#thumbs li').removeClass('active');
            $($('#thumbs li')[index]).addClass('active');
        }
    }
    
    function showNext(){
        var len = $('#bigPic img').length;
        var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
        showImage(next);
    }
    
    var myTimer;
    
    $(document).ready(function() {
	    myTimer = setTimeout("showNext()", 100000000000000);
		showNext(); //loads first image
        $('#thumbs li').bind('click',function(e){
        	var count = $(this).attr('rel');
        	showImage(parseInt(count)-1);
        });
	});



$(document).ready(function(){
    $("#mvang").css('border','2px solid red');
        $("#mvang").click(function(){
            $("#mvang").css('border','2px solid red');
            $("#mden").css('border','none');
            $("#mhong").css('border','none');
        });



        $("#mden").click(function(){
            $("#mden").css('border','2px solid red');
            $("#mvang").css('border','none');
            $("#mhong").css('border','none');
        });


        $("#mhong").click(function(){
            $("#mhong").css('border','2px solid red');
            $("#mden").css('border','none');
            $("#mvang").css('border','none');
        });
    });