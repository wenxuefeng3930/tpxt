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
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<style type="text/css">
	body{
		width: 100%;
		height: 100%;
		background: url(image/8.jpg) no-repeat content;
		background-size:contain;
	}
	.c>h2{
		position: absolute;
		top: 10%;
		left: 0;
		right: 0;
		bottom: 0;
		margin: auto;
		font-size: 30px;
		color: #269ABC;
	}
	.z{
		margin-top: 50px;
		margin-bottom: 50px;
	}
	.a{
		margin-top: 20px;
		height: 200px;
		background: #EEEEEE;
		border: 2px solid;
	}
	.a img{
		width: 150px;
		height: 150px;
		margin-top: 25px;
		margin-bottom: 25px;
		float: left;
	}
	.a .b{
		margin-top: 6px;
		margin-left: 10px;
		float: left;
	}
	.a .b .b-a{
		margin-bottom: 5px;
		margin-top: 5px;
		font-size: 12px;
		font-weight: bold;
	}
	.a .b .b-b{
		padding-left: 20px;
		margin-top: 5px;
		font-size: 10px;
		font-weight: bold;
	}
	.a .b input{
		margin-top: 15px;
		margin-left: 10px;
		margin-bottom: 2px;
	}
	.p{
		font-size: 10px;
	}
	.submit{
		text-align: center;
		margin-top: 30px;
		padding: 50px;
		color: white;
	}
	.foot{
		margin-top: 40px;
		text-align: center;
		background: #999999;
		color: white;
	}
</style>
		
<body>
	
<div class="container">
	<div class="row clearfix">
		<div class="c col-md-12 column">
			<img alt="140x140" class="img-responsive center-block" src="image/biejing03_icon.png" />
		<h2 class="text-center">欢迎你参与投票</h2>
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
				 		距离投票结束还有：&nbsp".$xiaoshi."&nbsp小时&nbsp;&nbsp;".$fenzhong."&nbsp;分钟
				 		</button>";
				 }
				 else{
				 	echo "<button type='button' class='btn btn-default btn-block btn-lg btn-primary active'>
				 		投票已经结束，感谢你的参与！
				 		</button>";
				 }
			
					 
		 ?>		
		 		</div>
				<div class="col-md-4 column">
				</div>
			</div>
		</div>
	</div>
	
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">
			
			<div class="row clearfix">
				<form action="toupiao.php" method="post">
					
				<?php
					while($arr=mysqli_fetch_array($result)){
						echo "<div class='a col-md-6 column'>";
							echo "<a href='uploads/{$arr['image']}' title='点击可查看原图' ><img class='img-responsive' width='140' height='140' src='uploads/{$arr['image']}'/></a>";
							echo "<div class='b'>";
								echo "<div class='b-a'><font size=2>选手&nbsp;&nbsp;".$arr['id']."</font>&nbsp;:&nbsp;".$arr['name']."</div>";
								echo "<div class='b-a'>二级院系:</div>";
								echo "<div class='b-b'>$arr[xibie]</div>";
									echo "<div class='b-a'>作品名称:</div>";
									echo "<div class='b-b'>";
										if(empty($arr['beizhu'])){
											echo "选手".$arr['id']."作品";
										}
										else{ echo $arr['beizhu'];}
										
									echo "</div>";
								echo "<label><p class='p'>点击圆点选择</p></label><input type='radio' name='tou' id='tou' value='{$arr['id']}' />";
								echo "<div class='b-a'>当前票数&nbsp;:$arr[piaoshu]</div>";
							echo "</div>";
						echo "</div>";
					}	
				?>
				
			</div>
		</div>
	</div>
</div>
<div class="submit col-md-12 column">
	<input class="btn btn-default btn-primary btn-lg" type="submit" name="submit" id="submit" value="确认投票"/>
	</div>					
</form>
	<div class="foot col-md-12 column"><br />版权所有 &copy; 侵权必究<br />重庆城市职业学院<br />联系方式：QQ 758454073<br /><br /></div>
			
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>

</body>

<?php


$ip =(@$_SERVER["HTTP_VIA"])?@$_SERVER["HTTP_X_FORWARDED_FOR"]:@$_SERVER["REMOTE_ADDR"];
$ip=($ip)?$ip:$_SERVER["REMOTE_ADDR"];
$id=@$_POST['tou'];

if(!empty($_POST['submit'])){
	
	if($a<=0){
		echo "<script>alert('投票已经结束，无法再次投票，感谢你的参与！');window.location.href='paiming.php';</script>";
	}
	else{
		if(!empty($id)){
			$ipselect="select * from ip where ip='{$ip}'";
			$ipresult=mysqli_query($conn,$ipselect) or die("失败");
	
			if(mysqli_num_rows($ipresult)>0){
				echo "<script>alert('你已参与投票，无法再次投票，感谢你的参与!');window.location.href='paiming.php';</script>";
			}
			else{
				$ipinsert="INSERT INTO ip(ip,time)values('{$ip}','{$time}')";
				mysqli_query($conn,$ipinsert);
				
				$update="update xinxi set piaoshu=piaoshu+1 where id={$id}";
				$result=mysqli_query($conn,$update);
				if($result){
					echo "<script>alert('投票成功！');window.location.href='paiming.php';</script>";
				}
				else{
					echo "<script>alert('投票失败！请重试');window.location.href='toupiao.php';</script>";
				}
			}
		}
		else{
			echo "<script>alert('未选择，请选择后再提交!');window.location.href='toupiao.php';</script>";
		}
  	}
}
mysqli_close($conn);
?>