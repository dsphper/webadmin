<!DOCTYPE html>
<html>
<head>
    <title>登录</title>
    <meta charset="utf-8">
    <link rel="stylesheet/less" type="text/css" href="<?php echo APP_STATIC?>/css/index.less" />
    <?php echo APP_JQUERY?>
    <?php echo APP_LESS?>
    <script>
    var URL = "<?php echo U('login/ajax')?>";
    var OK_URL = "<?php echo U('admin/index')?>";
    </script>
    <script type="text/javascript" charset="utf-8" async defer src="<?php echo APP_STATIC?>/js/index.js"></script>
</head>
<body>
<header id="header">
	<div id="logo"></div>
	<div id="box">
		<div id="title">
			云视野后台管理系统
		</div>
		<form method="post" accept-charset="utf-8">
		<input type="hidden" name="token" value="<?php echo $_SESSION['token']?>" placeholder="">
			<div id="formBox">
				<div class="error">
					账户或密码错误，请重新输入！
					
				</div>
				<div class="line">
				<span>
					用户名：
				</span>
					<input type="text" name="name" value="" placeholder="请输入用户名">
				</div>
				<div class="line">
				<span>
					密码：
				</span>
					<input type="password" name="pass" value="" placeholder="请输入密码">
				</div>
				<div class="line">
					<button>登录</button>
				</div>
			</div>
		</form>
	</div>
</header><!-- /header -->
</body>
</html>