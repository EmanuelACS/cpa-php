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
// use name=/"varName/" in html to store variable
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
```

### File manipulation
```
// Open file
$Rfile = fopen("file.dat", "r+") or fail("Unable to open file.dat file!");
// Check eof 
$Revenues = 0;
while(!feof($Rfile)) {
    $Rvalue = fgets($Rfile);
    echo $Rvalue;
    echo "<br>";
    $Revenues += $Rvalue;
}
echo "Total Revenues: $" . $Revenues;
fclose($Rfile);
```

### if while for
```
if ($Total == 0) {
  echo "You broke even.";
}
else if ($Total > 0) {
  echo "Profit: $" . $Total;
}
else {
  echo "Loss: $" . $Total;
}

for (init counter; test counter; increment counter) {
  code to be executed for each iteration;
}

for ($x = 0; $x <= 10; $x++) {
  echo "The number is: $x <br>";
}

while (condition is true) {
  code to be executed;
}

$x = 1;
while($x <= 5) {
  echo "The number is: $x <br>";
  $x++;
}

```

### Pages
```
// if f_DisplayData is clicked, go to page 2
if (isset($_POST['f_DisplayData']))
    DisplayDataForm(); 
else 
    // if f_Done is clicked go here, page 3
    if (isset($_POST['f_Done']))
        GoodbyeForm();
    else
        // we are on the first page
        DataEntryForm();

OR 
if (isset($_POST['f_DisplayData']))
    // page 2 if f_DisplayData button is clicked (form)
    CalculateandShowResultsForm();
else 
    // page 1 if nothing is clicked
    GetInfoForm();
```

### Footer / mail
```
function DisplayContactInfo() {
    echo "<footer>Questions? Comments? 
    <a href = \"mailto:emanuel.dobra@student.sl.on.ca\">
    emanuel.dobra@student.sl.on.ca</a>\n";    
    echo"</footer>\n\n";
}
```

### Forms
```
    echo "<form action = ? method=post>\n";
    echo "<div class = \"DataPair\">\n";
      DisplayLabel("Name");
      DisplayTextBox("f_AnimalName", 20, "Claws");
    // label
    echo "<label>" . $Prompt . "</label>\n";
    // Textbox
    echo "<input type=text name=\"$Name\"  size=\"$Size\" value=\"$Value\">\n";
    echo "<p>Notes <TEXTAREA name=\"f_Notes\" rows=5 columns=40></TEXTAREA></p>\n";
    echo "</div>\n";
    // Image
    if ($Width == 0) {
        echo "  <img src=\"$Image\", alt=\"$Alt\" style=\"width:100;\">\n";
    } else {
        echo "  <img src=\"$Image\", alt=\"$Alt\" width=$Width height=$Height>\n";
    }
    // Submit button
    echo "  <button type=Submit name=\"f_DisplayData\">Display Data</button>\n"; 
    echo "</form>\n"; // closing form
```

### Include
```
require_once("EmanuelDobraInclude.php");
```

### Select menu
```
echo "<form action = ? method=post>\n
<label>Customer Type</label><br>
<select Name=\"f_CustomerType\" Size=\"3\">  
  <option> Regular </option>  
  <option> Corporate </option>  
  <option> Government </option>    
</select>
<br><br>
<label for=\"numCopies\">Number of Copies</label><br>
<input type=\"number\" id=\"numCopies\" name=\"f_NumCopies\">
<br><br>
<button type=Submit name=\"f_DisplayData\">Display Data</button>\n
</form>\n";
```