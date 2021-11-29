<!-- http://localhost/DobraEmanuelCodingAsst/asstMain.php -->
<?php
function WriteHeaders($Heading="Welcome", $TitleBar="MySite") {
    echo "
<!doctype html>
<html lang = \"en\">
<head>
    <meta charset = \"UTF-8\">
    <title>$TitleBar</title>\n
    <link rel =\"stylesheet\" type = \"text/css\" href=\"asstStyle.css\"/>
</head>
<body>\n
<h1>Emanuel Dobra $Heading</h1>\n";
}

function DisplayLabel($Prompt) {
    echo "  <label>" . $Prompt . "</label>\n";
}

function DisplayTextBox($InputType, $Name, $Size, $Value=0) {
    echo "  <input type = \"$InputType\" name = \"$Name\"  size = \"$Size\" value = \"$Value\">\n";
    echo "  </br>\n";
}

function DisplayButton($ID="", $Label="", $IsImage=false, $Image="", $Alt="", $Width=0, $Height=0) {
    if ($IsImage) {
        echo"  <button name=\"$ID\">\n";
        DisplayImage($Image, $Alt, $Width, $Height);
        echo "  </button>\n";
    } else {
        echo"  <button type=\"submit\" name=\"$ID\">$Label</button>\n";
    }
}

function DisplayImage($Image, $Alt, $Width=0, $Height=0) {
    if ($Width == 0) {
        echo "  <img src=\"$Image\", alt=\"$Alt\" style=\"width:100;\">\n";
    } else {
        echo "  <img src=\"$Image\", alt=\"$Alt\" width=$Width height=$Height>\n";
    }
}

function DisplayContactInfo() {
    echo "\n<footer>Questions? Comments?\n"; 
    echo "  <a href = \"mailto:emanuel.dobra@student.sl.on.ca\">\n";
    echo "      emanuel.dobra@student.sl.on.ca\n";    
    echo "  </a>\n</footer>\n\n";
}

function WriteFooters() {
    DisplayContactInfo();
    echo "</body>\n";
    echo "</html>\n";
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
    $mysqlObj = new mysqli($Host, $UserName, $Password, $Database, $Port);

    if ($mysqlObj->connect_errno != 0) 
    {
    echo "<p>Connection failed. Unable to open database $Database. Error: "
        . $mysqlObj->connect_error . "</p>";

    exit;
    }
    return ($mysqlObj);
}

?>