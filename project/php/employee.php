<?php
// ... (update the AJAX handler switch statement)

// In the switch statement, add:
case 'add_report':
    addReport();
    break;

// Add after the deleteEmployee function
// Function to add report
function addReport() {
    global $conn;
    
    $data = json_decode(file_get_contents('php://input'), true);
    $id = intval($data['id'] ?? 0);
    
    if ($id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid employee ID']);
        return;
    }
    
    // Get current reports
    $getSql = "SELECT reports FROM employees WHERE id = ?";
    $getStmt = $conn->prepare($getSql);
    $getStmt->bind_param("i", $id);
    $getStmt->execute();
    $result = $getStmt->get_result();
    $employee = $result->fetch_assoc();
    $currentReports = intval($employee['reports']);
    $getStmt->close();
    
    // Update reports
    $newReports = $currentReports + 1;
    $sql = "UPDATE employees SET reports = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $newReports, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'reports' => $newReports, 'message' => 'Report added successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding report']);
    }
    $stmt->close();
}

// Update the HTML table to include reports column
?>