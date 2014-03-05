<?php
/* 
 * WordPress VIP to HipChat Deploy Webhook
 * 
 * Converts a web-hook request from WordPress VIP to an API call to HipChat for notification delivery.
 * 
 * TODO: Cleanup the process and make the code more robust and extendable, this was a quick-hack first version
 */


/* 
 * Standard Variables / Constants
 */
$auth_token = '';
$room_id = '';


/* 
 * The 'meat' of the functionality
 */
if( $_REQUEST['repo'] == 'vip' ) {
		
	$fields = array(
			'room_id' => urlencode($room_id),
			'from' => urlencode('WordPress VIP'),
			'message' => urlencode( '[VIP]['. $_REQUEST['theme'] .'] Deploy Notification (r'. $_REQUEST['deployed_revision'] .') by '.$_REQUEST['deployer'] ),
			'notify' => 1,
			'color' => urlencode('purple'),
			'format' => urlencode('json'),
			'auth_token' => urlencode( $auth_token ),
	);
	
	//url-ify the data for the POST
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	
	//open connection
	$ch = curl_init();
	
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, 'https://api.hipchat.com/v1/rooms/message');
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	
	//execute post
	$result = curl_exec($ch);
	
	//close connection
	curl_close($ch);

}

?>
