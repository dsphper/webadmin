window.onload = function() {
	$('.line button').click(function() {
		var this_ = $(this);
		$(this).html('正在登录......');
		var data = $('form').serialize();
		$.ajax({
			url: URL,
			type: 'POST',
			dataType: 'text',
			data: data,
			success:function(data){
				if(data != 'ok'){
					this_.html('登录');
					$('.error').show();
					$('.error').css('visibility', 'visible');
					$('.error').html(data + '<span class="sanjiao"></span>');
				}else{
					location.href = OK_URL;
				}
			}
		})
		return false;
	})
}