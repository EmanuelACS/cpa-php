
<?php
// main
require_once("asstInclude.php");
date_default_timezone_set('America/Toronto');
$mysqlObj;
$TableName = "RoadTest";
// Call WriteHeaders.
// Heading: Your Full Name Coding Assignment
// Nested if statement to display the appropriate forms
if (isset($mysqlObj)) {
    $mysqlObj->close();
}
WriteFooters();



// cake1
function DisplayMainForm() {
    DisplayButton(false, "", "ctbl", "Create Table", 100, 50);
    DisplayButton(false, "", "arc", "Add Record", 100, 50);
    DisplayButton(false, "", "dsd", "Display Data", 100, 50);
}

// cake2
function CreateTableForm(&$mysqlObj,$TableName) {
    DisplayButton(false, "", "home", "Home", 100, 50);
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
        echo "Table $TableName created.";
    else
        echo "Unable to create table $TableName."; 
    
    $stmt->close();	
}

// cake 3
function AddRecordForm() {
    echo "<div class = \"DataPair\">\n";
    DisplayLabel("License Plate");
    DisplayTextBox("text", "lpt", 100);
    echo "</div>";
    echo "<div class = \"DataPair\">\n";
    DisplayLabel("Date Stamp");
    DisplayTextBox("date", "dts", 100, system.date('Y-m-d'));
    echo "</div>";
    echo "<div class = \"DataPair\">\n";
    DisplayLabel("Time Stamp");
    DisplayTextBox("date", "ts", 100, system.date('h:i'));
    echo "</div>";
    echo "<div class = \"DataPair\">\n";
    DisplayLabel("Number of Passengers");
    DisplayTextBox("number", "nop", 100, 3);
    echo "</div>";
    echo "<div class = \"DataPair\">\n";
    DisplayLabel("Incident Free");
    DisplayTextBox("checkbox", "icf", 100);
    echo "</div>";
    echo "<div class = \"DataPair\">\n";
    DisplayLabel("Danger Status");
    DisplayTextBox("listbox", "dgs", 100);
    echo "</div>";
    echo "<div class = \"DataPair\">\n";
    DisplayLabel("Speed");
    DisplayTextBox("text", "spd", 100, 100);
    echo "</div>";
    echo "<div class = \"DataPair\">\n";

    DisplayButton(false, "", "sv-rec", "Save Record", 100, 50); // above
    DisplayButton(false, "", "home", "Home", 100, 50); // below
}

// cake 4
function SaveRecordToTableForm() {
    
}

// cake 5
function DisplayDataForm() {
    
}
?>