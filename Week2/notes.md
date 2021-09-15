### Tips
1.	If the code is html, place the code inside an echo. 
2.	If the code is php, do not put it in an echo.
3.	For page navigation to work, your data entry controls and button must be inside a form.

### Concat strings
```
$Answer = "this" . "that"; // Produces "thisthat"
$Value = 1000;
$Saying = "An image is worth a " . $Value . " words.";  
```

### POST Method
```
// i.e textbox
<Input type = text name = \"f_AnimalName\" Size = 20>
// When use posts a method, it will be stored in a global array 
$_POST["f_AnimalName"]
```

### Functions
```
// Params are separated by ","
// Params are passed by value (default), use "&" to pass by reference
// Return functions are not mandatory 

// Print name function
function PrintName($FName, $LName) {
    echo "Name: $FName $LName";
    return(0); // use return(0) if nothing is being returned (optional)
} 

// Main
$FName = "First";
$LName = "Last";
PrintName($FName, $LName);

// Square number function
function SquareNum($Num) {
    return ($Num * $Num);
}

// Main
$Value = 10;
$ValueSquared = SquareNum($Value);

// Get pre-determined name
function GetName(&$FName, &$LName) {
    $FName = "First";
    $LName = "Last"; 
    return(0);
}

GetName($FName, $LName); // Sent by reference