<!DOCTYPE html>
<html lang="en">
    <head>
    <title>管理后台</title>
        <meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name=apple-themes-web-app-capable content=yes>
        <meta name=apple-themes-web-app-status-bar-style content=black>
        <meta name=format-detection content=telephone=no>
        <meta charset="utf-8">
        <link rel="stylesheet/less" type="text/css" media="screen and (max-width: 960px)" href="<?= APP_STATIC?>/css/admin_min.less" />
        <?= APP_JQUERY?>
        <?= APP_LESS?>
        <style type="text/css">

        </style>
    </head>
    <!--[if IE]> 
		<script type="text/javascript">
		document.wirte = '大哥换个其他浏览器试试？';
		</script>
    <![endif]--> 
    <body>
    <header>
    <!-- 头部背景 -->
    	<div id="back">
        <div class="login-out">
            <s></s>
            <a href="#" onclick="location.href='<?= U('admin/admin/outLogin')?>'">退出</a>
        </div>
        <div class="user-info">
            <img src="<?= APP_STATIC?>/images/avatar_2535_b.jpg">
        </div>
        <div class="user-name"><?= $userInfo['name']?><br/><?= $userInfo['email']?></div>
        <div class="lists">
            <ul>
                <li>
                    <?= empty($listData['0']['allNum']) ? '0' : $listData['0']['allNum']?>
                    <span>
                        进行中
                    </span>
                </li>
                <li class="border">
                    <?= empty($listData['1']['allNum']) ? '0' : $listData['1']['allNum']?>
                    <span>
                        已完成
                    </span>
                    </li>
                <li>
                    99999
                    <span>
                        本月佣金
                    </span>
                    </li>
            </ul>
        </div>
        <div style="height:35px"></div>
            <!-- 黑色透明部分 -->
    		<div class="tran">
                <?php switch($userInfo['type']){
                    case '管理' :
                        $type = '管理员';
                        break;
                    case '验光' :
                        $type = '验光师';
                        break;
                    case '加工' :
                        $type = '加工人员';
                        break;
                    case '回访' :
                        $type = '回访人员';
                        break;
                    case '库管' :
                        $type = '库管人员';
                        break;
                    case '送货' :
                        $type = '送货人员';
                        break;
                    case '财务' :
                        $type = '会计';
                        break;
                }
                ?>
                <span><?= $type;?></span>
                <s></s>
            </div>
    	</div>
    </header>
    <aside>
    <!-- 功能模块部分 -->
        <div id="functional-module">
            <div class="line">

                <div class="list color" onclick="location.href='<?= U('phone/index')?>'" style="<?php if(!in_array('回访',session('menuName'))) echo 'display:none'?>"><a><span>电话回访</span></a></div>
                <div class="list color" onclick="location.href='<?= U('yanguang/index')?>'" style="<?php if(!in_array('验光',session('menuName'))) echo 'display:none'?>"><a><span>验光任务</span></a></div>
                <div class="list color" onclick="location.href='<?= U('jiagong/index')?>'" style="<?php if(!in_array('加工',session('menuName'))) echo 'display:none'?>"><a><span>加工任务</span></a></div>
            </div>
            <div class="line">
                <div class="list color2" onclick="location.href='<?= U('kuguan/index')?>'" style="<?php if(!in_array('库管',session('menuName'))) echo 'display:none'?>"><a><span>库管验收任务</span></a></div>
                <div class="list color2" onclick="location.href='<?= U('yanguang/qiangdan')?>'" style="<?php if(!in_array('验光',session('menuName')) || count(session('menuName')) > 1) echo 'display:none'?>"><a><span>抢单</span></a></div>
                <div class="list color2" onclick="location.href='<?= U('songhuo/index')?>'" style="<?php if(!in_array('送货',session('menuName'))) echo 'display:none'?>"><a><span>送货任务</span></a></div>
                <div class="list color2" onclick="location.href='<?= U('caiwu/index')?>'" style="<?php if(!in_array('财务',session('menuName'))) echo 'display:none'?>"><a><span>财务收款任务</span></a></div>
            </div>
        </div>
    </aside>
    <footer>
    	<!-- <div style="width:100%">ssadasddd</div> -->
    </footer>
    </body>
</html>