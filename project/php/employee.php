<!-- Add after the employees table -->
<!-- Add Employee Modal -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <h2>Add New Employee</h2>
        <form id="addForm">
            <div class="form-row">
                <div class="form-group">
                    <label for="empName">Name *</label>
                    <input type="text" id="empName" name="name" required>
                </div>
                <div class="form-group">
                    <label for="empEmail">Email *</label>
                    <input type="email" id="empEmail" name="email" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="empMobile">Mobile *</label>
                    <input type="tel" id="empMobile" name="mobile" required>
                </div>
                <div class="form-group">
                    <label for="empPost">Post *</label>
                    <select id="empPost" name="post" required>
                        <option value="">Select Post</option>
                        <option value="Mechanic">Mechanic</option>
                        <option value="Manager">Manager</option>
                        <option value="Receptionist">Receptionist</option>
                        <option value="Cleaner">Cleaner</option>
                        <option value="Driver">Driver</option>
                        <option value="Technician">Technician</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="empAddress">Address *</label>
                <textarea id="empAddress" name="address" rows="3" required></textarea>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="empSalary">Salary ($)</label>
                    <input type="number" id="empSalary" name="salary" step="0.01" min="0">
                </div>
                <div class="form-group">
                    <label for="empHiredDate">Hired Date</label>
                    <input type="date" id="empHiredDate" name="hired_date">
                </div>
            </div>
            
            <div class="modal-buttons">
                <button type="submit" class="btn save-btn">Add Employee</button>
                <button type="button" class="btn cancel-btn" onclick="closeAddModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>