<?php
// http://localhost/ZooParameters.php
function WriteHeaders($Heading="Welcome", $TitleBar="MySite") {
    echo "
<!doctype html>
<html lang = \"en\">
<head>
    <meta charset = \"UTF-8\">
    <title>$TitleBar</title>\n
    <link rel =\"stylesheet\" type = \"text/css\" href=\"ZooParameters.css\"/>
</head>
<body>\n
<h1>$Heading - StudentFull Name</h1>\n";
}

function DisplayContactInfo() {
    echo "<footer>Questions? Comments? 
    <a href = \"mailto:emanuel.dobra@student.sl.on.ca\">
    emanuel.dobra@student.sl.on.ca</a>\n";    
    echo"</footer>\n\n";
}

function WriteFooters() {
    DisplayContactInfo();
    echo "</body>\n";
    echo "</html>\n";
}

function DataEntryForm() {
    // action = ? means load exact same file
    echo "<form action = ? method=post>\n";
    echo "<div class = \"DataPair\">\n";
        DisplayLabel("Name");
        DisplayTextBox("f_AnimalName", 20, "Claws");
        DisplayLabel("Type of Animal");
        DisplayTextBox("f_AnimalType", 10, "Tiger");
        DisplayLabel("Pounds of Food Per Day");
        DisplayTextBox("f_Pounds", 10, 25);
        //DisplayLabel("Notes");
        //DisplayTextBox("f_Notes", 50, "");
    echo "  <p>Notes <TEXTAREA name = \"f_Notes\" rows = 5 columns = 40></TEXTAREA></p>\n";
    echo "</div>\n";
    echo "  <button type=Submit name=\"f_DisplayData\">Display Data</button>\n";
    echo "</form>\n";
}

function DisplayDataForm() {
    echo "<form action = ? method=post>";
    $AnimalName = $_POST["f_AnimalName"];
    $AnimalType = $_POST["f_AnimalType"];
    $Pounds = $_POST["f_Pounds"];
    $Notes = $_POST["f_Notes"];
    // First way to do it
    echo "<p>Animal name: ";
    echo $AnimalName;
    echo "</p>\n";
    // Concat strings
    echo "<p>Type: " . $AnimalType . "</p>\n";
    echo "<p>Food intake: " . $Pounds . " pounds per day.</p>\n";
    // Shortcuts (works for simple taks)
    echo "<p>Details: $Notes</p>\n";
    echo "<button type=Submit name=\"f_Done\">Done</button>";
    echo "</form>";
}

function GoodbyeForm() {
    echo "Goodbye.";
}

function DisplayLabel($Prompt) {
    echo "  <label>" . $Prompt . "</label>\n";
}

function DisplayTextBox($Name, $Size, $Value=0) {
    echo "  <input type = text name = \"$Name\"  size = \"$Size\" value = \"$Value\">\n";
    echo "  </br>\n";
}

function DisplayImage($Image, $Alt, $Width=0, $Height=0) {
    if ($Width == 0) {
        echo "  <img src=\"$Image\", alt=\"$Alt\" style=\"width:100;\">\n";
    } else {
        echo "  <img src=\"$Image\", alt=\"$Alt\" width=$Width height=$Height>\n";
    }
}

// For an Image button, params should look like:
// DisplayButton(true, imageLink, alt, id, "", width, height)
// For a normal button, params should look like:
// DisplayButton(false, "", "", id, label, width, height)
function DisplayButton($IsImage=false, $Image="", $Alt="", $ID="", $Label="", $Width=0, $Height=0) {
    if ($IsImage) {
        echo"   <button id=\"$ID\" class=\"imgBtn\" onClick=\"\">";
        DisplayImage($Image, $Alt, $Width, $Height);
        echo "  </button>\n";
    } else {
        echo"   <button type=\"Button\" id=\"$ID\" class=\"labelBtn\" onClick=\"\">$Label</button>\n";
    }
}

// main
WriteHeaders("It's a Zoo Around Here", "Zoo Crazy");
// WriteHeaders(); // Can load without any values (defaults)

// isset is a Function that returns true if the parameter ($_POST["f_DisplayData"])
// isset. f_DisplayData is only set if the DisplayData button is pressed

// The first time through, no buttons have been pressed so both isset calls return false
// and DataEntryForm is run

// The second time through, $_POST["f_DisplayData"] has a value in it is set
// because the Display data button was pressed.
// isset return true. The IF is true and the DisplayDataForm function runs

if (isset($_POST['f_DisplayData']))
    DisplayDataForm();
else 
    if (isset($_POST['f_Done']))
        GoodbyeForm();
    else
        // we are on the first page
        DataEntryForm();

// Image & Button testing
echo "</br></br>\n";
DisplayImage("favicon.ico", "Favicon");
DisplayImage("favicon.ico", "Favicon", 200, 200);
echo "</br></br>\n";
DisplayButton(true, "favicon.ico", "Favicon");
DisplayButton(true, "favicon.ico", "Favicon", "", "", 200, 200);
echo "</br></br>\n";
DisplayButton(false, "", "", "fav-1", "Label A");
DisplayButton(false, "", "", "fav-2", "Label B");
WriteFooters();
?>