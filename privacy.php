<?php
$pageTitle = 'Privacy Policy - JagritiBricks';
require_once 'includes/header.php';
?>

<section class="section" style="padding: 4rem 0;">
    <div class="container">
        <h1 class="mb-xl text-center">Privacy Policy</h1>
        
        <div class="card" style="padding: 3rem; max-width: 800px; margin: 0 auto;">
            <p>Last updated: <?= date('F d, Y') ?></p>
            
            <h3 class="mt-lg">1. Information We Collect</h3>
            <p>We collect information you provide directly to us, such as when you create an account, place an order, or contact us. This includes:</p>
            <ul>
                <li>Name and contact information (email, phone number)</li>
                <li>Billing and delivery addresses</li>
                <li>Order history and preferences</li>
            </ul>

            <h3 class="mt-lg">2. How We Use Your Information</h3>
            <p>We use the information we collect to:</p>
            <ul>
                <li>Process your orders and payments</li>
                <li>Communicate with you about your orders</li>
                <li>Send you updates and promotional offers (if opted in)</li>
                <li>Improve our website and customer service</li>
            </ul>

            <h3 class="mt-lg">3. Data Security</h3>
            <p>We implement appropriate technical and organizational measures to protect your personal data against unauthorized access, alteration, disclosure, or destruction.</p>

            <h3 class="mt-lg">4. Contact Us</h3>
            <p>If you have any questions about this Privacy Policy, please contact us at <a href="mailto:<?= getSetting('contact_email', 'info@jagritibricks.com') ?>"><?= getSetting('contact_email', 'info@jagritibricks.com') ?></a>.</p>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
