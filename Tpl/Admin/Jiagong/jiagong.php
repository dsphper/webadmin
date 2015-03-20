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
    <link rel="stylesheet/less" type="text/css" media="screen and (max-width: 960px)" href="<?= APP_STATIC?>/css/jiagong_min.less" />
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
		<td back><span>交货时间</span></td>
		<td><span>状态</span></td>
	</tr>
	<?php if(!empty($data)) : ?>

	<?php $i = 0?>
	<?php foreach ($data as $key => $value) : ?>
	<tr onclick="location.href = '<?= U('admin/jiagong/content' , array('id' => $value['id']))?>'">
		<!-- <td><?= ++$i?></td> -->
		<td><?= $value['id']?></td>
		<td><?= $value['xuexiao']?></td>
		<td><?= date('Y/m/d' , $value['songhuotime'])?></td>
		<!-- 加入color颜色变成Red -->
		<td <?= $value['stage'] ? 'color' : '' ?>><a href="<?= U('admin/jiagong/content' , array('id' => $value['id']))?>" title=""><?= $value['stage'] ? '已完成' : '未完成' ?></a></td>
	</tr>
<?php endforeach;?>

	<?php else :  ?>
	<tr>
		<td>没有数据！</td>
	</tr>
	<?php endif ?>
</table>
</body>
</html>