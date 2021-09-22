<?php
// http://localhost/ZooAdvanced.php
function WriteHeaders($Heading="Welcome", $TitleBar="MySite") {
    echo "
        <!doctype html>
        <html lang = \"en\">
        <head>
            <meta charset = \"UTF-8\">
            <title>$TitleBar</title>\n
        </head>
        <body>\n
        <h1>$Heading - StudentFull Name</h1>\n
    ";
}

function WriteFooters() {
    echo "</body>\n";
    echo "</html>\n";
}

function DataEntryForm() {
    // action = ? means load exact same file
    echo " 
    <form action = ? method=post>
        <p>Name <Input type = text name = \"f_AnimalName\" Size = 20 value = \"Claws\"></p>
        <p>Type of Animal <Input type = text name = \"f_AnimalType\" Size = 10 value = \"Tiger\"></p>
        <p>Pounds of Food Per Day <Input type = text name = \"f_Pounds\" value = 25></p>
        <p>Notes <TEXTAREA name = \"f_Notes\" rows = 5 columns = 40></TEXTAREA></p>
        <button type=Submit name=\"f_DisplayData\">Display Data</button>
    </form>";
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
    echo "<label>" . $Prompt . "</label>";
}

function DisplayTextBox($Name, $Size, $Value=0) {
    echo "<input type = text name = \"$Name\"  size = \"$Size\" value = \"$Value\">";
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
WriteFooters();
?>