//Resources:  All code was developed with the use of the lectures and resources provided from OSU's CS 290 course

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Multtable</title>
	</head>
<body>
	
	<?php
	$min1 = htmlspecialchars($_GET['min-multiplicand']);
	$max1 = htmlspecialchars($_GET['max-multiplicand']);
	$min2 = htmlspecialchars($_GET['min-multiplier']);
	$max2 = htmlspecialchars($_GET['max-multiplier']);
	$error = 0;

	if($min1 > $max1) 
	{													//begin error checking.  compare min/max
		echo "Minimum multiplicand larger than maximum. <br />";
		$error++;
	}

	if($min2 > $max2) 
	{
		echo 'Minimum multiplicand larger than maximum. <br />';
		$error++;
	}
	
	if(!is_numeric($min1)) 
	{
		echo 'min-multiplicand must be an integer. <br />';			//check that parameters are integers
		$error++;
	}

	if(!is_numeric($max1)) 
	{
		echo 'max-multiplicand must be an integer. <br />';
		$error++;
	}

	if(!is_numeric($min2)) 
	{
		echo 'min-multiplier must be an integer. <br />';
		$error++;
	}

	if(!is_numeric($max2)) {
		echo 'max-multiplier must be an integer. <br />';
		$error++;
	}
	
	if(empty($min1)) 
	{															//check for missing parameters
		echo 'Missing parameter: min-multiplicand. <br />';
		$error++;
	}

	if(empty($max1)) 
	{
		echo 'Missing parameter: max-multiplicand. <br />';
		$error++;
	}

	if(empty($min2)) 
	{
		echo 'Missing parameter: min-multiplier. <br />';
		$error++;
	}

	if(empty($max2)) 
	{
		echo 'Missing parameter: max-multiplier. <br />';
		$error++;
	}
	
	if($error > 0) {		//if an error is found, exit
	exit(1);
	}

	settype($min1, "integer");			//change types to integer
	settype($max1, "integer");
	settype($min2, "integer");
	settype($max2, "integer");
	$numRows = $max1 - $min1 + 2;
	$numCols =  $max2 - $min2 + 1;

	echo '<table border="1">';

	for($i = 0; $i < $numRows; $i++) 								//fill the columns
	{
		if($i == 0)
		{
			echo '<tr><td>&nbsp;</td>'; 							//add an empty cell in the upper left corner of the table	
		}
	
		if($i > 0) 
		{
			echo '<tr><td>' . ($min1 + $i - 1) . '</td>'; 			//fill the left column 
		}
	
	for($j = 0; $j < $numCols; $j++) 								//fill the rows
	{
		if($i == 0) 
		{
			echo '<td>' . ($min2 + $j) . '</td>'; 					//fill the rest of the first row 
		}
		
		if ($i > 0) 
		{
			echo '<td>' . ($min1 + $i - 1) * ($min2 + $j) . '</td>'; //fill the rest
		}
	}
}

echo '</table>';
	
?>
	
</body>

