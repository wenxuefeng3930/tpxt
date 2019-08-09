<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

<style type="text/css">
	body{
		background: url(image/6.jpg);
	}
	.form-control{resize: none;  /*固定大小*/}
	.bitian{
		margin-left: 5px;
		margin-right: 5px;
		color: red;
	}
	.tips{
		font-size: 10px;
		color: red;
	}
	.foot{
		text-align: center;
		margin-top: 20px;
		background: #999999;
		color: white;
	}
</style>

<html>
	<body>
		
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-12 column">
					<p>当前位置：<a href="zhuye.php">首页</a> > <a href="guize.php">规则信息发布</a></p>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-2 column">
				</div>
				<div class="col-md-8 column">
					<h3 class="text-center">
						投票项目规则表
					</h3>
					<hr size="3" />
					<form role="form" action="guize.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							 <label for="exampleInputEmail1">活动标题<span class="bitian">*</span>：<span class="tips" id="name">长度为1~16个字符</span></label>
							 <textarea name="name" class="form-control" id="exampleInputEmail1" required="required"></textarea>
						</div>
						<div class="form-group">
							 <label for="exampleInputPassword1">活动时间<span class="bitian">*</span>：<span class="tips" id="name">长度为1~30个字符</span></label>
							 <textarea name="time" class="form-control" id="exampleInputEmail1" required="required"></textarea>
						</div>
						<div class="form-group">
							 <label for="exampleInputPassword1">投票时长<span class="bitian">*</span>：<span class="tips" id="name">从发布规则之时开始计算（单位：天）</span></label>
							 <textarea name="shijian" class="form-control" id="exampleInputEmail1" required="required"></textarea>
						</div>
						<div class="form-group">
							 <label for="exampleInputPassword1">活动目的<span class="bitian">*</span>：<span class="tips" id="name">长度为1~300个字符</span></label>
							 <textarea name="mudi" class="form-control" id="exampleInputEmail1" required="required"></textarea>
						</div>
						<div class="form-group">
							 <label for="exampleInputPassword1">主办单位<span class="bitian">*</span>：<span class="tips" id="name">长度为1~300个字符</span></label>
							 <textarea name="zhuban" class="form-control" id="exampleInputEmail1" required="required"></textarea>
						</div>
						<div class="form-group">
							 <label for="exampleInputPassword1">赞助单位 : <span class="tips" id="name">长度为1~30个字符</span></label>
							 <textarea name="zanzhu" class="form-control" id="exampleInputEmail1" ></textarea>
						</div>
						<div class="form-group">
							 <label for="exampleInputPassword1">活动规则<span class="bitian">*</span>：<span class="tips" id="name">长度为1~300个字符</span></label>
							 <textarea name="guize" class="form-control" id="exampleInputEmail1" required="required"></textarea>
						</div>
						<div class="form-group">
							 <label for="exampleInputPassword1"><span class="tips">注：带 * 号的为必填项</span></label>
						</div>
						<input type="submit" name="submit" class="btn btn-default" id="submit" value="提交" />
					</form>
					
				</div>
				<div class="col-md-2 column">
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
				</div>
			</div>
		</div>
	</div>
</div>
		<div class="foot col-md-12 column"><br />版权所有 &copy; 侵权必究<br />重庆城市职业学院<br />联系方式：QQ 758454073<br /><br /></div>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>
</html>

<?php
include "localhost.php";

date_default_timezone_set("PRC");
$zero=time();//当前时间

$biaoti=@$_POST["name"];
$time=@$_POST["time"];
$shijian=$_POST['shijian'];
$mudi=@$_POST["mudi"];
$zhuban=@$_POST["zhuban"];
$zanzhu=@$_POST["zanzhu"];
$guize=@$_POST["guize"];
$submit=@$_POST["submit"];

if(!empty($submit)){
	if(empty($biaoti)||empty($time)||empty($shijian)||empty($mudi)||empty($zhuban)||empty($guize)){
		echo "<script>alert('数据未填写完整，请检查后提交');</script>";
	}
	else{
		$insert="INSERT INTO guize(biaoti,time,shijian,zero,mudi,zhuban,zanzhu,guize) VALUES ('{$biaoti}','{$time}','{$shijian}','{$zero}','{$mudi}','{$zhuban}','{$zanzhu}','{$guize}')";
		$sql=mysqli_query($conn,$insert) or die ("失败，原因是：".mysqli_error($conn));
		if($sql){
			echo "<script>alert('成功创建规则，点击确定跳转到选手信息上传页面');window.location.href='fabu.php';</script>";
		}
		else{
			echo "<script>alert('未能成功创建规则，请重试一下吧！~');</script>";
		}
	}
}
mysqli_close($conn);
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>