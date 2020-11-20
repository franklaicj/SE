<?php
require_once("dbconnect.php");

function updateJob($sID,$father,$mother,$category,$mComment,$money,$sComment,$status) {
	global $conn;
	$sql = "update student set father='$father', mother='$mother', category='$category', mComment='$mComment', money='$money', sComment='$sComment', status='$status'+1 where sID=$sID;";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
}

function getJobList($role) {
	global $conn;
	$sql = "SELECT * FROM student where status <= $role order by status desc;";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	return $result;
}

function getJobDetail($sID) {
	global $conn;
	$sql = "select * from student where sID=$sID;";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	$rs=mysqli_fetch_assoc($result);
	return $rs;
}
?>