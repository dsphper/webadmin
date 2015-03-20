<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>库管验收</title>
	<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name=apple-themes-web-app-capable content=yes>
    <meta name=apple-themes-web-app-status-bar-style content=black>
    <meta name=format-detection content=telephone=no>
    <meta charset="utf-8">
    <link rel="stylesheet/less" type="text/css" media="screen and (max-width: 960px)" href="<?= APP_STATIC?>/css/kuguan_min.less" />
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
	<tr>
		<td>1</td>
		<td>北京大学</td>
		<td>2015/1/21</td>
		<!-- 加入color颜色变成Red -->
		<td color><a href="" title="">未完成</a></td>
	</tr>
	<tr>
		<td>1</td>
		<td>北京大学</td>
		<td>2015/1/21</td>
		<td><a href="" title="">已完成</a></td>
	</tr>
	<tr>
		<td>1</td>
		<td>北京大学</td>
		<td>2015/1/21</td>
		<td>已完成</td>
	</tr>
	<tr>
		<td>1</td>
		<td>北京大学</td>
		<td>2015/1/21</td>
		<td>已完成</td>
	</tr>
	<tr>
		<td>1</td>
		<td>北京大学</td>
		<td>2015/1/21</td>
		<td>已完成</td>
	</tr><tr>
		<td>1</td>
		<td>北京大学</td>
		<td>2015/1/21</td>
		<td>已完成</td>
	</tr>
	<tr>
		<td>1</td>
		<td>北京大学</td>
		<td>2015/1/21</td>
		<td>已完成</td>
	</tr>
</table>
</body>
</html>