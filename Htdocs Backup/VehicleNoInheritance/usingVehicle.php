<?php
// http://localhost/VehicleNoInheritance/usingvehicle.php
require_once("clsVehicle.php");
// Method 1: Declare the object and call the constructor 
$objSpyder = new clsVehicle("523 Spyder", 970205);
// Method2: Declare the object with no parameters 
$objCayman = new clsVehicle();

//echo "$objCayman";
//echo "" . $objSpyder->ShowMeData() . "";
$objSpyder->setModel("New model");
$objSpyder->setPrice(1943248);
//echo "<br>" . $objSpyder->ShowMeData() . "";
//echo "<br>Markup:" . $objSpyder->getMarkupPercent() . "";
//echo "<br>Tax:" . $objSpyder->getTaxRate() . "";

$objSpyder->setModel("918 Spyder");
$objSpyder->setPrice(845000);
$spyderData = explode(" ", $objSpyder->CalculateTotal());
//$spyderData = $objSpyder->CalculateTotal();
echo "Your New Ride: " . $objSpyder->getModel() . "<br>";
echo "Price: $" . number_format($objSpyder->getPrice(), 0) . "<br>";
echo "Markup: $" . number_format($spyderData[0], 0) . "<br>";
echo "Subtotal: $" . number_format($spyderData[1], 0) . "<br>";
echo "Tax Amount: $" . number_format($spyderData[2], 0) . "<br>";
echo "Total: $" . number_format($spyderData[3], 0) . "<br>";
?>