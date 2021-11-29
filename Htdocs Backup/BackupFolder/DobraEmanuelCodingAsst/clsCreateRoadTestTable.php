<!-- http://localhost/DobraEmanuelCodingAsst/asstMain.php -->
<?php
require_once("asstInclude.php");
class clsCreateRoadTestTable 
{
    function createTheTable(&$mysqlObj, $TableName)
    {
        $mysqlObj = createConnectionObject(); 
        if (($stmt = $mysqlObj->prepare("Drop table If Exists $TableName"))) 
        $stmt->execute();
        $CreateQuery = "Create table " . $TableName . " (";
        $CreateQuery .= "licensePlate varchar(10), dateTimeStamp datetime,";
        $CreateQuery .= "nbrPassengers integer, incidentFree boolean, dangerStatus varchar(1),";
        $CreateQuery .= "speed decimal(4,1), cost decimal (7,2))";
        $stmt = $mysqlObj->prepare($CreateQuery);
        if ($stmt->error)
        { 
            echo "Prepare failed ". $stmt->error . $mysqlObj->error; 
            exit; 
        }
        if ($stmt->execute()) 
            echo "<p>Table $TableName created.</p>\n";
        else
            echo "<p>Unable to create table $TableName.</p>"; 
        
        $stmt->close();	
    }
}
?>