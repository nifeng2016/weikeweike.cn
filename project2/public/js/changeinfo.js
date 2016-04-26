$(function(){
window.z = 0;
var bo4=0;

//电子邮箱验证


$('input').name('email').bind('focus',function(){

	$('.email_put').css('display','block');
	$('.email_error').css('display','none');
	$('.email_ok').css('display','none');

}).bind('blur',function(){
	window.ulIfClick = false;
	if( $(this).val() == '' ){
		$('.email_put').css('display','none');
		$('.email_error').css('display','none');
		$('.email_ok').css('display','none');
		$('.auto_complete').css('display','none');
		bo4=0;
	}else{
		if( /^\w+@[a-zA-Z0-9]+(\.[a-z]{2,3}){1,2}$/.test($(this).val()) ){
			$('.email_put').css('display','none');
			$('.email_error').css('display','none');
			$('.email_ok').css('display','block');
			bo4=1;
		}else{
			
			$('.auto_complete li').bind('click',function(){
			
				$('input').name('email').val( $(this).text() );
				if( /^\w+@[a-zA-Z0-9]+(\.[a-z]{2,3}){1,2}$/.test($('input').name('email').val()) ){
					$('.email_put').css('display','none');
					$('.email_error').css('display','none');
					$('.email_ok').css('display','block');
				}
				$('.auto_complete').css('display','none');
				bo4=1;
				window.ulIfClick = true;
			});
			setTimeout(function(){
				if(  !window.ulIfClick ){
					$('.auto_complete').css('display','none');
					$('.email_put').css('display','none');
					$('.email_error').css('display','block');
					$('.email_ok').css('display','none');
				}else{

				}
			},200);

		}
	}
}).bind('keyup',function(e){

	if( window.nextLi == undefined ) window.nextLi = 0;
	if( !$(this).val().match(/@/) ){
		if( $(this).val() == '' )
			$('.auto_complete').css('display','none');
		else{
			$('.auto_complete').css('display','block');
			if( e.keyCode != 13 ){
				$('.auto_complete li').css('background','#eee');
			}
		}
			
		var str = $(this).val();
		$('.auto_complete span').text(str);		
	}else{
		$('.auto_complete').css('display','none');
	}
	
	if(e.keyCode == 40 && $('.auto_complete').css('display') == 'block'){
		$('.auto_complete li').eq(window.nextLi++%4).css('background','#ff8').siblings().css('background','#eee');
		
	}
	if(e.keyCode == 13){
		window.nextLi = undefined;
		for(var i = 0; i < $('.auto_complete li').length(); i++){
			if($('.auto_complete li').eq(i).css('backgroundColor') == 'rgb(255, 255, 136)'){
				$('input').name('email').val( $('.auto_complete li').eq(i).text() );
				$('.auto_complete').css('display','none');
				if( /^\w+@[a-zA-Z0-9]+(\.[a-z]{2,3}){1,2}$/.test($(this).val()) ){
					$('.email_put').css('display','none');
					$('.email_error').css('display','none');
					$('.email_ok').css('display','block');
				}
			}
		}
	}

});



$('form').eq(0).bind('submit',function(e){
	if(bo4==0)
	e.preventDefault();
});




});
