<?php
$resultString = filter_input(INPUT_GET, "results", FILTER_SANITIZE_SPECIAL_CHARS);

$resultArray = explode(";", $resultString);
$upperBound = count($resultArray) -1;

$query = "SELECT inventory.SetID, sets.Year, sets.Setname FROM inventory, sets WHERE
sets.SetID=inventory.SetID AND ItemTypeID='P' AND inventory.ColorID='4' AND
(";

for ($i=0; $i < count($resultArray) - 1; $i++) { 
    $query .= "ItemID='$resultArray[$i]'";
    $query .= " OR ";
}

$query .= "ItemID='$resultArray[$upperBound]')";

var_dump($query);
var_dump($resultArray);