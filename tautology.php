<?php

echo "Enter the Equation: " . PHP_EOL;

// the script will wait here until the user has entered something and hit ENTER
$Equation = read_stdin();

echo "The equation you entered is $Equation" . PHP_EOL;


// function to read from the command line
function read_stdin()
{
        $fr=fopen("php://stdin","r");   
        $input = fgets($fr,128);        
        $input = rtrim($input);         
        fclose ($fr);                   
        return $input;                  
}



?>