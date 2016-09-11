<?php

echo "Enter the Equation: " . PHP_EOL;

// the script will wait here until the user has entered something and hit ENTER
$eqtn = read_stdin();

echo "The equation you entered is $eqtn" . PHP_EOL;

// looking at each charater in the equation
$len = strlen($eqtn);
echo "length of equation is $len" . PHP_EOL;
$char = array();

for ($i=0; $i<$len; $i++)
{
	if ($eqtn[$i]==" ")
	{
		//do nothing --> removes whitespace in between the equation
	}
	else if ($eqtn[$i]=="!")
	{
		// call the Not function
		//$char[$i] = func_not($eqtn[$i+1]);
		$char[$i] = $eqtn[$i+1];
	}
	elseif ($eqtn[$i]=="&") {
		// call the and function
		$char[$i] = func_and($eqtn[$i-1], $eqtn[$i+1]);
	}
	elseif ($eqtn[$i]=="|") {
		// call the OR function
		$char[$i] = func_or($eqtn[$i-1], $eqtn[$i+1]);
	}
	else
	{
		$char[$i] = $eqtn[$i];	
		echo "$char[$i]";
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

// function for NOT operation
function func_not($op)
{
	return $op;
}

// function for AND operation
function func_and($op1, $op2)
{
	return $op1 && $op2;	
}

// function for OR operation
function func_or($op1, $op2)
{
	return $op1 || $op2;	
}

?>