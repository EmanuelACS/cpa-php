<?php
// http://localhost/InsertIntoPatientsAppts.php
require_once("JanisInclude.php");
WriteHeaders("Insert Into Patients and Appts","InsertIntoPatientsAppts");	
$mysqlObj = CreateConnectionObject();
$TableName = "Patients";
$IDNum = 1; $HCN = '5555010232KJ'; $PatientName = 'Lola'; $BirthDate = '1963-04-18';
InsertIntoPatientsTable($mysqlObj, $TableName, $IDNum, $HCN, $PatientName, $BirthDate);
$IDNum = 2; $HCN = '4444456789NN'; $PatientName = 'Nina'; $BirthDate = '1977-05-11';
InsertIntoPatientsTable($mysqlObj, $TableName, $IDNum, $HCN, $PatientName, $BirthDate);
$IDNum = 3; $HCN = '7777888993OP'; $PatientName = 'Billy'; $BirthDate = '1955-03-25';
InsertIntoPatientsTable($mysqlObj, $TableName, $IDNum, $HCN, $PatientName, $BirthDate);
$IDNum = 4; $HCN = '7453125478QQ'; $PatientName = 'Vince'; $BirthDate = '1999-01-31';
InsertIntoPatientsTable($mysqlObj, $TableName, $IDNum, $HCN, $PatientName, $BirthDate);

$TableName = "Appts";
$IDNum = 1; 
$ApptDate = '2016-02-17';
$ApptTime = '15:08';                           
InsertIntoApptsTable($mysqlObj, $TableName, $IDNum, $ApptDate, $ApptTime);	
$IDNum = 1; 
$ApptDate = '2017-7-7';
$ApptTime = '1:12';
InsertIntoApptsTable($mysqlObj, $TableName, $IDNum, $ApptDate, $ApptTime);	
$IDNum = 2; 
$ApptDate = '2016-12-04';
$ApptTime = '7:14';
InsertIntoApptsTable($mysqlObj, $TableName, $IDNum, $ApptDate, $ApptTime);	
$IDNum = 3; 
$ApptDate = '2016-12-14';
$ApptTime = '12:40';
InsertIntoApptsTable($mysqlObj, $TableName, $IDNum, $ApptDate, $ApptTime);	
$IDNum = 3; 
$ApptDate = '2016-8-12';
$ApptTime = '9:10';
InsertIntoApptsTable($mysqlObj, $TableName, $IDNum, $ApptDate, $ApptTime);	
$IDNum = 2; 
$ApptDate = '2016-9-29';
$ApptTime = '11:00';
InsertIntoApptsTable($mysqlObj, $TableName, $IDNum, $ApptDate, $ApptTime);	
$IDNum = 3; 
$ApptDate = '2016-9-29';
$ApptTime = '1:00';
InsertIntoApptsTable($mysqlObj, $TableName, $IDNum, $ApptDate, $ApptTime);
$IDNum = 4; 
$ApptDate = '2016-9-29';
$ApptTime = '2:00';
InsertIntoApptsTable($mysqlObj, $TableName, $IDNum, $ApptDate, $ApptTime);
$mysqlObj->close();
WriteFooters();
// end main
	

function InsertIntoPatientsTable(&$mysqlObj,$TableName, 
                                 $IDNum, $HCN, $PatientName, $BirthDate)
{	
 	$stmt = $mysqlObj->prepare("INSERT INTO Patients VALUES (?,?,?,?)");
	$stmt->bind_param("isss",  $IDNum,$HCN, $PatientName, $BirthDate);
	if ($stmt->execute()) 
		echo "<p>Insert in to table $TableName worked.</p>";
	else
		echo "<p>Insert into table $TableName failed: (" . $stmt->errno . ") " . $stmt->error . "</p>";
	$stmt->close();
}

function InsertIntoApptsTable(&$mysqlObj,$TableName, $IDNum, $ApptDate, $ApptTime)
{	
	$stmt = $mysqlObj->prepare("INSERT INTO $TableName VALUES (?,?,?)");
	$stmt->bind_param("iss",  $IDNum, $ApptDate, $ApptTime);
	if ($stmt->execute()) 
		echo "<p>Insert in to table $TableName worked.</p>";
	else
		echo "<p>Insert into table $TableName failed: (" . $stmt->errno . ") " . $stmt->error . "</p>";
	$stmt->close();
}

?>