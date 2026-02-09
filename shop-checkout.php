<?php
$pageTitle = 'Checkout - JagritiBricks';
require_once 'includes/header.php';

if (!isLoggedIn()) {
    header('Location: /auth-login.php?redirect=/shop-checkout.php');
    exit;
}
?>

<div class="mobile-container">
    <div class="container" style="padding-top: var(--spacing-lg);">
        <h1 class="mb-lg">Checkout</h1>
        
        <div class="grid grid-3" style="gap: var(--spacing-xl);">
            <!-- Checkout Form -->
            <div style="grid-column: span 2;">
                <form id="checkout-form" onsubmit="placeOrder(event)">
                    <div class="card mb-lg">
                        <h3 class="mb-lg">Delivery Details</h3>
                        
                        <div class="form-group">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="delivery_name" class="form-input" required 
                                   value="<?= htmlspecialchars($_SESSION['user_name']) ?>">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Mobile Number *</label>
                            <input type="tel" name="delivery_mobile" class="form-input" required 
                                   value="<?= htmlspecialchars($_SESSION['user_mobile']) ?>">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Delivery Address *</label>
                            <textarea name="delivery_address" class="form-textarea" required 
                                      placeholder="Enter complete delivery address"></textarea>
                        </div>
                    </div>
                    
                    <div class="card mb-lg">
                        <h3 class="mb-lg">Payment Method</h3>
                        
                        <label class="flex items-center gap-md mb-md" style="cursor: pointer; padding: var(--spacing-md); background: var(--bg-tertiary); border-radius: var(--radius-md);">
                            <input type="radio" name="payment_method" value="COD" checked>
                            <div>
                                <div style="font-weight: 600;">Cash on Delivery</div>
                                <div style="color: var(--text-secondary); font-size: 0.875rem;">Pay when you receive the order</div>
                            </div>
                        </label>
                        
                        <?php if (getSetting('online_payment_enabled', '0') == '1'): ?>
                        <label class="flex items-center gap-md" style="cursor: pointer; padding: var(--spacing-md); background: var(--bg-tertiary); border-radius: var(--radius-md);">
                            <input type="radio" name="payment_method" value="Online">
                            <div>
                                <div style="font-weight: 600;">Online Payment</div>
                                <div style="color: var(--text-secondary); font-size: 0.875rem;">Pay securely online</div>
                            </div>
                        </label>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" id="place-order-btn" class="btn btn-primary btn-lg btn-block">
                        Place Order
                    </button>
                </form>
            </div>
            
            <!-- Order Summary -->
            <div>
                <div class="card" style="position: sticky; top: 80px;">
                    <h3 class="mb-lg">Order Summary</h3>
                    
                    <div id="order-items" class="mb-lg" style="max-height: 300px; overflow-y: auto;">
                        <!-- Will be loaded via JavaScript -->
                    </div>
                    
                    <div class="flex justify-between mb-md" style="padding-top: var(--spacing-md); border-top: 1px solid var(--border-color);">
                        <span style="font-size: 1.25rem; font-weight: 600;">Total:</span>
                        <span id="order-total" style="font-size: 1.5rem; font-weight: 700; color: var(--primary);">₹0.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function renderOrderSummary() {
    const cart = Cart.get();
    const container = document.getElementById('order-items');
    
    if (cart.length === 0) {
        window.location.href = '/shop-cart.php';
        return;
    }
    
    container.innerHTML = cart.map(item => `
        <div class="flex justify-between mb-md">
            <div>
                <div style="font-weight: 500;">${item.name}</div>
                <div style="color: var(--text-secondary); font-size: 0.875rem;">
                    ${item.quantity} ${item.unit || 'pcs'} × ${formatCurrency(item.price)}
                </div>
            </div>
            <div style="font-weight: 600;">
                ${formatCurrency(item.price * item.quantity)}
            </div>
        </div>
    `).join('');
    
    document.getElementById('order-total').textContent = formatCurrency(Cart.getTotal());
}

async function placeOrder(event) {
    event.preventDefault();
    
    const form = event.target;
    const btn = document.getElementById('place-order-btn');
    const formData = new FormData(form);
    
    const cart = Cart.get();
    if (cart.length === 0) {
        showToast('Your cart is empty', 'error');
        return;
    }
    
    const orderData = {
        cart_items: cart,
        delivery_name: formData.get('delivery_name'),
        delivery_mobile: formData.get('delivery_mobile'),
        delivery_address: formData.get('delivery_address'),
        payment_method: formData.get('payment_method')
    };
    
    setLoading(btn, true);
    
    const response = await API.post('/orders/create.php', orderData);
    
    setLoading(btn, false);
    
    if (response.success) {
        Cart.clear();
        showToast('Order placed successfully!', 'success');
        setTimeout(() => {
            window.location.href = window.SITE_URL + '/user-orders.php';
        }, 1500);
    } else {
        showToast(response.message || 'Failed to place order', 'error');
    }
}

document.addEventListener('DOMContentLoaded', renderOrderSummary);
</script>

<?php require_once 'includes/bottom-nav.php'; ?>
<?php require_once 'includes/footer.php'; ?>
