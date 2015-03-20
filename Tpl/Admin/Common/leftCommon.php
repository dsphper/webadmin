<!-- 左侧导航区域 -->
        <nav>
            <div id="logo"></div>
            <ul>
                <li folding><a href="javascript:void(0);" title="">预约下单</a><s></s></li>
                <!-- 加入click选中 -->
                <li><a href="javascript:void(0);" title="">电话回访</a></li>
                <li><a href="javascript:void(0);" title="">验光任务</a></li>
                <li><a href="javascript:void(0);" title="">加工任务</a></li>
                <li><a href="javascript:void(0);" title="">库管验收任务</a></li>
                <li><a href="javascript:void(0);" title="">进货任务</a></li>
            </ul>
            <ul>
                <li folding><a href="javascript:void(0);" title="">数据统计</a><s></s></li>
                <!-- 加入click选中 -->
                <li <?php if($_GET['c'] == 'KehuInfo') echo 'click';?>><a href="javascript:void(0);" title="">客户信息统计</a></li>
                <li <?php if($_GET['c'] == 'XiaohuoInfo') echo 'click';?>><a href="javascript:void(0);" title="">销货总表</a></li>
                <li><a href="javascript:void(0);" title="">镜框进货单</a></li>
                <li><a href="javascript:void(0);" title="">镜框销货单</a></li>
                <li><a href="javascript:void(0);" title="">镜片进货单</a></li>
                <li><a href="javascript:void(0);" title="">镜片销货单</a></li>
                <li><a href="javascript:void(0);" title="">其他进货单</a></li>
                <li><a href="javascript:void(0);" title="">其他销货单</a></li>
            </ul>
            <ul>
                <li folding><a href="javascript:void(0);" title="">系统后台管理</a><s></s></li>
                <!-- 加入click选中 -->
                <li><a href="javascript:void(0);" title="">后台权限表</a></li>
                <li><a href="javascript:void(0);" title="">学校分配表</a></li>
                <li><a href="javascript:void(0);" title="">验光师表单</a></li>
                <li><a href="javascript:void(0);" title="">加工&库管表</a></li>
            </ul>
        </nav>