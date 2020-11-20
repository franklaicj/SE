<?php
require("todoModel.php");
session_start();

$sID=(int)$_POST['sID'];
$sName=mysqli_real_escape_string($conn,$_POST['sName']);
$father=mysqli_real_escape_string($conn,$_POST['father']);
$mother=mysqli_real_escape_string($conn,$_POST['mother']);
$category=mysqli_real_escape_string($conn,$_POST['category']);
$mComment=mysqli_real_escape_string($conn,$_POST['mComment']);
$money=(int)$_POST['money'];
$sComment=mysqli_real_escape_string($conn,$_POST['sComment']);
$status=(int)$_POST['status'];
$decision=$_POST['decision'];
if($_SESSION['role'] == 9 && $decision == 'reject'){
	updateJob($sID, $father, $mother, $category, $mComment, $money, $sComment ,-1);
	$msg="已否決";
}elseif (($_SESSION['role'] == 2 && $mComment) || ($_SESSION['role'] == 3 && $sComment) || ($_SESSION['role'] == 9 && $decision == 'confirm')) {
	if($money >= 5000 && $money <= 20000){
		updateJob($sID, $father, $mother, $category, $mComment, $money, $sComment ,$status);
		$msg="簽核成功";
	}
	else{
		$msg="填寫失敗! 金額超出範圍";
	}
}else {
	$msg= "填寫失敗! 請填寫簽核意見";
}
header("Location: todoListView.php?m=$msg");
?>