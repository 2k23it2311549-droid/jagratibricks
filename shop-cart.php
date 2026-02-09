<?php
$pageTitle = 'Shopping Cart - JagritiBricks';
require_once 'includes/header.php';
?>

<section class="section">
    <div class="container">
        <h1 class="mb-lg" style="font-size: 2.5rem; font-weight: 800;">🛒 Shopping Cart</h1>
        
        <div class="grid grid-3" style="gap: var(--spacing-xl);">
            <!-- Cart Items -->
            <div style="grid-column: span 2;">
                <div id="cart-items">
                    <!-- Will be loaded via JavaScript -->
                </div>
            </div>
            
            <!-- Order Summary -->
            <div>
                <div class="card" style="position: sticky; top: 80px; background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-tertiary) 100%); border: 2px solid var(--border-color);">
                    <h3 class="mb-lg" style="font-size: 1.5rem; font-weight: 700;">📋 Order Summary</h3>
                    
                    <div class="flex justify-between mb-md">
                        <span style="color: var(--text-secondary);">Subtotal:</span>
                        <span id="cart-subtotal" style="font-weight: 700; font-size: 1.125rem;">₹0.00</span>
                    </div>
                    
                    <div class="flex justify-between mb-lg" style="padding-top: var(--spacing-md); border-top: 2px solid var(--border-color);">
                        <span style="font-size: 1.25rem; font-weight: 700;">Total:</span>
                        <span id="cart-total" style="font-size: 2rem; font-weight: 800; color: var(--primary);">₹0.00</span>
                    </div>
                    
                    <button onclick="proceedToCheckout()" class="btn btn-primary btn-block btn-lg" style="font-size: 1.125rem;">
                        Proceed to Checkout →
                    </button>
                    
                    <a href="<?= SITE_URL ?>/shop.php" class="btn btn-secondary btn-block mt-md">
                        ← Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function renderCart() {
    const cart = Cart.get();
    const container = document.getElementById('cart-items');
    
    if (cart.length === 0) {
        container.innerHTML = `
            <div class="card text-center" style="padding: var(--spacing-2xl);">
                <div style="font-size: 4rem; margin-bottom: var(--spacing-md);">🛒</div>
                <h3 class="mb-md">Your cart is empty</h3>
                <p class="mb-lg" style="color: var(--text-secondary);">Add some quality materials to get started</p>
                <a href="${window.SITE_URL}/shop.php" class="btn btn-primary">Browse Shop</a>
            </div>
        `;
        updateSummary();
        return;
    }
    
    container.innerHTML = cart.map(item => {
        const minQty = item.min_order_qty || 1;
        const stepQty = minQty >= 100 ? 100 : 1;
        const unitLabel = item.unit || 'Piece';

        return `
        <div class="card mb-md" style="padding: var(--spacing-lg);">
            <div class="flex gap-md" style="align-items: center;">
                <div class="product-image" style="width: 100px; height: 100px; font-size: 2.5rem; flex-shrink: 0; border-radius: var(--radius-md); overflow:hidden; display:flex; align-items:center; justify-content:center; background:#f5f5f5;">
                    ${item.image ? `<img src="${window.SITE_URL}/${item.image}" style="width:100%;height:100%;object-fit:cover;">` : '🧱'}
                </div>
                
                <div style="flex: 1;">
                    <h4 class="mb-sm" style="font-size: 1.125rem; font-weight: 700;">${item.name}</h4>
                    <p style="color: var(--text-secondary); margin-bottom: var(--spacing-md); font-weight: 500;">
                        ${formatCurrency(item.price)} / ${unitLabel}
                    </p>
                    
                    <div class="cart-qty-controls flex items-center gap-md" style="flex-wrap: wrap;">
                        <input type="hidden" id="min-qty-${item.brick_id}" value="${minQty}">
                        <div class="flex items-center gap-sm">
                            <button onclick="updateQuantity(${item.brick_id}, ${item.quantity - stepQty})" class="btn btn-sm btn-secondary cart-qty-btn" style="width: 32px; height: 32px; padding: 0; display: flex; align-items: center; justify-content: center;">−</button>
                            <input type="number" value="${item.quantity}" min="${minQty}" step="${stepQty}"
                                   onchange="updateQuantity(${item.brick_id}, this.value)"
                                   style="width: 80px; text-align: center; height: 32px;" class="form-input cart-qty-input shadow-sm">
                            <button onclick="updateQuantity(${item.brick_id}, ${item.quantity + stepQty})" class="btn btn-sm btn-secondary cart-qty-btn" style="width: 32px; height: 32px; padding: 0; display: flex; align-items: center; justify-content: center;">+</button>
                        </div>
                        
                        <button onclick="removeFromCart(${item.brick_id})" class="btn btn-sm hover-text-error" style="background: rgba(244, 67, 54, 0.05); color: #d32f2f; border: none;">
                            🗑️ Remove
                        </button>
                    </div>
                </div>
                
                <div class="desktop-only" style="text-align: right;">
                    <div style="font-size: 1.25rem; font-weight: 700; color: var(--primary);">
                        ${formatCurrency(item.price * item.quantity)}
                    </div>
                    <div style="font-size:0.8rem; color:#999;">Min Order: ${minQty}</div>
                </div>
            </div>
            
            <div class="mobile-only" style="margin-top: var(--spacing-md); padding-top: var(--spacing-md); border-top: 1px solid var(--border-color); text-align: right;">
                <span style="font-weight: 600;">Total:</span>
                <span style="font-size: 1.25rem; font-weight: 700; color: var(--primary); margin-left: var(--spacing-sm);">
                    ${formatCurrency(item.price * item.quantity)}
                </span>
            </div>
        </div>
    `}).join('');
    
    updateSummary();
}

function updateQuantity(brickId, newQuantity) {
    const cart = Cart.get();
    const item = cart.find(i => i.brick_id === brickId);
    const minQty = item ? (item.min_order_qty || 1) : 1;
    
    newQuantity = parseInt(newQuantity);
    
    if (newQuantity < minQty) {
        if(confirm(`Minimum quantity is ${minQty}. Remove item?`)) {
            removeFromCart(brickId);
        } else {
            renderCart(); // Reset input
        }
        return;
    }
    
    Cart.update(brickId, newQuantity);
    renderCart();
}

function removeFromCart(brickId) {
    if (confirm('Remove this item from cart?')) {
        Cart.remove(brickId);
        renderCart();
    }
}

function updateSummary() {
    const total = Cart.getTotal();
    document.getElementById('cart-subtotal').textContent = formatCurrency(total);
    document.getElementById('cart-total').textContent = formatCurrency(total);
}

function proceedToCheckout() {
    const cart = Cart.get();
    if (cart.length === 0) {
        showToast('Your cart is empty', 'error');
        return;
    }

    if (!window.IS_LOGGED_IN) {
        sessionStorage.setItem('redirect_after_login', '<?= SITE_URL ?>/shop-checkout.php');
        openAuthModal('login');
        showToast('Please login to checkout 🔒', 'info');
        return;
    }
    
    window.location.href = '<?= SITE_URL ?>/shop-checkout.php';
}

document.addEventListener('DOMContentLoaded', renderCart);
</script>

<?php require_once 'includes/bottom-nav.php'; ?>
<?php require_once 'includes/footer.php'; ?>
