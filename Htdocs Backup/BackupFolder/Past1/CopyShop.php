<?php // Name: Emanuel Dobra
// http://localhost/CopyShop.php

function GetInfoForm() {
// header
echo "<!doctype html>
<html lang = \"en\">
<head>
    <meta charset = \"UTF-8\">
    <title>CopyShop</title>\n
    <link rel =\"stylesheet\" type = \"text/css\" href=\"ZooParameters.css\"/>
</head>
<body>\n";

// form
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
}

function CalculateandShowResultsForm() {
    $CustomerType = $_POST["f_CustomerType"];
    $NumCopies = $_POST["f_NumCopies"];
    echo "<p>Customer Type: " . $CustomerType . "</p>\n";
    echo "<p>Number of Copies: " . $NumCopies . "</p>\n";
    $PageRate = GetCostofPage($CustomerType);
    CalculateTotal($PageRate, $NumCopies);
}

function GetCostofPage($CustomerType="Regular") {
    if ($CustomerType == "Regular") 
        $PageRate = 0.20;
    else if ($CustomerType == "Corporate") 
        $PageRate = 0.15;
    else if ($CustomerType == "Government")
        $PageRate = 0.10;
    return $PageRate;
}

function CalculateTotal($Price, $NumCopies) {
    $Subtotal = $Price * $NumCopies;
    $Tax = $Subtotal * 0.13;
    $Total = $Subtotal + $Tax;

    echo "<p>Subtotal: " . number_format($Subtotal, 2) . "</p>";
    echo "<p>Tax Amount: " . number_format($Tax, 2) . "</p>";
    echo "<p>Total: " . number_format($Total, 2) . "</p>";
}

// main
if (isset($_POST['f_DisplayData']))
    CalculateandShowResultsForm();
else 
    GetInfoForm();
?>
