<?php
session_start();
include "../db/db.php";

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../login.php");
    exit();
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="../css/inventory.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Inventory Management</h1>
            <div>
                <a href="admin.php" class="btn back-btn">← Back to Dashboard</a>
                <button class="btn add-btn" id="openAddModal">+ Add New Item</button>
            </div>
        </div>
        
        <!-- Message Area -->
        <div id="message" class="message"></div>
        
        <!-- Inventory Grid -->
        <div class="inventory-grid" id="inventoryGrid">
            <?php if (empty($items)): ?>
                <div class="no-items">
                    <p>No items in inventory. Click "Add New Item" to get started!</p>
                </div>
            <?php else: ?>
                <?php foreach ($items as $item): ?>
                <div class="item-card" data-category="<?php echo $item['category']; ?>" data-id="<?php echo $item['id']; ?>">
                    <div class="item-header">
                        <div class="item-name"><?php echo htmlspecialchars($item['name']); ?></div>
                        <span class="item-category"><?php echo ucfirst($item['category']); ?></span>
                    </div>
                    
                    <div class="item-details">
                        <div class="detail-row">
                            <span class="detail-label">Price:</span>
                            <span class="detail-value">$<?php echo number_format($item['price'], 2); ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Quantity:</span>
                            <span class="detail-value" id="quantity-<?php echo $item['id']; ?>">
                                <?php echo $item['quantity']; ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="item-actions">
                        <button class="btn delete-btn">Delete</button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>