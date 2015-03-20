<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>加工任务</title>
	<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name=apple-themes-web-app-capable content=yes>
    <meta name=apple-themes-web-app-status-bar-style content=black>
    <meta name=format-detection content=telephone=no>
    <meta charset="utf-8">
    <link rel="stylesheet/less" type="text/css" media="screen and (max-width: 960px)" href="<?= APP_STATIC?>/css/content_min.less" />
    <?= APP_JQUERY?>
    <?= APP_LESS?>
    <script type="text/javascript">
    	var AJAX_URL = "<?= U('admin/jiagong/ajax')?>";
    </script>
    <script type="text/javascript" charset="utf-8" async defer src="<?= APP_STATIC?>/js/content.js"></script>
</head>
<body>
<header>
	<div id="main">
		<div class="top">
		<span class="left save">保存</span>
			<div class="middle">
				<s></s>
				<span class="ID">ID</span>
				<s></s>
			</div>
		<span class="right"><a href="#" onclick="back('<?= U('jiagong/index') ?>')">返回</a></span>

		</div>
		<form action="" method="POST" accept-charset="utf-8" name="form">
		<div class="block">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td><span>预约ID</span></td>
				<td color><?= $orderData['orderid']?><input type="hidden" name="oid" value="<?= $orderData['id']?>"></td>
			</tr>
			<tr>
				<td><span>姓名</span></td>
				<td color><?= $orderData['name']?></td>
			</tr>
			<tr>
				<td><span>电话</span></td>
				<td color><a href="tel:<?= $orderData['phone']?>"><?= $orderData['phone']?></a></td>
			</tr>
		</table>
		</div>
		<div class="block">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><span>区域负责人</span></td>
					<td color><?= $userInfo['name']?><s></s></td>
				</tr>
				<tr>
					<td><span>电话</span></td>
					<td color><?= $userInfo['phone']?><s></s></td>
				</tr>
				<tr>
					<td><span>送货时间</span></td>
					<td color><?= date('Y/m/d',$receiptInfo['songhuotime'])?></td>
				</tr>
				<tr>
					<td><span>验光人备注</span></td>
					<td color><?= $receiptInfo['note']?><s></s></td>
				</tr>
				<tr>
					<td><span>相关数据</span></td>
					<td name="yanguang"><div name="look">查看</div></td>
				</tr>
			</table>
		</div>
		<?php $i = 0;?>
		<?php $json = json_decode($glassInfo['frameInfo'],true)?>
		<?php if(!empty($json['pinpai'])):?>

		<?php foreach ($json['pinpai'] as $key => $value): ?>

		<div class="block">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><span>镜框库存<?= ++$i?></span></td>
					<td color>
						<select name="frameInfo[type][]">
							<option value="有货" <?= $processInfo['frameInfo']['type'][$key] == '有货' ? 'selected' : '' ?>>有货</option>
							<option value="无货" <?= $processInfo['frameInfo']['type'][$key] == '无货' ? 'selected' : '' ?>>无货</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><span>镜架成本</span></td>
					<td color><span><?= $processInfo['frameInfo']['chengben'][$key];?></span><input check type="text" name="frameInfo[chengben][]" style="width: 100%;
					height:100px" value="<?= $processInfo['frameInfo']['chengben'][$key] ?>"></td>
				</tr>
			</table>
		</div>
	<?php endforeach;?>
	<?php endif;?>
		<div class="block">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><span>镜片数量</span></td>
					<td color>
						<span><?= $processInfo['lensNum']?></span><input check type="text" name="lensNum" style="width: 100%;
					height:100px" value="<?= $processInfo['lensNum']?>">
					</td>
				</tr>
				<tr>
					<td><span>进货单价</span></td>
					<td color><span><?= $processInfo['lensChengben'];?></span><input type="text" check name="lensChengben" style="width: 100%;
					height:100px" value="<?= $processInfo['lensChengben']?>"></td>
				</tr>
				<tr>
					<td><span>光度</span></td>
					<td color name="guangdu">+1.00</td>
				</tr>
			</table>
		</div>
		<?php $i = 0;?>
		<?php $json = json_decode($glassInfo['frameInfo'],true)?>
		<?php if(!empty($json['pinpai'])):?>

		<?php foreach ($json['pinpai'] as $key => $value): ?>

		<div class="block">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><span>镜盒<?= ++$i?>品类</span></td>
					<td color>
						<select name="boxInfo[type][]">
							<option value="折叠盒" <?= $processInfo['boxInfo']['type'][$key] == '折叠盒' ? 'selected' : '' ?>>折叠盒</option>
							<option value="板材盒" <?= $processInfo['boxInfo']['type'][$key] == '板材盒' ? 'selected' : '' ?>>板材盒</option>
							<option value="太阳镜盒" <?= $processInfo['boxInfo']['type'][$key] == '太阳镜盒' ? 'selected' : '' ?>>太阳镜盒</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><span>镜盒成本</span></td>
					<td color><span><?= $processInfo['boxInfo']['chengben'][$key];?></span><input type="text" check name="boxInfo[chengben][]" style="width: 100%;
					height:100px" value="<?= $processInfo['boxInfo']['chengben'][$key] ?>"></td>
				</tr>
			</table>
		</div>
	<?php endforeach;?>
	<?php endif;?>
		<div class="block">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><span>所有成本</span></td>
					<td color>
						<span><?= $processInfo['allPrice'];?></span><input type="text" check name="allPrice" style="width: 100%;
					height:100px" value="<?= $processInfo['allPrice'] ?>">
					</td>
				</tr>
				<tr>
					<td><span>加工人备注</span></td>
					<td color>
						<span><?= $processInfo['note'];?></span><input type="text" name="note" style="width: 100%;
					height:100px" value="<?= $processInfo['note']; ?>"></td>
				</tr>
				<tr>
					<td><span>加工提成</span></td>
					<td color>1%</td>
				</tr>
			</table>
		</div>
	</div>
</form>

</header><!-- /header -->
<footer>
	<div id="all">
		<div class="line" name="yanguang" style="z-index:1000">
			<div class="header">
				<div class="keeback">
					<s></s>后退
				</div>
				<div class="title">加工处方单</div>
				<div class="save b">保存</div>
			</div>
			<div>
					<form accept-charset="utf-8" name="jkform">
			<script type="text/javascript">
			$(document).ready(function() {
				// 用于处理默认选中的值
				var list = <?= $op?>;
				$('table.yanguang select').each(function(index, el) {
					// $(this).find('option').each(function(i, e) {
					// 	$(e).removeAttr('selected');
					// });
					var name = $(el).attr('name');
					$(el).find('option').each(function(ii, ee) {
						if($(ee).val() == list[""+name+""]){
							$(ee).attr('selected', true);
							$(ee).siblings('option').removeAttr('selected');
						}
					});
				});
			    function setAuto(){
			    	var i1 = parseFloat($('select[change1]').eq(0).val()) + parseFloat($('select[change1]').eq(1).val());
			    	var i2 = parseFloat($('select[change2]').eq(0).val()) + parseFloat($('select[change2]').eq(1).val());
			    	var i3 = parseFloat($('select[change3]').eq(0).val()) + parseFloat($('select[change3]').eq(1).val());
			    	var i4 = parseFloat($('select[change4]').eq(0).val()) + parseFloat($('select[change4]').eq(1).val());
			        // var iS = i4 + '';
			        // if(iS.match(/[\.]/) != null) {
			        // 	alert('ok');
			        // } else {
			        // 	alert(iS + '.00');
			        // }
			        for (var a = 1; a <= 4; a++) {
			        	eval('var iS = i' + a) + '';
			        	if(!(''+iS).match(/[\.]/)) {
			        		eval('i' + a + ' = iS + ".00"');
			        	}
			        	// alert(eval('i' + a))
			        	// alert(window['i'+a])
			        };
			        $('td[auto]').eq(0).text(i1);
			        $('td[auto]').eq(1).text(i2);
			        $('td[auto]').eq(2).text(i3);
			        $('td[auto]').eq(3).text(i4);
			        var l1 = parseFloat($('select[change3]').eq(1).val()) | + '';
			        var l2 = parseFloat($('select[change4]').eq(1).val()) | + '';
			        var l3 = parseFloat($('select[change]').eq(1).val()) | + '';
			        // for (var a = 1; a <= 4; a++) {
			        // 	$ = eval('var iS = i' + a) + '';
			        // 	if(!(''+iS).match(/[\.]/)) {
			        // 		eval('i' + a + ' = iS + ".00"');
			        // 	}
			        // 	// alert(eval('i' + a))
			        // 	// alert(window['i'+a])
			        // };
			        // if(l1.match(/[\.]/)) {
			        // 	alert(1)
			        // } else {
			        // 	alert(2)
			        // }
			        var r1 = parseFloat($('select[change1]').eq(1).val());
			        var r2 = parseFloat($('select[change2]').eq(1).val());
			        var r3 = parseFloat($('select[change]').eq(0).val());
			        var str = '';
			        str += '(';
			        str += i1+','+i3+','+i2+','+i4+','+r3+','+l3;
			        str += ')';
					$('td[name=guangdu]').html(str)
			// alert(str)
			    }
			    setAuto();
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
			<table class="yanguang" cellspacing="0" cellpadding="0">
				<tr>
					<td>ID</td>
					<td colspan="7"><?= $data['orderid']?><input type="hidden" name="oid" value="<?= $data['id']?>"></td>
				</tr>
				<tr>
					<td>姓名</td>
					<td colspan="7"><?= $orderData['name']?></td>
				</tr>
				<tr>
					<td>电话</td>
					<td colspan="7"><?= $orderData['phone']?></td>
				</tr>
				<tr>
					<td style="color:#B7B7B7">学校</td>
					<td colspan="7" style="color:#B7B7B7"><?= $orderData['xuexiao']?></td>
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
					<td colspan="2">球镜</td>
					<td colspan="4">柱镜</td>
				</tr>
				<tr>
					<td style="display:none">旧</td>
					<td style="line-height:15px;display:none">变量</td>
					<td style="line-height:15px" colspan="2">球镜新验光</td>
					<td style="display:none">旧</td>
					<td style="line-height:15px;display:none">变量</td>
					<td style="line-height:15px" colspan="2">柱镜新验光</td>
					<td style="line-height:15px" colspan="2">轴位</td>
				</tr>
				<tr>
					<td>右</td>
					<td  style="display:none">
					
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
					<td style="display:none">
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
					<td auto colspan="2">自动</td>
					<td style="display:none">
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
					<td style="display:none">
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
					<td auto colspan="2">auto</td>
					<td colspan="2">
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
					<td  style="display:none">
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
					<td style="display:none">
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
					<td auto colspan="2">自动</td>
					<td style="display:none">
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
					<td style="display:none">
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
					<td auto colspan="2">auto</td>
					<td colspan="2">
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
					<td colspan="6"><input type="text" name="tongju" value="<?= $l_optometry['tongju']?>" placeholder=""></td>
					<td colspan="4" style="display:none"><span>主视眼</span>
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
				<tr jingkuang  ontouchstart="touch(this)" ontouchend="touchOut()">
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
<div id="note" successTow>
    <div class="alert">
        <div class="content">
            操作成功
            <br/>
            <br/>
            您已经完成
            <br/>
            ID = <?= $orderData['orderid']?>的加工单
            <br/>
            马上就会通知送货人员去送货
            <br/>
            <button>确认</button>
        </div>
    </div>
    <div class="back"></div>
</div>
<div id="note" successThree>
    <div class="alert">
        <div class="content">
            操作成功
            <br/>
            <br/>
            您已经成功修改镜框信息!
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
</body>
</html>