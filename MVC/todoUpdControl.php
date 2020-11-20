<?php
require("todoModel.php");

$sID=(int)$_POST['sID'];
$sName=mysqli_real_escape_string($conn,$_POST['sName']);
$father=mysqli_real_escape_string($conn,$_POST['father']);
$mother=mysqli_real_escape_string($conn,$_POST['mother']);
$category=mysqli_real_escape_string($conn,$_POST['category']);
$mComment=mysqli_real_escape_string($conn,$_POST['mComment']);
$money=(int)$_POST['money'];
$sComment=mysqli_real_escape_string($conn,$_POST['sComment']);
$status=(int)$_POST['status'];

if ($sID) { //if title is not empty
	updateJob($sID, $father, $mother, $category, $mComment, $money, $sComment ,$status);
	$msg="簽核成功";
} else {
	$msg= "請填寫";
}
header("Location: todoListView.php?m=$msg");
?>