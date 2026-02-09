<?php
// Check login status BEFORE any output
require_once 'config/config.php';
require_once 'includes/functions.php';

if (isLoggedIn()) {
    $redirect = $_GET['redirect'] ?? SITE_URL . '/index.php';
    header("Location: $redirect");
    exit;
}

$pageTitle = 'Login - JagritiBricks';
require_once 'includes/header.php';
?>

<section class="section">
    <div class="container" style="max-width: 480px;">
        <div class="card" style="padding: var(--spacing-2xl) var(--spacing-xl);">
            <div class="text-center mb-xl">
                <span style="font-size: 3rem; display: block; margin-bottom: var(--spacing-sm);">🔐</span>
                <h1 style="font-size: 2rem; margin-bottom: var(--spacing-xs);">Welcome Back</h1>
                <p style="color: var(--text-secondary);">Login to manage your orders</p>
            </div>
            
            <form id="login-form" onsubmit="handleLogin(event)">
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
                               placeholder="Enter your password" style="padding-left: 40px;">
                    </div>
                </div>
                
                <button type="submit" id="login-btn" class="btn btn-primary btn-block btn-lg" style="margin-top: var(--spacing-lg); font-weight: 700;">
                    Login
                </button>
            </form>
            
            <p style="margin-top: 1.5rem; color: #666;">
                Don't have an account? <a href="<?= SITE_URL ?>/auth-signup.php" style="color: var(--primary); font-weight: 600;">Sign Up</a>
            </p>
        </div>
    </div>
</section>

<script>
async function handleLogin(event) {
    event.preventDefault();
    
    const form = event.target;
    const btn = document.getElementById('login-btn');
    const formData = new FormData(form);
    
    const loginData = {
        mobile: formData.get('mobile'),
        password: formData.get('password')
    };
    
    setLoading(btn, true);
    
    const response = await API.post('/auth/login.php', loginData);
    
    setLoading(btn, false);
    
    if (response.success) {
        showToast('Login successful!', 'success');
        const redirect = new URLSearchParams(window.location.search).get('redirect') || window.SITE_URL + '/index.php';
        setTimeout(() => {
            window.location.href = redirect;
        }, 1000);
    } else {
        showToast(response.message || 'Login failed', 'error');
    }
}
</script>

<?php require_once 'includes/bottom-nav.php'; ?>
<?php require_once 'includes/footer.php'; ?>
