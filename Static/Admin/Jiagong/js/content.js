/* 
* @Author: Mac
* @Date:   2015-01-15 10:09:59
* @Last Modified by:   Mac
* @Last Modified time: 2015-02-13 18:41:10
*/
/*sort__([1232,3,14,123,4123,213]);
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
}*/

$(document).ready(function() {
	$('tr td div[name=look]').click(function(event) {
	    th = $(this);
		/* Act on the event */
        // 隐藏悬浮条
        $('div.top').eq(1).hide();
		$('#all').animate({'bottom':'0%'}, 500);
		$('.line').hide();
		$('.line[name='+$(this).parents('td').attr('name')+']').show();
	});
	$('.keeback').click(function(event) {
		/* Act on the event */
        // 显示悬浮条
        $('div.top').eq(1).show();
		$('#all').animate({'bottom':'-100%'}, 500,function(){
			$(this).css('bottom', '100%');
		});
	});


	$('tr').click(function(event) {
        /* Act on the event */
        $(this).find('td').eq(1).find('span').hide();
        $(this).find('td').eq(1).find('input').show();

    });
    $('.left.save').click(function(event) {
    	/* Act on the event */
    	var isEmpty = false;
            $('input[check]').each(function(index,el){
                // alert($('input[check]').length);
                if(!$(el).val()){
                    isEmpty = true;
                }
            })
        if(!isEmpty){
            $('#loading').css('display', 'block');
	    	$.ajax({
	    		url: AJAX_URL,
	    		type: 'POST',
	    		dataType: 'html',
	    		data: $('form[name=form]').serialize(),
	    		success:function(data){
                    $('#loading').hide();
                    $('div[successTow]').show();
				    $('div[successTow] button').click(function(){
				        $(this).show();
				        location.reload();
				    })
	    		}
	    	})
    	} else {
                alert('信息填写不完整')
        }
    	
    });

    //        存入未更改过的值
    function push_arr(){
        var arr = new Array;
        $('input').each(function(index,el){
            arr.push($(el).val());
        })
        return arr;
    }
    window.last_arr = push_arr();

    window.check = function () {
        var ok = false;
        $('input').each(function(index,el){
            if($(el).val() != last_arr[index]){
                ok = true;
            }
        })
        return ok;
    }
    $('div.save.b').click(function(event) {
        /* Act on the event */
        $.ajax({
            url: AJAX_URL + '?change=1',
            type: 'POST',
            dataType: 'html',
            data: $('form[name=jkform]').serialize(),
            success:function(){
                $('div[successThree]').show();
                $('div[successThree] button').click(function(){
                    $(this).show();
                    location.reload();
                })
            }
        })
        
    });
    var i = 1;
    $('#all table.yanguang tr[add]').click(function(event) {
        /* Act on the event */
        i++;
        var html = '<tr jingkuang ontouchstart="touch(this)" ontouchend="touchOut()">\
                <td style="line-height:28px">镜框'+i+'</td>\
                <td>品牌</td>\
                <td><input type="text" name="jingkuang[pinpai][]" value="" placeholder=""></td>\
                <td>型号</td>\
                <td><input type="text" name="jingkuang[xinghao][]" value="" placeholder=""></td>\
                <td>色号</td>\
                <td colspan="2"><input type="text" name="jingkuang[sehao][]" value="" placeholder=""></td>\
            </tr>';
            $('#all table.yanguang tr').eq($('#all table.yanguang tr').length - 2).after(html);


        // alert($('#all table.yanguang tr').length);
            // $('#all table.yanguang').append('sadasdas');
    });

    // 悬浮控制条
    $('div.top').append($('div.top').clone(true));
    $('div.top').eq(1).hide();
    // $(window).scroll(function() {
        // if($(window).scrollTop() > 0 && $(window).scrollTop()) {
            $('div.top').eq(1).css({'position':'fixed','top':'0px','z-index':'10000'});
            $('div.top').eq(1).show();
        // }
    // })
});
function touch(th){
    window.timer = setTimeout(function(){
        if(confirm('是否删除此条镜框信息？')) {
            $(th).remove();
        }
    },500)
}
function touchOut(th){
    clearTimeout(window.timer);
}
function back(url) {
    if(check()) {
        $('#note').show();
        $('#note').find('button').click(function(){
            if (!$(this).index('button')) {
                location.href = url;

            } else {
                $('#note').hide();
            }
        })
    } else {
        location.href = url;
    }

}