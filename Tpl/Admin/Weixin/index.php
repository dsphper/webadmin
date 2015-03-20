<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">

    <?php echo APP_JQUERY?>
    <script>
        alert(new dsphper().unixtime());

        wx.config({
            debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId: 'wxb74636c8f504eb3d', // 必填，公众号的唯一标识
            timestamp: new dsphper().unixtime(), // 必填，生成签名的时间戳
            nonceStr: new dsphper().createStr(), // 必填，生成签名的随机串
            signature: '',// 必填，签名，见附录1
            jsApiList: [] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });
        function dsphper()
        {
            this.name = '213213';
            this.unixtime = function ()
            {
                var dt = new Date();
                var ux = Date.UTC(dt.getFullYear(),dt.getMonth(),dt.getDay(),dt.getHours(),dt.getMinutes(),dt.getSeconds())/1000;
                return ux;
            }
            this.createStr = function()
            {
                var str = 'qwertyuiopasdfghjklzxcvbnm';
                var res = '';
                for(var i = 0;i < 10;i++)
                {
                    res += str[Math.ceil(Math.random()*str.length - 1)];
                }
                return res;
            }

        }
    </script>
</head>
<body>
<ul>
    <li>1</li>
    <li>2</li>
    <li>3</li>
    <li>4</li>
    <li>5</li>
</ul>
</body>
</html>