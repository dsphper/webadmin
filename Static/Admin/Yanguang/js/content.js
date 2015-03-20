/* 
* @Author: Mac
* @Date:   2015-01-23 12:01:52
* @Last Modified by:   Mac
* @Last Modified time: 2015-02-13 11:01:33
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
    function push_arr(str){
        var arr = new Array;
        $(str).each(function(index,el){
            arr.push($(el).val());
        })
        return arr;
    }

    window.check = function (str) {
    window.last_arr = push_arr(str);
        var ok = false;
        $(str).each(function(index,el){
            if($(el).val() != last_arr[index]){
                ok = true;
            }
        })
        return ok;
    }
    $('.save.a').click(function(event) {
        if($('input[name=is_ok]').val() == '有效') {
            var isEmpty = false;
            $('input[check]').each(function(index,el){
                if(!$(el).val()){
                    isEmpty = true;
                }
            })
            if($('input[name=fukuanqingkuang]').val() == '已付款'){
                if(!$('tr[jiage]').find('input').val()){
                    alert('价格不能为0');
                    isEmpty = true;

                }

            }            
        } else {
            isEmpty = false;
        }

        if(!isEmpty){
            if($('input[name=yanguangdanOk]').val() == 'false' && $('input[name=is_ok]').val() == '有效') {
                alert('请填写验光单！');
                return false;
            }
            /* Act on the event */
            $('#A input[type=text]').each(function(index, el) {
                $(el).parents('td').find('input').hide();
                $(el).parents('td').find('span').show();
                $(el).parents('td').find('span').html($(el).parents('td').find('input').val());
            });
            $('#loading').show();
            $.ajax({
                url: AJAX_URL+'?tow=1',
                type: 'POST',
                dataType: 'html',
                data: $('#form').serialize(),
                success:function(date){
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
    // 验光单保存
    $('.save.b').click(function(event) {
        /* Act on the event */
        var isOk = true;
        $('#yanguangdan').each(function(index,el){
//            alert($('#yanguangdan')[0]);
        })
        $('#loading').show();
        $.ajax({
            url: AJAX_URL,
            type: 'POST',
            dataType: 'html',
            data: $('#yanguangdan').serialize(),
            success:function(date){
                $('input[name=yanguangdanOk]').val(date);
                if(date == 'true') {
                    $('d').text('已填写！');
                }
                $('#loading').hide();
                $('div[successThree]').show();
                $('div[successThree] button').click(function(){
                $('div[successThree]').hide();
                    $(this).show();
                    $('#all').stop().animate({'bottom':'-100%'}, 500,function(){
                        $(this).css('bottom', '100%');
                    });
                })
            }
        })
    });
    $('tr td s').click(function(event) {
        th = $(this);
        // 隐藏悬浮条
        $('div.top').eq(1).hide();
        /* Act on the event */
        // 显示选择窗口
        $('#all').animate({'bottom':'0%'}, 500);
        $('.line').hide();
        $('.line[name='+$(this).parents('td').attr('name')+']').show();
    });
    $('.keeback').click(function(event) {
        /* Act on the event */
        // 显示悬浮条
        $('div.top').eq(1).show();
        outAll()
    });
    $('#all table.select tr td').click(function(event) {
        /* Act on the event */
        th.siblings('text').html($(this).find('span').html());
        time = setInterval(function(){
            if($('input[name=fukuanqingkuang]').val() == '已付款'){
//                $('tr[methods]').show();
            } else {
//                $('tr[methods]').hide();

            }
            clearInterval(time);
        },10)
        $(this).attr('click','').parents('tr').siblings('tr').find('td').removeAttr('click');
        outAll()
        // alert()
    });
    var i = 1;
    $('#all table.yanguang tr[add]').click(function(event) {
        /* Act on the event */
        i++;
        var html = '<tr jingkuang>\
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
    var date = new Date();
    var time = date.getMonth() + 1;
    var getDate = date.getDate();
    for (var i = 0; i <= 20; i++) {
        ++getDate;
        if(getDate > (new Date(2015,time,0).getDate())){
            time++;
            getDate = 0;
        }else{
            var str = '<tr onclick="outAll()">\
                        <td id="1">\
                            <span>2015-'+time+'-'+getDate+'</span>\
                            <s></s>\
                        </td>\
                    </tr>';
            $('table[name=time]').append(str);
        }
    };
    // 选择主视眼
    $('tr td r').click(function(event) {
        /* Act on the event */
        $('input[name=zhushiyan]').val(($(this).index()) == 3 ? 2 : 1);
        $(this).attr('click', '').siblings('').removeAttr('click');
    });
    ///////////////////////////
    // 自定义select选择模块 //
    /////////////////////////
    $('#all table tr td').click(function(event) {
        /* Act on the event */
        th.siblings('text').html($(this).find('span').html());
        th.siblings('input').val($(this).find('span').html());
        $(this).attr('click','').parents('tr').siblings('tr').find('td').removeAttr('click');
    });
    $('select[change1]').change(function(){
        $('td[auto]').eq(0).text(parseFloat($('select[change1]').eq(0).val()) + parseFloat($('select[change1]').eq(1).val()))
    })
    $('select[change2]').change(function(){
        $('td[auto]').eq(1).text(parseFloat($('select[change2]').eq(0).val()) + parseFloat($('select[change2]').eq(1).val()))
    })
    $('select[change3]').change(function(){
        $('td[auto]').eq(2).text(parseFloat($('select[change3]').eq(0).val()) + parseFloat($('select[change3]').eq(1).val()))
    })
    $('select[change4]').change(function(){
        $('td[auto]').eq(3).text(parseFloat($('select[change4]').eq(0).val()) + parseFloat($('select[change4]').eq(1).val()))
    })
    function setAuto(){
        $('td[auto]').eq(0).text(parseFloat($('select[change1]').eq(0).val()) + parseFloat($('select[change1]').eq(1).val()))
        $('td[auto]').eq(1).text(parseFloat($('select[change2]').eq(0).val()) + parseFloat($('select[change2]').eq(1).val()))
        $('td[auto]').eq(2).text(parseFloat($('select[change3]').eq(0).val()) + parseFloat($('select[change3]').eq(1).val()))
        $('td[auto]').eq(3).text(parseFloat($('select[change4]').eq(0).val()) + parseFloat($('select[change4]').eq(1).val()))
    }
    setAuto();

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
    if(check('input')) {
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
// 关闭选择窗口
function outAll(){
    $('#all').stop().animate({'bottom':'-100%'}, 500,function(){
        $(this).css('bottom', '100%');
    });
}

