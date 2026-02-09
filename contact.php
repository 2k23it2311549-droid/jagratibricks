<?php
$pageTitle = 'Contact Us - JagritiBricks';
require_once 'includes/header.php';
?>

<!-- Minimal Hero -->
<section class="contact-hero text-center" style="padding: 4rem 0 2rem; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
    <div class="container">
        <h1 class="animate-on-scroll" style="font-size: 3rem; margin-bottom: 0.5rem; color: var(--text-primary);">Let's Build Together</h1>
        <p class="animate-on-scroll" style="color: var(--text-secondary); font-size: 1.1rem; max-width: 600px; margin: 0 auto; animation-delay: 0.1s;">
            We'd love to discuss your project. Reach out for quotes, support, or just to say hello.
        </p>
    </div>
</section>

<!-- Contact Cards Grid -->
<section class="section" style="padding-top: 2rem;">
    <div class="container">
        <div class="grid grid-3 mb-xl">
            <!-- Card 1: Sales -->
            <div class="card text-center hover-lift animate-on-scroll" style="padding: 2rem;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">📞</div>
                <h3 style="margin-bottom: 0.5rem;">Sales & Support</h3>
                <p class="mb-md" style="color: var(--text-secondary);">Mon-Sat, 9am - 7pm</p>
                <a href="tel:<?= getSetting('contact_number', '+919876543210') ?>" class="btn btn-primary-light btn-block">
                    <?= getSetting('contact_number', '+91 98765 43210') ?>
                </a>
            </div>

            <!-- Card 2: Email -->
            <div class="card text-center hover-lift animate-on-scroll" style="padding: 2rem; animation-delay: 0.1s;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">📧</div>
                <h3 style="margin-bottom: 0.5rem;">Email Us</h3>
                <p class="mb-md" style="color: var(--text-secondary);">We reply within 24 hours</p>
                <a href="mailto:<?= getSetting('contact_email', 'info@jagritibricks.com') ?>" class="btn btn-primary-light btn-block">
                    <?= getSetting('contact_email', 'info@jagritibricks.com') ?>
                </a>
            </div>

            <!-- Card 3: WhatsApp -->
            <div class="card text-center hover-lift animate-on-scroll" style="padding: 2rem; animation-delay: 0.2s;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">💬</div>
                <h3 style="margin-bottom: 0.5rem;">WhatsApp Chat</h3>
                <p class="mb-md" style="color: var(--text-secondary);">Instant responses</p>
                <a href="https://wa.me/<?= str_replace(['+', ' '], '', getSetting('whatsapp_number', '+919876543210')) ?>" target="_blank" class="btn btn-success btn-block" style="background-color: #25D366; color: white;">
                    Start Chat
                </a>
            </div>
        </div>

        <div class="grid grid-2" style="gap: 3rem; align-items: start;">
            <!-- Form Section -->
            <div class="animate-on-scroll">
                <div class="card" style="padding: 2.5rem;">
                    <h2 class="mb-lg">Send a Message</h2>
                    <form id="contact-form" onsubmit="submitContact(event)">
                        <div class="grid grid-2" style="gap: 1.5rem; margin-bottom: 1.5rem;">
                            <div class="form-group">
                                <label class="form-label" style="font-weight: 600;">Full Name</label>
                                <input type="text" name="name" class="form-input" required placeholder="John Doe">
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="font-weight: 600;">Mobile Number</label>
                                <input type="tel" name="mobile" class="form-input" required placeholder="+91 99999 99999">
                            </div>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label class="form-label" style="font-weight: 600;">Email (Optional)</label>
                            <input type="email" name="email" class="form-input" placeholder="john@example.com">
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" style="font-weight: 600;">Message</label>
                            <textarea name="message" class="form-textarea" rows="5" required placeholder="How can we help you?"></textarea>
                        </div>

                        <button type="submit" id="submit-btn" class="btn btn-primary btn-lg btn-block shadow-md">
                            Send Message 🚀
                        </button>
                    </form>
                </div>
            </div>

            <!-- Map & Info -->
            <div class="animate-on-scroll slide-in-right" style="animation-delay: 0.2s;">
                 <!-- Map Visual -->
                <div class="card border-0 shadow-lg overflow-hidden rounded-xl mb-lg" style="position: relative; padding: 0;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3578.3761608249!2d79.46369527595604!3d26.24945488828238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39763d3e69f3bd0b%3A0x62c040662d59640!2sAuraiya%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1709999999999!5m2!1sen!2sin" 
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    
                    <div style="position: absolute; bottom: 20px; left: 20px; right: 20px; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <div class="flex items-center gap-md">
                            <div style="background: var(--primary); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                                📍
                            </div>
                            <div>
                                <h4 style="margin: 0; font-size: 1rem; font-weight: 700;">Visit Our Kiln</h4>
                                <p style="margin: 0; font-size: 0.9rem; color: var(--text-secondary);">Khanpur, Auraiya, UP, 206244</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Snippet -->
                <div class="card" style="padding: 2rem;">
                    <h3 class="mb-md">Common Questions</h3>
                    <details class="mb-md" style="cursor: pointer;">
                        <summary style="font-weight: 600; color: var(--text-primary);">Do you deliver to Kanpur?</summary>
                        <p class="mt-sm text-muted">Yes, we deliver to Kanpur, Etawah, and surrounding districts. Delivery charges apply based on distance.</p>
                    </details>
                    <details class="mb-md" style="cursor: pointer;">
                        <summary style="font-weight: 600; color: var(--text-primary);">What is the minimum order?</summary>
                        <p class="mt-sm text-muted">Minimum order for delivery is 2,000 bricks. You can pick up smaller quantities directly.</p>
                    </details>
                    <details style="cursor: pointer;">
                        <summary style="font-weight: 600; color: var(--text-primary);">Do you offer credit?</summary>
                        <p class="mt-sm text-muted">We operate on a cash/digital payment basis. Credit is available for registered contractors only.</p>
                    </details>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
async function submitContact(e) {
    e.preventDefault();
    const btn = document.getElementById('submit-btn');
    const form = document.getElementById('contact-form');
    
    // Simple Validation
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    
    if(!data.name || !data.mobile || !data.message) {
        showToast('Please fill all required fields', 'error');
        return;
    }

    setLoading(btn, true, 'Sending...');

    try {
        const response = await API.post('/contact/submit.php', data);
        
        if (response.success) {
            showToast('Message sent successfully! ✅', 'success');
            form.reset();
        } else {
            showToast(response.message || 'Failed to send message', 'error');
        }
    } catch (err) {
        console.error(err);
        showToast('Something went wrong', 'error');
    } finally {
        setLoading(btn, false, 'Send Message 🚀');
    }
}
</script>

<?php require_once 'includes/bottom-nav.php'; ?>
<?php require_once 'includes/footer.php'; ?>
