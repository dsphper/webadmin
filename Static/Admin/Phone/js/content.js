/* 
* @Author: Mac
* @Date:   2015-01-23 12:01:52
* @Last Modified by:   Mac
* @Last Modified time: 2015-01-29 14:37:49
*/

'use strict';

jQuery(document).ready(function($) {
    var th = '';
    	$('tr').click(function(event) {
    		/* Act on the event */
    		$(this).find('td').eq(1).find('span').hide();
    		$(this).find('td').eq(1).find('input').show();
    		
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


    	$('.save').click(function(event) {
            var isEmpty = false;
            $('input[check]').each(function(index,el){
                if(!$(el).val()){
                    isEmpty = true;
                }
            })
            if(isEmpty && ($('input[name=is_ok]').val() == '有效')){
                alert('信息填写不完整');
                return false;
            }
                /* Act on the event */
                $('#loading').show();
                $('input[type=text]').each(function(index, el) {
                    $(el).parents('td').find('input').hide();
                    $(el).parents('td').find('span').show();
                    $(el).parents('td').find('span').html($(el).parents('td').find('input').val());
                });
                if(check()){
                    $('input[name=isCheck]').val(1);

                }
                alert(1)
                $.ajax({
                    url: APP_URL,
                    type: 'POST',
                    dataType: 'html',
                    data: $('form').serialize(),
                    success:function(date){
                        $('#loading').hide();
                        if(($('input[name=is_ok]').val() == '有效')){
                            $('div[successTow]').show();
                        } else {
                            $('div[successThree]').show();
                        }
                        $('div[successTow] button').click(function(){
                            $(this).show();
                            location.reload();
                        })
                        $('div[successThree] button').click(function(){
                            $(this).show();
                            location.reload();
                        })
                    }
                })
            

    	});
    	$('tr td s').click(function(event) {
            th = $(this);
    		/* Act on the event */
    		$('#all').animate({'bottom':'0%'}, 500);
            // 隐藏悬浮条
            $('div.top').eq(1).hide();
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
        
        // $('table[name=time]').after('')
        var date = new Date();
        var time = date.getMonth() + 1;
        var getDate = date.getDate();
        for (var i = 0; i <= 20; i++) {
            ++getDate;
            if(getDate > (new Date(2015,time,0).getDate())){
                time++;
                getDate = 0;
            }else{
                var str = '<tr>\
                            <td id="1">\
                                <span>2015-'+time+'-'+getDate+'</span>\
                                <s></s>\
                            </td>\
                        </tr>';
                $('table[name=time]').append(str);
            }
        };

        $('#all table tr td').click(function(event) {
            /* Act on the event */
            th.siblings('text').html($(this).find('span').html());
            th.siblings('input').val($(this).find('span').html());
            $(this).attr('click','').parents('tr').siblings('tr').find('td').removeAttr('click');
            $('#all').animate({'bottom':'-100%'}, 500,function(){
                $(this).css('bottom', '100%');
            });
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