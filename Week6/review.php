<?php 
// http://localhost/review.php

// Review Start

// empty ($str) 
$str1 = "nonNull"; // false
$str2 = "0"; // true
$str3 = ""; // true
$str4; // true

// Only need quotes for html
echo empty($str1) . empty($str2) . empty($str3) . empty($str4) . "<br><br>";

// strlen ($str) 
$str1 = "This is of length 20";
echo strlen($str1) . "<br><br>";

// substr ($str, $i[, $len])
$str2 = "012-45--89";
$idxStart = -4; // represents offset 
$len = 3;
echo substr($str2, $idxStart, $len) . "<br><br>";

// strpos ($str1, $str2[,$offset])
$str3 = "1234567"; // returns pos of first element found
$snip = "56";
echo strpos($str3, $snip, 1)  . "<br><br>";

// stripos ($str1, $str2[,$offset]) // not case sensitive
$str3 = "abcdef"; // returns pos of first element found
$snip = "DeF";
echo stripos($str3, $snip, 1) . "<br><br>";

// str_replace ($str1, $new, $str2)
$str4 = "Long123string123o123f dupe123s";
$snip = "123";
$replace = " ";
echo str_replace($snip, $replace, $str4) . "<br><br>";

// str_ireplace ($str1, $new, $str2) // not case sensitive
$str4 = "LonggEfstringgEfogEff dupegEfs";
$snip = "GeF";
$replace = "---";
echo str_ireplace($snip, $replace, $str4) . "<br><br>";

// ltrim ($str, [$strToTrim]) // left trim
// rtrim ($str, [$strToTrim]) // right trim
// trim ($str, [$strToTrim]) // double trim 
$str2 = "fffremove pls ff";
echo ltrim($str2, "f") . "<br><br>";
$str2 = "fffremove pls ff";
echo rtrim($str2, "f") . "<br><br>";
$str2 = "fffremove pls ff";
echo trim($str2, "f") . "<br><br>";

// lcfirst ($str) // tolower first of word
// ucfirst ($str) // toupper first of word
// ucwords ($str) // toupper all first letters of strings
$str1 = "LowercaseFirst";
$str2 = "uppercaseFirst";
$str3 = "turn all to upper pls";

echo "-" . lcfirst($str1) . "-" . ucfirst($str2) . "-" . ucwords($str3) . "-" . "<br><br>";

// strtolower ($str)
// strtoupper ($str)
$str1 = "TurnLowER";
$str2 = "turNuPper";

echo "-" . strtolower($str1) . "-" . strtoupper($str2) . "-<br><br>"; 

// strcmp ($str1, $str2) // case sensitive
// strcasecmp ($str1, $str2) // not case sensitive
// returns -1 if str1 < str2, 0 if str1 == str2, 1 if str1 > str2
$str1 = "a";
$str2 = "A";

echo strcmp($str1, $str2) . "<br><br>";
echo strcasecmp($str1, $str2) . "<br><br>";



// excercises

// Uppercase full station
$station = "vangh";
$uStation = strtoupper($station);
echo "Before: $station <br> After: $uStation <br>";
// Uppercase first letter station
$station2 = "vangh";
$uStation2 = ucfirst($station2);
echo "Before: $station2 <br> After: $uStation2 <br><br>";


// trim city from spaces
$city = "--43-Kingston--34--";
echo trim($city, "-") . "<br>"; // first way
echo ltrim(rtrim($city, "-3"), "4-") . "<br>"; // second way

// for loop example
for ($i = 0; $i < 4; $i++) {
    echo "hi" . $i . "<br>";
}

// while loop example
$idx = 4; 
while ($idx != 32) {
    $idx *= 2;
    echo "Idx is " . $idx . "<br>";
}

// read from file
$file = fopen("auth.txt", "r");
echo "{<br>";
while (!feof($file)) {
    echo "Test: ";
    $var = fgets($file);
    if (feof($file)) {
        echo $var . ltrim(",<br>", ",");
    } else {
        echo rtrim($var) . ",<br>";
    }
}
echo "}";
fclose($file); // close file 
?>