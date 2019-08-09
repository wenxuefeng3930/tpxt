<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<style type="text/css">
	body{
		background: url(image/0.jpg) no-repeat content-box;
		background-size:contain;
		width: 100%;
		height: 100%;
	}
	h2{
		margin-bottom: 50px;
	}
	.form-group{
		margin-top: 50px;
	}
	.foot{
		text-align: center;
		margin-top: 200px;
		background: #999999;
		color: white;
	}
</style>
<?php
include "localhost.php";

$result=mysqli_query($conn,"select * from xinxi where id={$_GET['id']}");
$arr=mysqli_fetch_array($result);
?>

<body>
	


<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<p>当前位置：<a href="zhuye.php">首页</a> > <a href="xinxiselect.php">选手排名</a> > <a href="xinxiupdate.php">选手信息编辑</a></p>
			<h2 class="text-center">
				选手信息修改
			</h2>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-2 column">
		</div>
		<div class="col-md-8 column">
			<form action="xinxiupdate-ok.php" method="post" class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">姓名</label>
					<div class="col-sm-10">
						<input type='text' class="form-control" id="inputEmail3" name='name' value='<?php echo $arr['name']?>' />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">院系</label>
					<div class="col-sm-10">
						<input type='text' class="form-control" id="inputEmail3" name='xibie' value='<?php echo $arr['xibie']?>' />
						<input type='hidden' class="form-control" id="inputEmail3" name='id' value='<?php echo $arr['id']?>' />
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