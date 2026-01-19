<!-- Add at the end before closing body tag -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <h2>Add New Item</h2>
        <form id="addForm">
            <div class="form-group">
                <label for="itemName">Item Name *</label>
                <input type="text" id="itemName" name="name" required placeholder="e.g., LED Headlight">
            </div>
            
            <div class="form-group">
                <label for="itemCategory">Category *</label>
                <select id="itemCategory" name="category" required>
                    <option value="">Select Category</option>
                    <option value="light">Light</option>
                    <option value="wheel">Wheel</option>
                    <option value="shock">Shock Absorber</option>
                    <option value="battery">Battery</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="itemPrice">Price ($) *</label>
                <input type="number" id="itemPrice" name="price" step="0.01" min="0" required placeholder="0.00">
            </div>
            
            <div class="form-group">
                <label for="itemQuantity">Quantity *</label>
                <input type="number" id="itemQuantity" name="quantity" min="0" required value="0">
            </div>
            
            <div class="form-group">
                <label for="itemDescription">Description</label>
                <textarea id="itemDescription" name="description" rows="3" placeholder="Item description..."></textarea>
            </div>
            
            <div class="modal-buttons">
                <button type="submit" class="btn save-btn">Save Item</button>
                <button type="button" class="btn cancel-btn" id="closeAddModal">Cancel</button>
            </div>
        </form>
    </div>
</div>