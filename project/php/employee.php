<?php
include "../db/db.php";

$name = $age = $post = $task = $report = $address = "";
$message = "";
$messageType = "";

// Add new employee
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_employee'])) {
    $name = trim($_POST["name"] ?? "");
    $age = trim($_POST["age"] ?? "");
    $post = trim($_POST["post"] ?? "");
    $task = trim($_POST["task"] ?? "");
    $report = trim($_POST["report"] ?? "");
    $address = trim($_POST["address"] ?? "");

    if (empty($name)) {
        $message = "Name is required.";
        $messageType = "error";
    }
    elseif (empty($age)) {
        $message = "Age is required.";
        $messageType = "error";
    }