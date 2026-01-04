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
         <!-- Add Employee Form -->
         <div class="form-section">
            <h3>Add New Employee</h3>
            <form method="post" action="">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Employee Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" min="18" max="65" required>
                    </div>
                    <div class="form-group">
                        <label for="post">Post/Position:</label>
                        <select id="post" name="post" required>
                            <option value="">Select Post</option>
                            <option value="Manager" <?php echo ($post == 'Manager') ? 'selected' : ''; ?>>Manager</option>
                            <option value="Developer" <?php echo ($post == 'Developer') ? 'selected' : ''; ?>>Developer</option>
                            <option value="Designer" <?php echo ($post == 'Designer') ? 'selected' : ''; ?>>Designer</option>
                            <option value="HR" <?php echo ($post == 'HR') ? 'selected' : ''; ?>>HR</option>
                            <option value="Accountant" <?php echo ($post == 'Accountant') ? 'selected' : ''; ?>>Accountant</option>
                            <option value="Sales" <?php echo ($post == 'Sales') ? 'selected' : ''; ?>>Sales</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="task">Tasks Completed:</label>
                        <input type="number" id="task" name="task" value="<?php echo htmlspecialchars($task); ?>" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="report">Reports Submitted:</label>
                        <input type="number" id="report" name="report" value="<?php echo htmlspecialchars($report); ?>" min="0" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required><?php echo htmlspecialchars($address); ?></textarea>
                </div>
                
                <button type="submit" name="add_employee" class="btn btn-primary">Add Employee</button>
            </form>
        </div>
         <!-- Employee Table -->
         <div class="table-section">
            <h3>Employee List</h3>
            <?php if (count($employees) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Post</th>
                            <th>Tasks</th>
                            <th>Reports</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?php echo $employee['id']; ?></td>
                            <td><?php echo htmlspecialchars($employee['name']); ?></td>
                            <td><?php echo $employee['age']; ?></td>
                            <td><?php echo htmlspecialchars($employee['post']); ?></td>
                            <td><?php echo $employee['task']; ?></td>
                            <td><?php echo $employee['report']; ?></td>
                            <td><?php echo htmlspecialchars($employee['address']); ?></td>
                            <td class="actions">
                                <a href="?delete=<?php echo $employee['id']; ?>" 
                                   class="btn btn-danger" 
                                   onclick="return confirm('Are you sure you want to delete this employee?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No employees found. Add your first employee above.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>