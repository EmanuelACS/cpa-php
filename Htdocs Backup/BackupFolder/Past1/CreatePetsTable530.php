<?php
// http://localhost/CreatePetsTable530.php
require_once("EmanuelDobraInclude.php");
WriteHeaders("Create Pets", "Create Pets Table");
echo "The purpose of this page is to 
    verify the Pets table creation. <br><br>";
$mysqlObj = CreateConnectionObject();
$TableName = "Pets"; 
$stmt = $mysqlObj -> prepare("Drop table if exists $TableName");
$stmt -> execute();
$PetName = "PetName varchar(30)";
$Weight = "Weight decimal (4,1)";
$AnimalType = "AnimalType varchar(20)";
$SQLStatement = "Create Table 
    $TableName($PetName, $Weight, $AnimalType)";
    echo $SQLStatement;
$stmt = $mysqlObj -> prepare($SQLStatement);
if ($stmt == false) {
    echo "prepare failed on query $SQLStatement";
    exit;
}
$CreateResult = $stmt -> execute(); 
if ($CreateResult) {
    echo "$TableName table created.";
} else {
    echo "Cannot create $TableName. Query $SQLStatement failed." . $stmt -> error;
}
$stmt -> close();
$mysqlObj -> close();

echo "<br><br>\n";
WriteFooters();
?>