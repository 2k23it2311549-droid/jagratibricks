<?php
require_once 'config/config.php';
require_once 'includes/functions.php';

header('Content-Type: text/plain');

try {
    $db = Database::getInstance()->getConnection();
    echo "Connected to database.\n";

    // 1. Process Uploads Mapping (filename changes)
    if (file_exists('uploads_mapping.txt')) {
        echo "Processing uploads_mapping.txt...\n";
        $mapping = file('uploads_mapping.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        $stmtBrick = $db->prepare("UPDATE bricks SET image_url = ? WHERE image_url = ?");
        $stmtImg = $db->prepare("UPDATE product_images SET image_url = ? WHERE image_url = ?");
        $stmtCat = $db->prepare("UPDATE categories SET image_url = ? WHERE image_url = ?");
        
        foreach ($mapping as $line) {
            list($old, $new) = explode(',', $line);
            $old = trim($old);
            $new = trim($new);
            
            // Update bricks (assuming they store just filename)
            $stmtBrick->execute([$new, $old]);
            if ($stmtBrick->rowCount() > 0) echo "Updated bricks: $old -> $new\n";
            
            // Update product_images
            $stmtImg->execute([$new, $old]);
            if ($stmtImg->rowCount() > 0) echo "Updated product_images: $old -> $new\n";

            // Update categories
            $stmtCat->execute([$new, $old]);
            if ($stmtCat->rowCount() > 0) echo "Updated categories: $old -> $new\n";
        }
    } else {
        echo "uploads_mapping.txt not found.\n";
    }

    // 2. Process Static Path Updates (path changes)
    echo "Updating static paths...\n";
    
    // Categories
    $sql = "UPDATE categories SET image_url = REPLACE(image_url, 'assets/img/categories/', 'assets/img/all/') WHERE image_url LIKE 'assets/img/categories/%'";
    $db->query($sql);
    echo "Updated categories paths (categories -> all)\n";
    
    $sql = "UPDATE categories SET image_url = REPLACE(image_url, 'assets/img/hero/', 'assets/img/all/') WHERE image_url LIKE 'assets/img/hero/%'";
    $db->query($sql);
    echo "Updated categories paths (hero -> all)\n";

    // Bricks - if they use full paths
    $sql = "UPDATE bricks SET image_url = REPLACE(image_url, 'assets/img/categories/', 'assets/img/all/') WHERE image_url LIKE 'assets/img/categories/%'";
    $db->query($sql);
    echo "Updated bricks paths\n";

    echo "\nDatabase update complete.\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
