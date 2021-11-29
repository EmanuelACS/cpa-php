<?php
// http://localhost/DisplayPatientsAppts.php
require_once("JanisInclude.php");	
WriteHeaders("Display Patients and Appts","DisplayPatientsAppts");	
$mysqlObj = CreateConnectionObject();
showAll($mysqlObj);  
// pretending this came from user
$BirthDate = "1963-04-18";
searchOnBirthDate($mysqlObj, $BirthDate);
$mysqlObj->close();
WriteFooters();

function showAll($mysqlObj)
{
	echo "<h2>Showing All Records</h2>";
	$SelectString = "Select Patients.IDNum, HealthCardNbr, Name, BirthDate, ApptDate, ApptTime from ";
	$SelectString .= "Patients Inner Join Appts On Patients.IDNum = Appts.IDNum";
	$stmt = $mysqlObj->prepare($SelectString) ; 
 	// no bind_param bec no data came from user
	$stmt->bind_result($IDNumField, $HealthCardNbrField, $NameField, $BirthDateField, 
	                   $ApptDateField, $ApptTimeField);
	$stmt->execute();
	while ($stmt->fetch())
	 echo "<p>$IDNumField, $HealthCardNbrField, $NameField, $BirthDateField, $ApptDateField, $ApptTimeField</p>";
 	$stmt->close();
}
	
function searchOnBirthDate($mysqlObj, $BirthDate)
{
echo "<h2>Searching on Birth Date April 18, 1963</h2>";
 
	$SelectString = "Select Name, BirthDate, ApptDate, ApptTime ";
	$SelectString .= "from Patients Inner Join Appts on patients.idnum = ";
	$SelectString .= "appts.idnum Where BirthDate = ?";  
	$stmt = $mysqlObj->prepare($SelectString) ; 
	$stmt->bind_param("s",$BirthDate);
	$stmt->bind_result($NameField, $BirthDateField, $ApptDate, $ApptTime);
	$stmt->execute();
	while ($stmt->fetch())
		echo "<p>$NameField, $BirthDateField, $ApptDate, $ApptTime</p>";
 	$stmt->close();
}

?>