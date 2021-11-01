<?php
// http://localhost/exceptionhandling.php
echo "<h1>Welcome to the Exception Handling Land</h1>";
echo "<h2>Divide by Zero Example</h2>";
$x = 5; 
$y = 20;
// $y = 0; 
try 
{
	echo "I'm inside the try. ";
	if ($y == 0)
		// The error message is defined here but not displayed  
		// until you call method getMessage. 17 is the error code.
		throw new Exception('Divide by zero error',17);
	$z = $x/$y; 
	echo "$x divided by $y is $z.";
	echo "Now, I'm at the end of the try. ";
} // end try
catch (Exception $e)
{
	echo "Now, I am in the Catch. Message: " . $e->getMessage() .
	     ". Filename: " . $e->getFile(). 
		 ". Code: " . $e->getCode() . 
		 ". Line number: " . $e->getLine();
} // end catch
 
echo "<h2>Array Example</h2>";
$myArray = array(79, 35, 12, 393);
try{
	$index = 3;
	// $index = 4;
    if ($index > sizeof($myArray)- 1)
        throw new OutOfBoundsException("Exceeding end of array");
	
	echo "All good in the array try. Can move forward with array work."; 
}
catch (OutOfBoundsException $e1)
	{ echo ("I'm in the out of bounds catch. Error is " . $e1->getMessage());}
 
 
?>