<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>验光任务</title>
	<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name=apple-themes-web-app-capable content=yes>
    <meta name=apple-themes-web-app-status-bar-style content=black>
    <meta name=format-detection content=telephone=no>
    <meta charset="utf-8">
    <link rel="stylesheet/less" type="text/css" media="screen and (max-width: 10000px)" href="<?= APP_STATIC?>/css/content_min.less" />
    <?= APP_JQUERY?>
    <?= APP_LESS?>
    <script type="text/javascript" charset="utf-8" async defer src="<?= APP_STATIC?>/js/content.js"></script>
    <script>
    var AJAX_URL = "<?= U('yanguang/ajax')?>";
    </script>
</head>
<body>
<header>
	<div id="main">
		<div class="top">
		<span class="left save a">保存</span>
            <div class="middle">
                <s onclick="location.href='<?= U('content',array('id'=>$nextId))?>'"></s>
                <span class="ID">ID</span>
                <a href="<?php U('content',array('id'=>$nextId))?>" title=""></a><s onclick="location.href='<?= U('content',array('id'=>$lastId))?>'"></s>
            </div>
            <span class="right"><a href="#" onclick="back('<?= U('yanguang/index') ?>')">返回</a></span>

        </div>
       
		<div class="block">
		<form action="" method="get" accept-charset="utf-8" id="form">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td><span>预约ID</span></td>
				<td color><?= $data['orderid']?><input type="hidden" name="oid" value="<?= $data['id']?>"></td>
			</tr>
			<tr>
				<td><span>姓名</span></td>
				<td color><?= $data['name']?></td>
			</tr>
			<tr>
				<td><span>微信</span></td>
				<td color><?= $data['weixin']?></td>
			</tr>
			<tr>
				<td><span>电话</span></td>
				<td color><a href="tel:<?= $data['phone']?>"><?= $data['phone']?></a></td>
			</tr>
			<tr>
				<td><span>学校</span></td>
				<td color><?= $data['xuexiao']?><input type="hidden" name="school" value="<?= $data['xuexiao']?>"></td>
			</tr>
			<tr>
				<td><span>性别</span></td>
				<td color><?= $data['sex']?><!-- <input type="hidden" name="sex" value="<?php //echo $data['sex']?>"/> --></td>
			</tr>
			<tr>
				<td><span>来源</span></td>
				<td color><?= ($data['is_pc']) ? 'PC' : '微信'?></td>
			</tr>
			<tr>
				<td><span>下单时间</span></td>
				<td color><?= date('Y/m/d H:i:s',$data['time'])?></td>
			</tr>
		</table>
		</div>
		<div class="block">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><span>是否有效</span></td>
					<td name="is_ok"><text><?= $data['stage'] >= 1 ? '有效' : '无效'?></text><input type="hidden" name="is_ok" value="<?= ($data['stage'] == 1) ? '有效' : '无效'?>"><s></s></td>
				</tr>
				<tr>
					<td><span>预约时间</span></td>
					<td color><?= $data['Time']?></td>
				</tr>
				<tr>
					<td><span>预约地点</span></td>
					<td color><?= $data['address']?></td>
				</tr>
				<tr>
					<td><span>预约方式</span></td>
					<td color><?= $data['methods']?></td>
				</tr>
				<tr>
					<td><span>回访人备注</span></td>
					<td color><?= $data['note']?></td>
				</tr>
			</table>
		</div>
		<div class="block">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><span>回访人</span></td>
					<td color><?= $userinfo['name']?></td>
				</tr>
				<tr>
					<td><span>回访人电话</span></td>
					<td color><?= $userinfo['phone']?></td>
				</tr>
				<tr>
					<td><span>回访人YY</span></td>
					<td color><?= $userinfo['yy']?></td>
				</tr>
			</table>
		</div>
		<div class="block">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><span>验光处方</span></td>
					<td name="yanguangdan"><d><?php $json = json_decode($glassInfo['frameInfo'],true)?>
			<?php if(!empty($json['pinpai'])):?>已填写！<?php else:?> 请填写验光单！<?php endif;?></d><s></s></td>
				</tr>
			</table>
		</div>
		<div class="block">
			<table cellpadding="0" cellspacing="0" id="A">
				<tr>
					<td><span>收货方式</span></td>
					<td name="shouhuo"><text>
					<?php switch ($goodsInfo['methods']) {
						case '0':
							$str = '快递';
							break;
						case '1':
							$str = '自取';
							break;
						case '2':
							$str = '上门';
							break;
						default:
							$str = '请选择';
							break;
					}
					echo $str;
					?>
					</text><input check type="hidden" name="shouhuo" value="<?= $goodsInfo['methods']?>"><s></s></td>
				</tr>
				<tr yajin>
					<td><span>押金</span></td>
					<td><span><?= $goodsInfo['yajin']?></span><input type="text" name="yajin" value="<?= $goodsInfo['yajin']?>"></td>
				</tr>
				<tr jiage>
					<td><span>销售价格</span></td>
					<td><span><?= $goodsInfo['shoujia']?></span><input type="text" name="jiage" value="<?= $goodsInfo['shoujia']?>"></td>
				</tr>
				<tr methods>
					<td><span>付款方式</span></td>
					<td name="fukuanfangshi"><text>
					<?php switch ($goodsInfo['paymentMode']) {
						case '1':
							$str = '现金';
							break;
						case '2':
							$str = '在线支付';
							break;
						default:
							$str = '不付款';
							break;
					}
					echo $str;
					?>
					</text><input type="hidden" check name="fukuanfangshi" value="<?php switch ($goodsInfo['paymentMode']) {
                            case '1':
                                $str = '现金';
                                break;
                            case '2':
                                $str = '在线支付';
                                break;
                            default:
                                $str = '不付款';
                                break;
                        }
                        echo $str;
                        ?>"><s></s></td>
				</tr>
				<tr>
					<td><span>收货地址</span></td>
					<td><span><?= $deAddress['delivery_address'] ? $deAddress['delivery_address'] : '请输入收货地址'?></span><input check type="text" name="address" value="<?= $deAddress['delivery_address']?>"></td>
				</tr>
				<tr>
					<td><span>送货时间</span></td>
					<td name="time"><text><?= $goodsInfo['songhuotime'] ? date('Y-m-d',$goodsInfo['songhuotime']) : '请选择送货时间'?></text><input check type="hidden" name="songhuotime" value="<?= date('Y-m-d',$goodsInfo['songhuotime'])?>"><s></s></td>
				</tr>
			</table>
		</div>
		<div class="block">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><span>验光人备注</span></td>
					<td><span><?= $goodsInfo['note'] ? $goodsInfo['note'] : '无'?></span><input type="text" name="note" value="<?= $goodsInfo['note'] ? $goodsInfo['note'] : '无' ? $goodsInfo['note'] : ''?>"></td>
				</tr>
				<tr>
					<td><span>验光人提成</span></td>
					<td color>3%</td>
				</tr>
			</table>
		</div>
		<div class="block">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><span>加工人姓名</span></td>
					<td color><?= $info['name'];?></td>
				</tr>
				<tr>
					<td><span>加工人电话</span></td>
					<td color><?= $info['phone'];?></td>
				</tr>
			</table>
		</div>
	</div>
		</form>

</header><!-- /header -->
<footer>
	<div id="all">
		<div class="line" name="shouhuo">
			<div class="header">
				<div class="keeback">
					<s></s>后退
				</div>
			</div>
			<table class="select">
				<tr>
					<td id="0">
						<span>快递</span>
						<s></s>
					</td>
				</tr>

				<tr>
					<td click id="1">
						<span>自取</span>
						<s></s>
					</td>
				</tr>
				<tr>
					<td id="2">
						<span>上门</span>
						<s></s>
					</td>
				</tr>
			</table>
		</div>




		<div class="line" name="is_ok">
			<div class="header">
				<div class="keeback">
					<s></s>后退
				</div>	
			</div>
			<table>
				<tr>
					<td <?= $data['stage'] >= 1 ? 'click' : ''?> id="1">
						<span>有效</span>
						<s></s>
					</td>
				</tr>

				<tr>
					<td <?= $data['stage'] <= 0 ? 'click' : ''?> id="2">
						<span>无效</span>
						<s></s>
					</td>
				</tr>
			</table>
		</div>





		<div class="line" name="fukuanfangshi">
			<div class="header">
				<div class="keeback">
					<s></s>后退
				</div>
			</div>
			<table class="select">
				<tr>
					<td <?= ($goodsInfo['paymentMode'] == 1) ? 'click' : '' ?> id="1">
						<span>现金</span>
						<s></s>
					</td>
				</tr>

				<tr>
                    <td <?= ($goodsInfo['paymentMode'] == 2) ? 'click' : '' ?> id="2">
                        <span>在线支付</span>
                        <s></s>
                    </td>
                </tr>

                <tr>
                    <td <?= ($goodsInfo['paymentMode'] == 3) ? 'click' : '' ?> id="3">
                        <span>不付款</span>
                        <s></s>
                    </td>
                </tr>
			</table>
		</div>
		<div class="line" name="time">
			<div class="header">
				<div class="keeback">
					<s></s>后退
				</div>
			</div>
			<table name="time">

			</table>
		</div>
		<div class="line" name="yanguangdan" style="z-index:1000">
			<div class="header">
				<div class="keeback">
					<s></s>后退
				</div>
				<div class="title">验光单</div>
				<div class="save b">保存</div>
			</div>
			<div>
			<form id="yanguangdan" action="content_submit" method="get" accept-charset="utf-8">

			<table class="yanguang" cellspacing="0" cellpadding="0">
				<tr>
					<td>ID</td>
					<td colspan="7"><?= $data['orderid']?><input type="hidden" name="oid" value="<?= $data['id']?>"></td>
				</tr>
				<tr>
					<td>镜片</td>
					<td colspan="7">
					<select name="jingpian">
                        <option value="1.56防蓝光" <?= ($glassInfo['lens'] == '1.56防蓝光') ? 'selected':''?>>1.56防蓝光</option>
                        <option value="1.61防蓝光" <?= ($glassInfo['lens'] == '1.61防蓝光') ? 'selected':''?>>1.61防蓝光</option>
                        <option value="1.67防蓝光" <?= ($glassInfo['lens'] == '1.67防蓝光') ? 'selected':''?>>1.67防蓝光</option>
                        <option value="1.56变色片" <?= ($glassInfo['lens'] == '1.56变色片') ? 'selected':''?>>1.56变色片</option>
                        <option value="1.61变色片" <?= ($glassInfo['lens'] == '1.61变色片') ? 'selected':''?>>1.61变色片</option>
                        <option value="1.67变色片" <?= ($glassInfo['lens'] == '1.67变色片') ? 'selected':''?>>1.67变色片</option>
                        <option value="400以下亮膜镜片" <?= ($glassInfo['lens'] == '400以下亮膜镜片') ? 'selected':''?>>400以下亮膜镜片</option>
                        <option value="400以下染色片" <?= ($glassInfo['lens'] == '400以下染色片') ? 'selected':''?>>400以下染色片</option>
                        <option value="1.56" <?= ($glassInfo['lens'] == '1.56') ? 'selected':''?>>1.56</option>
                        <option value="1.61" <?= ($glassInfo['lens'] == '1.61') ? 'selected':''?>>1.61</option>
                        <option value="1.67" <?= ($glassInfo['lens'] == '1.67') ? 'selected':''?>>1.67</option>
                        <option value="1.74" <?= ($glassInfo['lens'] == '1.74') ? 'selected':''?>>1.74</option>
					</select>
					</td>
				</tr>
				<tr>
					<td rowspan="2"></td>
					<td colspan="3">球镜</td>
					<td colspan="3">柱镜</td>
					<td></td>
				</tr>
				<tr>
					<td>旧</td>
					<td style="line-height:15px">变量</td>
					<td style="line-height:15px">新</td>
					<td>旧</td>
					<td style="line-height:15px">变量</td>
					<td style="line-height:15px">新</td>
					<td style="line-height:15px">轴位</td>
				</tr>
				<tr>
					<td>右</td>
					<td>
					<script type="text/javascript">
					$(document).ready(function() {
						// 用于处理默认选中的值
						var list = <?= $op?>;
						// alert(list);
						$('table.yanguang select').each(function(index, el) {
							// $(this).find('option').each(function(i, e) {
							// 	$(e).removeAttr('selected');
							// });
							var name = $(el).attr('name');
							$(el).find('option').each(function(ii, ee) {
								if($(ee).val() == list[""+name+""]){
									$(el).find('option').each(function(i, e) {
										$(e).removeAttr('selected');
									});
									$(ee).attr('selected', true);
								}
							});
						});
						// alert($('table.yanguang select').eq(0).html());
				        $('td[auto]').eq(0).text(parseFloat($('select[change1]').eq(0).val()) + parseFloat($('select[change1]').eq(1).val()))
				        $('td[auto]').eq(1).text(parseFloat($('select[change2]').eq(0).val()) + parseFloat($('select[change2]').eq(1).val()))
				        $('td[auto]').eq(2).text(parseFloat($('select[change3]').eq(0).val()) + parseFloat($('select[change3]').eq(1).val()))
				        $('td[auto]').eq(3).text(parseFloat($('select[change4]').eq(0).val()) + parseFloat($('select[change4]').eq(1).val()))
				        if($('input[name=yanguangdanOk]').val() == 'true') {
                    		$('d').text('已填写！');
				        }
					});
					// 第二种方式实现默认选中
					// $(document).ready(function() {
					// 	var list = new Array('qrj','qrb','zrj','zrb','zrz','qlj','qlb','zlj','zlb','zlz');
					// 	var list2 = <?= $op?>;
					// 	for (var i = 0; i <= list.length; i++) {
					// 		$('select[name="'+list[i]+'"]').each(function(index, el) {
					// 			if($(el).val() == list2[""+list[i]+""]){
					// 				$(el).attr('selected', 'selected').siblings('').removeAttr('selected');
					// 			}
					// 		alert($(el).attr('name'));
					// 		});
					// 	};

					// });
					</script>
					<select name="qrj" change1>
						<option value="4.00">+4.00D</option>
						<option value="3.75">+3.75D</option>
						<option value="3.50">+3.50D</option>
						<option value="3.25">+3.25D</option>
						<option value="3.00">+3.00D</option>
						<option value="2.75">+2.75D</option>
						<option value="2.50">+2.50D</option>
						<option value="2.25">+2.25D</option>
						<option value="2.00">+2.00D</option>
						<option value="1.75">+1.75D</option>
						<option value="1.50">+1.50D</option>
						<option value="1.25">+1.25D</option>
						<option value="1.00">+1.00D</option>
						<option value="0.75">+0.75D</option>
						<option value="0.50">+0.50D</option>
						<option value="0.25">+0.25D</option>
						<option value="0.00" selected="">0.00D</option>
						<option value="-0.25">-0.25D</option>
						<option value="-0.50">-0.50D</option>
						<option value="-0.75">-0.75D</option>
						<option value="-1.00">-1.00D</option>
						<option value="-1.25">-1.25D</option>
						<option value="-1.50">-1.50D</option>
						<option value="-1.75">-1.75D</option>
						<option value="-2.00">-2.00D</option>
						<option value="-2.25">-2.25D</option>
						<option value="-2.50">-2.50D</option>
						<option value="-2.75">-2.75D</option>
						<option value="-3.00">-3.00D</option>
						<option value="-3.25">-3.25D</option>
						<option value="-3.50">-3.50D</option>
						<option value="-3.75">-3.75D</option>
						<option value="-4.00">-4.00D</option>
						<option value="-4.25">-4.25D</option>
						<option value="-4.50">-4.50D</option>
						<option value="-4.75">-4.75D</option>
						<option value="-5.00">-5.00D</option>
						<option value="-5.25">-5.25D</option>
						<option value="-5.50">-5.50D</option>
						<option value="-5.75">-5.75D</option>
						<option value="-6.00">-6.00D</option>
						<option value="-6.25">-6.25D</option>
						<option value="-6.50">-6.50D</option>
						<option value="-6.75">-6.75D</option>
						<option value="-7.00">-7.00D</option>
						<option value="-7.25">-7.25D</option>
						<option value="-7.50">-7.50D</option>
						<option value="-7.75">-7.75D</option>
						<option value="-8.00">-8.00D</option>
						<option value="-8.25">-8.25D</option>
						<option value="-8.50">-8.50D</option>
						<option value="-8.75">-8.75D</option>
						<option value="-9.00">-9.00D</option>
						<option value="-9.25">-9.25D</option>
						<option value="-9.50">-9.50D</option>
						<option value="-9.75">-9.75D</option>
						<option value="-10.00">-10.00D</option>
						<option value="-10.25">-10.25D</option>
						<option value="-10.50">-10.50D</option>
						<option value="-10.75">-10.75D</option>
						<option value="-11.00">-11.00D</option>
						<option value="-11.25">-11.25D</option>
						<option value="-11.50">-11.50D</option>
						<option value="-11.75">-11.75D</option>
						<option value="-12.00">-12.00D</option>
					</select>
					</td>
					<td>
					<select name="qrb" change1>
						<option value="1.00">+1.00</option>
						<option value="0.75">+0.75</option>
						<option value="0.50">+0.50</option>
						<option value="0.25">+0.25</option>
						<option value="0.00" selected="">0.00</option>
						<option value="-0.25">-0.25</option>
						<option value="-0.50">-0.50</option>
						<option value="-0.75">-0.75</option>
						<option value="-1.00">-1.00</option>
						<option value="-1.25">-1.25</option>
						<option value="-1.50">-1.50</option>
						<option value="-1.75">-1.75</option>
						<option value="-2.00">-2.00</option>
					</select>
					</td>
					<td auto>自动</td>
					<td>
					<select name="zrj" change2>
						<option value="4.00">+4.00D</option>
						<option value="3.75">+3.75D</option>
						<option value="3.50">+3.50D</option>
						<option value="3.25">+3.25D</option>
						<option value="3.00">+3.00D</option>
						<option value="2.75">+2.75D</option>
						<option value="2.50">+2.50D</option>
						<option value="2.25">+2.25D</option>
						<option value="2.00">+2.00D</option>
						<option value="1.75">+1.75D</option>
						<option value="1.50">+1.50D</option>
						<option value="1.25">+1.25D</option>
						<option value="1.00">+1.00D</option>
						<option value="0.75">+0.75D</option>
						<option value="0.50">+0.50D</option>
						<option value="0.25">+0.25D</option>
						<option value="0.00" selected="">0.00D</option>
						<option value="-0.25">-0.25D</option>
						<option value="-0.50">-0.50D</option>
						<option value="-0.75">-0.75D</option>
						<option value="-1.00">-1.00D</option>
						<option value="-1.25">-1.25D</option>
						<option value="-1.50">-1.50D</option>
						<option value="-1.75">-1.75D</option>
						<option value="-2.00">-2.00D</option>
						<option value="-2.25">-2.25D</option>
						<option value="-2.50">-2.50D</option>
						<option value="-2.75">-2.75D</option>
						<option value="-3.00">-3.00D</option>
						<option value="-3.25">-3.25D</option>
						<option value="-3.50">-3.50D</option>
						<option value="-3.75">-3.75D</option>
						<option value="-4.00">-4.00D</option>
					</select>
					</td>
					<td>
						<select name="zrb" change2>
							<option value="0.50">+0.50</option>
							<option value="0.25">+0.25</option>
							<option value="0.00" selected="">0.00</option>
							<option value="-0.25">-0.25</option>
							<option value="-0.50">-0.50</option>
							<option value="-0.75">-0.75</option>
							<option value="-1.00">-1.00</option>
						</select>
					</td>
					<td auto>auto</td>
					<td>
						<select name="zrz" change>
							<option value="180.00">180.00</option>
							<option value="179.00">179.00</option>
							<option value="178.00">178.00</option>
							<option value="177.00">177.00</option>
							<option value="176.00">176.00</option>
							<option value="175.00">175.00</option>
							<option value="174.00">174.00</option>
							<option value="173.00">173.00</option>
							<option value="172.00">172.00</option>
							<option value="171.00">171.00</option>
							<option value="170.00">170.00</option>
							<option value="169.00">169.00</option>
							<option value="168.00">168.00</option>
							<option value="167.00">167.00</option>
							<option value="166.00">166.00</option>
							<option value="165.00">165.00</option>
							<option value="164.00">164.00</option>
							<option value="163.00">163.00</option>
							<option value="162.00">162.00</option>
							<option value="161.00">161.00</option>
							<option value="160.00">160.00</option>
							<option value="159.00">159.00</option>
							<option value="158.00">158.00</option>
							<option value="157.00">157.00</option>
							<option value="156.00">156.00</option>
							<option value="155.00">155.00</option>
							<option value="154.00">154.00</option>
							<option value="153.00">153.00</option>
							<option value="152.00">152.00</option>
							<option value="151.00">151.00</option>
							<option value="150.00">150.00</option>
							<option value="149.00">149.00</option>
							<option value="148.00">148.00</option>
							<option value="147.00">147.00</option>
							<option value="146.00">146.00</option>
							<option value="145.00">145.00</option>
							<option value="144.00">144.00</option>
							<option value="143.00">143.00</option>
							<option value="142.00">142.00</option>
							<option value="141.00">141.00</option>
							<option value="140.00">140.00</option>
							<option value="139.00">139.00</option>
							<option value="138.00">138.00</option>
							<option value="137.00">137.00</option>
							<option value="136.00">136.00</option>
							<option value="135.00">135.00</option>
							<option value="134.00">134.00</option>
							<option value="133.00">133.00</option>
							<option value="132.00">132.00</option>
							<option value="131.00">131.00</option>
							<option value="130.00">130.00</option>
							<option value="129.00">129.00</option>
							<option value="128.00">128.00</option>
							<option value="127.00">127.00</option>
							<option value="126.00">126.00</option>
							<option value="125.00">125.00</option>
							<option value="124.00">124.00</option>
							<option value="123.00">123.00</option>
							<option value="122.00">122.00</option>
							<option value="121.00">121.00</option>
							<option value="120.00">120.00</option>
							<option value="119.00">119.00</option>
							<option value="118.00">118.00</option>
							<option value="117.00">117.00</option>
							<option value="116.00">116.00</option>
							<option value="115.00">115.00</option>
							<option value="114.00">114.00</option>
							<option value="113.00">113.00</option>
							<option value="112.00">112.00</option>
							<option value="111.00">111.00</option>
							<option value="110.00">110.00</option>
							<option value="109.00">109.00</option>
							<option value="108.00">108.00</option>
							<option value="107.00">107.00</option>
							<option value="106.00">106.00</option>
							<option value="105.00">105.00</option>
							<option value="104.00">104.00</option>
							<option value="103.00">103.00</option>
							<option value="102.00">102.00</option>
							<option value="101.00">101.00</option>
							<option value="100.00">100.00</option>
							<option value="99.00">99.00</option>
							<option value="98.00">98.00</option>
							<option value="97.00">97.00</option>
							<option value="96.00">96.00</option>
							<option value="95.00">95.00</option>
							<option value="94.00">94.00</option>
							<option value="93.00">93.00</option>
							<option value="92.00">92.00</option>
							<option value="91.00">91.00</option>
							<option value="90.00">90.00</option>
							<option value="89.00">89.00</option>
							<option value="88.00">88.00</option>
							<option value="87.00">87.00</option>
							<option value="86.00">86.00</option>
							<option value="85.00">85.00</option>
							<option value="84.00">84.00</option>
							<option value="83.00">83.00</option>
							<option value="82.00">82.00</option>
							<option value="81.00">81.00</option>
							<option value="80.00">80.00</option>
							<option value="79.00">79.00</option>
							<option value="78.00">78.00</option>
							<option value="77.00">77.00</option>
							<option value="76.00">76.00</option>
							<option value="75.00">75.00</option>
							<option value="74.00">74.00</option>
							<option value="73.00">73.00</option>
							<option value="72.00">72.00</option>
							<option value="71.00">71.00</option>
							<option value="70.00">70.00</option>
							<option value="69.00">69.00</option>
							<option value="68.00">68.00</option>
							<option value="67.00">67.00</option>
							<option value="66.00">66.00</option>
							<option value="65.00">65.00</option>
							<option value="64.00">64.00</option>
							<option value="63.00">63.00</option>
							<option value="62.00">62.00</option>
							<option value="61.00">61.00</option>
							<option value="60.00">60.00</option>
							<option value="59.00">59.00</option>
							<option value="58.00">58.00</option>
							<option value="57.00">57.00</option>
							<option value="56.00">56.00</option>
							<option value="55.00">55.00</option>
							<option value="54.00">54.00</option>
							<option value="53.00">53.00</option>
							<option value="52.00">52.00</option>
							<option value="51.00">51.00</option>
							<option value="50.00">50.00</option>
							<option value="49.00">49.00</option>
							<option value="48.00">48.00</option>
							<option value="47.00">47.00</option>
							<option value="46.00">46.00</option>
							<option value="45.00">45.00</option>
							<option value="44.00">44.00</option>
							<option value="43.00">43.00</option>
							<option value="42.00">42.00</option>
							<option value="41.00">41.00</option>
							<option value="40.00">40.00</option>
							<option value="39.00">39.00</option>
							<option value="38.00">38.00</option>
							<option value="37.00">37.00</option>
							<option value="36.00">36.00</option>
							<option value="35.00">35.00</option>
							<option value="34.00">34.00</option>
							<option value="33.00">33.00</option>
							<option value="32.00">32.00</option>
							<option value="31.00">31.00</option>
							<option value="30.00">30.00</option>
							<option value="29.00">29.00</option>
							<option value="28.00">28.00</option>
							<option value="27.00">27.00</option>
							<option value="26.00">26.00</option>
							<option value="25.00">25.00</option>
							<option value="24.00">24.00</option>
							<option value="23.00">23.00</option>
							<option value="22.00">22.00</option>
							<option value="21.00">21.00</option>
							<option value="20.00">20.00</option>
							<option value="19.00">19.00</option>
							<option value="18.00">18.00</option>
							<option value="17.00">17.00</option>
							<option value="16.00">16.00</option>
							<option value="15.00">15.00</option>
							<option value="14.00">14.00</option>
							<option value="13.00">13.00</option>
							<option value="12.00">12.00</option>
							<option value="11.00">11.00</option>
							<option value="10.00">10.00</option>
							<option value="9.00">9.00</option>
							<option value="8.00">8.00</option>
							<option value="7.00">7.00</option>
							<option value="6.00">6.00</option>
							<option value="5.00">5.00</option>
							<option value="4.00">4.00</option>
							<option value="3.00">3.00</option>
							<option value="2.00">2.00</option>
							<option value="1.00">1.00</option>
							<option value="0.00">0.00</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>左</td>
					<td>
					<select name="qlj" change3>
						<option value="4.00">+4.00D</option>
						<option value="3.75">+3.75D</option>
						<option value="3.50">+3.50D</option>
						<option value="3.25">+3.25D</option>
						<option value="3.00">+3.00D</option>
						<option value="2.75">+2.75D</option>
						<option value="2.50">+2.50D</option>
						<option value="2.25">+2.25D</option>
						<option value="2.00">+2.00D</option>
						<option value="1.75">+1.75D</option>
						<option value="1.50">+1.50D</option>
						<option value="1.25">+1.25D</option>
						<option value="1.00">+1.00D</option>
						<option value="0.75">+0.75D</option>
						<option value="0.50">+0.50D</option>
						<option value="0.25">+0.25D</option>
						<option value="0.00" selected="">0.00D</option>
						<option value="-0.25">-0.25D</option>
						<option value="-0.50">-0.50D</option>
						<option value="-0.75">-0.75D</option>
						<option value="-1.00">-1.00D</option>
						<option value="-1.25">-1.25D</option>
						<option value="-1.50">-1.50D</option>
						<option value="-1.75">-1.75D</option>
						<option value="-2.00">-2.00D</option>
						<option value="-2.25">-2.25D</option>
						<option value="-2.50">-2.50D</option>
						<option value="-2.75">-2.75D</option>
						<option value="-3.00">-3.00D</option>
						<option value="-3.25">-3.25D</option>
						<option value="-3.50">-3.50D</option>
						<option value="-3.75">-3.75D</option>
						<option value="-4.00">-4.00D</option>
						<option value="-4.25">-4.25D</option>
						<option value="-4.50">-4.50D</option>
						<option value="-4.75">-4.75D</option>
						<option value="-5.00">-5.00D</option>
						<option value="-5.25">-5.25D</option>
						<option value="-5.50">-5.50D</option>
						<option value="-5.75">-5.75D</option>
						<option value="-6.00">-6.00D</option>
						<option value="-6.25">-6.25D</option>
						<option value="-6.50">-6.50D</option>
						<option value="-6.75">-6.75D</option>
						<option value="-7.00">-7.00D</option>
						<option value="-7.25">-7.25D</option>
						<option value="-7.50">-7.50D</option>
						<option value="-7.75">-7.75D</option>
						<option value="-8.00">-8.00D</option>
						<option value="-8.25">-8.25D</option>
						<option value="-8.50">-8.50D</option>
						<option value="-8.75">-8.75D</option>
						<option value="-9.00">-9.00D</option>
						<option value="-9.25">-9.25D</option>
						<option value="-9.50">-9.50D</option>
						<option value="-9.75">-9.75D</option>
						<option value="-10.00">-10.00D</option>
						<option value="-10.25">-10.25D</option>
						<option value="-10.50">-10.50D</option>
						<option value="-10.75">-10.75D</option>
						<option value="-11.00">-11.00D</option>
						<option value="-11.25">-11.25D</option>
						<option value="-11.50">-11.50D</option>
						<option value="-11.75">-11.75D</option>
						<option value="-12.00">-12.00D</option>
					</select>
					</td>
					<td>
					<select name="qlb" change3>
						<option value="1.00">+1.00</option>
						<option value="0.75">+0.75</option>
						<option value="0.50">+0.50</option>
						<option value="0.25">+0.25</option>
						<option value="0.00" selected="">0.00</option>
						<option value="-0.25">-0.25</option>
						<option value="-0.50">-0.50</option>
						<option value="-0.75">-0.75</option>
						<option value="-1.00">-1.00</option>
						<option value="-1.25">-1.25</option>
						<option value="-1.50">-1.50</option>
						<option value="-1.75">-1.75</option>
						<option value="-2.00">-2.00</option>
					</select>
					</td>
					<td auto>自动</td>
					<td>
					<select name="zlj" change4>
						<option value="4.00">+4.00D</option>
						<option value="3.75">+3.75D</option>
						<option value="3.50">+3.50D</option>
						<option value="3.25">+3.25D</option>
						<option value="3.00">+3.00D</option>
						<option value="2.75">+2.75D</option>
						<option value="2.50">+2.50D</option>
						<option value="2.25">+2.25D</option>
						<option value="2.00">+2.00D</option>
						<option value="1.75">+1.75D</option>
						<option value="1.50">+1.50D</option>
						<option value="1.25">+1.25D</option>
						<option value="1.00">+1.00D</option>
						<option value="0.75">+0.75D</option>
						<option value="0.50">+0.50D</option>
						<option value="0.25">+0.25D</option>
						<option value="0.00" selected="">0.00D</option>
						<option value="-0.25">-0.25D</option>
						<option value="-0.50">-0.50D</option>
						<option value="-0.75">-0.75D</option>
						<option value="-1.00">-1.00D</option>
						<option value="-1.25">-1.25D</option>
						<option value="-1.50">-1.50D</option>
						<option value="-1.75">-1.75D</option>
						<option value="-2.00">-2.00D</option>
						<option value="-2.25">-2.25D</option>
						<option value="-2.50">-2.50D</option>
						<option value="-2.75">-2.75D</option>
						<option value="-3.00">-3.00D</option>
						<option value="-3.25">-3.25D</option>
						<option value="-3.50">-3.50D</option>
						<option value="-3.75">-3.75D</option>
						<option value="-4.00">-4.00D</option>
					</select>
					</td>
					<td>
						<select name="zlb" change4>
							<option value="0.50">+0.50</option>
							<option value="0.25">+0.25</option>
							<option value="0.00" selected="">0.00</option>
							<option value="-0.25">-0.25</option>
							<option value="-0.50">-0.50</option>
							<option value="-0.75">-0.75</option>
							<option value="-1.00">-1.00</option>
						</select>
					</td>
					<td auto>auto</td>
					<td>
						<select name="zlz" change>
							<option value="180.00">180.00</option>
							<option value="179.00">179.00</option>
							<option value="178.00">178.00</option>
							<option value="177.00">177.00</option>
							<option value="176.00">176.00</option>
							<option value="175.00">175.00</option>
							<option value="174.00">174.00</option>
							<option value="173.00">173.00</option>
							<option value="172.00">172.00</option>
							<option value="171.00">171.00</option>
							<option value="170.00">170.00</option>
							<option value="169.00">169.00</option>
							<option value="168.00">168.00</option>
							<option value="167.00">167.00</option>
							<option value="166.00">166.00</option>
							<option value="165.00">165.00</option>
							<option value="164.00">164.00</option>
							<option value="163.00">163.00</option>
							<option value="162.00">162.00</option>
							<option value="161.00">161.00</option>
							<option value="160.00">160.00</option>
							<option value="159.00">159.00</option>
							<option value="158.00">158.00</option>
							<option value="157.00">157.00</option>
							<option value="156.00">156.00</option>
							<option value="155.00">155.00</option>
							<option value="154.00">154.00</option>
							<option value="153.00">153.00</option>
							<option value="152.00">152.00</option>
							<option value="151.00">151.00</option>
							<option value="150.00">150.00</option>
							<option value="149.00">149.00</option>
							<option value="148.00">148.00</option>
							<option value="147.00">147.00</option>
							<option value="146.00">146.00</option>
							<option value="145.00">145.00</option>
							<option value="144.00">144.00</option>
							<option value="143.00">143.00</option>
							<option value="142.00">142.00</option>
							<option value="141.00">141.00</option>
							<option value="140.00">140.00</option>
							<option value="139.00">139.00</option>
							<option value="138.00">138.00</option>
							<option value="137.00">137.00</option>
							<option value="136.00">136.00</option>
							<option value="135.00">135.00</option>
							<option value="134.00">134.00</option>
							<option value="133.00">133.00</option>
							<option value="132.00">132.00</option>
							<option value="131.00">131.00</option>
							<option value="130.00">130.00</option>
							<option value="129.00">129.00</option>
							<option value="128.00">128.00</option>
							<option value="127.00">127.00</option>
							<option value="126.00">126.00</option>
							<option value="125.00">125.00</option>
							<option value="124.00">124.00</option>
							<option value="123.00">123.00</option>
							<option value="122.00">122.00</option>
							<option value="121.00">121.00</option>
							<option value="120.00">120.00</option>
							<option value="119.00">119.00</option>
							<option value="118.00">118.00</option>
							<option value="117.00">117.00</option>
							<option value="116.00">116.00</option>
							<option value="115.00">115.00</option>
							<option value="114.00">114.00</option>
							<option value="113.00">113.00</option>
							<option value="112.00">112.00</option>
							<option value="111.00">111.00</option>
							<option value="110.00">110.00</option>
							<option value="109.00">109.00</option>
							<option value="108.00">108.00</option>
							<option value="107.00">107.00</option>
							<option value="106.00">106.00</option>
							<option value="105.00">105.00</option>
							<option value="104.00">104.00</option>
							<option value="103.00">103.00</option>
							<option value="102.00">102.00</option>
							<option value="101.00">101.00</option>
							<option value="100.00">100.00</option>
							<option value="99.00">99.00</option>
							<option value="98.00">98.00</option>
							<option value="97.00">97.00</option>
							<option value="96.00">96.00</option>
							<option value="95.00">95.00</option>
							<option value="94.00">94.00</option>
							<option value="93.00">93.00</option>
							<option value="92.00">92.00</option>
							<option value="91.00">91.00</option>
							<option value="90.00">90.00</option>
							<option value="89.00">89.00</option>
							<option value="88.00">88.00</option>
							<option value="87.00">87.00</option>
							<option value="86.00">86.00</option>
							<option value="85.00">85.00</option>
							<option value="84.00">84.00</option>
							<option value="83.00">83.00</option>
							<option value="82.00">82.00</option>
							<option value="81.00">81.00</option>
							<option value="80.00">80.00</option>
							<option value="79.00">79.00</option>
							<option value="78.00">78.00</option>
							<option value="77.00">77.00</option>
							<option value="76.00">76.00</option>
							<option value="75.00">75.00</option>
							<option value="74.00">74.00</option>
							<option value="73.00">73.00</option>
							<option value="72.00">72.00</option>
							<option value="71.00">71.00</option>
							<option value="70.00">70.00</option>
							<option value="69.00">69.00</option>
							<option value="68.00">68.00</option>
							<option value="67.00">67.00</option>
							<option value="66.00">66.00</option>
							<option value="65.00">65.00</option>
							<option value="64.00">64.00</option>
							<option value="63.00">63.00</option>
							<option value="62.00">62.00</option>
							<option value="61.00">61.00</option>
							<option value="60.00">60.00</option>
							<option value="59.00">59.00</option>
							<option value="58.00">58.00</option>
							<option value="57.00">57.00</option>
							<option value="56.00">56.00</option>
							<option value="55.00">55.00</option>
							<option value="54.00">54.00</option>
							<option value="53.00">53.00</option>
							<option value="52.00">52.00</option>
							<option value="51.00">51.00</option>
							<option value="50.00">50.00</option>
							<option value="49.00">49.00</option>
							<option value="48.00">48.00</option>
							<option value="47.00">47.00</option>
							<option value="46.00">46.00</option>
							<option value="45.00">45.00</option>
							<option value="44.00">44.00</option>
							<option value="43.00">43.00</option>
							<option value="42.00">42.00</option>
							<option value="41.00">41.00</option>
							<option value="40.00">40.00</option>
							<option value="39.00">39.00</option>
							<option value="38.00">38.00</option>
							<option value="37.00">37.00</option>
							<option value="36.00">36.00</option>
							<option value="35.00">35.00</option>
							<option value="34.00">34.00</option>
							<option value="33.00">33.00</option>
							<option value="32.00">32.00</option>
							<option value="31.00">31.00</option>
							<option value="30.00">30.00</option>
							<option value="29.00">29.00</option>
							<option value="28.00">28.00</option>
							<option value="27.00">27.00</option>
							<option value="26.00">26.00</option>
							<option value="25.00">25.00</option>
							<option value="24.00">24.00</option>
							<option value="23.00">23.00</option>
							<option value="22.00">22.00</option>
							<option value="21.00">21.00</option>
							<option value="20.00">20.00</option>
							<option value="19.00">19.00</option>
							<option value="18.00">18.00</option>
							<option value="17.00">17.00</option>
							<option value="16.00">16.00</option>
							<option value="15.00">15.00</option>
							<option value="14.00">14.00</option>
							<option value="13.00">13.00</option>
							<option value="12.00">12.00</option>
							<option value="11.00">11.00</option>
							<option value="10.00">10.00</option>
							<option value="9.00">9.00</option>
							<option value="8.00">8.00</option>
							<option value="7.00">7.00</option>
							<option value="6.00">6.00</option>
							<option value="5.00">5.00</option>
							<option value="4.00">4.00</option>
							<option value="3.00">3.00</option>
							<option value="2.00">2.00</option>
							<option value="1.00">1.00</option>
							<option value="0.00">0.00</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>瞳距</td>
					<td colspan="3"><input type="text" name="tongju" value="<?= $l_optometry['tongju']?>" placeholder=""></td>
					<td colspan="4"><span>主视眼</span>
					<div>
						<span>左</span><r <?= $l_optometry['zhushiyan'] == 1 ? 'click':''?>></r>
						<span>右</span><r <?= $l_optometry['zhushiyan'] == 2 ? 'click':''?>></r>
						<input type="hidden" name="zhushiyan" value="<?= $l_optometry['zhushiyan']?>">
					</div>
					</td>
				</tr>
				<tr>
					<td style="line-height:28px">特殊情况</td>
					<td colspan="7"><input type="text" name="note" value="<?= $l_optometry['note']?>" placeholder=""></td>
				</tr>
				<?php $json = json_decode($glassInfo['frameInfo'],true)?>
			<?php if(!empty($json['pinpai'])):?>
				<?php $a = 0;?>
				<?php foreach ($json['pinpai'] as $key => $value): ?>
				<tr jingkuang>
					<td style="line-height:28px">镜框<?= $a+1?></td>
					<td>品牌</td>
					<td><input type="text" name="jingkuang[pinpai][]" value="<?= $json['pinpai'][$a]?>" placeholder=""></td>
					<td>型号</td>
					<td><input type="text" name="jingkuang[xinghao][]" value="<?= $json['xinghao'][$a]?>" placeholder=""></td>
					<td>色号</td>
					<td colspan="2"><input type="text" name="jingkuang[sehao][]" value="<?= $json['sehao'][$a]?>" placeholder=""></td>
				</tr>
					<?php ++$a?>
			<?php endforeach?>
		<?php else : ?>
				
			<?php endif?>
				<tr add>
					<td colspan="8">
						<span>
							<ico></ico>
							<txt>添加镜框</txt>
						</span>
					</td>
				</tr>
			</table>
			</form>

		</div>
	</div>
</footer>
<div id="note"  success>
    <div class="alert">
        <div class="content">
            信息提示
            <br/>
            <br/>
            当前页信息已被修改是否保存？
            <br/>
            <br/>
            <button>放弃修改</button>
            <button>继续编辑</button>

        </div>
    </div>
    <div class="back"></div>
</div>
<div id="note" success successTow>
    <div class="alert">
        <div class="content">
            操作成功
            <br/>
            <br/>
            您已经完成
            <br/>
            ID = <?= $data['orderid']?>的验光单
            <br/>
            马上就会通知加工人员去加工
            <br/>
            <button>确认</button>
        </div>
    </div>
    <div class="back"></div>
</div>
<div id="note" successThree >
    <div class="alert">
        <div class="content">
            操作成功
            <br/>
            <br/>
            验光单更新成功！
            <br/>
            <br/>
            <button>确认</button>
        </div>
    </div>
    <div class="back"></div>
</div>
<div id="loading">
	<div class="back"></div>
	<div class='loader loader--circularSquare'></div>
</div>
<input type="hidden" name="yanguangdanOk" value="<?php $json = json_decode($glassInfo['frameInfo'],true)?><?php if(!empty($json['pinpai'])):?>true<?php else:?>false<?php endif;?>">
</body>
</html>