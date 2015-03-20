/* 
* @Author: Mac
* @Date:   2015-01-15 10:09:59
* @Last Modified by:   Mac
* @Last Modified time: 2015-01-15 16:08:05
*/
sort__([1232,3,14,123,4123,213]);
function sort_(arr,d){
	var re=new Array;
	for (var i = 0; i <= arr.length; i++) {
		for (var j = i; j <= arr.length; j++) {
			if(arr[i] > arr[j]){
				var temp = arr[i];
				arr[i] = arr[j];
				arr[j] = temp;
			}
		};
	};
	alert(arr)
}
function sort__(arr,d){
	var shift = arr[0];
	arra = new Array;
	for (var i = 1; i <= arr.length; i++) {
		if(arr[i] < shift){
			arra.push(arr[i]);
			shift=arr[i];
		}
	};
	alert(arra)
}
$(document).ready(function() {
		$('.dropdown-menu li').click(function(event) {
			/* Act on the event */
			$('#dropdownMenu1').html($(this).find('a').html());
			$('input[name=optometrist]').val($(this).find('a').html());
		});
		$('#submit').click(function(event) {
			/* Act on the event */
			$.ajax({
				url: APP_URL+'index.php/admin/change',
				type: 'POST',
				dataType: 'json',
				data: $('form').serialize(),
				success:function(data){
					if(data){alert('修改成功！');location.reload()}
				}
			})
			
		});
		$('button[name=modify]').click(function(event) {
			// alert($(this).attr('orderid'))
			$('input[name=orderid]').val($(this).attr('orderid'));
		});
		$('textarea').change(function(event) {
			if(confirm('确认修改？')){
				$.ajax({
				url: APP_URL+'index.php/admin/change',
				type: 'POST',
				dataType: 'json',
				data: {note:$(this).val(),orderid:$('button[name=modify]').eq($(this).index('textarea')).attr('orderid')},
				success:function(data){
					if(data == 'true'){alert('ok')}
				}
			})
			}else{
				if(confirm('是否还原到未编辑状态？')){
					$(this).val($(this).text());
				}
			}
		});
	});