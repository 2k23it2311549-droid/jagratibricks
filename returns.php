<?php
$pageTitle = 'Returns & Refunds - JagritiBricks';
require_once 'includes/header.php';
?>

<section class="section" style="padding: 4rem 0;">
    <div class="container">
        <h1 class="mb-xl text-center">Returns & Refunds</h1>
        
        <div class="card" style="padding: 3rem; max-width: 800px; margin: 0 auto;">
            
            <div class="text-center mb-lg">
                <span style="font-size: 3rem;">↺</span>
            </div>

            <h3 class="mt-lg">Quality Guarantee</h3>
            <p>We take pride in our bricks. If you receive damaged or poor-quality bricks that do not meet industry standards, please contact us immediately.</p>

            <h3 class="mt-lg">Return Policy</h3>
            <ul>
                <li>Returns are accepted only at the time of delivery if the material is found consistent with the order description.</li>
                <li>Once unloaded and accepted, goods cannot be returned.</li>
                <li>Breakage allowance: Up to 3-5% breakage during transit is standard in the brick industry and is not eligible for return.</li>
            </ul>

            <h3 class="mt-lg">Refunds</h3>
            <p>For cancelled orders (before dispatch), refunds will be processed within 5-7 working days to the original payment method.</p>
            
            <h3 class="mt-lg">Contact for Returns</h3>
            <p>Please call us at <strong><?= getSetting('contact_number', '+91 9876543210') ?></strong> for any return-related queries.</p>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
