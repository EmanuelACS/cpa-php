<?php
// http://localhost/CreatePatientsApptsTables.php
require_once("JanisInclude.php");	
WriteHeaders("Create Patients Appts","Create Patients Appts");	
$mysqlObj = CreateConnectionObject();
$TableName = "Patients";
DropTable($mysqlObj, $TableName);
CreatePatientsTable($mysqlObj, $TableName);
$TableName = "Appts";
DropTable($mysqlObj, $TableName);
CreateApptsTable($mysqlObj, $TableName);	
$mysqlObj->close();
WriteFooters(); 
	
function DropTable(&$mysqlObj, $TableName)
{
	if (($stmt = $mysqlObj->prepare("Drop table $TableName"))) 
	$stmt->execute();
}
	
function CreatePatientsTable(&$mysqlObj,$TableName)
{
	$IDNum = "IDNum Int";
	$HCN = "HealthCardNbr varchar(20)";
	$Name = "Name varchar(25)";
	$BirthDate = "BirthDate date";
	$stmt = $mysqlObj->prepare("Create Table $TableName($IDNum,$HCN, $Name, $BirthDate,primary key (IDNum))");
	if ($stmt == false) 
	{	
		echo "Prepare failed on query $SQLStatement";
		exit;
	}
	$CreateResult = $stmt->execute();
	if ($CreateResult) 
		echo "$TableName table created.";
	else
		echo "Can't create table $TableName. Execute failed: (" . $stmt->errno . ") " . $stmt->error;

	$stmt->close();
}
function CreateApptsTable(&$mysqlObj, $TableName)
{
	$IDNum = "IDNum Int";
	$ApptDate = "ApptDate date";
	$ApptTime = "ApptTime time";
	
	$stmt = $mysqlObj->prepare("Create table $TableName ($IDNum, $ApptDate, $ApptTime)");
	if ($stmt == false) 
	{	
		echo "Prepare failed on query $SQLStatement";
		exit;
	}
	$CreateResult = $stmt->execute();		
	if ($CreateResult) 
		echo "$TableName table created.";
	else
		echo "Can't create table $TableName. Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	$stmt->close();
}
?> 