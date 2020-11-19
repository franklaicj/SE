<?php
require_once("dbconnect.php");

function addForm($sID, $sName, $father, $mother, $category) {
	
}

function getFormList($bossMode) {
	global $conn;
	if ($bossMode) {
		$sql = "select * from student;";
	} else {
		$sql = "select * from student where sID = [$sID];";
	}
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	return $result;
}

function getFormDetail($id) {
	global $conn;
	if ($id == -1) { //-1 stands for adding a new record
		$rs=[
			"id" => -1,
			"title" => "new title",
			"content" => "job description",
			"urgent" => "一般"
		];
	} else {
		$sql = "select id, title, content, urgent from todo where id=$id;";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$rs=mysqli_fetch_assoc($result);
	}
	return $rs;
}

function secretoryFinished($sID) {

}

function rejectForm($sID){
	global $conn;
	$sql = "update todo set status = 0 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}

function casePass($sID) {
	global $conn;
	$sql = "update todo set status = 2 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}


?>