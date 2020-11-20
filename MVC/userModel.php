<?php
require_once("dbconnect.php");

function checkUserIDPwd($userName, $passWord) {
	global $conn;
$userName = mysqli_real_escape_string($conn,$userName);
$isValid = false;

$sql = "SELECT password, role FROM user WHERE loginID='$userName'";
if ($result = mysqli_query($conn,$sql)) {
	if ($row=mysqli_fetch_assoc($result)) {
		if ($row['password'] == $passWord) {
			$_SESSION['role'] = $row['role'];
			$isValid = true;
		}
	}
}
return $isValid;
}
?>
