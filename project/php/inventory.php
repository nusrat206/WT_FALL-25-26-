<!-- Add before closing body tag -->
<script>
    window.currentItems = <?php echo json_encode($items); ?>;
</script>
<script src="../js/inventory.js"></script>