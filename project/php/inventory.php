<!-- Add after the add modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <h2>Edit Item</h2>
        <form id="editForm">
            <input type="hidden" id="editItemId">
            <div class="form-group">
                <label for="editItemName">Item Name *</label>
                <input type="text" id="editItemName" required>
            </div>
            
            <div class="form-group">
                <label for="editItemCategory">Category *</label>
                <select id="editItemCategory" required>
                    <option value="light">Light</option>
                    <option value="wheel">Wheel</option>
                    <option value="shock">Shock Absorber</option>
                    <option value="battery">Battery</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="editItemPrice">Price ($) *</label>
                <input type="number" id="editItemPrice" step="0.01" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="editItemDescription">Description</label>
                <textarea id="editItemDescription" rows="3"></textarea>
            </div>
            
            <div class="modal-buttons">
                <button type="submit" class="btn save-btn">Update Item</button>
                <button type="button" class="btn cancel-btn" id="closeEditModal">Cancel</button>
            </div>
        </form>
    </div>
</div>