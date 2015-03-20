<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>登录</title>
	<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name=apple-themes-web-app-capable content=yes>
    <meta name=apple-themes-web-app-status-bar-style content=black>
    <meta name=format-detection content=telephone=no>
    <meta charset="utf-8">
    <link rel="stylesheet/less" type="text/css" media="screen and (max-width: 1960px)" href="<?= APP_STATIC?>/css/login_min.less" />
    <?= APP_JQUERY?>
    <?= APP_LESS?>
    <script>
    var URL = "<?= U('login/ajax')?>";
    var OK_URL = "<?= U('admin/index')?>";
    </script>
    <script type="text/javascript" charset="utf-8" async defer src="<?= APP_STATIC?>/js/index.js"></script>
</head>
<body>
<header id="main">
	<div id="head">
		<logo></logo>
		<div class="title">云视野后台管理系统</div>
		<error style="display:none">
		账号或密码错误！
			<s id="triangle-down"></s>
		</error>
	</div>
	<form id="form" accept-charset="utf-8">
	<input type="hidden" name="token" value="<?= $_SESSION['token']?>" placeholder="">
		<div id="body">
			<div class="block">
			<d click></d>
				<input type="text" name="name" value="" placeholder="账户">
			</div>
			<div class="block">
			<d></d>
				<input type="password" name="pass" value="" placeholder="密码">
			</div>
			<div class="submit">
				<input type="button" value="登录">
			</div>
		</div>
	</form>
</header><!-- /header -->
</body>
</html>