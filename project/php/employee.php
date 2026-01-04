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
    elseif (!is_numeric($age) || $age < 18 || $age > 65) {
        $message = "Age must be between 18 and 65.";
        $messageType = "error";
    }
    elseif (empty($post)) {
        $message = "Post is required.";
        $messageType = "error";
    } 
    elseif (empty($task)) {
        $message = "Task count is required.";
        $messageType = "error";
    }
    elseif (empty($report)) {
        $message = "Report count is required.";
        $messageType = "error";
    }
    elseif (empty($address)) {
        $message = "Address is required.";
        $messageType = "error";
    }
    else {
        $sql = "INSERT INTO employe (name, age, post, task, report, address) 
                VALUES ('$name', '$age', '$post', '$task', '$report', '$address')";
        
        if($conn->query($sql)) {
            $message = "Employee added successfully!";
            $messageType = "success";
            $name = $age = $post = $task = $report = $address = "";
        } else {
            $message = "Database error: " . $conn->error;
            $messageType = "error";
        }
    }
}

// Delete employee
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM employe WHERE id = $id";
    
    if($conn->query($sql)) {
        $message = "Employee deleted successfully!";
        $messageType = "success";
    } else {
        $message = "Error deleting employee: " . $conn->error;
        $messageType = "error";
    }
}
// Fetch all employees
$employees = [];
$result = $conn->query("SELECT * FROM employe ORDER BY id DESC");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
    </head>
<body>
    <div class="container">
        <h2>Employee Management System</h2>
        
        <?php if (!empty($message)): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>