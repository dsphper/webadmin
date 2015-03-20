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
    <link rel="stylesheet/less" type="text/css" media="screen and (max-width: 960px)" href="<?= APP_STATIC?>/css/phone_min.less" />
    <?= APP_JQUERY?>
    <?= APP_LESS?>
</head>
<body>
<div id="back" onclick="location.href = '<?= U('admin/index')?>'">返回</div>
<table cellspacing="0" cellpadding="0">
	<tr>
		<td><span>ID</span></td>
		<td><span>学校</span></td>
		<!-- back箭头朝下 -->
		<!-- backTop箭头朝上 -->
		<td back><span>用户名</span></td>
		<td><span>状态</span></td>
	</tr>
	<?php if(!empty($data)) : ?>
        <?php $i = 0;?>
	<?php foreach ($data as $val) : ?>
	<tr onclick="location.href = '<?= U('phone/content',array('id'=>$val['id']),2)?>'">
		<td><?= $val['id']?></td>
		<!-- <td><?= ++$i?></td> -->
		<td><?= $val['xuexiao']?></td>
		<!-- <td><?= date('Y/m/d',$val['time'])?></td> -->
		<td><?= $val['name']?></td>
		<!-- 加入color颜色变成Red -->
		<td <?= ($val['stage']) ? 'color' : ''?>><a href="javascript:;" title="">
		<?php switch ($val['stage']) {
			case 1:
				$str = '已验证';
				break;
			
			default:
				$str = '未验证';
				break;
		}
		echo $str;
		?>
		</a></td>
		
	</tr>
	<?php endforeach?>
	<?php else :  ?>
	<tr>
		<td>没有数据！</td>
	</tr>
	<?php endif ?>
</table>
</body>
</html>