<?php
// What is the circumsatnce where a php and mysql update reports that it worked even though no changes were made to the table
// You throw exceptions in class and deal it outside the class
// http://localhost/exceptionhandling.php
echo "<h1>Welcome to the Exception Handling Land</h1>";
echo "<h2>Divide by Zero Example</h2>";
$x = 5; 
$y = 20;
$y = 0; 
// try to do all the code in here, 
// if it's about to crash, go to catch
try {
	echo "I'm inside the try. <br>";
	if ($y == 0)
		// The error message is defined here but not displayed  
		// until you call method getMessage. 17 is the error code.
		// General exception thrown (works for any)
		throw new Exception('Divide by zero error',17);
	$z = $x/$y; 
	echo "$x divided by $y is $z. <br>";
	echo "Now, I'm at the end of the try. ";
} // end try
catch (Exception $e) { // create exception object
	echo "Now, I am in the Catch. <br> Message: " . $e->getMessage() .
	     ". <br> Filename: " . $e->getFile(). 
		 ". <br> Code: " . $e->getCode() . 
		 ". <br> Line number: " . $e->getLine();
} // end catch
 
echo "<h2>Array Example</h2>";
$myArray = array(79, 35, 12, 393); // 4 elements, idx[0-3];
try{
	$index = 3;
	// $index = 4;
    if ($index > sizeof($myArray)- 1)
		// Specific exception:outofbounds thrown, specifc to arrays
        throw new OutOfBoundsException("Exceeding end of array");
	
	echo "All good in the array try. Can move forward with array work."; 
}
catch (OutOfBoundsException $e1)
	{ echo ("I'm in the out of bounds catch. Error is " . $e1->getMessage());}
 
//Run workbench You will have to do it on every machine
//Go to edit -> preferences
//Click "SQL Editor" tab and uncheck "Safe updates" (rejects updates and deletes with no restrictions) check box.
//Close local instance (query 1 tab)
//Open new connection 
?>

