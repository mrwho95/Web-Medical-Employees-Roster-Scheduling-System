<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123');
define('DB_NAME', 'medical');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
	die('Unable to connect to database'.mysqli_connect_errno());
}

$stmt = $conn->prepare("SELECT Title, Message FROM notification;");

$stmt->execute();

$stmt->bind_result($Title, $Message);

$Notification = array();

while ($stmt->fetch()) {
	// $temp['ID'] = $ID;
	$temp['Title'] = $Title;
	$temp['Message'] = $Message;
	array_push($Notification, $temp);
}
echo json_encode($Notification);


?>