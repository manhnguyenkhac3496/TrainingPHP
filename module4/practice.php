<?php

$username = "root";
$password = "manh";
$conn = new PDO('mysql:host=localhost;dbname=traning', $username, $password);

$users = [new user("Nguyen Van A", "password", null, null)];
$users[] = new user("Nguyen Van B", "password", null, null);
$users[] = new user( "Nguyen Van C", "password", null, null);
//echo var_dump($users);

//foreach ($users as $user) {
//    $insert = $conn->prepare('INSERT INTO users (user_name, password, created_at, updated_at)
//                                values (:user_name, :password, :created_at, :updated_at)')
//        ->execute((array)$user);
//}

$list_task = [new list_task(4, "Task 1", "Training Php", "1", null, null)];
$list_task[] = new list_task(4, "Task 2", "Training Php", "2", null, null);
$list_task[] = new list_task(4, "Task 3", "Training Php", "3", null, null);
$list_task[] = new list_task(5, "Task 1", "Training Php", "2", null, null);
$list_task[] = new list_task(5, "Task 2", "Training Php", "2", null, null);
$list_task[] = new list_task(5, "Task 3", "Training Php", "2", null, null);
$list_task[] = new list_task(6, "Task 1", "Training Php", "3", null, null);
$list_task[] = new list_task(6, "Task 2", "Training Php", "3", null, null);
$list_task[] = new list_task(6, "Task 3", "Training Php", "3", null, null);
//var_dump($list_task);

//foreach ($list_task as $task) {
//    $insert = $conn->prepare('INSERT INTO list_task (user_id, title, description, status, created_at, updated_at)
//                                values (:user_id, :title, :description, :status, :created_at, :updated_at)')
//        ->execute((array)$task);
//}

$update = $conn->prepare("UPDATE list_task set status = '3' where id in (1,2,3,4)")->execute();

$delete =  $conn->prepare("DELETE FROM users where id = 1")->execute();

//working
$selectTask =  $conn->prepare("SELECT * FROM list_task where status = '1' GROUP BY user_id")->execute();
while($row = $selectTask->fetch()) {
    $selectUser =  $conn->prepare("SELECT * FROM users where if = ?")->execute($row["user_id"]);
}

//done
$selectTask =  $conn->prepare("SELECT * FROM list_task where status = '3' GROUP BY user_id")->execute();
while($row = $selectTask->fetch()) {
    $selectUser =  $conn->prepare("SELECT * FROM users where id = ?")->execute($row["user_id"]);
}

//not done
$selectTask =  $conn->prepare("SELECT * FROM list_task where status <> '3'")->execute();

//get all username is Hung
$selectUser =  $conn->prepare("SELECT * FROM users where user_name = 'Hung'")->execute();
while($row = $selectTask->fetch()) {
    $countTask =  $conn->prepare("SELECT count(*) FROM list_task where user_id = ?")->execute($row["id"]);
}

//get user done > 50%
$selectUser =  $conn->prepare("SELECT * FROM users")->execute();
while($row = $selectUser->fetch()) {
    $countTask =  $conn->prepare("SELECT count(*) FROM list_task where user_id = ?")->execute($row["id"]);
    $countDone =  $conn->prepare("SELECT count(*) FROM list_task where user_id = ? and status = '3'")->execute($row["id"]);
    if ($countDone/$countTask > 0.5) {
        echo $row["user_name"]." done > 50% task";
    }
}

class user {
    public $user_name;
    public $password;
    public $created_at;
    public $updated_at;

    public function __construct($user_name, $password, $created_at, $updated_at)
    {
        $this->user_name = $user_name;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}

class list_task {
    public $user_id;
    public $title;
    public $description;
    public $status;
    public $created_at;
    public $updated_at;

    public function __construct($user_id, $title, $description, $status, $created_at, $updated_at)
    {
        $this->user_id = $user_id;
        $this->description = $description;
        $this->title = $title;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}