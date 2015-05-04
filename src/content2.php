//Resources:  All code was developed using the lectures and resources from OSU's CS 290 course and the PHP manual.  

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Content2</title>
	</head>
<body>

<?php

	session_start();

	if((isset($_GET['login']) && $_GET['login'] == 'correct')) 	//if login is successful, link to content1
	{
		echo '<br>';
		echo '<a href="http://web.engr.oregonstate.edu/~sharkazm/assignment4-part1/src/content1.php?login=correct" target="_self">Content1.php</a>';
	} 

	else //else prompt user to enter name again.  provide link for returning to login.
	{
		echo 'Please enter a username. Click <a href="http://web.engr.oregonstate.edu/~sharkazm/assignment4-part1/src/login.php?execute=logout" target="_self">here</a> to login.';
	}
?>

</body>
</html>
