<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>后台</title>
    </head>
    <?php echo APP_JQUERY?>
    <?php echo APP_BOOTSTRAP?>
    <?php echo APP_SCRIPT_DEFINE?>
    <body>
    <style type="text/css">
    </style>
    <div class="table-responsive">
    	
	    <table border="1" class="table table-hover" style="text-align:center;line-height:51px;">
	    	<tr>
	    		<td>预约号</td>
	    		<td>预约来源</td>
	    		<td>所属阶段</td>
	    		<td>预约日期（筛选）</td>
	    		<td>姓名</td>
	    		<td>学校</td>
	    		<td>微信号</td>
	    		<td>手机</td>
	    		<td>性别</td>
	    		<td>验光者（分配）</td>
	    		<td>备注</td>
	    		<td>操作</td>
	    	</tr>
	    	<?php foreach ($arr as $key => $value) :?>
	    	<tr>
	    		<td><?php echo $value['orderid']?></td>
	    		<td><?php echo !$value['is_pc'] ? '微信' : 'PC';?></td>
	    		<td>
	    		<?php
	    		$note = '';
	    		switch ($value['stage']) {
	    		 	case '0':
	    		 	$note = '等待分配验光师';
	    		 		break;
	    		 	case '1':
	    		 	$note = '已分配验光师';
	    		 		break;
	    		 	case '2':
	    		 	$note = '等待验光选镜';
	    		 		break;
	    		 	case '3':
	    		 	$note = '等待用户付款';
	    		 		break;
	    		 	case '4':
	    		 	$note = '等待制作';
	    		 		break;
	    		 	case '5':
	    		 	$note = '正在配送';
	    		 		break;
	    		 	case '6':
	    		 	$note = '交易完成';
	    		 		break;
	    		 } 
	    		 echo $note;
	    		?>
	    		</td>
	    		<td><?php echo date('Y-m-d H:i:s',$value['time'])?></td>
	    		<td><?php echo $value['name']?></td>
	    		<td><?php echo $value['xuexiao']?></td>
	    		<td><?php echo $value['weixin']?></td>
	    		<td><?php echo $value['phone']?></td>
	    		<td><?php echo $value['sex']?></td>
	    		<td><?php echo !$value['optometrist'] ? '未分配' : $value['optometrist']?></td>
	    		<td><textarea class="form-control" rows="1"><?php echo !$value['note'] ? '无' : $value['note']?></textarea></td>
	    		<td><button type="button" orderid="<?php echo $value['orderid']?>" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm" name="modify">操作</button>
				</td>
	    	</tr>
	    <?php endforeach;?>  
	    </table>
    </div>
   <!-- Small modal -->
<script type="text/javascript" src="<?php echo APP_STATIC;?>/admin/js/admin.js"></script>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <form>
    	
	    <table class="table table-striped">
	  		<tr>
	  			<td>分配验光师</td>
	  			<td><div class="dropdown">
				  <button class="btn btn-default dropdown-toggle" style="width:108px" type="button" id="dropdownMenu1" data-toggle="dropdown">
				    选择验光师
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">小A</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">小B</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">小C</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">小D</a></li>
				  </ul>
				  <input type="hidden" name="optometrist">
				  <input type="hidden" name="orderid">
				</div>
				</td>
	  		</tr>
	  		<tr>
	  			<td>是否邮件通知</td>
	  			<td>
		  			<div class="switch">
	    				<input type="checkbox" checked name="is_email" />
					</div>
				</td>
	  		</tr>
	  	</table>
    </form>
        <button type="button" class="btn btn-primary" id="submit">提交修改</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right">放弃修改</button>
    </div>
      
  </div>
</div>
    </body>
</html>