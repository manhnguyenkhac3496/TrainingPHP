<?php
$users = [["name" => "Nguyen Van A", "id" => 1],
    ["name" => "Nguyen Van B", "id" => 2],
    ["name" => "Nguyen Van C", "id" => 3],
    ["name" => "Nguyen Van D", "id" => 4],
    ["name" => "Nguyen Van W", "id" => 5]];
$posts = [["user_id" => 1, "name"=>"Amela"],
    ["user_id" => 2, "name"=>"Amela"],
    ["user_id" => 3, "name"=>"Amela"],
    ["user_id" => 4, "name"=>"Amela"],
    ["user_id" => 5, "name"=>"Amela"]];

$user = [];
foreach ($users as $item) {
    foreach ($posts as $post) {
        if ($item["id"] == $post["user_id"]) {
            $item[] = ["post_name"=>$post["name"]];
            $user[] = $item;
            break;
        }
    }
}
var_dump($user);