<?php
//Tobias Walters
//http://localhost/asstMain.php

function WriteHeaders($Heading="Welcome",$TitleBar="MySite")
{
echo "
    <!doctype html>
    <html lang = \"en\">
        <head>
        <meta charset = \"UTF-8\">
        <title>$TitleBar</title>\n
        <link rel =\"stylesheet\" type = \"text/css\" href=\"asstStyle.css\">

    </head>
    <body>\n
        <h1>$Heading - Tobias Walters</h1>\n


";
}


function DisplayLabel($prompt)
{
    echo " <label> ". $prompt . "<label>";
}


function DisplayTextbox($Html, $Name, $Size, $Value=0)
{
    echo "<Input type = $Html name=$Name size=$Size value =$Value>" ;
}


function DisplayTextArea($Id, $Name, $Rows, $Columns)
{
    echo "<TEXTAREA id= $Id name= $Name rows=$Rows columns=$Columns></TEXTAREA>";
}

function displayContactInfo()
{
echo " <footer>Questions? Comments?
<a href =\"MailTo:twalters04@student.sl.on.ca\">twalters04@student.sl.on.ca
</a></footer>";
}


function displayImage($Filename, $Alt,$Height,$Width)
{
echo "<img src=$Filename alt=$Alt height=$Height width=$Width></img>";
}


function displayButton($Name, $Text,$Filename,$Alt)
{
    if(file_exists($Filename))
    {
        echo "<button id=$Name type=Submit name=$Name text=$Text src=$Filename alt=$Alt>";displayImage($Filename,$Alt,50,100);
        echo "</button>";
    }
   

    else
    echo "<button id=$Name type=Submit name=$Name text=$Text>$Text</button>";

}


function DropTable(&$mysqlObj,$TableName)
{
    $stmt=$mysqlObj->prepare("Drop Table if exists $TableName");
    $stmt->execute();
}


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


function WriteFooters()
{
echo"</body\n";
echo"</html>\n";
}





?>