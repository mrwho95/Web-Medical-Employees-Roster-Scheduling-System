<?php

function sendPushNotification($to = '', $data = array()){
	$apiKey = 'AIzaSyA1G9X49txb5h32ish90HCyrwOCyX8tMfs';
	$fields = array('to' => $to , 'notification' => $data);

	$headers = array('Authorization: key='.$apiKey, 'Content-Type: application/json');
	$url = 'https://android.googleapis.com/gcm/send';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	$result = curl_exec($ch);
	curl_close($ch);
	return json_decode($result, true);


}

$to = "cV4SzvL6kvk:APA91bGkz_I6YT8b4Wf8N7w0Fkc8rDSMdFQnmjXEqJTp9cS-W3HMKV12mJnsWYphfv8iDeI1m-812e4PqRYF6Hnn2PVFhFvdOVPw1K6yS_xvQVv8DH7nTZfJbEb9NnW5ZAMRxMQLM_Ho";

$data = array(
	'body' => 'New Duty Roster is published',
	
	'sound'	=> 'default'

);

print_r(sendPushNotification($to, $data));

// // API access key from Google API's Console
// define( 'API_ACCESS_KEY', 'AIzaSyA1G9X49txb5h32ish90HCyrwOCyX8tMfs' );
// $registrationIds = array( $_GET['id'] );

// // prep the bundle
// $msg = array
// (
// 	'message' 	=> 'here is a message. message',
// 	'title'		=> 'This is a title. title',
// 	'subtitle'	=> 'This is a subtitle. subtitle',
// 	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
// 	'vibrate'	=> 1,
// 	'sound'		=> 1,
// 	'largeIcon'	=> 'large_icon',
// 	'smallIcon'	=> 'small_icon'
// );
// $fields = array
// (
// 	'registration_ids' 	=> $registrationIds,
// 	'data'			=> $msg
// );
 
// $headers = array
// (
// 	'Authorization: key=' . API_ACCESS_KEY,
// 	'Content-Type: application/json'
// );
 
// $ch = curl_init();
// curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
// curl_setopt( $ch,CURLOPT_POST, true );
// curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
// curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
// curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
// curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
// $result = curl_exec($ch );
// curl_close( $ch );
// echo $result;

// cV4SzvL6kvk:APA91bGkz_I6YT8b4Wf8N7w0Fkc8rDSMdFQnmjXEqJTp9cS-W3HMKV12mJnsWYphfv8iDeI1m-812e4PqRYF6Hnn2PVFhFvdOVPw1K6yS_xvQVv8DH7nTZfJbEb9NnW5ZAMRxMQLM_Ho



?>