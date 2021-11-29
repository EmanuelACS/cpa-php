<?php
// http://localhost/ZooUsingIncludeFile.php

require_once("EmanuelDobraInclude.php");

function DataEntryForm() {
    // action = ? means load exact same file
    echo "<form action = ? method=post>\n";
    echo "<div class = \"DataPair\">\n";
        DisplayLabel("Name");
        DisplayTextBox("f_AnimalName", 20, "Claws");
    echo "</div>\n";
    echo "<div class = \"DataPair\">\n";
        DisplayLabel("Type of Animal");
        DisplayTextBox("f_AnimalType", 10, "Tiger");
    echo "</div>\n";
    echo "<div class = \"DataPair\">\n";
        DisplayLabel("Pounds of Food Per Day");
        DisplayTextBox("f_Pounds", 10, 25);
    echo "</div>\n";
    echo "<div class = \"DataPair\">\n";
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


// main
WriteHeaders("It's a Zoo Around Here", "Zoo Crazy");

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
DisplayImage("pink.PNG", "Favicon");
DisplayImage("pink.PNG", "Favicon", 200, 200);
echo "</br></br>\n";
DisplayButton(true, "pink.PNG", "Favicon");
DisplayButton(true, "pink.PNG", "Favicon", "", "", 200, 200);
echo "</br></br>\n";
DisplayButton(false, "", "", "fav-1", "Label A");
DisplayButton(false, "", "", "fav-2", "Label B");
WriteFooters();
?>