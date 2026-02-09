<?php
require_once 'config/config.php';
require_once 'includes/functions.php';

header('Content-Type: text/plain');

try {
    $db = Database::getInstance()->getConnection();
    echo "Connected to database.\n";

    echo "Standardizing image paths...\n";
    
    // Bricks
    $sql = "UPDATE bricks SET image_url = CONCAT('assets/img/all/', image_url) WHERE image_url NOT LIKE 'assets/%' AND image_url IS NOT NULL AND image_url != ''";
    $result = $db->query($sql);
    echo "Updated bricks paths (prepended assets/img/all/)\n";

    // Product Images
    $sql = "UPDATE product_images SET image_url = CONCAT('assets/img/all/', image_url) WHERE image_url NOT LIKE 'assets/%' AND image_url IS NOT NULL AND image_url != ''";
    $db->query($sql);
    echo "Updated product_images paths\n";

    // Categories (should be done already by previous script, but check)
    $sql = "UPDATE categories SET image_url = CONCAT('assets/img/all/', image_url) WHERE image_url NOT LIKE 'assets/%' AND image_url IS NOT NULL AND image_url != ''";
    $db->query($sql);
    echo "Updated categories paths\n";
    
    // Also fix any double slashes if they occurred
    $sql = "UPDATE bricks SET image_url = REPLACE(image_url, '//', '/')";
    $db->query($sql);
    
    echo "\nDatabase cleanup complete. All images should now start with assets/img/all/\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
