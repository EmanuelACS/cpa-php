<?php
// http://localhost/UpdatePatient.php
require_once("JanisInclude.php");
WriteHeaders("Update Patients and Appts","UpdatePatientsAppts");	
// Connect to MySQL
$mysqlObj = CreateConnectionObject();
$TableName = "Patients";
$ChangeCol = "HealthCardNbr";
$Clause = "Billy";
$Col2 = "Name";
UpdatePatientsField($mysqlObj, $TableName, $ChangeCol, $Clause);

function UpdatePatientsField(&$mysqlObj, $TableName, $ChangeCol, $Clause) {
    $stmt = $mysqlObj->prepare("UPDATE $TableName SET $ChangeCol = CONCAT(IDNum, ' ', Name) WHERE Name = ?");
    $stmt->bind_param("s", $Clause);
    if ($stmt->execute()) 
        echo "<p>Updated $TableName successfully.</p>";
    else
        echo "<p>Failed to update $TableName: (" . $stmt->errno . ") " . $stmt->error . "</p>";
    $stmt->close();
}
?>