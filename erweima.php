<?php
include "localhost.php";

$select="select * from guize";
$result=mysqli_query($conn,$select) or die("失败！原因是：".mysqli_error($conn));
$arr=mysqli_fetch_array($result);
?>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>


<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
	.bg{
       background:"url(image/0.jpg)" no-repeat center;
       background-size:contain;
}
	body{
		background: url(image/0.jpg) no-repeat;
		background-size:contain;
		width: 100%;
		height: 100%;
		
	}
	.top{
		background: rgba(1,1,1,0);
	}
	h1{
		margin-bottom: 30px;
	}
	.foot{
		text-align: center;
		margin-top: 60px;
		background: #999999;
		color: white;
	}
	.a{
		font-size: 16px;
	}
	.a dt{
		margin-top: 20px;
	}
	dd{
		margin-top: 20px;
	}
	.b{
		margin-top: 60px;
	}
	.c{
		font-size: 12px;
		text-align: center;
	}
</style>


<html>
	
<body>
<div class="container bg">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="top jumbotron">
				<h1 class="text-center"><?php echo $arr['biaoti'] ?></h1>
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-3 column">
				</div>
				<div class="col-md-6 column">
					<dl class="a dl-horizontal">
						<dt>
							 
						</dt>
						<dd>
							 
						</dd>
						<dt>
							活动时间：
						</dt>
						<dd>
							<?php echo $arr['time'] ?>
						</dd>
						<dt>
							活动目的：
						</dt>
						<dd>
							<?php echo $arr['mudi'] ?>
						</dd>
						<dt>
							主办单位：
						</dt>
						<dd>
							<?php echo $arr['zhuban'] ?>
						</dd>
						<?php
							if(!empty($arr['zanzhu'])){
								echo "<dt>赞助单位：</dt><dd>$arr[zanzhu]</dd>";
							}?>
							<dt>
							投票规则：
						</dt>
						<dd>
							<?php echo $arr['guize'] ?>
						</dd>
					</dl>
				</div>
				<div class="col-md-3 column">
				</div>
			</div>
			<div class="b row clearfix">
				<div class="col-md-5 column">
				</div>
				<div class="b-b col-md-2 column">
					<img alt="150x150" class="img-responsive center-block" src="http://qrcode.leipi.org/js.html?qw=150&qc=http%3A//lqq1999.gz01.bdysite.com/PFXT/toupiao.php&ql=&lw=NaN&lh=NaN&bor=0&op=img" >
						<div class="c">扫描上方二维码即可参与投票</div>
				</div>
				<div class="col-md-5 column">
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="foot col-md-12 column"><br />版权所有 &copy; 侵权必究<br />重庆城市职业学院<br />联系方式：QQ 758454073<br /><br /></div>


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
</body>	
	
</html>
<?php
	mysqli_close($conn);
?>