<?php
// http://localhost/InjectionTesting.php
require_once("EmanuelDobraInclude.php");
WriteHeaders("InjectionTesting","InjectionTesting");	
$mysqlObj = CreateConnectionObject();

// create cars table
$createStatement = "Create table if not exists cars (Model varchar(50));";
$stmt = $mysqlObj->prepare($createStatement);
$success = $stmt->execute();

// Example 1 accounts for injection, using prepare and bind_param
$TableName = "cars";
// the code below inserts honda;drop table Pets; 
// in the new record.  
$dataToInsert1 = "honda;drop table Pets;";
$query = "Insert Into $TableName Values (?)";
$stmt = $mysqlObj->prepare($query);
$BindSuccess = $stmt->bind_param("s", $dataToInsert1);
$success = $stmt->execute();
if ($success) 
  echo  "<p>" . $mysqlObj->affected_rows . " record added to $TableName. 
        Record contains  honda;drop table Pets;</p>";
 
// Example 2 accounts for injection, using prepare and bind_param
// the code below inserts It's been great fun
// in the new record. 
// Without bind_param, the prepare fails on the single quote.
$dataToInsert1 = "It's been great fun";
$query = "Insert Into $TableName Values (?)";
$stmt = $mysqlObj->prepare($query);
$BindSuccess = $stmt->bind_param("s", $dataToInsert1);
$success = $stmt->execute();
if ($success) 
  echo  "<p>" . $mysqlObj->affected_rows . " record added to $TableName
        Record contains  It's been great fun</p>";
$stmt->close(); 
$mysqlObj->close();
WriteFooters(); 
?>