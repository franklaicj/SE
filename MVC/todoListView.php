<?php
session_start();
if (! isset($_SESSION['uID']) or $_SESSION['uID']<="") {
	header("Location: loginForm.php");
} 
if ($_SESSION['uID']=='boss'){
	$bossMode = 1;
} else {
	$bossMode=0;
}
require("todoModel.php");

$result=getJobList($bossMode);
$jobStatus = array('未完成','已完成');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my Todo List !! </p>
<hr />

<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>name</td>
    <td>father</td>
    <td>mother</td>
	<td>category</td>
    <td>mComment</td>
	<td>sComment</td>
	<td>sResult</td>
	<td>pass</td>
  </tr>
<?php

    echo "<tr><td>" . $rs['sID'] . "</td>";
	echo "<td>" , htmlspecialchars($rs['sName']), "</td>";
	echo "<td>" , htmlspecialchars($rs['father']), "</td>";
	echo "<td>" , htmlspecialchars($rs['mother']), "</td>";
	echo "<td>" . $rs['category'] . "</td>";
	echo "<td>" . $rs['mComment'] . "</td>";
	echo "<td>" . $rs['sComment'] . "</td>";
	echo "<td>" . $rs['sResult'] . "</td>";
	echo "<td>{$jobStatus[$rs['pass']]}</td><td>";
	
	switch($rs['status']) {
		case 0:
			if ($bossMode) {
				echo "<a href='todoEditForm.php?id={$rs['id']}'>Edit</a>  ";	
				echo "<a href='todoSetControl.php?act=cancel&id={$rs['id']}'>Cancel</a>  " ;
			} else {
				echo "<a href='todoSetControl.php?act=finish&id={$rs['id']}'>Finish</a>  ";
			}

			break;
		case 1:
			echo "<a href='todoSetControl.php?act=reject&id={$rs['id']}'>Reject</a>  ";
			echo "<a href='todoSetControl.php?act=close&id={$rs['id']}'>Close</a>  ";
			break;
		default:
			break;
	}
	echo "</td></tr>";
?>
</table>
</body>
</html>
