<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123');
define('DB_NAME', 'medical');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
	die('Unable to connect to database'.mysqli_connect_errno());
}

$stmt = $conn->prepare("SELECT ID, Name, Position, MON, TUE, WED, THU, FRI, SAT, SUN FROM roster;");

$stmt->execute();

$stmt->bind_result($ID, $Name, $Position, $MON, $TUE, $WED, $THU, $FRI, $SAT, $SUN);

$Roster_Duty = array();

while ($stmt->fetch()) {
	$temp['ID'] = $ID;
	$temp['Name'] = $Name;
	$temp['Position'] = $Position;
	$temp['MON'] = $MON;
	$temp['TUE'] = $TUE;
	$temp['WED'] = $WED;
	$temp['THU'] = $THU;
	$temp['FRI'] = $FRI;
	$temp['SAT'] = $SAT;
	$temp['SUN'] = $SUN;
	array_push($Roster_Duty, $temp);
}
echo json_encode($Roster_Duty);


?>