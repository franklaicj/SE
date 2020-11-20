<?php
require("dbconnect.php");
$sName=mysqli_real_escape_string($conn,$_POST['sName']);
$sID=mysqli_real_escape_string($conn,$_POST['sID']);
$father=mysqli_real_escape_string($conn,$_POST['father']);
$mother=mysqli_real_escape_string($conn,$_POST['mother']);
$category=mysqli_real_escape_string($conn,$_POST['category']);

if ($sID && $sName && $category) { //if title is not empty
	$sql = "insert into student (sID, sName, father, mother, category) values ('$sID', '$sName','$father', '$mother', '$category');";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	echo "Message added";
} else {
	echo "Message title cannot be empty";
}

?>
<a href="todoListView.php">Back</a>