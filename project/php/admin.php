<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Admin Dashboard</h1>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
        
        <p style="margin-bottom: 20px; color: #666;">
            Manage your Automobiles Solution system
        </p>
        
        <div class="dashboard-cards">
            <div class="card">
                <h3>Employee</h3>
                <p>Manage employees</p>
                <a href="employee.php" class="card-btn">Manage</a>
            </div>
            
            <div class="card">
                <h3>Inventory</h3>
                <p>Manage inventory items</p>
                <a href="inventory.php" class="card-btn">Manage</a>
            </div>
            
            <div class="card">
                <h3>Customer</h3>
                <p>Manage customers</p>
                <a href="customer.php" class="card-btn">Manage</a>
            </div>
        </div>
        
        <a href="index.php" class="back-link">← Back to Main Site</a>
    </div>
</body>
</html>