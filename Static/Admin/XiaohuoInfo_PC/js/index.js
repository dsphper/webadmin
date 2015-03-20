'use strict';
window.onload = function() {
	var click = {};
	$('#BigBox nav ul li[folding]').click(function(event) {
		if($(this).parents('ul').height() > 50) {
			$(this).parents('ul').stop().animate({height:'50px'}, 500);
		} else {
			$(this).parents('ul').stop().animate({height:(($(this).siblings('li').length + 1) * 51) - 1 + 'px'}, 500);
		}
	});
	// 右侧菜单栏高度自动设置
	var nav = document.getElementsByTagName('nav')[0];
	var Wheight = window.screen.availHeight;
	// nav.style.height = Wheight - 61 + 'px';
	// 自动设置rihgtBox的高度
	var rihgtBox = document.getElementById('rihgtBox');
	rihgtBox.style.height = Wheight - 61 + 'px';
	document.body.style = 'overflow:hidden';
	// 自动设置tableList的高度
	var tableList = document.getElementById('tableList');
	// tableList.style.height = rihgtBox.offsetHeight - 220+ 'px';

	// 选择日期
	$('.time').datetimepicker({
		lang:'ch',
		timepicker:false,
		format:'Y/m/d',
		formatDate:'Y/m/d',
	});
	$('.time').siblings('span').click(function(event) {
		/* Act on the event */
		$(this).siblings('.time').datetimepicker('show')
	});
	var isClcik = false;
	$('#selectMenu').click(function(event) {
		/* Act on the event */
		if(isClcik) {
			isClcik = false;
			$(this).siblings('ul').hide();
			return;
		}
		$(this).siblings('ul').show().find('li').click(function(event) {
			/* Act on the event */
			var content = $(this).parents('ul').siblings('#selectMenu').find('content');
			content.text($(this).text());
			content.siblings('input[type=hidden]').val($(this).text());
			$(this).parents('ul').hide();
		});;
		isClcik = true;
	});
	var isAllSelect = false;
	// 全选
	$('#allSelect').change(function(event) {
		/* Act on the event */
		if(isAllSelect) {
			$('input[name="checkbox[]"]').attr('checked', false);
			isAllSelect = false;
			return ;
		}
			$('input[name="checkbox[]"]').attr('checked', true);
			isAllSelect = true;
	});
	// 下一页
	$('page span[mark]').click(function(event) {
		_ajax(this);
	});
	// 跳转页面
	$('#goPage').click(function(event) {
		_ajax(this, true);
	});
	$('div[search]').click(function(event) {
		_ajax(event, 0)
	});
	// 首次打开页面去获得数据
	_ajax()

}
function getLocalTime(nS) {
return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
}
// 获得数据
function _ajax(event, e) {
	/* Act on the event */
	if(!e) {
		var page = $(event).attr('i');
	} else {
		var page = $('#pageNum').val();
	}
	var data = $('form[name=search]').serialize();
	data += '&page=' + page;
	$('#tableList').hide();
	$('#paging').hide();
	$('#loading').show();
	$.ajax({
		url: APP_URL,
		type: 'GET',
		dataType: 'json',
		data: data,
		success:function(data) {
			// alert(data.length);
			$('#tableList tr').not($('#tableList tr').eq(0)).remove()
			var tr = '';
			var MaxGroup = 0;
			var groupName = '';
			for (var c = 0; c < data.length; c++) {
				var len = data[c]['frameInfo']['pinpai'].length;
				if(len > MaxGroup) {
					MaxGroup = len;
				}
			};
			for (var cc = 1; cc <= MaxGroup; cc++) {
				groupName += '<td>品牌' + cc + '</td>\
                        <td>型号' + cc + '</td>\
                        <td>色号' + cc + '</td>';
			};
			// alert(groupName)
			$('td[lastGroup]').after(groupName);

			for (var i = 0; i < data.length; i++) {
				var iData = data[i];
				var iLen = iData['frameInfo']['pinpai'].length;
				var groupData = '';
				try {
					// alert(iLen);
					for (var n = 0; n < iLen; n++) {
						// groupName += '<td>品牌' + n+1 + '</td>\
      //                   <td>型号' + n+1 + '</td>\
      //                   <td>色号' + n+1 + '</td>';
						var pinpai = iData['frameInfo']['pinpai'][n];
						var xinghao = iData['frameInfo']['xinghao'][n];
						var sehao = iData['frameInfo']['sehao'][n];
						var colNum = MaxGroup - iLen;
						// alert(colNum + ' ' + iData['orderid'])
						groupData += '<td>' + pinpai + '</td>';
						groupData += '<td>' + xinghao + '</td>';
						groupData += '<td>' + sehao + '</td>';

						// if(n+1 == iLen) {
						// 	groupData += '<td colspan="' + (colNum * 3) + 1 + '">' + sehao + '</td>';
						// } else {
						// 	groupData += '<td>' + sehao + '</td>';
						// }
						if(n+1 == iLen) {
							for (var a = 0; a < (colNum * 3); a++) {
								groupData += '<td>NULL</td>';
							};
						}
					};
				} catch(e) {}
			var paymentMode = '';
			switch (iData['paymentMode']) {
				case '1':
					paymentMode = '现金';
					break;
				case '2':
					paymentMode = '在线支付';
					break;
				default:
					paymentMode = '不付款';
					break;
			}
			tr += '<tr>\
			<td><input type="checkbox" name="checkbox[]" value="true"></td>\
			<td>'+(!iData["orderid"] ? '暂无信息' : iData["orderid"])+'</td>\
			<td>2014-01-01</td>\
			' + groupData +'\
			<td>' + iLen + '</td>\
			<td>' + iData['yajin'] + '</td>\
			<td>All</td>\
			<td> ' + iData['boxInfo']['chengben'] + ' </td>\
			<td> ' + iData['boxInfo']['type'] + ' </td>\
			<td> ' + iLen + ' </td>\
			<td> ' + iData['lens'] + ' </td>\
			<td> ' + iData['allPrice'] + ' </td>\
			<td> What things? </td>\
			<td> ' + paymentMode + ' </td>\
			</tr>';
			};
			alert(iData['boxInfo'])
			$('#paging').html(data['pageLeft'] + '<page>' + data['pageRight'] + '</page>');
			// alert(tr)
			$('#tableList table').append(tr);
			$('#tableList').show();
			$('#paging').show();

			$('#loading').hide();
			$('page span[mark]').click(function(event) {
				_ajax(this);
			});
			$('#goPage').click(function(event) {
				_ajax(this, true);
			});

		}
	})
	
	return;
}