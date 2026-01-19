<?php
// ... (update the AJAX handler switch statement)

// In the switch statement, add:
case 'update_work':
    updateWork();
    break;

// Add after the addReport function
// Function to update work done
function updateWork() {
    global $conn;
    
    $data = json_decode(file_get_contents('php://input'), true);
    $id = intval($data['id'] ?? 0);
    $work_done = trim($data['work_done'] ?? '');
    
    if ($id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid employee ID']);
        return;
    }
    
    $sql = "UPDATE employees SET work_done = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $work_done, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Work updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating work']);
    }
    $stmt->close();
}

// Update the HTML table to include work done column and modals
?>