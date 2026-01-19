<?php
// ... (previous session and AJAX handler code)

// Function to add employee
function addEmployee() {
    global $conn;
    
    $data = json_decode(file_get_contents('php://input'), true);
    
    $name = trim($data['name'] ?? '');
    $email = trim($data['email'] ?? '');
    $mobile = trim($data['mobile'] ?? '');
    $post = trim($data['post'] ?? '');
    $address = trim($data['address'] ?? '');
    $salary = floatval($data['salary'] ?? 0);
    $hired_date = $data['hired_date'] ?? date('Y-m-d');
    
    if (empty($name) || empty($email) || empty($mobile) || empty($post) || empty($address)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        return;
    }
    
    // Check if email already exists
    $checkSql = "SELECT id FROM employees WHERE email = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    
    if ($checkResult->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Email already exists']);
        $checkStmt->close();
        return;
    }
    $checkStmt->close();
    
    // Insert new employee
    $sql = "INSERT INTO employees (name, email, mobile, post, address, salary, hired_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssds", $name, $email, $mobile, $post, $address, $salary, $hired_date);
    
    if ($stmt->execute()) {
        $newId = $stmt->insert_id;
        echo json_encode(['success' => true, 'id' => $newId, 'message' => 'Employee added successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding employee']);
    }
    $stmt->close();
}

// Rest of the HTML remains the same
?>