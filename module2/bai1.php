<?php
$name = "Manh";
const FIRST_NAME_CONST = "Nguyen Khac ";
$nameReplace = "Nguyen Van The";

echo FIRST_NAME_CONST.$name;
echo  "<br>";
echo "Name is changed: ";
$name = str_replace("Nguyen Khac Manh", $nameReplace, FIRST_NAME_CONST.$name);
echo $name;
?>