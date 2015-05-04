//Resources:  All code was developed with the use of the lectures and resources provided from OSU's CS 290 course and the PHP manual

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Loopback</title>
	</head>

<body>
	<?php
	error_reporting(E_ALL);						//for error display
	ini_set('display_errors',1);
	header('Content-type: text/plain');

	$gp = array();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') 	//These methods are from the PHP manual.  if the request is a post...
	{
    	$gp['Type'] = 'POST';					//add to array

	}

	else if ($_SERVER['REQUEST_METHOD'] === 'GET') //else if the request is a Get
	{
		$gp['Type'] = 'GET';					//add to array

	}

	else {}

	if (count($_GET) === 0 && count($_POST) === 0) //if no key value pairs are passed
	{
		$gp['parameters'] = null; 
	}

	else {											//else, key value pairs are passed

	$gp['parameters'] = new stdClass();					//from PHP manual
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') 			//from PHP manual
	{
		$postString = file_get_contents("php://input");
    	parse_str($postString, $gp['parameters']);
	}

	else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		parse_str($_SERVER['QUERY_STRING'], $gp['parameters']);
	}

	else {}
	
	}

	echo json_encode($gp);		//encode into JSON string and output it

</body>
</html>
