<?php
session_start();
if (! isset($_SESSION['uID'])) {
	header("Location: loginForm.php");
} 

require("todoModel.php");

$sID = (int)$_GET['sID'];
$rs = getJobDetail($sID);
if (! $rs) {
	echo "no data found";
	exit(0);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<?php
	if($_SESSION['role']==2){
		echo "<h1>導師簽核</h1>";
	}
	elseif($_SESSION['role']==3){
		echo "<h1>秘書簽核</h1>";
	}
	elseif($_SESSION['role']==4){
		echo "<h1>校長簽核</h1>";
	}
?>
<form method="post" action="todoUpdControl.php">

<?php 
		echo '姓名: <input type="text" name="sName" value="'.$rs['sName'].'" readonly="readonly">';

		echo '學號: <input type="number" name="sID" value="'.$rs['sID'].'" readonly="readonly">';

		echo '父: <input type="text" name="father" value="'.$rs['father'].'">';
		  
		echo '母: <input type="text" name="mother" value="'.$rs['mother'].'">';

	  	echo '申請補助種類:<select  name="category" type="select">';
			echo "<option value='{$rs['category']}'>{$rs['category']}</option>";
			echo "<option value='低收入戶'>低收入戶</option>";
			echo "<option value='中低收入戶'>中低收入戶</option>";
			echo "<option value='家庭突發因素'>家庭突發因素</option></select><br><br>";

		echo '<input type="hidden" name="status" value="'.$rs['status'].'">';

		if($_SESSION['role']==2){
			echo '導師訪視說明:<input style="height:80px" type="text" name="mComment" value="'.$rs['mComment'].'" size=100>';
			echo '<input type="hidden" name="money" value="'.$rs['money'].'">';
			echo '<input style="height:80px" type="hidden" name="sComment" value="'.$rs['sComment'].'" size=100><br><br>';
			echo '<input type="hidden" name="decision" value="confirm">
				  <input type="hidden" name="decision" value="reject">';
		}elseif($_SESSION['role']==3){
			echo '導師訪視說明:<input style="height:80px" type="text" name="mComment" value="'.$rs['mComment'].'" size=100 readonly="readonly"><br><br>';
			echo '補助金額:<input type="number" name="money" value="'.$rs['money'].'"><br><br>';
			echo '秘書審查意見:<input style="height:80px" type="text" name="sComment" value="'.$rs['sComment'].'" size=100><br><br>';
			echo '<input type="hidden" name="decision" value="confirm">
				  <input type="hidden" name="decision" value="reject">';
		}elseif($_SESSION['role']==4){
			echo '導師訪視說明:<input style="height:80px" type="text" name="mComment" value="'.$rs['mComment'].'" size=100 readonly="readonly"><br><br>';
			echo '補助金額:<input type="number" name="money" value="'.$rs['money'].'" readonly="readonly"><br><br>';
			echo '秘書審查意見:<input style="height:80px" type="text" name="sComment" value="'.$rs['sComment'].'" size=100 readonly="readonly"><br><br>';
			echo '<input type="radio" name="decision" value="confirm">同意<br>
				  <input type="radio" name="decision" value="reject">否決';
		}
?>
	<br><input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>
