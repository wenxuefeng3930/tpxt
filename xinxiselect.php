<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;	
	}
	body{
		background: url(image/6.jpg);
		background-size:contain;
		width: 100%;
		height: 100%;
	}
	h2{
		margin-bottom: 50px;
	}
	tbody tr:nth-child(odd){
		background: #C1E2B3;
	}
	tbody tr:nth-child(even){
		background: #EAEDFF;
	}
	thead{
		color:white;
		background: #555555;
	}
	.foot{
		text-align: center;
		margin-top: 100px;
		background: #999999;
		color: white;
	}
	
</style>

<?php
include "localhost.php";

$sql="SELECT (
@i := @i +1
)i, xinxi . *
FROM xinxi, (SELECT @i :=0) AS i";

$result=mysqli_query($conn,$sql) or die("失败");
?>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<p>当前位置：<a href="zhuye.php">首页</a> > <a href="xinxiselect.php">选手信息编辑</a></p>
			<h2 class="text-center">
				选手信息编辑
			</h2>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-2 column">
		</div>
		<div class="col-md-8 column">
			<table class="text-center table table-bordered">
				<thead><tr><th>顺序</th><th>图片</th><th>姓名</th><th>院系</th><th>编辑</th><th>删除</th></tr></thead>
				<tbody>
					<?php
					while($arr=mysqli_fetch_array($result)){
					echo "<tr><td>$arr[i]</td><td><a href='uploads/{$arr['image']}' title='点击查看原图'><img class='img-responsive' width='30' height='30' src='uploads/{$arr['image']}'/></a></td>
						<td>$arr[name]</td><td>$arr[xibie]</td>
						<td><a href='xinxiupdate.php?id={$arr['id']}'>编辑</a></td>
						<td><a href='xinxidelete.php?id={$arr['id']}' onclick='return CommandConfirm()'>删除</a></td>
						</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
		<div class="col-md-2 column">
		</div>
	</div>
</div>
<div class="foot col-md-12 column"><br />版权所有 &copy; 侵权必究<br />重庆城市职业学院<br />联系方式：QQ 758454073<br /><br /></div>

<script>
function CommandConfirm(){
 if(window.confirm("你确定删除此记录吗？")){
   return true;
 }else{
   return false;
 }
}
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
<?php
mysqli_close($conn);	
?>