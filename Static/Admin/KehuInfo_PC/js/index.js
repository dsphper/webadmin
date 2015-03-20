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
			$('#tableList tr').not($('#tableList tr').eq(0)).remove()
			var tr = '';
			for (var i = 0; i < data["joinData"].length; i++) {
			var chufnagdan = '(';
                chufnagdan += data['joinData'][i]['qrb'] + ',';
                chufnagdan += data['joinData'][i]['qlb'] + ',';
                chufnagdan += data['joinData'][i]['zrb'] + ',';
                chufnagdan += data['joinData'][i]['zlb'] + ',';
                chufnagdan += data['joinData'][i]['zrz'] + ',';
                chufnagdan += data['joinData'][i]['zlz'] + ')';
			tr += '<tr>\
			<td><input type="checkbox" name="checkbox[]" value="true"></td>\
			<td>'+(!data["joinData"][i]["orderid"] ? '暂无信息' : data["joinData"][i]["orderid"])+'</td>\
			<td>'+(!data["joinData"][i]["name"] ? '暂无信息' : data["joinData"][i]["name"])+'</td>\
			<td>'+(!data["joinData"][i]["xuexiao"] ? '暂无信息' : data["joinData"][i]["xuexiao"])+'</td>\
			<td>'+(!data["joinData"][i]["sex"] ? '暂无信息' : data["joinData"][i]["sex"])+'</td>\
			<td>'+(!data["joinData"][i]["weixin"] ? '暂无信息' : data["joinData"][i]["weixin"])+'</td>\
			<td>'+(!data["joinData"][i]["phone"] ? '暂无信息' : data["joinData"][i]["phone"])+'</td>\
			<td>'+(data["joinData"][i]["is_pc"] == 0 ? '微信' : 'PC') +'</td>\
			<td>'+(!data["joinData"][i]["referees"] ? '暂无信息' : data["joinData"][i]["referees"])+'</td>\
			<td>'+(!data["joinData"][i]["time"] ? '暂无信息' : getLocalTime(data["joinData"][i]["time"]))+'</td>\
			<td><a href="" title="">查看他的处方单</a></td>\
			<td>'+chufnagdan+'</td>\
			<td>'+(!data["joinData"][i]["tongju"] ? '暂无信息' : data["joinData"][i]["tongju"])+'</td>\
			<td>'+(!data["joinData"][i]["cNote"] ? '暂无信息' : data["joinData"][i]["cNote"])+'</td>\
			<td>'+(!data["joinData"][i]["delivery_address"] ? '暂无信息' : data["joinData"][i]["delivery_address"])+'</td>\
			</tr>';
			};
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