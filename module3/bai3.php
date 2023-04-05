<?php

$students = [["name" => "Nguyen Van A", "school_id" => 1],
    ["name" => "Nguyen Van B", "school_id" => 1],
    ["name" => "Nguyen Van C", "school_id" => 3],
    ["name" => "Nguyen Van D", "school_id" => 1],
    ["name" => "Nguyen Van E", "school_id" => 1],
    ["name" => "Nguyen Van T", "school_id" => 2],
    ["name" => "Nguyen Van G", "school_id" => 3],
    ["name" => "Nguyen Van H", "school_id" => 5],
    ["name" => "Nguyen Van L", "school_id" => 9],
    ["name" => "Nguyen Van W", "school_id" => 1]];
$schools = [["id" => 1, "name"=>"Amela"]];

foreach ($schools as $school) {
    echo "School name is: ".$school["name"]."<br>";
    echo "Student list: <br>";
    $count = 1;
    foreach ($students as $student) {
        if ($student["school_id"] == $school["id"]) {
            echo $count.". ".$student["name"]."<br>";
            $count++;
        }
    }
}