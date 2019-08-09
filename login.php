<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<style type="text/css">
			.a{
				padding-top: 20px;
			}
			.b{
				padding-top: 50px;
				padding-bottom: 30px;
			}
			h2{
				text-align: center;
				margin: 50px;
			}
			h2{
				font-weight: bold;
				text-align: center;
				margin-bottom: 40px;
			}
			.tijiao{
				text-align: center;
				margin-top: 30px;
			}
	*{
		margin: 0;
		padding: 0;
	}
	form{
		width: 300px;
		height: auto;
		padding: 0;
		border: solid 1px black;
		background: url(image/0.jpg) no-repeat;
		background-size:contain;
	}
	.center {
		width: auto;
		display: table;
		margin-left: auto;
		margin-right: auto;
	}
	table{
		padding-top: 30px;
		margin: 0 auto;
	}

	table tr{
		width: 300px;
		height: 30px;
		margin: 20px;
	}
	
	#bottom{
		width: 70px;
		text-align: center;
		margin-top: 15px;
		margin-bottom: 20px;
	}
	input{
		margin-top: 10px;
	}
</style>
	</head>
	<body>
		
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column a">
			<div class="row clearfix b">
				<div class="col-md-3 column">
				</div>
				<div class="col-md-6 column">
					<form class="form-horizontal center" role="form" method="post" action="login.php">
						<table class="center">
							<h2>系统管理员登录</h2>
							<tr><th>账    号：</th><td><input type="text" class="form-control" id="exampleInputEmail1" name="id" ></td></tr>
							<tr><th>密    码：</th><td><input type="password" class="form-control" id="exampleInputEmail1" name="password"></td></tr>
							<tr><th></th><td><input type="submit" name="submit" class="btn btn-default" id="bottom" value="登录"/></td></tr>
						</table>
					</form>
				</div>
				<div class="col-md-3 column">
				</div>
			</div>
		</div>
	</div>
</div>
		
		
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>	

	</body>
</html>

<?php
include "localhost.php";
	
$id=@$_POST["id"];
$password=@$_POST["password"];
$submit=@$_POST["submit"];

if(isset($submit)){
	if(empty($id)||empty($password)){
		echo "<script>alert('数据未填写完整，请仔细检查！');</script>";
	}
	else{
		if($id=="admin" && $password=="admin"){
			echo "<script>alert('登录成功！');window.location.href='zhuye.php';</script>";
		}
		else{
			echo "<script>alert('账号或密码错误，请重试！');</script>";
		}
	}	
}
mysqli_close($conn);
?>