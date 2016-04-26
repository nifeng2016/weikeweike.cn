$(function(){
window.z = 0;
var bo1=0,bo2=0,bo3=0;


$('input').name('user').bind('focus',function(){
	$('.user_put').css('display','block').css('z-index', ''+ window.z++);
	$('.user_error').css('display','none');
	$('.user_ok').css('display','none');
}).bind('blur',function(){

	if( $(this).val() == '' ) {$('.user_put').css('display','none');bo1=0;}
	else{
		var str = $(this).val();
		if( str.length < 6 ){
			$('.user_put').css('display','none');
			$('.user_error').css('display','block');
			$('.user_ok').css('display','none');
			bo1=0;
		}else{
			$('.user_ok').css('display','block');
			$('.user_put').css('display','none');
			$('.user_error').css('display','none');
			bo1=1;
		}
	}
}).bind('keyup',function(){
	if( $(this).val().replace(/\s/g , '').length >= 6 ){
		$('.user_ok').css('display','block');
		$('.user_put').css('display','none');
		$('.user_error').css('display','none');
	}else{
		$('.user_put').css('display','block');
		$('.user_error').css('display','none');
		$('.user_ok').css('display','none');
	}
});

//密码验证

$('input').name('pass').bind('focus',function(){
	$('.pass_put').css('display','block').css('z-index',''+ window.z++);
	$('.pass_error').css('display','none');
	$('.pass_ok').css('display','none');
}).bind('blur' , function(){
	if( $(this).val() == '' ){
		$('.pass_put').css('display','none');
		bo2=0;
	}else if( ! (new RegExp(/^[a-zA-Z0-9_]{6,18}$/)).test( $(this).val() ) ){
		$('.pass_put').css('display','none');
		$('.pass_error').css('display','block');
		$('.pass_ok').css('display','none');
		bo2=0;
	}else{		
		$('.pass_put').css('display','none');
		$('.pass_error').css('display','none');
		$('.safe').css('display','none');
		$('.pass_ok').css('display','block');
		bo2=1
	}
		
}).bind('keyup',function(){
	if( (new RegExp(/^[a-zA-Z0-9_]{6,18}$/)).test( $(this).val() )){
		$('.pass_put').css('display','none');
		$('.safe').css('display','block');
		switch( safeTest($(this).val()) ){
			case 1:
				$('.s1').css('background','red');
				$('.s2').css('background','#ccc');
				$('.s3').css('background','#ccc');
				$('.word').text('低').css('color','red');
				break;
			case 2:
				$('.s1').css('background','orange');
				$('.s2').css('background','orange');
				$('.s3').css('background','#ccc');
				$('.word').text('中').css('color','orange');
				break;
			case 3:
				$('.s').css('background', 'green');
				$('.word').text('高').css('color','green');
				break;
		}
	}else{
		$('.safe').css('display','none');
		$('.pass_put').css('display','block');
	}
});


function safeTest(str){
	var strlen = str.length;
	var codeCont = 0;
	if( /\d/.test(str) ) codeCont++;
	if( /[a-zA-Z]/g.test(str) ) codeCont++;
	if( /_/g.test(str) ) codeCont++;
	if( strlen < 10 && codeCont == 1) return 1;
	else if( strlen < 10 && codeCont == 2 ) return 2;
	else return 3;

}

//确认密码验证



$('input').name('confirm_pass').bind('focus',function(){
	$('.confirm_put').css('display','block');
	$('.confirm_error').css('display','none');
	$('.confirm_ok').css('display','none');
}).bind('blur',function(){
	$('.confirm_put').css('display','none');
	if( $(this).val() == '' ){
		$('.confirm_error').css('display','none');
		bo3=0;
	}
	else{
		if( $(this).val() != $('input').name('pass').val() ){
		$('.confirm_error').css('display','block');
		bo3=0;
		}else{
		$('.confirm_error').css('display','none');
		$('.confirm_ok').css('display','block');
		bo3=1;
		}
	}
	
});



$('form').eq(0).bind('submit',function(e){
	if(bo1==0||bo2==0||bo3==0)
	e.preventDefault();
});




});
