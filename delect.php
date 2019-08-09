<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php
include "localhost.php";

$delect1="TRUNCATE TABLE xinxi";
$sql=mysqli_query($conn,$delect1) or die("选手信息删除失败");
$delect2="TRUNCATE TABLE guize";
$sql=mysqli_query($conn,$delect2) or die("规则信息删除失败");
$delect3="TRUNCATE TABLE ip";
$sql=mysqli_query($conn,$delect3);

//设置需要删除的文件夹
$path = "./uploads/";
//清空文件夹函数和清空文件夹后删除空文件夹函数的处理
function deldir($path){
	//如果是目录则继续
	if(is_dir($path)){
		//扫描一个文件夹内的所有文件夹和文件并返回数组
		$p = scandir($path);
		foreach($p as $val){
			//排除目录中的.和..
			if($val !="." && $val !=".."){
			//如果是目录则递归子目录，继续操作
			if(is_dir($path.$val)){
				//子目录中操作删除文件夹和文件
				deldir($path.$val.'/');
				//目录清空后删除空文件夹
				@rmdir($path.$val.'/');
			}
			else{
			//如果是文件直接删除
			unlink($path.$val);
			}
		}
	}
}
}
//调用函数，传入路径
deldir($path);


if($sql){
	echo "<script>alert('已成功删除所有原有规则！');window.location.href='zhuye.php';</script>";
}
else{
	echo "<script>alert('删除失败，请重试！');window.location.href='zhuye.php';</script>";
}

mysqli_close($conn);
?>