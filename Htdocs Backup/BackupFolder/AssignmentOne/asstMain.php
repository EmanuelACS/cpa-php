<!-- http://localhost/AssignmentOne/asstMain.php -->
<?php
// main
require_once("asstInclude.php");
require_once("clsCreateRoadTestTable.php");
date_default_timezone_set('America/Toronto');
$mysqlObj;
$TableName = "RoadTest";
WriteHeaders("Coding Assignment", "Coding Assignment");

// forms
if (isset($_POST["f_CreateTable"]))
    CreateTableForm($mysqlObj, $TableName);
elseif (isset($_POST["f_AddRecord"]))
    AddRecordForm();
elseif (isset($_POST["f_DisplayData"]))
    DisplayDataForm($mysqlObj, $TableName);
elseif (isset($_POST["f_SaveRecord"])) 
    SaveRecordToTableForm($mysqlObj, $TableName);
else
    DisplayMainForm();

// close connection
if (isset($mysqlObj)) 
    $mysqlObj->close();

WriteFooters();


// Displays home page
function DisplayMainForm() {
    echo "<br><br>\n";
    echo "<form method=\"post\">\n";
    DisplayButton("f_CreateTable", "", true,
         "buttons/create-table.png", "Create Table");
    DisplayButton("f_AddRecord", "", true,
         "buttons/add-record.png", "Add Record");
    DisplayButton("f_DisplayData", "", true,
         "buttons/display-data.png", "Display Data");
    echo "</form>\n";
}

// Creates table RoadTest
function CreateTableForm(&$mysqlObj, $TableName) {
    // Create an instance of the RoadTest Class
    $RoadTest = new clsCreateRoadTestTable();
    $RoadTest->createTheTable($mysqlObj, $TableName);	

    // Home button
    echo "<form method=\"post\">\n";
    DisplayButton("f_home", "", true, "buttons/home.png", "Home");
    echo "</form>\n";
}

// Data entry page for the RoadTest table
function AddRecordForm() {
    echo "<form method=\"post\">\n";

    // License plate input
    echo "  <div class = \"DataPair\">\n";
    DisplayLabel("License Plate");
    DisplayTextBox("text", "f_LicensePlate", 5, "");
    echo "  </div>\n";
    echo "  <br>\n";

    // Date stamp input
    echo "  <div class = \"DataPair\">\n";
    DisplayLabel("Date Stamp");
    DisplayTextBox("date", "f_DataStamp", 10, date('Y-m-d'));
    echo "  </div>\n";
    echo "  <br>\n";

    // Time stamp input
    echo "  <div class = \"DataPair\">\n";
    DisplayLabel("Time Stamp");
    DisplayTextBox("time", "f_TimeStamp", 10, date('h:i'));
    echo "  </div>\n";
    echo "  <br>\n";

    // Passenger capacity input
    echo "  <div class = \"DataPair\">\n";
    DisplayLabel("Number of Passengers");
    DisplayTextBox("number", "f_NumPassengers", 2, 3);
    echo "  </div>\n";
    echo "  <br>\n";

    // Incident free checkbox
    echo "  <div class = \"DataPair\">\n";
    DisplayLabel("Incident Free");
    echo "  <input type=\"hidden\" name=\"f_IncidentFree\" value=\"0\">\n";
    echo "  <input type=\"checkbox\" name=\"f_IncidentFree\" value=\"1\">\n";
    echo "  </div>\n";
    echo "  <br>\n";

    // Danger status selection
    echo"   <div class = \"DataPair\">\n";
    DisplayLabel("Danger Status");
    echo "  <select name=\"f_DangerStatus\" id=\"f_DangerStatus\">\n";
    echo "  <option value=\"L\">Low</option>\n";
    echo "  <option value=\"M\" selected=\"selected\">Medium</option>\n";
    echo "  <option value=\"H\">High</option>\n";
    echo "  <option value=\"C\">Critical</option>\n";
    echo "  </select>\n";
    echo "  </div>\n";
    echo "  <br>\n";

    // Speed input
    echo "  <div class = \"DataPair\">\n";
    DisplayLabel("Speed");
    DisplayTextBox("text", "f_Speed", 1, 100);
    echo "  </div>\n";
    echo "  <br>\n";
    echo "  <br>\n";
    DisplayButton("f_SaveRecord", "", true,
         "buttons/save-record.png", "Save Record"); 
    DisplayButton("f_home", "", true, "buttons/home.png", "Home"); 
    echo "</form>\n";
}

// Saves entered data to RoadTest table
function SaveRecordToTableForm(&$mysqlObj, $TableName) {
    // Receive data input
    $LicensePlate = $_POST["f_LicensePlate"];
    $Date = $_POST["f_DataStamp"];
    $Time = $_POST["f_TimeStamp"];
    $NumPassengers = $_POST["f_NumPassengers"];
    $IncidentFree = $_POST["f_IncidentFree"];
    $DangerStatus = $_POST["f_DangerStatus"];
    $Speed = $_POST["f_Speed"];

    // Get precise Date
    $PreciseDate = $Date . " " . $Time;

    // Calculate Cost
    $Cost = 5000 + 100 * $NumPassengers;

    // Query
    $Query = "insert into $TableName (licensePlate, dateTimeStamp,
         nbrPassengers, incidentFree, dangerStatus, speed, cost) 
         values (?, ?, ?, ?, ?, ?, ?)";
    
    // Connect object, prepare query, bind param, execute
    $mysqlObj = createConnectionObject(); 
    $stmt = $mysqlObj->prepare($Query);
    $BindSuccess = $stmt->bind_param("ssiisdd", $LicensePlate, $PreciseDate,
         $NumPassengers, $IncidentFree, $DangerStatus, $Speed, $Cost);
    $CreateResult = $stmt->execute();
    if ($BindSuccess)
        echo "<p>Record successfully added to $TableName</p>\n<br>\n";
    else 
        echo "<p>Unable to add record to $TableName</p>\n<br>\n";

    // Home button
    echo "<form method=\"post\">\n";
    DisplayButton("f_home", "", true, "buttons/home.png", "Home"); 
    echo "</form>\n";

    // Close connection
    $stmt->close();	
}

// Display data from the RoadTest table
function DisplayDataForm(&$mysqlObj,$TableName) {
    $Query = "select licensePlate, dateTimeStamp, nbrPassengers,
         incidentFree, dangerStatus, speed, cost from $TableName 
         ORDER BY dangerStatus DESC";
    $mysqlObj = createConnectionObject(); 
    $stmt = $mysqlObj->prepare($Query);
    $BindSuccess = $stmt->bind_result($licensePlate, $dateTimeStamp,
        $nbrPassengers, $incidentFree, $dangerStatus, $speed, $cost);
    $CreateResult = $stmt->execute();
    
    // Set default values 
    $IncidentYesNo = "no";
    $ExpandedStatus = "medium";

    
    echo "<table>\n";
    echo "  <tr>\n";
    echo "      <th>License Plate</th>\n";
    echo "      <th>Date Time Stamp</th>\n"; 
    echo "      <th>Number of Passengers</th>\n"; 
    echo "      <th>Incident Free</th>\n";
    echo "      <th>Danger Status</th>\n";
    echo "      <th>Speed</th>\n";
    echo "      <th>Cost</th>\n"; 
    echo "  </tr>\n";

    while ($stmt->fetch()) {
        // Convert incident free to yes/no
        if ($incidentFree == 1)
            $IncidentYesNo = "yes";
        elseif ($incidentFree == 0)
            $IncidentYesNo = "no";

        // Get date in printable form
        $DividedDate = explode(" ", $dateTimeStamp);
        $OutputDate = $DividedDate[0] . " at " . $DividedDate[1];

        // Get danger status in intellegible form
        if ($dangerStatus == 'L')
            $ExpandedStatus = "low";
        elseif ($dangerStatus == 'M')
            $ExpandedStatus = "medium";
        elseif ($dangerStatus == 'H')
            $ExpandedStatus = "high";
        elseif ($dangerStatus == 'C')
            $ExpandedStatus = "critical";

        echo "  <tr>\n";
        echo "      <td>$licensePlate</td>\n";
        echo "      <td>$OutputDate</td>\n";
        echo "      <td>$nbrPassengers</td>\n"; 
        echo "      <td>$IncidentYesNo</td>\n"; 
        echo "      <td>$ExpandedStatus</td>\n"; 
        echo "      <td>$speed</td>\n"; 
        echo "      <td>$cost</th>\n"; 
        echo "  </tr>\n";
    } 
    echo "</table>\n";

    // Home button
    echo "<br>\n";
    echo "<form method=\"post\">\n";
    DisplayButton("f_home", "", true, "buttons/home.png", "Home"); 
    echo "</form>\n";
}
?>