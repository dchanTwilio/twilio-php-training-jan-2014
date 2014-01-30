<?php	 
	require "./Services/Twilio.php";

	fclose(STDOUT);
	$STDOUT = fopen('application.log', 'w');
	 
	// Extract RecordingUrl from Twilio POST request
	$recording_url = isset($_REQUEST['RecordingUrl']) ? $_REQUEST['RecordingUrl'] : null;
	$call_sid = isset($_REQUEST['CallSid']) ? $_REQUEST['CallSid'] : null;

	// Create a TwiML response
	$response = new Services_Twilio_Twiml();
	$response->hangup();

	// Simulate storing the Recording Url by printing the stdout
	fwrite($STDOUT, "Link to RecordingUrl: " . $recording_url . " for the CallSid: " . $call_sid); 

	header('Content-Type: text/xml');
	print $response;
?>
