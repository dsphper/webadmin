/* 
* @Author: Mac
* @Date:   2015-01-26 18:24:38
* @Last Modified by:   Mac
* @Last Modified time: 2015-01-27 10:27:03
*/

'use strict';
$(function(event) {
	$('.block').click(function(event) {
		/* Act on the event */
		$(this).find('d').attr('click','').parents('.block').siblings('.block').find('d').removeAttr('click');
	});
	$('.submit input').click(function(event) {
		/* Act on the event */
		var this_ = $(this);
		$(this).val('正在登录......');
		var data = $('#form').serialize();
		$.ajax({
			url: URL,
			type: 'POST',
			dataType: 'text',
			data: data,
			success:function(data){
				if(data != 'ok'){
					this_.val('登录');
					$('#head').find('error').show();

					$('#head').find('error').html(data);
				}else{
					location.href = OK_URL;
				}
			}
		})
	});
});