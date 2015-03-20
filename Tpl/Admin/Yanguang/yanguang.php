<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<title>验光任务</title>
		<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	    <meta name=apple-themes-web-app-capable content=yes>
	    <meta name=apple-themes-web-app-status-bar-style content=black>
	    <meta name=format-detection content=telephone=no>
	    <meta charset="utf-8">
	    <link rel="stylesheet/less" type="text/css" media="screen and (max-width: 960px)" href="<?= APP_STATIC?>/css/yanguang_min.less" />
	    <?= APP_JQUERY?>
	    <?= APP_LESS?>
	</head>
	<body>
		<div id="back" onclick="location.href = '<?= U('admin/index')?>'">返回</div>
		<table cellspacing="0" cellpadding="0">
			<tr>
				<td><span>ID</span></td>
				<td><span>验光时间</span></td>
				<!-- back箭头朝下 -->
				<!-- backTop箭头朝上 -->
				<td back><span>用户名</span></td>
				<!-- <td><span>验光方式</span></td> -->
				<td><span>状态</span></td>
			</tr>
			<?php if($data) : ?>
				<?php foreach ($data as $value) : ?>
			<tr onclick="location.href = '<?= U('yanguang/content',array('id'=>$value['id']),2)?>'">
				<td><?= $value['id']?></td>
				<td><?= $value['Time']?></td>
				<td><?= $value['name']?></td>
				<!-- <td><?= $value['methods']?></td> -->
				<!-- 加入color颜色变成Red -->
				<td <?= ($value['stage']) ? 'color' : ''?>><a href="javascript:;" title=""><?= ($value['stage']) ? '已完成' : '未完成'?></a></td>
			</tr>
				<?php endforeach ?>
			<?php else : ?>
			<tr>
				<td colspan="4">无数据!</td>
			</tr>
		<?php endif ?>
		</table>
	</body>
</html>