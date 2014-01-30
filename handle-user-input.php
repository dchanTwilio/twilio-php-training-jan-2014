<?php	 
	require "./Services/Twilio.php";
	 
	// Challenge 1, Step 2: Route the caller based on the results of <Gather>
	// Determine the key pressed by the user

	$digit = isset($_REQUEST['Digits']) ? $_REQUEST['Digits'] : null;

	// Create a TwiML response
	$response = new Services_Twilio_Twiml();

	$response->pause(array('length' => '1'));

	$response->say("Please wait while I connect your call", 
		array('voice' => 'alice'));

	# <Dial> to second party
	$dial_directory = array(
		'1' => '+15551234567',
		'2' => '',
		'3' => ''
	);
    // Challenge 1, Step 3: Enabling recording
    $response->dial($dial_directory[$digit], 
		array(
			'record' => 'true', 
			'action' => "/persist-recording.php"
		));
	
	header('Content-Type: text/xml');
	print $response;
?>