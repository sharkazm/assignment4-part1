//Resources:  All code was developed using the lectures and resources from OSU's CS 290 course and the PHP manual.  

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Content1</title>
	</head>

<body>

<?php

	session_start();

	if(isset($_SESSION))			//if $_SESSION is set, uses nested if statements to get number of visits.  if 
	{
		if(isset($_SESSION['username']) && $_POST['username'] != $_SESSION['username'])		
		 {
			if($_GET['login'] != 'correct') 	//if login is unsuccessful, start again
			{
				unset($_SESSION['count']);		
				unset($_SESSION['username']);
				session_destroy();
				session_start();
			}
		}

		if(!isset($_SESSION['username']) && isset($_POST['username'])) 
		{
			$_SESSION['username'] = $_POST['username'];
		}

		if(!isset($_SESSION['count']))		
		{
			$_SESSION['count'] = 0;
		} 

		else 		//increment count
		{
			$_SESSION['count'] += 1;
		}

		//give visit count.  give option to log out or visit content2
		echo '<br>Hi '.$_SESSION['username'].', you have visited this page '.$_SESSION['count'].' times before.<br><br>		

				  Click <a href="http://web.engr.oregonstate.edu/~sharkazm/assignment4-part1/src/login.php?execute=logout" target="_self">here</a> to logout.<br><br>';
		echo '<a href="http://web.engr.oregonstate.edu/~sharkazm/assignment4-part1/src/content2.php?login=correct" target="_self">Content2.php</a>';
	} 

	else 	//if login not successful, prompt entry of user name and link back to login page
	{
		echo 'Please enter a username. Click <a href="http://web.engr.oregonstate.edu/~sharkazm/assignment4-part1/src/login.php?execute=logout" target="_self">here
			</a> to login.';
	}
?>

</body>
</html>
