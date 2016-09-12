<?php

echo "Enter the Equation: " . PHP_EOL;

// the script will wait here until the user has entered something and hit ENTER
$eqtn = read_stdin();
$eqtn = str_replace(' ', '', $eqtn);

echo "The equation you entered is $eqtn" . PHP_EOL;

// looking at each charater in the equation
$len = strlen($eqtn);
echo "length of equation is $len" . PHP_EOL;
//$char = array();

for ($i=0; $i<$len; $i++)
{
	if ($eqtn[$i]=="&" || $eqtn[$i]=="|")
 	{
 		//call the expression function
 		$char[$i] = func_exprsn($eqtn[$i-1], $eqtn[$i], $eqtn[$i+1]);
 		echo "$char[$i]";
 	}
 	else
 	{
 		$char[$i] = $eqtn[$i];	
 		//echo "$char[$i]";
 	}
}

// function to read from the command line
function read_stdin()
{
        $fr=fopen("php://stdin","r");   
        $input = fgets($fr,128);        
        $input = trim($input);         
        fclose ($fr);                   
        return $input;                  
}

function func_exprsn($op1, $op2, $op3)
{
	if ($op1==$op3)
	{
		if ($op1=="T")
			return 'T';	
		else if ($op1=="F")
			return 'F';
		else
			return $op1;
	}

	else if ($op1!=$op3)
	{
		if (($op1=="T" && $op3=="F") || ($op1=="F" && $op3=="T"))
		{
			if ($op2 =="&")
				return 'F';
			elseif ($op2=='|') 
				return 'T';
		}
		else
			return $op1.$op2.$op3;
	}
}

?>