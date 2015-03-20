<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>回访任务</title>
	<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name=apple-themes-web-app-capable content=yes>
    <meta name=apple-themes-web-app-status-bar-style content=black>
    <meta name=format-detection content=telephone=no>
    <meta charset="utf-8">
    <link rel="stylesheet/less" type="text/css" media="screen and (max-width: 960px)" href="<?= APP_STATIC?>/css/content_min.less" />
    <?= APP_JQUERY?>
    <?= APP_LESS?>
    <?= APP_SCRIPT_DEFINE?>
    <script>
    APP_URL = "<?= U('phone/ajax') ?>";
    RETURN_URL = "<?= U('phone/index',array('id'=>$order['id'])) ?>";
    </script>
    <script type="text/javascript" charset="utf-8" async defer src="<?= APP_STATIC?>/js/content.js"></script>
</head>
<body>
<header>
	<div id="main">
		<div class="top">
		<span class="left save">保存</span>
			<div class="middle">
				<s onclick="location.href='<?= U('content',array('id'=>$nextId))?>'"></s>
				<span class="ID">ID</span>
				<a href="<?php U('content',array('id'=>$nextId))?>" title=""></a><s onclick="location.href='<?= U('content',array('id'=>$lastId))?>'"></s>
			</div>
		<span class="right"><a href="#" onclick="back('<?= U('phone/index') ?>')">返回</a></span>

		</div>
		<div class="block">
		<form action="" method="get" accept-charset="utf-8">
            <input type="hidden" name="isCheck" value="0">

            <input type="hidden" name="orderid" value="<?= $order['orderid']?>">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td><span>预约ID</span></td>
				<td color><?= $order['orderid']?><input type="hidden" name="id" value="<?= $order['id']?>"></td>
			</tr>
			<tr>
				<td><span>姓名</span></td>
				<td><span><?= $order['name']?></span><input type="text" name="name" value="<?= $order['name']?>"></td>
			</tr>
			<tr>
				<td><span>微信</span></td>
				<td><span><?= $order['weixin']?></span><input type="text" name="weixin" value="<?= $order['weixin']?>"></td>
			</tr>
			<tr>
				<td><span>电话</span></td>
				<td><a href="tel:<?= $order['phone']?>"><?= $order['phone']?></a><input type="hidden" name="phone" value="<?= $order['phone']?>"></td>
			</tr>
			<tr>
				<td><span>学校</span></td>
				<td name="school" color><text><?= $order['xuexiao']?></text><input type="hidden" name="school" value="<?= $order['xuexiao']?>"></td>
			</tr>
			<tr>
				<td><span>性别</span></td>
				<td name="sex" color><text><?= $order['sex']?></text><input type="hidden" name="sex" value="<?= $order['sex']?>"></td>
			</tr>
			<tr>
				<td><span>来源</span></td>
				<td color><?= $order['is_pc'] ? 'PC' : '微信'?></td>
			</tr>
			<tr>
				<td><span>ta是谁</span></td>
				<td color><?= !empty($order['referees']) ? $order['referees'] : '无'?></td>
			</tr>
			<tr>
				<td><span>下单时间</span></td>
				<td color><?= date('Y-m-d H:i:s',$order['time'])?></td>
			</tr>
		</table>
		</div>
		<div class="block">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><span>是否有效</span></td>
					<td name="is_ok"><text><?= $make['is_ok'] >= 1 ? '有效' : '无效'?></text><input type="hidden" name="is_ok" value="<?= ($make['is_ok'] == 1) ? '有效' : '无效'?>"><s></s></td>
				</tr>
				<tr>
					<td><span>预约时间</span></td>
					<td name="time"><span><?= $make['time']?></span><input check type="text" name="yuyuetime" value="<?= $make['time']?>"></td>
				</tr>
				<tr>
					<td><span>预约地点</span></td>
					<td><span><?= $make['address']?></span><input type="text" name="yuyueaddress" check value="<?= $make['address']?>"></td>
				</tr>
				<tr>
					<td><span>预约方式</span></td>
					<td name="fangshi"><text><?= $make['methods']?></text><input type="hidden" check name="methods" value="<?= $make['methods']?>"><s></s></td>
				</tr>
				<tr>
					<td><span>回访人备注</span></td>
					<td><span><?= $make['note']?></span><input type="text" name="lianxinote" style="width: 100%;
					height:100px" value="<?= $make['note']?>">

                    </td>
				</tr>
			</table>
		</div>
		<div class="block">
		<input type="hidden" name="fenpei" value="<?= $userInfo['name'] ? $userInfo['name'] : '抢单模式'?>">
			<table cellpadding="0" cellspacing="0">
				<?php if(empty($userInfo['name'])) : ?>
				<tr>
					<td><span>验光人分配</span></td>
					<?php if($qiangdan == 0) : ?>
					<td color name="fenpei"><text><?= $userInfo['name'] ? $userInfo['name'] : '抢单模式'?></text><input type="hidden" name="fenpei" value="<?= $userInfo['name'] ? $userInfo['name'] : '抢单模式'?>"><s></s></td>
				<?php else : ?>
					<td color name="fenpei">等待抢单，无法修改！</td>
				<?php endif;?>
				</tr>
				<?php endif;?>
				<?php if(!empty($userInfo['name']) && getUserId($userInfo['name']) == session('uid')) : ?>
				<tr>
					<td><span>去验光阶段</span></td>
					<td color onclick="location.href='<?= U('yanguang/content' ,array('id' => $order['id']))?>'">去填写验光单<s></s></td>
				</tr>
				<?php endif;?>
				<tr>
					<td><span>验光人</span></td>
					<td color><?= $userInfo['name'] ? $userInfo['name'] : '未分配'?></td>
				</tr>
				<tr>
					<td><span>验光人电话</span></td>
					<td color><?= $userInfo['name'] ? $userInfo['phone'] : '未分配'?></td>
				</tr>
			</table>
		</div>
	</div>
		</form>

</header><!-- /header -->
<footer>
	<div id="all">
		<div class="line" name="school">
			<div class="header">
				<div class="keeback">
					<s></s>后退
				</div>	
				<div class="search">
					<span>
						<input type="text" name="" value="asdsad" placeholder="">
						<s></s>
					</span>
				</div>
			</div>
			<table>
			<?php if(!empty($school)) : ?>
				<?php foreach ($school as $value) : ?>
				<tr>
					<td <?= $value['name'] == $order['xuexiao'] ? 'click' : ''?> id="1">
						<span><?= $value['name']?></span>
						<s></s>
					</td>
				</tr>
			<?php endforeach?>
			<?php else : ?>
				<tr>
					<td>
					没有数据！
					</td>
				</tr>
			<?php endif?>
			</table>
		</div>
		<!-- 分配验光师 -->
		<div class="line" name="fenpei">
			<div class="header">
				<div class="keeback">
					<s></s>后退
				</div>	
			</div>
			<table>
				<tr>
					<td <?= empty($userInfo['name']) ? 'click' : ''?> id="auto">
						<span>抢单模式</span>
						<s></s>
					</td>
				</tr>
				<tr>
					<td id="auto">
						<span>自动分配</span>
						<s></s>
					</td>
				</tr>
				<tr>
					<td <?= getUserId($userInfo['name']) == session('uid') ? 'click' : ''?> id="self">
						<span>分配给自己</span>
						<s></s>
					</td>
				</tr>
			<?php foreach($yangaungList as $k => $v) : ?>
				<tr>
					<td <?= $v['uid'] == session('uid') || $v['name'] == $userInfo['name'] ? 'click' : ''?> id="<?= $v['uid']?>">
						<span><?= $v['name']?></span>
						<s></s>
					</td>
				</tr>
			<?php endforeach;?>
			</table>
		</div>

		<div class="line" name="sex">
			<div class="header">
				<div class="keeback">
					<s></s>后退
				</div>	
			</div>
			<table>
				<tr>
					<td <?= $order['sex'] == '男' ? 'click' : ''?> id="1">
						<span>男</span>
						<s></s>
					</td>
				</tr>

				<tr>
					<td <?= $order['sex'] == '女' ? 'click' : ''?> id="2">
						<span>女</span>
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
					<td <?= $order['stage'] >= 1 ? 'click' : ''?> id="1">
						<span>有效</span>
						<s></s>
					</td>
				</tr>

				<tr>
					<td <?= $order['stage'] <= 0 ? 'click' : ''?> id="2">
						<span>无效</span>
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

		<div class="line" name="fangshi">
			<div class="header">
				<div class="keeback">
					<s></s>后退
				</div>	
			</div>
			<table>
				<tr>
					<td <?= $make['methods'] == '上门验光' ? 'click' : ''?> id="1">
						<span>上门验光</span>
						<s></s>
					</td>
				</tr>

				<tr>
					<td <?= $make['methods'] == '云验光' ? 'click' : ''?> id="2">
						<span>云验光</span>
						<s></s>
					</td>
				</tr>
				<tr>
					<td <?= $make['methods'] == '自己上门' ? 'click' : ''?> id="3">
						<span>自己上门</span>
						<s></s>
					</td>
				</tr>
			</table>
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
<div id="note"  yanguangSuccess>
    <div class="alert">
        <div class="content">
            信息提示
            <br/>
            <br/>
            验光数据已更改,
            是否确认放弃修改
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
            ID = <?= $order['orderid']?>的回访单
            <br/>
            马上就会通知验光人员去验光啦
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
            您已经完成
            <br/>
            ID = <?= $order['orderid']?>的回访单
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