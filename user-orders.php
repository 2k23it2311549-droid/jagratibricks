<?php
require_once 'config/config.php';
require_once 'includes/functions.php';

if (!isLoggedIn()) {
    header('Location: ' . SITE_URL . '/auth-login.php?redirect=/user-orders.php');
    exit;
}

$pageTitle = 'My Orders - JagritiBricks';
require_once 'includes/header.php';
?>

<section class="section">
    <div class="container" style="max-width: 800px;">
        <h1 class="mb-lg" style="font-size: 2.5rem; font-weight: 800;">📦 My Orders</h1>
        
        <!-- Filter Tabs -->
        <div class="flex gap-md mb-lg" style="border-bottom: 2px solid var(--border-color);">
            <button onclick="filterOrders('all')" class="tab-btn active" id="tab-all">All Orders</button>
            <button onclick="filterOrders('active')" class="tab-btn" id="tab-active">Active</button>
            <button onclick="filterOrders('history')" class="tab-btn" id="tab-history">History</button>
        </div>

        <div id="orders-container">
            <div class="spinner" style="margin: var(--spacing-2xl) auto;"></div>
        </div>
    </div>
</section>

<style>
.tab-btn {
    padding: var(--spacing-md) var(--spacing-lg);
    background: none;
    border: none;
    font-weight: 600;
    color: var(--text-secondary);
    cursor: pointer;
    border-bottom: 3px solid transparent;
    margin-bottom: -2px;
    transition: all 0.2s;
}
.tab-btn:hover {
    color: var(--primary);
}
.tab-btn.active {
    color: var(--primary);
    border-bottom-color: var(--primary);
}
</style>

<script>
let allOrders = []; // Store fetched orders

async function loadOrders() {
    const container = document.getElementById('orders-container');
    
    const response = await API.get('/orders/my-orders.php');
    
    if (response.success && response.data.orders.length > 0) {
        allOrders = response.data.orders;
        renderOrders(allOrders);
    } else {
        renderOrders([]);
    }
}

function filterOrders(type) {
    // Update tabs
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    document.getElementById(`tab-${type}`).classList.add('active');
    
    // Filter data
    let filtered = allOrders;
    if (type === 'active') {
        filtered = allOrders.filter(o => ['Pending', 'Confirmed', 'Shipped'].includes(o.order_status));
    } else if (type === 'history') {
        filtered = allOrders.filter(o => ['Delivered', 'Cancelled'].includes(o.order_status));
    }
    
    renderOrders(filtered, type);
}

function renderOrders(orders, currentType = 'all') {
    const container = document.getElementById('orders-container');
    
    if (orders.length > 0) {
        container.innerHTML = orders.map(order => `
            <div class="card mb-lg">
                <div class="flex justify-between items-center mb-md">
                    <div>
                        <h3 style="margin-bottom: var(--spacing-xs);">Order #${order.order_id}</h3>
                        <p style="color: var(--text-secondary); font-size: 0.875rem;">
                            ${formatDate(order.created_at)}
                        </p>
                    </div>
                    <span class="badge ${getOrderStatusClass(order.order_status)}">
                        ${order.order_status}
                    </span>
                </div>
                
                <div style="background: var(--bg-tertiary); padding: var(--spacing-md); border-radius: var(--radius-md); margin-bottom: var(--spacing-md);">
                    ${order.items.map(item => `
                        <div class="flex justify-between mb-sm">
                            <span>${item.brick_name} × ${item.quantity}</span>
                            <span style="font-weight: 600;">${formatCurrency(item.subtotal)}</span>
                        </div>
                    `).join('')}
                </div>
                
                <div class="flex justify-between items-center mb-md">
                    <span style="font-weight: 600;">Total Amount:</span>
                    <span style="font-size: 1.25rem; font-weight: 700; color: var(--primary);">
                        ${formatCurrency(order.total_amount)}
                    </span>
                </div>
                
                <div class="flex justify-between items-center" style="padding-top: var(--spacing-md); border-top: 1px solid var(--border-color);">
                    <div>
                        <div style="color: var(--text-secondary); font-size: 0.875rem;">Payment Method</div>
                        <div style="font-weight: 500;">${order.payment_method}</div>
                    </div>
                    <div>
                        <div style="color: var(--text-secondary); font-size: 0.875rem;">Payment Status</div>
                        <span class="badge ${getPaymentStatusClass(order.payment_status)}">
                            ${order.payment_status}
                        </span>
                    </div>
                </div>
                
                <details style="margin-top: var(--spacing-md);">
                    <summary style="cursor: pointer; color: var(--primary); font-weight: 500;">
                        Delivery Details
                    </summary>
                    <div style="margin-top: var(--spacing-md); padding: var(--spacing-md); background: var(--bg-tertiary); border-radius: var(--radius-md);">
                        <p><strong>Name:</strong> ${order.delivery_name}</p>
                        <p><strong>Mobile:</strong> ${order.delivery_mobile}</p>
                        <p><strong>Address:</strong> ${order.delivery_address}</p>
                    </div>
                </details>
            </div>
        `).join('');
    } else {
        const message = currentType === 'history' ? 'No past orders found' : 
                       currentType === 'active' ? 'No active orders' : 'No orders yet';
                       
        container.innerHTML = `
            <div class="card text-center" style="padding: var(--spacing-2xl);">
                <div style="font-size: 4rem; margin-bottom: var(--spacing-md);">📦</div>
                <h3 class="mb-md">${message}</h3>
                <p class="mb-lg" style="color: var(--text-secondary);">Start shopping to place a new order</p>
                <a href="<?= SITE_URL ?>/shop.php" class="btn btn-primary">Browse Shop</a>
            </div>
        `;
    }
}

function getOrderStatusClass(status) {
    const classes = {
        'Pending': 'badge-warning',
        'Confirmed': 'badge-info',
        'Delivered': 'badge-success',
        'Cancelled': 'badge-danger'
    };
    return classes[status] || 'badge-secondary';
}

function getPaymentStatusClass(status) {
    return status === 'Paid' ? 'badge-success' : 'badge-warning';
}

document.addEventListener('DOMContentLoaded', loadOrders);
</script>

<?php require_once 'includes/bottom-nav.php'; ?>
<?php require_once 'includes/footer.php'; ?>
