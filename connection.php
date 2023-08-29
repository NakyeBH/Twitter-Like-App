<?php 
$conn = mysqli_connect('localhost','root','');
if (!$conn) {
	die ("failed to connect" .mysqli_error($conn));
}
$db = mysqli_select_db($conn, 'tweet');
if (!$db) {
	die("No database selected".mysqli_error($conn));
}
?>