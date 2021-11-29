<?php
// http://localhost/ExceptionHandlingHandout.php
require_once("ErrorMessages.php");

echo "<h1>School Bus Data</h1>";

$validNum = false;
$validModel = false;

//$NumStudents = 15; $ModelBus = "Yellow";
//$NumStudents = -2; $ModelBus = "";
//$NumStudents = -2; $ModelBus = "Yellow";
$NumStudents = 15; $ModelBus = "";

try {
    echo "<br> Validating Student Number: <br>";
    $validNum = validateNumStudents($NumStudents, $invalidNumStudentsMsg);
    echo "Validation Success!<br>";
} catch (Exception $e) {
    echo "Validation Failed!<br>";
    echo "Error Msg: " .
    $e -> getMessage() .
        ". <br> Filename: " . $e->getFile(). 
        ". <br> Code: " . $e->getCode() . 
        ". <br> Line number: " . $e->getLine() . 
        "<br>"; 
}

try {
    echo "<br> Validating Bus Model: <br>";
    $validModel = validateModel($ModelBus, $invalidModelMsg);
    echo "Validation Success!<br>";
} catch (Exception $e1) {
    echo "Validation Failed!<br>";
    echo "Error Msg: " .
    $e1 -> getMessage() .
        ". <br> Filename: " . $e1->getFile(). 
        ". <br> Code: " . $e1->getCode() . 
        ". <br> Line number: " . $e1->getLine(); 
}

if ($validModel && $validNum) 
    echo "<br> Capacity for $ModelBus is $NumStudents. <br>";

function validateNumStudents($StudentNum, $InvalidMsg) {
    if ($StudentNum < 0) 
        throw new Exception($InvalidMsg, 727);
    else 
        return true;
}

function validateModel($BusModel, $InvalidMsg) {
    if ($BusModel == "") 
        throw new Exception($InvalidMsg, 999);
    else       
        return true; 
}
?>