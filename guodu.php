<meta charset="UTF-8">
<?php
include "localhost.php";

$select="select * from guize";
$sql=mysqli_query($conn,$select) or die ("失败");
$arr=mysqli_fetch_array($sql);

?>

<script language="javascript">
	
window.onload=function(){

if (confirm("文件上传成功! 是否选择继续提交选手作品信息？")){  
         window.location.href="fabu.php";
      }  
      else {  
          window.location.href="erweima.php?id=<?php echo $arr['id'] ?>";
     }  

}
</script>
<body>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>