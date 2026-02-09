<?php
$pageTitle = 'Shipping Information - JagritiBricks';
require_once 'includes/header.php';
?>

<section class="section" style="padding: 4rem 0;">
    <div class="container">
        <h1 class="mb-xl text-center">Shipping & Delivery</h1>
        
        <div class="card" style="padding: 3rem; max-width: 800px; margin: 0 auto;">
            
            <div class="text-center mb-lg">
                <span style="font-size: 3rem;">🚚</span>
            </div>

            <h3 class="mt-lg">Delivery Areas</h3>
            <p><?= getSetting('delivery_area', 'We currently deliver to Kanpur, Lucknow, Unnao, and surrounding districts within a 100km radius of our kilns.') ?></p>

            <h3 class="mt-lg">Delivery Charges</h3>
            <p>Delivery charges are calculated based on the distance and order quantity. Free delivery may be available for large bulk orders within 20km.</p>

            <h3 class="mt-lg">Estimated Delivery Time</h3>
            <ul>
                <li><strong>Local (Kanpur):</strong> 1-2 Days</li>
                <li><strong>Outstation (within 100km):</strong> 2-4 Days</li>
            </ul>

            <h3 class="mt-lg">Unloading</h3>
            <p>Our standard delivery includes transportation to the site. Unloading labor is arranged by the customer unless specified otherwise in the order agreement.</p>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
