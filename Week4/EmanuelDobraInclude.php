<?php
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

?>