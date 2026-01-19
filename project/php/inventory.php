<!-- In the item card section of HTML -->
<div class="item-card" data-category="<?php echo $item['category']; ?>" data-id="<?php echo $item['id']; ?>">
    <div class="item-header">
        <div>
            <div class="item-name"><?php echo htmlspecialchars($item['name']); ?></div>
            <span class="item-category"><?php echo ucfirst($item['category']); ?></span>
        </div>
        <span class="status <?php echo $item['quantity'] > 0 ? 'in-stock' : 'out-stock'; ?>">
            <?php echo $item['quantity'] > 0 ? 'In Stock' : 'Out of Stock'; ?>
        </span>
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
    
    <div class="quantity-control">
        <input type="number" 
               class="quantity-input" 
               id="qty-input-<?php echo $item['id']; ?>" 
               value="<?php echo $item['quantity']; ?>" 
               min="0">
        <button class="update-qty-btn">Update</button>
    </div>
    
    <div class="item-actions">
        <button class="btn edit-btn">Edit</button>
        <button class="btn delete-btn">Delete</button>
    </div>
</div>