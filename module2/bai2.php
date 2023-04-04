<?php

echo "2.1<br>";
$projectInfo = ["name" => "TraningPhp", "project_manager" => "Nguyen Van A",
    "developer" => ["Nguyen Van A", "Nguyen Van B", "Nguyen Van C"],
    "tester" => ["Nguyen Van A"],
    "comtor" => []];

echo "2.2<br>";
$projectInfo["comtor"][] = ["Nguyen Thi Comtor 2"];

echo "2.3<br>";
echo "Name: ".$projectInfo["name"];
echo "<br>";

echo "2.4<br>";
array_shift($projectInfo["developer"]);
$projectInfo["developer"][] = ("Nguyen Van D");
echo "2.5<br>";
echo implode("-", $projectInfo["developer"]);
