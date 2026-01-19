<?php
session_start();
include "../db/db.php";

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../login.php");
    exit();
}

// Get initial employees for page load
$sql = "SELECT COUNT(*) as total FROM employees";
$countResult = $conn->query($sql);
$totalEmployees = $countResult->fetch_assoc()['total'];

$sql = "SELECT * FROM employees ORDER BY created_at DESC";
$result = $conn->query($sql);
$employees = [];
while ($row = $result->fetch_assoc()) {
    $employees[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="../css/employee.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Employee Management</h1>
            <div class="stats">
                <div class="stat-card">
                    <div class="stat-number" id="totalEmployees"><?php echo $totalEmployees; ?></div>
                    <div class="stat-label">Total Employees</div>
                </div>
            </div>
            <a href="admin.php" class="btn back-btn">← Back to Dashboard</a>
        </div>
        
        <!-- Message Area -->
        <div id="message" class="message"></div>
        
        <!-- Add Employee Button -->
        <div class="add-employee-btn">
            <button class="btn add-btn" onclick="openAddModal()">+ Add New Employee</button>
        </div>
        
        <!-- Employees Table -->
        <div class="employees-table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Post</th>
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="employeesBody">
                    <?php if (empty($employees)): ?>
                        <tr>
                            <td colspan="7" class="no-employees">No employees found</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($employees as $employee): ?>
                        <tr data-id="<?php echo $employee['id']; ?>">
                            <td>#<?php echo str_pad($employee['id'], 4, '0', STR_PAD_LEFT); ?></td>
                            <td>
                                <div class="employee-name"><?php echo htmlspecialchars($employee['name']); ?></div>
                                <div class="employee-post"><?php echo htmlspecialchars($employee['post']); ?></div>
                            </td>
                            <td>
                                <div class="employee-email"><?php echo htmlspecialchars($employee['email']); ?></div>
                            </td>
                            <td class="employee-mobile"><?php echo htmlspecialchars($employee['mobile']); ?></td>
                            <td class="employee-post-td"><?php echo htmlspecialchars($employee['post']); ?></td>
                            <td class="employee-salary">$<?php echo number_format($employee['salary'], 2); ?></td>
                            <td>
                                <button class="delete-btn" onclick="deleteEmployee(<?php echo $employee['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="../js/employee.js"></script>
</body>
</html>
<?php $conn->close(); ?>