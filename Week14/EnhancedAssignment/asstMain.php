<?php
//http://localhost/EnhancedAssignment/asstMain.php
require_once("asstInclude.php");
require_once ("clsCreateRoadTestTable.php");


date_default_timezone_set ('America/Toronto');
$mysqlObj;  
$TableName = "RoadTest";
WriteHeaders( "Tobias walters Coding Assignment","Coding Assignment");




$RoadTest = new clsCreateRoadTestTable;
$mysqlObj = createConnectionObject(); 

// This is where functions load depending on buttons clicked
if (isset($_POST["f_CreateTable"]))
CreateTableForm($RoadTest,$mysqlObj,$TableName);

else if(isset($_POST["f_DisplayData"]))
DisplayDataForm($mysqlObj,$TableName);

else if (isset($_POST["f_AddRecord"]))
addRecord($mysqlObj,$TableName);

else if(isset($_POST["f_validate"]))
getRecordandUpdate($mysqlObj,$TableName);

else if (isset($_POST["f_modifyData"]))
SearchTable();

else if(isset($_POST["f_Save"]))
SaveRecordToTableForm($mysqlObj,$TableName);

else
DisplayMainForm();



if(isset($mysqlObj))
$mysqlObj->close();


displayContactInfo();
WriteFooters();







//This Function holds the form that displays the home page, it has 3 buttons
function DisplayMainForm()
{

echo"<form action? method=post>";

displayButton("f_CreateTable","Create Table","createtable.png","Create Table");
displayButton("f_AddRecord","Add Record","addrecord.png","Add Record");
displayButton("f_DisplayData","Display Data","displaydata.png","Display Data");
displayButton("f_modifyData","Modify Data","","");


echo"<br><br></form>";
}


//This function creates the table, drops table if the tablename already exists

function  CreateTableForm($RoadTest,$mysqlObj,$TableName )
{

echo "<form action=? method=post>";

$RoadTest->createTheTable($mysqlObj, $TableName);

echo "<br>";

displayButton("f_Home","Home Page","home.png","Home");

echo"</form>";
}

//This function gets the data from the user and stores it into a post array
function addRecord()
{
//Could have used createTextbox function but the textbox would be placed outside my table

    echo "<form action=? method=post>";

    echo "<table><tr><th>Plate Number</th><th>Date</th><th>Time</th><th>Passengers</th>
    <th>Incident Free</th><th>Speed</th><th>Danger Level</th></tr>";

    echo "<tr><td>" . "<input type= text name=\"f_PlateNum\" id=\"f_PlateNum\" size=12 value=\"xxx-xxx\" >" . "</td>";

    echo "<td>". "<input type=date id=\"f_Date\" name=\"f_Date\" value=". date('Y-m-d'). "></td>";

    echo "<td>"."<input type=time id=\"f_Time\" name=\"f_Time\" value=" .date('h:i') . "></td>";

    echo "<td>"."<input type=number id=\"f_NumberPassengers\" name=\"f_NumberPassengers\" min=\"0\" max=\"3\" value=0></td>";

    echo "<td>"."<input type=checkbox id=\"f_incidentcheck\" name=\"f_incidentcheck\" checked ></td>";

    echo"<td>". "<input type=text name=\"f_Speed\" id=\"f_Speed\" size=3 value=\"100.00\" > "."</td>";

    echo "<td>"."<select name=\"f_DangerLevel\" id=\"f_DangerLevel\">
    <option value=\"low\">Low</option>  
    <option selected value=\"medium\">Medium</option> 
    <option value=\"high\">High</option> 
    <option value=\"critical\">Critical</option> </select></td>";
    
    echo"</tr></table>";

    echo"<button type=\"button\" name=\"f_Validate\" id=\"f_Validate\" onclick=\"validateAdd()\">Validate</button>";


    displayButton("f_Save","Save","save.png","Save");
    displayButton("f_Home","Home Page","home.png","Home");

    // Hide save button first
    // Dec06  Code
    echo "<script src=\"script.js\"></script>";

echo"</form>";
}

function SearchTable()
{
 echo "<form action=? method=post>";

 echo DisplayLabel("Plate Number Search");
 echo DisplayTextbox("text","f_PlateNumSearch",10,"xxx-xxx");

     echo "<table><tr><th>Date</th><th>Time</th><th>Passengers</th>
    <th>Incident Free</th><th>Speed</th><th>Danger Level</th></tr>";

    echo "<tr>";

    echo "<td>". "<input type=date id=\"date\" name=\"f_Date\" value=". date('Y-m-d'). "></td>";

    echo "<td>"."<input type=time id=\"time\" name=\"f_Time\" value=" .date('h:i') . "></td>";

    echo "<td>"."<input type=number id=\"number\" name=\"f_NumberPassengers\" min=\"0\" max=\"3\" value=0></td>";

    echo "<td>"."<input type=checkbox id=\"incidentFree\" name=\"f_incidentcheck\" checked ></td>";

    echo"<td>". "<input type=text name=\"f_Speed\" size=3 value=\"100.00\" > "."</td>";

    echo "<td>"."<select name=\"f_DangerLevel\" id=\"danger\">
    <option value=\"low\">Low</option>  
    <option selected value=\"medium\">Medium</option> 
    <option value=\"high\">High</option> 
    <option value=\"critical\">Critical</option> </select></td>";
    
    echo"</tr></table>";

 echo"<br>";
 displayButton("f_Home","Home Page","home.png","Home");
 displayButton("f_validate","Search and update","","");

 echo"</form>";
}



function getRecordandUpdate(&$mysqlObj,$TableName)
{
    
    echo "<form action=? method=post>";


    $PlateNumSearch=$_POST["f_PlateNumSearch"];
    $DateTime= $_POST["f_Date"] . " ". $_POST["f_Time"];

    $NumPassegers=$_POST["f_NumberPassengers"];
    
    $Cost=5000+($NumPassegers*100);
    
    if(isset($_POST["f_incidentcheck"]))
        $IncidentFree=0;
      
    else
        $IncidentFree=1;
    
    
    
    $Speed=$_POST["f_Speed"];
    
    
    switch ($_POST["f_DangerLevel"])
    {
        case "low":
        $DangerLevel='L';
        break;
    
        case"medium":
        $DangerLevel='M';
        break;
    
        case"high":
        $DangerLevel='H';
        break;
    
        case"critical":
        $DangerLevel='C';
        break;
    
    }
    $query = "UPDATE $TableName SET dateTimeStamp=?, nbrPassengers=? ,incidentFree=?, dangerStatus=?, speed=?, cost=?  WHERE licensePlate = ?";
    $stmt = $mysqlObj->prepare($query);
    $bindSuccess = $stmt->bind_param("sissdds", $DateTime, $NumPassegers ,$IncidentFree, $DangerLevel, $Speed, $Cost, $PlateNumSearch);
    if($bindSuccess)
    {
       $result= $stmt->execute();
 
    }
    else 
    {
        echo "Failed to Bind";
    }
   if($result)
   {
        echo "Update successful" ;
        displayButton("f_Home","Home Page","home.png","Home");
   }
   else
   {
       echo"Failed to update";
   }

    echo"</form>";

}

// This function sends the data to the table and protects against hackers by sending data using bind param
function SaveRecordToTableForm(&$mysqlObj,$TableName)
{
echo "<form action=? method=post>";

$PlateNum=$_POST["f_PlateNum"];

$DateTime= $_POST["f_Date"] . " ". $_POST["f_Time"];

$NumPassegers=$_POST["f_NumberPassengers"];

$Cost=5000+($NumPassegers*100);

if(isset($_POST["f_incidentcheck"]))
    $IncidentFree=0;
  
else
    $IncidentFree=1;



$Speed=$_POST["f_Speed"];


switch ($_POST["f_DangerLevel"])
{
    case "low":
    $DangerLevel='L';
    break;

    case"medium":
    $DangerLevel='M';
    break;

    case"high":
    $DangerLevel='H';
    break;

    case"critical":
    $DangerLevel='C';
    break;

}

$query ="Insert into $TableName(licensePlate,dateTimeStamp, nbrPassengers ,incidentFree, dangerStatus, speed, cost) Values (?,?,?,?,?,?,?) ";
$stmt = $mysqlObj->prepare($query);
$BindSuccess= $stmt ->bind_param("ssissdd",$PlateNum,$DateTime, $NumPassegers ,$IncidentFree, $DangerLevel, $Speed, $Cost);

if($BindSuccess)
$Result = $stmt->execute();

else 
echo"Failed To bind";


if($Result)
echo  " Record successfully added to " . $TableName . "<br>";
else
echo "Unable to add record to " . $TableName. "<br>";



displayButton("f_Home","Home Page","home.png","Home");
echo"</form>";
}





//This function gets data from a table and displays data from low risk to critical risk
function DisplayDataForm($mysqlObj,$TableName)
{
echo "<form action=? method=post>";
 
$PlateNum="";
$DateTime="";
$NumPassegers=0;
$IncidentFree="";
$DangerLevel="";
$Speed=0.0;
$Cost=0.0;
//query that organises results by Danger Status
$query = "Select licensePlate, dateTimeStamp, nbrPassengers, incidentFree, dangerStatus, speed, cost FROM $TableName 
ORDER BY CASE dangerStatus
WHEN 'L' THEN 1
WHEN 'M' THEN 2
WHEN 'h' THEN 3
WHEN 'c' THEN 4
END";
$stmt = $mysqlObj->prepare($query);
if($mysqlObj==true)
    echo"succesfully prepared query";
    else 
    echo"Failed to prepare query"; 
$Result = $stmt ->execute();
$stmt ->bind_result($PlateNum, $DateTime, $NumPassegers ,$IncidentFree, $DangerLevel, $Speed, $Cost);



// Creates table
echo"<table> ";
echo"<tr>
        <th>Plate Number</th>
        <th>Date and Time</th>
        <th>Number of Passengers</th>
        <th>Incident Free</th>
        <th>Danger Status</th>
        <th>Speed</th>
        <th>Cost</th>
    </tr>";

while($stmt->fetch())
{
    if($IncidentFree==0)
    $IncidentFree="YES";
    else
    $IncidentFree="NO";

    $DateTime = str_replace(" ", " at ", $DateTime);

    echo "<tr>
            <td>$PlateNum</td>
            <td>$DateTime</td>
            <td>$NumPassegers</td>
            <td>$IncidentFree</td>
            <td>$DangerLevel</td>
            <td>$Speed</td>
            <td>$Cost</td>
        </tr>";


}
echo"</table>";

displayButton("f_Home","Home Page","home.png","Home");
echo "</form>";
}
























?>