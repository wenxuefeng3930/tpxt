<meta charset="utf-8" />
<?php
include "localhost.php";

$id=@$_POST['id'];
$biaoti=@$_POST['biaoti'];
$time=@$_POST['time'];
$shijian=@$_POST['shijian'];
$mudi=@$_POST['mudi'];
$zhuban=@$_POST['zhuban'];
$zanzhu=@$_POST['zanzhu'];
$guize=@$_POST['guize'];


$up="update guize set biaoti='{$biaoti}',time='{$time}',shijian='{$shijian}',mudi='{$mudi}',zhuban='{$zhuban}',zanzhu='{$zanzhu}',guize='{$guize}' where id={$id}";

$rezhuce=mysqli_query($conn,$up);
if($rezhuce){
	echo "<script>alert('修改成功！');window.location.href='zhuye.php'</script>";
}
else{
	echo "<script>alert('修改失败！');window.location.href='guizeselect.php'</script>";
}

mysqli_close($conn);
?>