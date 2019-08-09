<meta charset="utf-8" />
<?php
include "localhost.php";

$id=@$_POST['id'];
$name=@$_POST['name'];
$xibie=@$_POST['xibie'];


$up="update xinxi set name='{$name}',xibie='{$xibie}' where id={$id}";

$rezhuce=mysqli_query($conn,$up);
if($rezhuce){
	echo "<script>alert('修改成功！');window.location.href='xinxiselect.php'</script>";
}
else{
	echo "<script>alert('修改失败！');window.location.href='xinxiupdate.php'</script>";
}

mysqli_close($conn);
?>