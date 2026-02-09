<?php
$pageTitle = 'Product Details - Jagriti BuildMart';
require_once 'includes/header.php';

$productId = intval($_GET['id'] ?? 0);
if ($productId <= 0) {
    header('Location: ' . SITE_URL . '/index.php');
    exit;
}
?>

<section class="section" style="padding-top: 2rem;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-md">
            <ol class="breadcrumb" style="background: none; padding: 0;">
                <li class="breadcrumb-item"><a href="<?= SITE_URL ?>/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= SITE_URL ?>/shop.php">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
            </ol>
        </nav>

        <div id="product-detail-container">
            <div class="spinner" style="margin: var(--spacing-2xl) auto;"></div>
        </div>
        
        <!-- Related Products -->
        <div id="related-products-section" style="margin-top: 4rem; display: none;">
            <h2 class="mb-lg text-center section-title" style="font-size: 2rem; font-weight: 700;">Related Products</h2>
            <div id="related-products" class="grid grid-4"></div>
        </div>
    </div>
</section>

<script>
const productId = <?= $productId ?>;

async function loadProductDetail() {
    const container = document.getElementById('product-detail-container');
    
    try {
        const response = await API.get(`/bricks/detail.php?id=${productId}`);
        
        if (response.success && response.data.brick) { // API still returns 'brick' key
            const p = response.data.brick;
            const unit = p.unit || 'Piece';
            
            // Determine category badge based on type
            let categoryBadge = 'BRICK';
            let badgeClass = 'badge-warning';
            
            if (p.type === 'Cement' || p.category_name === 'Cement') {
                categoryBadge = 'CEMENT';
                badgeClass = 'badge-secondary';
            } else if (p.type === 'Sariya' || p.category_name?.includes('Sariya') || p.category_name?.includes('TMT')) {
                categoryBadge = 'STEEL';
                badgeClass = 'badge-dark';
            } else if (p.type === 'Mauram' || p.category_name?.includes('Sand') || p.category_name?.includes('Mauram')) {
                categoryBadge = 'SAND';
                badgeClass = 'badge-info';
            } else {
                categoryBadge = 'BRICK';
                badgeClass = 'badge-warning';
            }
            
            // Parse attributes for weight information
            let weightInfo = '';
            try {
                const attrs = typeof p.attributes === 'string' ? JSON.parse(p.attributes) : p.attributes;
                
                if (unit === 'Bag' && attrs?.packing_weight_kg) {
                    weightInfo = ` (${attrs.packing_weight_kg} kg)`;
                } else if (unit === 'Ton') {
                    weightInfo = ' (1000 kg)';
                }
            } catch (e) {
                // Ignore parsing errors
            }
            
            // Set Page Title
            document.title = `${p.name} - Jagriti BuildMart`;
            
            container.innerHTML = `
                <div class="grid grid-2" style="gap: 3rem; align-items: start;">
                    <!-- Image Gallery -->
                    <div class="product-gallery">
                         <div class="main-image-wrapper card-lift" style="height: 450px; background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); position: relative;">
                            ${p.image_url ? 
                                `<img src="${window.SITE_URL}/${p.image_url}" alt="${p.name}" id="main-product-img" style="width:100%;height:100%;object-fit:cover;" onerror="this.src='${window.SITE_URL}/assets/img/all/map-placeholder.jpg'">` : 
                                '<div class="flex items-center justify-center h-full text-9xl text-muted" style="background:#f8f9fa;">📦</div>'}
                            
                            ${p.stock_quantity > 0 ? 
                                `<div class="badge badge-success" style="position: absolute; top: 20px; left: 20px; padding: 8px 16px; font-size: 0.9rem;">In Stock</div>` : 
                                `<div class="badge badge-danger" style="position: absolute; top: 20px; left: 20px; padding: 8px 16px; font-size: 0.9rem;">Out of Stock</div>`
                            }
                        </div>
                        <!-- Thumbnails could go here if API returned them -->
                    </div>
                    
                    <!-- Product Info -->
                    <div class="product-info-wrapper">
                        <div class="mb-sm">
                            <span class="badge ${badgeClass}" style="font-size: 0.8rem; letter-spacing: 1px;">${categoryBadge}</span>
                        </div>
                        
                        <h1 class="mb-sm" style="font-size: 2.5rem; font-weight: 800; line-height: 1.2;">${p.name}</h1>
                        
                        ${p.brand ? `<div class="mb-md text-muted" style="font-weight: 500;">Brand: <span class="text-dark">${p.brand}</span></div>` : ''}
                        
                        <div class="price-block card mb-lg" style="background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%); border: 1px solid #eee; padding: 1.5rem; border-radius: 16px;">
                            <div class="flex justify-between items-center">
                                <div>
                                    <div class="product-price" style="font-size: 2.5rem; color: var(--primary); font-weight: 800;">
                                        ${formatCurrency(p.price_per_piece)}
                                    </div>
                                    <div class="text-muted" style="font-size: 0.9rem; font-weight: 500;">Price per ${unit}${weightInfo}</div>
                                </div>
                                
                                ${unit === 'Piece' && p.price_per_thousand > 0 ? `
                                <div class="text-right">
                                    <div style="font-size: 1.5rem; font-weight: 700; color: #555;">
                                        ${formatCurrency(p.price_per_thousand)}
                                    </div>
                                    <div class="text-muted" style="font-size: 0.8rem;">per 1000 pcs</div>
                                </div>` : ''}
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div class="mb-lg">
                            <h3 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem;">Description</h3>
                            <p style="color: #666; line-height: 1.6;">${p.description || 'No description available.'}</p>
                            
                            ${p.size_grade ? `
                                <div class="mt-md p-sm bg-light rounded flex gap-md items-center">
                                    <strong>Specifications:</strong> 
                                    <span>${p.size_grade}</span>
                                </div>` : ''}
                        </div>
                        
                        <!-- Actions -->
                         ${p.stock_quantity > 0 ? `
                            <div class="action-block p-md border rounded bg-white" style="box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                                <div class="flex flex-wrap gap-md items-center mb-md">
                                    <div class="quantity-selector flex items-center border rounded" style="background: #f8f9fa;">
                                        <button onclick="updateQty(-1)" class="px-3 py-2 border-none bg-transparent font-bold hover-bg-gray">-</button>
                                        <input type="number" id="qty" class="text-center font-bold bg-transparent border-none" value="${p.min_order_qty || 1}" min="${p.min_order_qty || 1}" step="1" style="width: 60px; outline: none;">
                                        <button onclick="updateQty(1)" class="px-3 py-2 border-none bg-transparent font-bold hover-bg-gray">+</button>
                                    </div>
                                    <div class="text-sm text-muted">Min Order: ${p.min_order_qty || 1} ${unit}s</div>
                                </div>
                                
                                <div class="grid grid-2 gap-md">
                                    <button onclick="addToCart(${p.id}, '${p.name.replace(/'/g, "\\'")}', ${p.price_per_piece}, '${unit}', '${p.image_url || ''}', ${p.min_order_qty || 1})" class="btn btn-primary btn-lg flex items-center justify-center gap-sm shadow-md hover-lift">
                                        🛒 Add to Cart
                                    </button>
                                    <a href="https://wa.me/<?= str_replace(['+', ' '], '', getSetting('whatsapp_number', '919140263758')) ?>?text=I want to buy ${encodeURIComponent(p.name)}" target="_blank" class="btn btn-outline btn-lg flex items-center justify-center gap-sm hover-bg-light">
                                        <span style="color: #25D366; font-size: 1.2rem;">📱</span> WhatsApp
                                    </a>
                                </div>
                            </div>
                        ` : `
                            <div class="alert alert-error">
                                🚫 Currently Out of Stock. <a href="${window.SITE_URL}/contact.php">Contact us</a> for availability.
                            </div>
                        `}
                        
                        <!-- Bulk Info Conditional -->
                        ${(p.type.includes('Brick') || p.category_name === 'Bricks') ? `
                            <div class="mt-lg p-md bg-light rounded border-dashed flex gap-md">
                                <span style="font-size: 2rem;">🚛</span>
                                <div>
                                    <strong>Bulk Delivery Info</strong>
                                    <p class="text-sm text-muted m-0">Full truck load (approx 15,000 bricks) available at discounted rates.</p>
                                </div>
                            </div>
                        ` : ''}
                        
                    </div>
                </div>
            `;
            
            // Render Related
            if (response.data.related_bricks && response.data.related_bricks.length > 0) {
                document.getElementById('related-products-section').style.display = 'block';
                document.getElementById('related-products').innerHTML = response.data.related_bricks.map(rp => `
                    <div class="product-card hover-lift">
                         <div class="product-image" style="height: 200px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                            ${rp.image_url ? 
                                `<img src="${window.SITE_URL}/uploads/${rp.image_url}" alt="${rp.name}" style="width:100%;height:100%;object-fit:cover;">` : 
                                '<span style="font-size: 3rem;">📦</span>'}
                        </div>
                        <div class="product-body">
                            <span class="text-xs text-muted upper">${rp.type}</span>
                            <h3 class="product-title" style="font-size: 1.1rem; margin-bottom: 0.5rem;">${rp.name}</h3>
                            <div class="product-price" style="font-size: 1.2rem; color: var(--primary); font-weight: 700;">
                                ${formatCurrency(rp.price_per_piece)}
                                <span style="font-size: 0.8rem; color: #999; font-weight: 400;">/ ${rp.unit || 'pc'}</span>
                            </div>
                            <a href="${window.SITE_URL}/shop-brick-detail.php?id=${rp.id}" class="btn btn-outline btn-sm btn-block mt-md">View</a>
                        </div>
                    </div>
                `).join('');
            }
            
        } else {
            container.innerHTML = `<div class="text-center py-xl"><h3>Product not found</h3><a href="${window.SITE_URL}/shop.php" class="btn btn-primary">Back to Shop</a></div>`;
        }
    } catch (err) {
        console.error(err);
        container.innerHTML = '<p class="text-center text-error">Failed to load product details.</p>';
    }
}

function updateQty(change) {
    const input = document.getElementById('qty');
    let val = parseInt(input.value) + change;
    if(val < parseInt(input.min)) val = parseInt(input.min);
    input.value = val;
}

function addToCart(id, name, price, unit, image, minQty = 1) {
    if (!window.IS_LOGGED_IN) {
        openAuthModal('login');
        showToast('Please login to add to cart 🛒', 'info');
        return;
    }
    const qty = parseInt(document.getElementById('qty').value);
    
    // Animation
    const btn = document.querySelector('.action-block .btn-primary');
    const originalText = btn.innerHTML;
    btn.innerHTML = '✅ Added!';
    btn.classList.add('btn-success');
    
    Cart.add({ id, name, price_per_piece: price, image, unit, min_order_qty: minQty }, qty);
    
    setTimeout(() => {
        btn.innerHTML = originalText;
        btn.classList.remove('btn-success');
    }, 1500);
}

document.addEventListener('DOMContentLoaded', loadProductDetail);
</script>

<?php require_once 'includes/bottom-nav.php'; ?>
<?php require_once 'includes/footer.php'; ?>
