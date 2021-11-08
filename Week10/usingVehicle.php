<?php
// http://localhost/VehicleNoInheritance/usingvehicle.php
require_once("clsVehicle.php");
// Method 1: Declare the object and call the constructor 
$objSpyder = new clsVehicle("523 Spyder", 970205);
// Method2: Declare the object with no parameters 
$objCayman = new clsVehicle();

//echo "$objCayman";
echo "" . $objSpyder->ShowMeData() . "";
$objSpyder->setModel("New model");
$objSpyder->setPrice(200000);
echo "<br>" . $objSpyder->ShowMeData() . "";
echo "<br>Markup:" . $objSpyder->getMarkupPercent() . "";
echo "<br>Tax:" . $objSpyder->getTaxRate() . "";
?>