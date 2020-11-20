<?php
session_start();
if (! isset($_SESSION['uID']) or $_SESSION['uID']<="") {
	header("Location: loginForm.php");
} 
$role=$_SESSION['role'];
require("todoModel.php");
if (isset($_GET['m'])){
	$msg="<font color='red'>" . $_GET['m'] . "</font>";
} else {
	$msg="Good morning";
}
$result=getJobList($role);
$jobStatus = array('未通過','導師審核中','秘書審核中','校長審核中','通過');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<div><?php echo $msg; ?></div><br>
<a href='loginForm.php'>登出</a><hr>
<table width=80% border="1">
  <tr>
    <td>姓名</td>
    <td>學號</td>
    <td>父</td>
	<td>母</td>
    <td>申請補助種類</td>
	<td>申請狀態</td>
<?php
	if($_SESSION['role'] >= 3){
		echo "<td>導師訪視說明</td>";
	}
	if($_SESSION['role'] >= 4){
		echo "<td>補助金額</td>";
		echo "<td>秘書審查意見</td>";
	}
	if($_SESSION['role'] >= 2){
		echo "<td>簽注意見</td>";
	}
?>
  </tr>
<?php
while ($rs=mysqli_fetch_assoc($result)){
	if((($_SESSION['role']==1 && $_SESSION['uID'] != $rs['sName']) || ($_SESSION['role'] > 1 && $_SESSION['role']<=$rs['status'])) && $rs['status'] != 4){
		continue;
	}
	echo "<tr ><td>" . $rs['sName'] . "</td>";
	echo "<td>".$rs['sID']."</td>";
	echo "<td>".$rs['father']."</td>";
	echo "<td>".$rs['mother']."</td>";
	echo "<td>".$rs['category']."</td>";
	echo "<td>".$jobStatus[$rs['status']]."</td>" ;
	if($_SESSION['role'] >= 3){
		echo "<td>" , htmlspecialchars($rs['mComment']), "</td>";
	}
	if($_SESSION['role'] >= 4){
		echo "<td>".$rs['money']."</td>";
		echo "<td>" , htmlspecialchars($rs['sComment']), "</td>";
	}
	if($_SESSION['role'] >= 2 && $_SESSION['role'] == $rs['status']+1){
		echo "<td><a href='todoEditForm.php?sID=".$rs['sID']."'>簽核</a></td>";
	}
	echo "</tr>";
}
?>
</table>
<?php 
if ($_SESSION['role']==1)
	echo "<a href='todoAddForm.php'>申請</a>";
?>
</body>
</html>