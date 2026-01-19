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
        case 'get_items':
            getItems();
            break;
        case 'add_item':
            addItem();
            break;
        case 'update_item':
            updateItem();
            break;
        case 'delete_item':
            deleteItem();
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
    exit();
}

// Function to get all items
function getItems() {
    global $conn;
    $sql = "SELECT * FROM inventory ORDER BY category, name";
    $result = $conn->query($sql);
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    echo json_encode(['success' => true, 'items' => $items]);
}

// Function to add item
function addItem() {
    global $conn;
    
    $data = json_decode(file_get_contents('php://input'), true);
    
    $name = trim($data['name'] ?? '');
    $category = $data['category'] ?? '';
    $price = floatval($data['price'] ?? 0);
    $quantity = intval($data['quantity'] ?? 0);
    $description = trim($data['description'] ?? '');
    
    if (empty($name) || empty($category) || $price <= 0 || $quantity < 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid input data']);
        return;
    }
    
    $sql = "INSERT INTO inventory (name, category, price, quantity, description) 
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdis", $name, $category, $price, $quantity, $description);
    
    if ($stmt->execute()) {
        $newId = $stmt->insert_id;
        echo json_encode(['success' => true, 'id' => $newId, 'message' => 'Item added successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding item']);
    }
    $stmt->close();
}

// Fetch initial items for page load
$sql = "SELECT * FROM inventory ORDER BY category, name";
$result = $conn->query($sql);
$items = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}
?>

<!-- Rest of the HTML code remains the same -->