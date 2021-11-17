<?php 
require_once("CustomersAndEmployees.php");

$objCustomer = new clsCustomer();
$objCustomer->setFirstName("John");
$objCustomer->setLastName("Smith");
$objCustomer->setCardNumber(102131);
echo "Name: " . $objCustomer->getFirstName() . 
    " " . $objCustomer->getLastName() . 
    "<br>Card Number: " . $objCustomer->getCardNumber() .
    "<br>" . $objCustomer->bdayGreeting() . "<br><br>";

$objEmployee = new clsEmployee();
$objEmployee->setFirstName("John");
$objEmployee->setLastName("Smith");
$objEmployee->setYearsSeniority(5);
echo "Name: " . $objEmployee->getFirstName() . 
    " " . $objEmployee->getLastName() . 
    "<br>Card Number: " . $objEmployee->getYearsSeniority() .
    "<br>" . $objEmployee->bdayGreeting();
?>