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
		font-size: 12px;
		font-weight: normal;
		color: #BB0000;
	}
	.a{
		margin-top: 10px;
	}
	#up{
		margin-top: 4px;
	}
	.c{
		border: 1px solid #CCCCCC;
		border-radius: 4px;
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
					<p>当前位置：<a href="zhuye.php">首页</a> > <a href="fabu.php">选手信息发布</a></p>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-2 column">
				</div>
				<div class="col-md-8 column">
					<h3 class="text-center">
						选手信息上传表
					</h3>
					<hr size="3" />
					<form name="form1" method="post" action="fabu.php" enctype="multipart/form-data">
						<div class="form-group a">
							 <label for="exampleInputEmail1">选手姓名<span class="bitian">*</span>：<span class="tips" id="divname">长度为1~6个字符</span></label>
							 <div class="b"><input type="text" class="form-control" id="1 exampleInputEmail1" name="name" required />
						</div>
						<div class="form-group a">
							 <label for="exampleInputPassword1">联系电话<span class="bitian">*</span>：<span class="tips" id="phone">长度为11字符</span></label>
							 <div class="b"><input type="tel" name="tel" class="form-control" id="exampleInputEmail1" required />
						</div>
						<div class="form-group a">
							 <label for="exampleInputPassword1">二级院系<span class="bitian">*</span>：<span class="tips" id="xibie">长度为1~8个字符</span></label>
							 <div class="b"><input type="text" name="xibie" class="form-control" id="exampleInputEmail1" required />
						</div>
						<div class="form-group a">
							 <label for="exampleInputPassword1">作品图片<span class="bitian">*</span>：<span class="tips" id="image">支持格式为"jpg"、"png"、"jpeg"、"gif"</span></label>
				<div class="c">
					<div id="ima">
						<label for="file">
							<img id="up" src="image/up.png" height="120" width="120" >
						</label>
						<input type="file" id="file" name="pic" style="display: none"/>
					</div>
				</div>
				
			<script type="text/javascript">
					//图片上传部分JS代码
   				document.getElementById('file').onchange = function() {
   					var imgFile = this.files[0];
   					var fr = new FileReader();
   					fr.onload = function(){
     					document.getElementById('ima').getElementsByTagName('img')[0].src = fr.result;
       				};
      				fr.readAsDataURL(imgFile);
   				};
			</script>
							 
							 </div>
						<div class="form-group a">
							 <label for="exampleInputPassword1">作品名称 : <span class="tips" id="beizhu">长度为1~8字符</span></label>
							 <textarea name="beizhu" class="form-control" id="exampleInputEmail1" ></textarea>
						</div>
						<div class="form-group">
							 <label for="exampleInputPassword1"><span class="tips">注：带 * 号的为必填项</span></label>
						</div>
						<input type="submit" name="submit" class="btn btn-default" id="submit" value="确认提交" />
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

//执行图片上传
//var_dump($_FILES);

//1.获取上传文件信息

$name=@$_POST["name"];
$tel=@$_POST["tel"];
$xibie=@$_POST["xibie"];
$beizhu=@$_POST["beizhu"];
$submit=@$_POST["submit"];


$upfile=@$_FILES["pic"];
$typelist=array("image/jpeg","image/jpg","image/png","image/gif");
$fileSize=1024*1024*5;
$path="./uploads/";//定义上传后的目录
 
if(!is_dir($path)){//检查上传目录是否存在，如果不存在，就自动创建该目录
	mkdir($path,0777);
}


if(!empty($submit)){
	
//2.过滤上传文件的错误号
if($upfile["error"]>0){
	switch($upfile['error']){
		case 1:
		echo "<script>alert('上传的文件超过限制的值,请检查后再次上传');window.location.href='fabu.php';</script>";
		break;
		
		case 2:
		echo "<script>alert('上传的文件超过指定的值,请检查后再次上传');window.location.href='fabu.php';</script>";
		break;
		
		case 3:
		echo "<script>alert('只有部分文件上传,请检查后再次上传');window.location.href='fabu.php';</script>";
		break;
		
		case 4:
		echo "<script>alert('没有文件上传,请检查后再次上传');window.location.href='fabu.php';</script>";
		break;
		
		case 6:
		echo "<script>alert('找不到临时文件夹,请重新上传');window.location.href='fabu.php';</script>";
		break;
		
		case 7:
		echo "<script>alert('文件写入失败,请重新上传');window.location.href='fabu.php';</script>";
		break;
	}
}

//3.类型过滤
if(!in_array($upfile['type'],$typelist)){
	echo "<script>alert('上传文件类型错误,请检查后再次上传');window.location.href='fabu.php';</script>";
}
 
//4.上传大小的过滤
if($upfile['size']>$fileSize){
	echo "<script>alert('上传大小超出限制,请重新上传');window.location.href='fabu.php';</script>";
}

//5.上传后的文件名的定义
$fileinfo=pathinfo($upfile["name"]);
date_default_timezone_set("PRC");
do{
	$newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
}
while(file_exists($path.$newfile));

$insert="INSERT INTO xinxi(name,tel,xibie,image,beizhu) VALUES ('{$name}','{$tel}','{$xibie}','{$newfile}','{$beizhu}')";
mysqli_query($conn,$insert) or die("失败！原因:".mysqli_error($conn));

//6.执行文件上传
//判断是否为上传文件
if(is_uploaded_file($upfile["tmp_name"])){
	//执行文件上传、移动文件位置
	if(move_uploaded_file($upfile['tmp_name'], $path.$newfile)){
		echo "<script>window.location.href='guodu.php';</script>";
	}
	else{
		echo "<script>alert('文件上传失败请重新上传!');window.location.href='fabu.php';</script>";
	}
}
else{
	echo "<script>alert('不是一个上传文件!');window.location.href='fabu.php';</script>";
}
}
mysqli_close($conn);
?>