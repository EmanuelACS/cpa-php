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

// Create connection function 
function CreateConnectionObject()
{
    $fh = fopen('auth.txt','r');
    $Host =  trim(fgets($fh));
    $UserName = trim(fgets($fh));
    $Password = trim(fgets($fh));
    $Database = trim(fgets($fh));
    $Port = trim(fgets($fh)); 
    fclose($fh);
    $mysqlObj = new mysqli($Host, $UserName, $Password,$Database,$Port);
    // if the connection and authentication are successful, 
    // the error number is 0
    // connect_errno is a public attribute of the mysqli class.
    if ($mysqlObj->connect_errno != 0) 
    {
     echo "<p>Connection failed. Unable to open database $Database. Error: "
              . $mysqlObj->connect_error . "</p>";
     // stop executing the php script
     exit;
    }
    return ($mysqlObj);
}

?>