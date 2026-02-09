<?php
$pageTitle = 'Sign Up - JagritiBricks';
require_once 'includes/header.php';

if (isLoggedIn()) {
    header('Location: /index.php');
    exit;
}
?>

<section class="section">
    <div class="container" style="max-width: 480px;">
        <div class="card" style="padding: var(--spacing-2xl) var(--spacing-xl);">
            <div class="text-center mb-xl">
                <span style="font-size: 3rem; display: block; margin-bottom: var(--spacing-sm);">📝</span>
                <h1 style="font-size: 2rem; margin-bottom: var(--spacing-xs);">Create Account</h1>
                <p style="color: var(--text-secondary);">Join JagritiBricks today</p>
            </div>
            
            <form id="signup-form" onsubmit="handleSignup(event)">
                <div class="form-group">
                    <label class="form-label" style="font-weight: 600;">Full Name</label>
                    <div style="position: relative;">
                        <span style="position: absolute; left: 12px; top: 12px; font-size: 1.2rem;">👤</span>
                        <input type="text" name="name" class="form-input" required 
                               placeholder="Enter your full name" minlength="3" style="padding-left: 40px;">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label" style="font-weight: 600;">Mobile Number</label>
                    <div style="position: relative;">
                        <span style="position: absolute; left: 12px; top: 12px; font-size: 1.2rem;">📱</span>
                        <input type="tel" name="mobile" class="form-input" required 
                               placeholder="Enter 10-digit number" pattern="[6-9][0-9]{9}" style="padding-left: 40px;">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label" style="font-weight: 600;">Password</label>
                    <div style="position: relative;">
                        <span style="position: absolute; left: 12px; top: 12px; font-size: 1.2rem;">🔒</span>
                        <input type="password" name="password" class="form-input" required 
                               placeholder="Minimum 6 characters" minlength="6" style="padding-left: 40px;">
                    </div>
                </div>
                
                <button type="submit" id="signup-btn" class="btn btn-primary btn-block btn-lg" style="margin-top: var(--spacing-lg); font-weight: 700;">
                    Sign Up
                </button>
            </form>
            
            <p style="margin-top: 1.5rem; color: #666;">
                Already have an account? <a href="<?= SITE_URL ?>/auth-login.php" style="color: var(--primary); font-weight: 600;">Login</a>
            </p>
        </div>
    </div>
</section>

<script>
async function handleSignup(event) {
    event.preventDefault();
    
    const form = event.target;
    const btn = document.getElementById('signup-btn');
    const formData = new FormData(form);
    
    const signupData = {
        name: formData.get('name'),
        mobile: formData.get('mobile'),
        password: formData.get('password')
    };
    
    setLoading(btn, true);
    
    const response = await API.post('/auth/signup.php', signupData);
    
    setLoading(btn, false);
    
    if (response.success) {
        showToast('Registration successful!', 'success');
        setTimeout(() => {
            window.location.href = window.SITE_URL + '/index.php';
        }, 1000);
    } else {
        showToast(response.message || 'Registration failed', 'error');
    }
}
</script>

<?php require_once 'includes/bottom-nav.php'; ?>
<?php require_once 'includes/footer.php'; ?>
