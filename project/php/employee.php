<?php
// ... (previous AJAX handler and add employee code)

// Function to delete employee
function deleteEmployee() {
    global $conn;
    
    $data = json_decode(file_get_contents('php://input'), true);
    $id = intval($data['id'] ?? 0);
    
    if ($id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid employee ID']);
        return;
    }
    
    $sql = "DELETE FROM employees WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Employee deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error deleting employee']);
    }
    $stmt->close();
}

// Rest of the HTML remains the same
?>