<!-- Update the table header in HTML -->
<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Post</th>
        <th>Salary</th>
        <th>Reports</th>
        <th>Work Done</th>
        <th>Actions</th>
    </tr>
</thead>

<!-- Update the table body rows -->
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
    <td class="employee-reports">
        <div class="report-count" id="reports-<?php echo $employee['id']; ?>">
            <?php echo $employee['reports']; ?>
        </div>
        <button class="report-btn" onclick="addReport(<?php echo $employee['id']; ?>)">+</button>
    </td>
    <td>
        <div class="work-done">
            <?php echo htmlspecialchars($employee['work_done'] ?? 'No work recorded'); ?>
        </div>
        <button class="work-btn" onclick="openWorkModal(<?php echo $employee['id']; ?>)">Update</button>
    </td>
    <td>
        <button class="delete-btn" onclick="deleteEmployee(<?php echo $employee['id']; ?>)">Delete</button>
    </td>
</tr>