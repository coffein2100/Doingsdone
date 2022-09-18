<?php
require_once("helpers.php");
require_once("data.php");
require_once("init.php");
require_once("functions.php");

if (!$con) {
    $error = mysqli_connect_error();
} else {
    $sql = "SELECT user_id, name_project, id FROM projects WHERE user_id = 2";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($con);
    }
}

if (!$con) {
    $error = mysqli_connect_error();
} else {
    $sql = "SELECT id,user_name FROM users WHERE id = 2";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($con);
    }
}

if (!$con) {
    $error = mysqli_connect_error();
} else {
    $sql = "SELECT task_status, task_name, task_file, date_finish, project_id FROM tasks WHERE user_id = 2";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($con);
    }
}

$page_content = include_template ("main.php",[
    "projects" => $projects,
    "tasks" => $tasks
]);

$layout_content = include_template ("layout.php",[
    "content" => $page_content,
    "user" =>$user,
    "title" => "Дела в порядке"
]);
print($layout_content);
?>
