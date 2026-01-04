<?php
include "../db/db.php";

$name = $age = $post = $task = $report = $address = "";
$message = "";
$messageType = "";

/* =========================
   ADD EMPLOYEE
========================= */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_employee'])) {

    $name    = trim($_POST["name"] ?? "");
    $age     = trim($_POST["age"] ?? "");
    $post    = trim($_POST["post"] ?? "");
    $task    = trim($_POST["task"] ?? "");
    $report  = trim($_POST["report"] ?? "");
    $address = trim($_POST["address"] ?? "");

    if (empty($name)) {
        $message = "Name is required.";
        $messageType = "error";
    } elseif (empty($age) || !is_numeric($age) || $age < 18 || $age > 65) {
        $message = "Age must be between 18 and 65.";
        $messageType = "error";
    } elseif (empty($post)) {
        $message = "Post is required.";
        $messageType = "error";
    } elseif ($task === "" || !is_numeric($task)) {
        $message = "Task count is required.";
        $messageType = "error";
    } elseif ($report === "" || !is_numeric($report)) {
        $message = "Report count is required.";
        $messageType = "error";
    } elseif (empty($address)) {
        $message = "Address is required.";
        $messageType = "error";
    } else {

        // Prepared statement (SAFE)
        $stmt = $conn->prepare(
            "INSERT INTO employe (name, age, post, task, report, address)
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sissis", $name, $age, $post, $task, $report, $address);

        if ($stmt->execute()) {
            $message = "Employee added successfully!";
            $messageType = "success";
            $name = $age = $post = $task = $report = $address = "";
        } else {
            $message = "Database error!";
            $messageType = "error";
        }
        $stmt->close();
    }
}

/* =========================
   DELETE EMPLOYEE
========================= */
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete']; // SAFE CAST

    $stmt = $conn->prepare("DELETE FROM employe WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $message = "Employee deleted successfully!";
        $messageType = "success";
    } else {
        $message = "Error deleting employee!";
        $messageType = "error";
    }
    $stmt->close();
}

/* =========================
   FETCH EMPLOYEES
========================= */
$employees = [];
$result = $conn->query("SELECT * FROM employe ORDER BY id DESC");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
    <link rel="stylesheet" href="../css/employee.css">
</head>

<body>
<div class="container">
    <h2>Employee Management System</h2>

    <?php if (!empty($message)): ?>
        <div class="<?php echo $messageType; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <!-- ADD EMPLOYEE -->
    <div class="form-section">
        <form method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="number" name="age" placeholder="Age" min="18" max="65" required>
            <select name="post" required>
                <option value="">Select Post</option>
                <option>Manager</option>
                <option>Developer</option>
                <option>Designer</option>
                <option>HR</option>
            </select>
            <input type="number" name="task" placeholder="Tasks" min="0" required>
            <input type="number" name="report" placeholder="Reports" min="0" required>
            <textarea name="address" placeholder="Address" required></textarea>
            <button type="submit" name="add_employee" class="btn btn-primary">Add Employee</button>
        </form>
    </div>

    <!-- EMPLOYEE LIST -->
    <div class="table-section">
        <table>
            <tr>
                <th>ID</th><th>Name</th><th>Age</th><th>Post</th>
                <th>Task</th><th>Report</th><th>Address</th><th>Action</th>
            </tr>
            <?php foreach ($employees as $emp): ?>
            <tr>
                <td><?php echo $emp['id']; ?></td>
                <td><?php echo htmlspecialchars($emp['name']); ?></td>
                <td><?php echo $emp['age']; ?></td>
                <td><?php echo htmlspecialchars($emp['post']); ?></td>
                <td><?php echo $emp['task']; ?></td>
                <td><?php echo $emp['report']; ?></td>
                <td><?php echo htmlspecialchars($emp['address']); ?></td>
                <td>
                    <a class="btn btn-danger"
                       href="?delete=<?php echo $emp['id']; ?>"
                       onclick="return confirm('Delete this employee?')">
                       Delete
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>

<?php $conn->close(); ?>
