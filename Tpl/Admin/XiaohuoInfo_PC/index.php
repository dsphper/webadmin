<!DOCTYPE html>
<html>
<head>
    <title>统计</title>
    <meta charset="utf-8">
    <link rel="stylesheet/less" type="text/css" href="<?= APP_STATIC?>/css/index.less" />
    <?= APP_JQUERY?>
    <?= APP_LESS?>
    <?= APP_SCRIPT_DEFINE?>
    <script>
    APP_URL = "<?= U('XiaohuoInfo/ajaxSearch') ?>";
    </script>
    <style type="text/css" media="screen">
        .xdsoft_datetimepicker{
            box-shadow: 0px 5px 15px -5px rgba(0, 0, 0, 0.506);
            background: #FFFFFF;
            border-bottom: 1px solid #BBBBBB;
            border-left: 1px solid #CCCCCC;
            border-right: 1px solid #CCCCCC;
            border-top: 1px solid #CCCCCC;
            color: #333333;
            display: block;
            font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
            padding: 8px;
            padding-left: 0px;
            padding-top: 2px;
            position: absolute;
            z-index: 9999;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            display:none;
        }

        .xdsoft_datetimepicker iframe {
            position: absolute;
            left: 0;
            top: 0;
            width: 75px;
            height: 210px;
            background: transparent;
            border:none;
        }
        /*For IE8 or lower*/
        .xdsoft_datetimepicker button {
            border:none !important;
        }

        .xdsoft_noselect{
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }
        .xdsoft_noselect::selection { background: transparent; }
        .xdsoft_noselect::-moz-selection { background: transparent; }
        .xdsoft_datetimepicker.xdsoft_inline{
            display: inline-block;
            position: static;
            box-shadow: none;
        }
        .xdsoft_datetimepicker *{
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding:0px;
            margin:0px;
        }
        .xdsoft_datetimepicker .xdsoft_datepicker, .xdsoft_datetimepicker  .xdsoft_timepicker{
            display:none;
        }
        .xdsoft_datetimepicker .xdsoft_datepicker.active, .xdsoft_datetimepicker  .xdsoft_timepicker.active{
            display:block;
        }
        .xdsoft_datetimepicker .xdsoft_datepicker{
            width: 224px;
            float:left;
            margin-left:8px;
        }
        .xdsoft_datetimepicker  .xdsoft_timepicker{
            width: 58px;
            float:left;
            text-align:center;
            margin-left:8px;
            margin-top:0px;
        }
        .xdsoft_datetimepicker  .xdsoft_datepicker.active+.xdsoft_timepicker{
            margin-top:8px;
            margin-bottom:3px
        }
        .xdsoft_datetimepicker  .xdsoft_mounthpicker{
            position: relative;
            text-align: center;
        }

        .xdsoft_datetimepicker  .xdsoft_prev, .xdsoft_datetimepicker  .xdsoft_next,.xdsoft_datetimepicker  .xdsoft_today_button{
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAAAeCAYAAACsYQl4AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDozQjRCQjRGREU4MkNFMzExQjRDQkIyRDJDOTdBRUI1MCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCQjg0OUYyNTZDODAxMUUzQjMwM0IwMERBNUU0ODQ5NSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCQjg0OUYyNDZDODAxMUUzQjMwM0IwMERBNUU0ODQ5NSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkI5NzE3MjFBN0E2Q0UzMTFBQjJEQjgzMDk5RTNBNTdBIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjNCNEJCNEZERTgyQ0UzMTFCNENCQjJEMkM5N0FFQjUwIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+aQvATgAAAfVJREFUeNrsmr1OwzAQxzGtkPjYEAuvVGAvfQIGRKADE49gdLwDDwBiZ2RhQUKwICQkWLsgFiRQuIBTucFJ/XFp4+hO+quqnZ4uvzj2nV2RpukCW/22yAgYNINmc7du7DcghCjrkqgOKjF1znpt6rZ0AGWQj7TvCU8d9UM+QAGDrhdyc2Bnc1WVVPBev9V8lBnY+rDwncWZThG4xk4lmxtJy2AHgoY/FySgbSBPwPZ8mEXbQx3aDERb0EbYAYFC7pcAtAvkMWwC0D3NX58S9D/YnoGC7nPWr3Dg9JTbtuHhDShBT8D2CBSK/iIEvVXxpuxSgh7DdgwUTL4iA92zmJb6lKB/YTsECmV+IgK947AGDIqgQ/LojsO135Hn51l2cWlov0JdGNrPUceueXRwilSVgkUyom9Rd6gbLfYTDeO+1v6orn0InTogYDGUkYLO3/wc9BdqqTCKP1Tfi+oTIaCBIL2TES+GTyruT9S61p6BHam+99DFEAgLFklYsIBHwSI9QY80H5ta+1rB/6ovaKihBJeEJbgLbBlQgl+j3lDPqA2tfQV1j3pVn8s+oKHGTSVJ+FqDLeR5bCqJ2E/BCycsoLZETXaKGs7rhKVt+9HZScrZNMi88V8P7LlDbvOZYaJVpMMmBCT4n0o8dTBoNgbdWPsRYACs3r7XyNfbnAAAAABJRU5ErkJggg==');
        }
        .xdsoft_datetimepicker  .xdsoft_prev{
            float: left;
            background-position:-20px 0px;
        }
        .xdsoft_datetimepicker  .xdsoft_today_button{
            float: left;
            background-position:-70px 0px;
            margin-left:5px;
        }

        .xdsoft_datetimepicker  .xdsoft_next{
            float: right;
            background-position:0px 0px;
        }
        .xdsoft_datetimepicker  .xdsoft_next:active,.xdsoft_datetimepicker  .xdsoft_prev:active{
        }
        .xdsoft_datetimepicker  .xdsoft_next,.xdsoft_datetimepicker  .xdsoft_prev ,.xdsoft_datetimepicker  .xdsoft_today_button{
            background-color: transparent;
            background-repeat: no-repeat;
            border: 0px none currentColor;
            cursor: pointer;
            display: block;
            height: 30px;
            opacity: 0.5;
            outline: medium none currentColor;
            overflow: hidden;
            padding: 0px;
            position: relative;
            text-indent: 100%;
            white-space: nowrap;
            width: 20px;
        }
        .xdsoft_datetimepicker  .xdsoft_timepicker .xdsoft_prev,
        .xdsoft_datetimepicker  .xdsoft_timepicker .xdsoft_next{
            float:none;
            background-position:-40px -15px;
            height: 15px;
            width: 30px;
            display: block;
            margin-left:14px;
            margin-top:7px;
        }
        .xdsoft_datetimepicker  .xdsoft_timepicker .xdsoft_prev{
            background-position:-40px 0px;
            margin-bottom:7px;
            margin-top:0px;
        }
        .xdsoft_datetimepicker  .xdsoft_timepicker .xdsoft_time_box{
            height:151px;
            overflow:hidden;
            border-bottom:1px solid #DDDDDD;
        }
        .xdsoft_datetimepicker  .xdsoft_timepicker .xdsoft_time_box >div >div{
            background: #F5F5F5;
            border-top:1px solid #DDDDDD;
            color: #666666;
            font-size: 12px;
            text-align: center;
            border-collapse:collapse;
            cursor:pointer;
            border-bottom-width:0px;
            height:25px;
            line-height:25px;
        }

        .xdsoft_datetimepicker  .xdsoft_timepicker .xdsoft_time_box >div > div:first-child{
         border-top-width:0px;
        }
        .xdsoft_datetimepicker  .xdsoft_today_button:hover,
        .xdsoft_datetimepicker  .xdsoft_next:hover,
        .xdsoft_datetimepicker  .xdsoft_prev:hover {
            opacity: 1;
        }
        .xdsoft_datetimepicker  .xdsoft_label{
            display: inline;
            position: relative;
            z-index: 9999;
            margin: 0;
            padding: 5px 3px;
            font-size: 14px;
            line-height: 20px;
            font-weight: bold;
            background-color: #fff;
            float:left;
            width:182px;
            text-align:center;
            cursor:pointer;
        }
        .xdsoft_datetimepicker  .xdsoft_label:hover{
            text-decoration:underline;
        }
        .xdsoft_datetimepicker  .xdsoft_label > .xdsoft_select{
            border:1px solid #ccc;
            position:absolute;
            display:block;
            right:0px;
            top:30px;
            z-index:101;
            display:none;
            background:#fff;
            max-height:160px;
            overflow-y:hidden;
        }
        .xdsoft_datetimepicker  .xdsoft_label > .xdsoft_select.xdsoft_monthselect{right:-7px;}
        .xdsoft_datetimepicker  .xdsoft_label > .xdsoft_select.xdsoft_yearselect{right:2px;}
        .xdsoft_datetimepicker  .xdsoft_label > .xdsoft_select > div > .xdsoft_option:hover{
            color: #fff;
            background: #ff8000;
        }
        .xdsoft_datetimepicker  .xdsoft_label > .xdsoft_select > div > .xdsoft_option{
            padding:2px 10px 2px 5px; 
        }
        .xdsoft_datetimepicker  .xdsoft_label > .xdsoft_select > div > .xdsoft_option.xdsoft_current{
            background: #33AAFF;
            box-shadow: #178FE5 0px 1px 3px 0px inset;
            color:#fff;
            font-weight: 700;
        }
        .xdsoft_datetimepicker  .xdsoft_month{
            width:90px;
            text-align:right;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar{
            clear:both;
        }
        .xdsoft_datetimepicker  .xdsoft_year{
            width:56px;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar table{
            border-collapse:collapse;
            width:100%;
            
        }
        .xdsoft_datetimepicker  .xdsoft_calendar td > div{
            padding-right:5px;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar th{
            height: 25px;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar td,.xdsoft_datetimepicker  .xdsoft_calendar th{
            width:14.2857142%;
            text-align:center;
            background: #F5F5F5;
            border:1px solid #DDDDDD;
            color: #666666;
            font-size: 12px;
            text-align: right;
            padding:0px;
            border-collapse:collapse;
            cursor:pointer;
            height: 25px;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar th{
            background: #F1F1F1;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar td.xdsoft_today{
            color:#33AAFF;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar td.xdsoft_default,
        .xdsoft_datetimepicker  .xdsoft_calendar td.xdsoft_current,
        .xdsoft_datetimepicker  .xdsoft_timepicker .xdsoft_time_box >div >div.xdsoft_current{
            background: #33AAFF;
            box-shadow: #178FE5 0px 1px 3px 0px inset;
            color:#fff;
            font-weight: 700;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar td.xdsoft_other_month,
        .xdsoft_datetimepicker  .xdsoft_calendar td.xdsoft_disabled,
        .xdsoft_datetimepicker  .xdsoft_time_box >div >div.xdsoft_disabled{
            opacity:0.5;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar td.xdsoft_other_month.xdsoft_disabled{
            opacity:0.2;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar td:hover,
        .xdsoft_datetimepicker  .xdsoft_timepicker .xdsoft_time_box >div >div:hover{
            color: #fff !important;
            background: #ff8000 !important;
            box-shadow: none !important;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar td.xdsoft_disabled:hover,
        .xdsoft_datetimepicker  .xdsoft_timepicker .xdsoft_time_box >div >div.xdsoft_disabled:hover{
            color: inherit  !important;
            background: inherit !important;
            box-shadow: inherit !important;
        }
        .xdsoft_datetimepicker  .xdsoft_calendar th{
            font-weight: 700;
            text-align: center;
            color: #999;
            cursor:default;
        }
        .xdsoft_datetimepicker  .xdsoft_copyright{ color:#ccc !important; font-size:10px;clear:both;float:none;margin-left:8px;}
        .xdsoft_datetimepicker  .xdsoft_copyright a{ color:#eee !important;}
        .xdsoft_datetimepicker  .xdsoft_copyright a:hover{ color:#aaa !important;}


        .xdsoft_time_box{
            position:relative;
            border:1px solid #ccc;
        }
        .xdsoft_scrollbar >.xdsoft_scroller{
            background:#ccc !important;
            height:20px;
            border-radius:3px;
        }
        .xdsoft_scrollbar{
            position:absolute;
            width:7px;
            width:7px;
            right:0px;
            top:0px;
            bottom:0px;
            cursor:pointer;
        }
        .xdsoft_scroller_box{
        position:relative;
        }
    </style>
</head>
<body>
<!-- 外围大div -->
    <div id="BigBox">
    <?php loadCommonTpl('left');?>
        <!-- 右侧内容区域 -->
        <div id="rihgtBox">
        <!-- 用户信息 -->
            <div class="UserHeader">
                <div id="infoLeft">
                    <div id="userImg">
                    </div>
                    <div id="userInfo">
                        <?= $userInfo['email']?>
                        数据统计人员
                    </div>
                
                </div>
                <div id="outLogin" onclick="location.href='<?= U('admin/outLogin')?>'">
                    退出登录
                </div>
            </div>
            <div id="search">
                <div class="input">
                    <div id="selectMenu"><content>预约下单任务</content><input type="hidden" name="yuyueType" value=""><span><s></s></span></div>
                    <ul>
                        <li>预约下单任务</li>
                        <li>预约下单任务s</li>
                    </ul>
                </div>  
                <form action="" name="search" method="get" accept-charset="utf-8">
                    
                <div class="input">
                    <input type="text" name="keyWords" value="" placeholder="  输入要查询的服务号\内容">
                </div> 
                <text>从</text>
                <div class="input">
                    <div id="selectMenu"><input type="text" name="startTime" value="" placeholder="" class="time"><span><s></s></span></div>
                </div> 
                <text>到</text>
                <div class="input">
                    <div id="selectMenu"><input type="text" name="endTime" value="" placeholder="" class="time"><span><s></s></span></div>
                </div>
                </form>
                <div class="input floatLeft">
                    <div search>
                        搜索
                    </div>
                </div>
            </div>
            <div id="navList">
                <span>数据统计\镜框进货单</span>
                <span>导出表格</span>
            </div>



            <div id="loading">
<div class='loader loader--spinningDisc'></div>
                
            </div>
            <div id="tableList">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><input type="checkbox" name="" value="" id="allSelect"></td>
                        <td>预约ID</td>
                        <td lastGroup>完成此单时间</td>

                        
                        <!-- <td>镜架进货单价1</td> -->
                        <!-- <td>销售单价1</td> -->
                        <td>镜架数量</td>

                        <td>押金</td>
                        <td>销货总金额</td>
                        <td>镜盒成本</td>
                        <td>镜盒材质</td>
                        <td>镜盒数量</td>
                        <td>镜片类型</td>
                        <td>镜片及加工成本</td>
                        <td>利润</td>
                        <td>验光方式</td>
                        <td>支付方式</td>
                        <td>发货方式</td>
                        <!-- <td>快递号</td> -->
                        <td>客户名</td>
                        <!-- <td>发货地址</td> -->
                        <td>推荐人</td>
                        <td>回访人员</td>
                        <td>回访人备注</td>
                        <!-- <td>回访人提成</td> -->
                        <td>验光人员</td>
                        <td>验光人备注</td>
                        <!-- <td>验光人提成</td> -->
                        <td>加工人员</td>
                        <td>加工人备注</td>
                        <!-- <td>库管验收人</td> -->
                        <!-- <td>库管备注</td> -->
                        <!-- <td>库管提成</td> -->
                        <!-- <td>送货人</td> -->
                        <!-- <td>送货人备注</td> -->
                        <!-- <td>送货提成</td> -->
                    </tr>
                    
                </table>
            </div>
            <div id="paging">

            </div>
        </div>

    </div>
    <script type="text/javascript" charset="utf-8" async defer src="<?= APP_STATIC?>/js/index.js"></script>

</body>
</html>