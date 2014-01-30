<?php
	require "./Services/Twilio.php";
	 
	// Challenge 1, Step 1: Receive inbound call. 
	// Present an IVR menu to the caller

	// Create a TwiML response
	$response = new Services_Twilio_Twiml();

	$response->pause(array(
		'length' => '1'
	));
	$gather = $response->gather(array(
		'action' => 'handle-user-input.php',
		'method' => 'POST',
		'numDigits' => '1'
	));
	$ivr_prompt = 'Hi there...
		Press 1 to talk to Alice...
		Press 2 to talk to Bob...
		Press 3 to talk to George.';

	$gather->say($ivr_prompt);

	header('Content-Type: text/xml');
	print $response;
?>