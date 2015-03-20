<!DOCTYPE html>
<html lang="en">
<head>
    <meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name=apple-themes-web-app-capable content=yes>
    <meta name=apple-themes-web-app-status-bar-style content=black>
    <meta name=format-detection content=telephone=no>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta charset="utf-8">
    <title>留下联系方式，体验上门验光</title>
    <link rel="stylesheet/less" type="text/css" media="screen and (max-width: 580px)" href="<?= APP_STATIC?>/css/index_min.less" />
    <link rel="stylesheet/less" type="text/css" media="screen and (min-width: 580px)" href="<?= APP_STATIC?>/css/index_max.less" />
    <?= APP_JQUERY?>
    <?= APP_LESS?>
    <?= APP_SCRIPT_DEFINE?>
    <script type="text/javascript">
        var AJAX_URL = "<?= U('index/form/ajax')?>";
    </script>
    <script type="text/javascript" src="<?= APP_STATIC?>/js/form.js"></script>
</head>
<body>
    <div id="warp">
        <div class="topBack">
            <text>留下联系方式，体验上门验光</text>
        </div>
        <div class="desc">
            <ul>
                <li>配镜流程：</li>
                <li>1、在这里留下联系方式；</li>
                <li>2、工作人员在约定的时间上宿舍验光，现场帮你挑选镜架款式和镜片；</li>
                <li>3、三个工作日内，眼镜送上门，货到付款；</li>
                <li>有任何问题，建议直接向联系你的工作人员反馈，或在“云视野”微信号（yshiye)留言；</li>
            </ul>
        </div>
        <form action="" method="POST" name="form">
            <ul class="from">
                <li class="error">
                    <div>
                        姓名不能为空！
                        <i></i>
                    </div>
                </li>
                <li class="line">
                    <div class="input">
                        <span class="text">
                            姓名 <b>*</b>
                        </span>
                        <input type="text" name="name" class="Input"></div>
                </li>
                <li class="error">
                    <div>
                    </div>
                </li>
                <li class="line">
                    <div class="input">
                        <span class="text">
                            微信号
                        </span>
                        <input type="text" name="weixin" class="Input"></div>
                </li>
                <li class="error">
                    <div>
                        手机号码不能为空！
                        <i></i>
                    </div>
                </li>
                <li class="line">
                    <div class="input">
                        <span class="text">
                            手机号码
                            <b>*</b>
                        </span>
                        <input type="text" name="phone" class="Input"></div>
                </li>
                <li class="error">
                    <div>
                        性别必选！
                        <i></i>
                    </div>
                </li>
                <li class="line" style="border:#FFEF3D">
                    <div class="input">
                    <span class="text">
                            性别
                            <b>*</b>
                        </span>
                        <line style="margin-right:40px">
                            <input type="radio" name="sex" value="男" placeholder="">男
                        </line>
                        <line>
                            <input type="radio" name="sex" value="女" placeholder="">女
                        </line>
                    </div>
                </li>
                <li class="error">
                    <div>
                        请选择学校！
                        <i></i>
                    </div>
                </li>
                <li class="line" style="overflow:visible">
                    <div class="input select">
                        <span class="text">
                            学校
                            <b>*</b>
                            <span id="xuexiao">请选择学校</span>
                            <input type="hidden" name="xuexiao" class="Input"></span>
                        <span class="sanjiao"></span>

                    </div>
                    <ul id="select" style="display:none">
                        <?php foreach ($school as $key =>$value) : ?>
                        <li <?= $value['name'] == '我想去你们公司配镜' ? 'style="height:auto;line-height:28px"' : ''?>><span><?= $value['name']?></span><?= $value['name'] == '我想去你们公司配镜' ? '<br/>&nbsp;(每天10:00-21:00,验光师在公司等你)' : ''?></li>
                        <?php endforeach?>
                    </ul>
                </li>
                <li class="error">
                    <div>
                        请选择学校！&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <i></i>
                    </div>
                </li>
                <li class="line">
                    <div class="input">
                        <span class="text">
                            推荐人
                        </span>
                        <input type="text" name="referees" class="Input" placeholder="有朋友推荐你来吗? ta是谁?"></div>
                </li>
                
               <li class="error errorAll">
                    <div>
                        信息填写不完整！
                        <i></i>
                    </div>
                </li>
                <li class="line" style="border:#FFEF3D">
                    <div class="input">
                        <input type="submit" class="submit" name="xuexiao" value="预约" style="background:#4C9ADA;color:#FFF"></div>
                </li>
                <li class="error" style="height:20px"></li>
                <li class="line" id="desc" style="border:#FFEF3D;font-size:14px;height:auto;font-family:微软雅黑;margin-bottom:20px;color:#4B9ADC">
                    云视野（北京）科技有限公司 <br><br>

                    地址：北京市海淀区中关村公馆A座1805（地铁4号线、10号线海淀黄庄站A出口）<br><br>

                    电话：010-57461400／57461401
                    <script>
                    $(function(){
                        var desc = document.getElementById('desc');
                        var dWidth = desc.offsetWidth - 2;
                        var url = "http://api.map.baidu.com/mapCard/finish.html?location=%E5%8C%97%E4%BA%AC%E5%B8%82%7C%E6%B5%B7%E6%B7%80%E5%8C%BA%7C%7C%E4%B8%AD%E5%85%B3%E6%9D%91%E5%85%AC%E9%A6%86A%E5%BA%A7&information=%E4%B8%AD%E5%85%B3%E6%9D%91%E5%85%AC%E9%A6%86%7C%7C%7C%7C&point=[116.318292,39.983532]&width=" + dWidth + "&height=360&basicInformation=false&route=false&searchBox=true&zoom=18";
                        var iFrame = document.getElementById('iframe');
                        iFrame.src = url;
                    })
                        
                    </script>
                    <iframe id="iframe" width="100%" height="540" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="" style="margin-top:20px"></iframe>
                </li>
            </ul>
        </form>
    </div>
<div id="note"  success>
    <div class="alert">
        <div class="content">
             预约成功
            <br/>
<span style="font-size:14px">
「云视野-服务生-<name>XX</name>」会为您提供配镜服务 <br>
TA的服务热线：<phone></phone><br>
（配镜预约号为 <orderid></orderid>）<br></span>
            <button>确认</button>
        </div>
    </div>
    <div class="back jsAutoHeight"></div>
</div>
<div id="note" error>
    <div class="alert">
        <div class="content">
            预约失败
            <br/>
            <br/>
            请检查您的网络连接是否正常？
            <br/>
            <button>确认</button>
            <br/>

        </div>
    </div>
    <div class="back"></div>
</div>
</body>
</html>