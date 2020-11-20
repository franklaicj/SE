<?php
require_once("dbconnect.php");

function addJob($title,$msg, $urgent) {
	global $conn;
	$sql = "insert into todo (title, content,urgent, addTime, status) values ('$title','$msg', '$urgent', NOW(),0);";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL	
}

function cancelJob($jobID) {
	global $conn;
	$sql = "update todo set status = 3 where id=$jobID and status <> 2;";
	mysqli_query($conn,$sql);
	//return T/F
}

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

function setFinished($jobID) {
	global $conn;
	$sql = "update todo set status = 1, finishTime=NOW() where id=$jobID and status = 0;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	
}

function rejectJob($jobID){
	global $conn;
	$sql = "update todo set status = 0 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}

function setClosed($jobID) {
	global $conn;
	$sql = "update todo set status = 2 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}


?>