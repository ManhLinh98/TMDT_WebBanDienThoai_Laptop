$(function(){
	$('.img-product').hover(function(){
          $(this).find('.hover-sp').slideDown(200);
      },
      function(){
			$(this).find('.hover-sp').slideUp(300);
       });
})