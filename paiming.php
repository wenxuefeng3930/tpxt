<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;	
	}
	h2{
		position: absolute;
		top: 50%;
		left: 0;
		bottom: 0;
		right: 0;
		margin: auto;
		margin-bottom: 50px;
	}
	.row{
		margin-top: 60px;
	}
	tbody tr:nth-child(odd){
		background: #C0C0C0;
	}
	tbody tr:nth-child(even){
		background: #D1D1D1;
	}

	thead{
		color:white;
		background: #555555;
	}
	.botton{
		text-align: center;
		margin-top: 30px;
		color: white;
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
FROM xinxi, (SELECT @i :=0) AS i
order by piaoshu desc";

$result=mysqli_query($conn,$sql) or die("失败");
?>
<body>
	
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<img alt="140x140" class="img-responsive center-block" src=""image/beijing01_icon.png"" height="500" />
			<h2 class="text-center">
				投票结果排行榜<br />
			</h2>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-2 column">
		</div>
		<div class="col-md-8 column">
			<table class="text-center table table-bordered">
				<h5 class="text-center">注：票数相同按选手信息上传时间先后排序</h5>
				<thead><tr><th>名次</th><th>姓名</th><th>院系</th><th>票数</th></tr></thead>
				<tbody>
					<?php
					while($arr=mysqli_fetch_array($result)){
					echo "<tr><td>第&nbsp;&nbsp;$arr[i]&nbsp;&nbsp;名</td><td>$arr[name]</td><td>$arr[xibie]</td><td>$arr[piaoshu]&nbsp;&nbsp;票</td></tr>";}
					?>
				</tbody>
			</table>
		</div>
		<div class="col-md-2 column">
		</div>
	</div>
</div>
<div class="botton col-md-12 column"><a href="login.php"><input type="button" class="btn btn-default" value="我也要发布投票" /></a>
</div>
<div class="foot col-md-12 column"><br />版权所有 &copy; 侵权必究<br />重庆城市职业学院<br />联系方式：QQ 758454073<br /><br /></div>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
<?php
mysqli_close($conn);
?>