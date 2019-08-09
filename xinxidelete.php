<meta charset="utf-8" />
<?php
include "localhost.php";


$path = "./uploads/";
$select="select * from xinxi where id={$_GET['id']}";
$sql=mysqli_query($conn,$select);
$arr=mysqli_fetch_array($sql);
$del=unlink($path.$arr['image']);//删除图片

$result="DELETE FROM xinxi WHERE id={$_GET['id']}";
$delete=mysqli_query($conn,$result);

if($delete){
	echo "<script>alert('删除成功！');window.location.href='xinxiselect.php';</script>";
}
else{
	echo "<script>alert('删除失败！');window.location.href='xinxiselect.php'</script>";
}
mysqli_close($conn);
?>