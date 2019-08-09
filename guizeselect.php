<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<style type="text/css">
	body{
		background: url(image/6.jpg);
		background-size:contain;
		width: 100%;
		height: 100%;
	}
	h2{
		margin-bottom: 50px;
	}
	.form-group{
		margin-top: 40px;
	}
		.foot{
		text-align: center;
		margin-top: 20px;
		background: #999999;
		color: white;
	}
</style>
<?php
include "localhost.php";

date_default_timezone_set('PRC');
$time=time(); //当前时间

$select="select * from xinxi";
$result=mysqli_query($conn,$select) or die("失败！原因是：".mysqli_error($conn));

$select1="select * from guize";
$result1=mysqli_query($conn,$select1) or die("失败！原因是：".mysqli_error($conn));
$arr=mysqli_fetch_array($result1);

$day=$arr['shijian'];
$zero1=$arr['zero'];

$jiezhi=$zero1+($day*86400);//60s*60min*24h

$a=($jiezhi-$time)/3600;

$xiaoshi=floor(($jiezhi-$time)/3600);//小时取整

$fenzhong= round(((($jiezhi-$time)/3600)-$xiaoshi)*60);

?>

<body>
	

<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<p>当前位置：<a href="zhuye.php">首页</a> > <a href="guizeselect.php">规则信息编辑</a></p>
			<h2 class="text-center">
				规则信息编辑
			</h2>
		</div>
	</div>
	
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="z row clearfix">
				<div class="col-md-4 column">
				</div>
				<div class="col-md-4 column">
		<?php
			 if($a>0){
				 	echo "<button type='button' disabled='disabled' class='btn btn-default btn-lg btn-block btn-primary active'>
				 		距离投票项目结束还有：&nbsp".$xiaoshi."&nbsp小时&nbsp;&nbsp;".$fenzhong."&nbsp;分钟
				 		</button>";
				 }
				 else{
				 	echo "<button type='button' class='btn btn-default btn-block btn-lg btn-primary active'>
				 		本次投票项目结束或未开始投票项目！
				 		</button>";
				 }
			
					 
		 ?>		
		 		</div>
				<div class="col-md-4 column">
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	
	<div class="row clearfix">
		<div class="col-md-2 column">
		</div>
		<div class="col-md-8 column">
			<form action="guizeupdate-ok.php" method="post" class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="inputEmail3" class="col-sm-2 control-label">活动标题</label>
					<div class="col-sm-10">
						<input type='text' class="form-control" id="inputEmail3" name='biaoti' value='<?php echo $arr['biaoti']?>' />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">活动时间</label>
					<div class="col-sm-10">
						<input type='text' class="form-control" id="inputEmail3" name='time' value='<?php echo $arr['time']?>' />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">投票时长</label>
					<div class="col-sm-10">
						<input type='text' class="form-control" id="inputEmail3" name='shijian' value='<?php echo $arr['shijian']?>' />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">活动目的</label>
					<div class="col-sm-10">
						<input type='text' class="form-control" id="inputEmail3" name='mudi' value='<?php echo $arr['mudi']?>' />
						<input type='hidden' class="form-control" id="inputEmail3" name='id' value='<?php echo $arr['id']?>' />
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">主办单位</label>
					<div class="col-sm-10">
					<input type='text' class="form-control" id="inputEmail3" name='zhuban' value='<?php echo $arr['zhuban']?>' />
				</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">赞助单位</label>
					<div class="col-sm-10">
						<input type='text' class="form-control" placeholder="非必填" id="inputEmail3" name='zanzhu' value='<?php echo $arr['zanzhu']?>' />
				</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">活动规则</label>
					<div class="col-sm-10">
						<input type='text' class="form-control" id="inputEmail3" name='guize' value='<?php echo $arr['guize']?>' />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 <button type="submit" class="btn btn-default">确认修改</button>
					</div>
				</div>
			</form>
		</div>	
		<div class="col-md-2 column">
		</div>
	</div>
</div>
<div class="foot col-md-12 column"><br />版权所有 &copy; 侵权必究<br />重庆城市职业学院<br />联系方式：QQ 758454073<br /><br /></div>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
<?php
mysqli_close($conn);
?>