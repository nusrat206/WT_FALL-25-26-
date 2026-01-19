<?php
session_start();
include "../db/db.php";

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../login.php");
    exit();
}

// Handle AJAX requests
if (isset($_GET['action'])) {
    header('Content-Type: application/json');
    
    switch ($_GET['action']) {
        case 'get_employees':
            getEmployees();
            break;
        case 'add_employee':
            addEmployee();
            break;
        case 'delete_employee':
            deleteEmployee();
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
    exit();
}

// Function to get all employees
function getEmployees() {
    global $conn;
    
    $sql = "SELECT * FROM employees ORDER BY created_at DESC";
    $result = $conn->query($sql);
    
    $employees = [];
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
    
    echo json_encode([
        'success' => true, 
        'employees' => $employees
    ]);
}

// Rest of the HTML remains the same as Commit 1
?>