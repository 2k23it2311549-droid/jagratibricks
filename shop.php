<?php
$pageTitle = 'Shop Construction Materials - Jagriti BuildMart';
require_once 'includes/header.php';

// Get Category from URL for initial SEO/Display
$categorySlug = $_GET['category'] ?? '';
$displayTitle = 'Building Materials';
$heroImage = 'hero-indian-bricks.jpg'; // Default

if($categorySlug == 'cement') {
    $displayTitle = 'Buy Cement Online';
    $pageTitle = 'Buy Cement - OPC, PPC at Best Price';
} elseif($categorySlug == 'sariya') {
    $displayTitle = 'TMT Steel Bars (Sariya)';
    $pageTitle = 'Buy TMT Sariya - 500D, 550D';
} elseif($categorySlug == 'mauram-sand') {
    $displayTitle = 'Mauram & Sand';
    $pageTitle = 'Buy Mauram & Sand - Direct Delivery';
} elseif($categorySlug == 'brick') {
    $displayTitle = 'Premium Bricks';
    $pageTitle = 'Buy Red Clay & Fly Ash Bricks';
}
?>

<div class="shop-page" style="background: #fafafa; min-height: 100vh; padding-bottom: 4rem;">
    <!-- Shop Header -->
    <div class="shop-header animate-on-scroll" style="position: relative; background: #222; padding: 4rem 0; color: white; text-align: center; margin-bottom: 2rem; overflow: hidden;">
        <!-- Background Image Parallax -->
        <div style="position: absolute; inset: 0; background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('<?= SITE_URL ?>/assets/img/all/<?= $heroImage ?>') center/cover; z-index: 0;"></div>
        
        <div class="container" style="position: relative; z-index: 1;">
            <h1 style="font-size: 3rem; font-weight: 800; text-shadow: 0 4px 15px rgba(0,0,0,0.5); margin-bottom: 0.5rem; letter-spacing: 1px;"><?= $displayTitle ?></h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">Direct from Factory • Best Prices • Verified Quality</p>
        </div>
    </div>

    <div class="container">
        <!-- Mobile Filter Toggle -->
        <button class="btn btn-primary mb-md d-md-none" onclick="toggleSidebar()" style="width: 100%; display: none; position: sticky; top: 80px; z-index: 90; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            🔍 Filters & Categories
        </button>

        <div class="shop-layout">
            
            <!-- Sidebar Filter -->
            <aside class="sidebar-filter" id="shop-sidebar">
                <div class="sidebar-header d-md-none">
                    <h3>Filters</h3>
                    <button onclick="toggleSidebar()" class="btn-close">×</button>
                </div>
                
                <div class="sidebar-content">
                    <!-- Category Nav -->
                    <div class="filter-card mb-lg animate-on-scroll">
                        <h3 class="mb-md" style="font-size: 1.1rem; font-weight: 700;">Categories</h3>
                        <ul class="category-nav">
                            <li><a href="shop.php" class="<?= empty($categorySlug) ? 'active' : '' ?>">All Materials</a></li>
                            <li><a href="shop.php?category=brick" class="<?= $categorySlug == 'brick' ? 'active' : '' ?>">🧱 Bricks</a></li>
                            <li><a href="shop.php?category=cement" class="<?= $categorySlug == 'cement' ? 'active' : '' ?>">🏗️ Cement</a></li>
                            <li><a href="shop.php?category=sariya" class="<?= $categorySlug == 'sariya' ? 'active' : '' ?>">🔩 Sariya (TMT)</a></li>
                            <li><a href="shop.php?category=mauram-sand" class="<?= $categorySlug == 'mauram-sand' ? 'active' : '' ?>">🏜️ Mauram/Sand</a></li>
                        </ul>
                    </div>

                    <!-- Filters -->
                    <div class="filter-card mb-lg animate-on-scroll" style="animation-delay: 0.1s;">
                        <div class="flex justify-between items-center mb-md border-bottom pb-sm">
                            <h3 class="m-0" style="font-size: 1.1rem; font-weight: 700;">Filter By</h3>
                            <button onclick="clearFilters()" class="text-primary" style="background: none; border: none; cursor: pointer; font-size: 0.85rem; font-weight: 600;">Reset</button>
                        </div>
                        
                        <!-- Brand Filter (Dynamic) -->
                         <div class="form-group mb-md">
                            <label class="form-label text-sm text-muted font-weight-bold">Brand</label>
                            <input type="text" id="filter-brand" class="form-input w-100" placeholder="e.g. Tata, Ultratech" oninput="applyFiltersDebounced()">
                        </div>

                        <!-- Type Filter (Dynamic Context) -->
                        <div class="form-group mb-md">
                            <label class="form-label text-sm text-muted font-weight-bold">Type / Grade</label>
                            <input type="text" id="filter-type" class="form-input w-100" placeholder="e.g. Clay, 53 Grade, 500D" oninput="applyFiltersDebounced()">
                        </div>
                        
                        <div class="form-group mb-md">
                            <label class="form-label text-sm text-muted font-weight-bold">Price Range</label>
                            <div class="flex gap-sm items-center">
                                <input type="number" id="filter-min-price" class="form-input text-center" placeholder="Min" onchange="applyFilters()">
                                <span class="text-muted">-</span>
                                <input type="number" id="filter-max-price" class="form-input text-center" placeholder="Max" onchange="applyFilters()">
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Product Grid -->
            <main class="product-content">
                <!-- Top Toolbar -->
                <div class="flex flex-wrap justify-between items-center mb-lg gap-md p-md bg-white rounded shadow-sm border">
                    <!-- Search -->
                    <div class="search-bar-wrapper flex-grow-1" style="max-width: 400px;">
                       <input type="text" id="search-input" class="form-input search-input border-0 bg-light" placeholder="Search products..." autocomplete="off">
                       <span class="search-icon text-muted">🔍</span>
                    </div>

                    <!-- Sort -->
                    <div class="flex items-center gap-sm">
                        <span class="text-muted text-sm d-none d-md-inline">Sort by:</span>
                        <select id="sort-select" class="form-select border-0 bg-light py-2" onchange="applyFilters()">
                            <option value="default">Newest First</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                            <option value="name_asc">Name: A-Z</option>
                        </select>
                    </div>
                </div>

                <div id="products-container" class="brick-grid">
                    <div class="spinner" style="grid-column: 1 / -1; margin: 3rem auto;"></div>
                </div>
                
                <div id="pagination" class="pagination mt-xl flex justify-center gap-sm"></div>
            </main>
        </div>
    </div>
    
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" onclick="toggleSidebar()" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 98;"></div>
</div>

<style>
/* Layout */
.shop-layout {
    display: grid;
    grid-template-columns: 260px 1fr;
    gap: 2rem;
    align-items: start;
}

/* Category Nav */
.category-nav { list-style: none; padding: 0; margin: 0; }
.category-nav li { margin-bottom: 0.5rem; }
.category-nav a {
    display: block;
    padding: 0.8rem 1rem;
    border-radius: 8px;
    color: #555;
    font-weight: 500;
    transition: all 0.2s;
    border: 1px solid transparent;
}
.category-nav a:hover { background: #f5f5f5; color: var(--primary); }
.category-nav a.active {
    background: #ffebee;
    color: var(--primary);
    font-weight: 700;
    border-color: #ffcdd2;
}

/* Sidebar Sticky on Desktop */
@media (min-width: 901px) {
    .sidebar-filter {
        position: sticky;
        top: 100px;
        height: fit-content;
        max-height: calc(100vh - 120px);
        overflow-y: auto;
    }
    .sidebar-filter::-webkit-scrollbar { width: 4px; }
    .sidebar-filter::-webkit-scrollbar-thumb { background: #ddd; border-radius: 4px; }
}

@media (max-width: 900px) {
    .shop-layout { grid-template-columns: 1fr; }
    .sidebar-filter {
        position: fixed; top: 0; left: -300px; width: 280px; height: 100vh;
        background: white; z-index: 99; transition: left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0; box-shadow: 2px 0 20px rgba(0,0,0,0.1); overflow-y: auto;
    }
    .sidebar-filter.active { left: 0; }
    .sidebar-header {
        display: flex; justify-content: space-between; align-items: center;
        padding: 1.5rem; border-bottom: 1px solid #eee; background: var(--primary); color: white;
    }
    .sidebar-content { padding: 1.5rem; }
    .btn-close { background: none; border: none; font-size: 2rem; color: white; cursor: pointer; line-height: 1; }
    .d-md-none { display: block !important; }
    .d-none { display: none !important; }
}

.filter-card {
    background: white; border-radius: 16px; padding: 1.5rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.04);
}

/* Inputs */
.form-select, .form-input {
    border-radius: 10px; border: 1px solid #e0e0e0; padding: 10px 15px;
    transition: all 0.2s; font-size: 0.95rem;
}
.form-select:focus, .form-input:focus {
    border-color: var(--primary); box-shadow: 0 0 0 3px rgba(229, 57, 53, 0.1); outline: none;
}
.bg-light { background: #f8f9fa !important; }

/* Search Bar */
.search-bar-wrapper { position: relative; }
.search-input { padding-left: 40px; height: 45px; border-radius: 50px; }
.search-icon { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); }

/* Grid */
.brick-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 1.5rem;
}

/* Quick Action Overlay */
.quick-action-overlay {
    position: absolute; bottom: 0; left: 0; width: 100%; padding: 15px;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    transform: translateY(100%); transition: transform 0.3s ease;
    display: flex; justify-content: center;
}
.product-card:hover .quick-action-overlay { transform: translateY(0); }

.price-tag { font-size: 1.25rem; font-weight: 800; color: var(--primary); }

/* Flying Animation */
.flying-item {
    position: fixed; z-index: 9999; width: 50px; height: 50px; object-fit: cover;
    border-radius: 50%; box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    transition: all 0.8s cubic-bezier(0.19, 1, 0.22, 1); pointer-events: none;
}
</style>

<script>
let currentPage = 1;
const categorySlug = '<?= $categorySlug ?>';

async function loadProducts(page = 1) {
    const container = document.getElementById('products-container');
    currentPage = page;
    
    if(page > 1) document.querySelector('.product-content').scrollIntoView({behavior: 'smooth'});
    
    container.innerHTML = '<div class="spinner" style="grid-column: 1 / -1; margin: 3rem auto;"></div>';
    
    const brand = document.getElementById('filter-brand').value;
    const type = document.getElementById('filter-type').value;
    const minPrice = document.getElementById('filter-min-price').value;
    const maxPrice = document.getElementById('filter-max-price').value;
    const search = document.getElementById('search-input').value;
    const sort = document.getElementById('sort-select').value;
    
    const params = new URLSearchParams({
        page,
        category: categorySlug,
        ...(brand && { brand }),
        ...(type && { type }),
        ...(minPrice && { min_price: minPrice }),
        ...(maxPrice && { max_price: maxPrice }),
        ...(search && { search }),
        ...(sort && sort !== 'default' && { sort })
    });
    
    try {
        const response = await API.get('/bricks/list.php?' + params.toString());
        
        if (response.success && response.data.bricks.length > 0) {
            const products = response.data.bricks;
            container.innerHTML = products.map((p, index) => `
                <div class="product-card animate-in" style="animation-delay: ${index * 0.05}s">
                    <div class="product-image">
                        ${p.image_url ? 
                            `<img src="${window.SITE_URL + '/' + p.image_url}" 
                                  alt="${p.name}" 
                                  id="img-${p.id}"
                                  loading="lazy" 
                                  style="width:100%;height:100%;object-fit:cover;"
                                  onerror="this.src='${window.SITE_URL}/assets/img/all/map-placeholder.jpg'">` : 
                            '<div class="flex items-center justify-center h-full text-2xl" style="background:#eee;color:#ccc;">🧱</div>'}
                        
                        <div style="position:absolute; top:10px; right:10px;">
                            <span class="badge ${p.stock_quantity > 0 ? 'badge-success' : 'badge-danger'}" style="box-shadow: 0 4px 10px rgba(0,0,0,0.1); backdrop-filter: blur(4px);">
                                ${p.stock_quantity > 0 ? 'In Stock' : 'Out Stock'}
                            </span>
                        </div>
                        
                        <div class="quick-action-overlay">
                             <a href="${window.SITE_URL}/shop-brick-detail.php?id=${p.id}" class="btn btn-sm btn-white rounded-full shadow-sm">
                                View Details 👁️
                            </a>
                        </div>
                    </div>
                    <div class="product-body">
                        <span class="product-category-badge">${
                            p.type === 'Cement' ? 'CEMENT' :
                            p.type === 'Sariya' ? 'STEEL' :
                            p.type === 'Mauram' ? 'SAND' :
                            'BRICK'
                        }</span>
                        <h3 class="product-title">${p.name}</h3>
                        ${p.brand ? `<div class="text-xs text-muted mb-xs">Brand: ${p.brand}</div>` : ''}
                        
                        <div class="flex justify-between items-end mt-auto pt-3 border-top" style="border-color: #f5f5f5 !important;">
                            <div>
                                <div class="price-tag">${formatCurrency(p.price_per_piece)}</div>
                                <div class="text-xs text-muted font-weight-500">per ${p.unit || 'Piece'}${
                                    (() => {
                                        try {
                                            const attrs = typeof p.attributes === 'string' ? JSON.parse(p.attributes) : p.attributes;
                                            if (p.unit === 'Bag' && attrs?.packing_weight_kg) {
                                                return ` (${attrs.packing_weight_kg} kg)`;
                                            } else if (p.unit === 'Ton') {
                                                return ' (1000 kg)';
                                            }
                                        } catch (e) {}
                                        return '';
                                    })()
                                }</div>
                            </div>
                            <div class="flex gap-sm mobile-qty-row" style="align-items: center; width: 100%;">
                                <input type="number" id="qty-${p.id}" class="form-input text-center p-1 mobile-qty-input" 
                                       value="${p.min_order_qty || 1}" min="${p.min_order_qty || 1}" step="1" 
                                       style="width: 70px; height: 40px; border-radius: 20px;" placeholder="Qty">
                                
                                <button onclick="quickAddToCart(event, ${p.id}, '${p.name.replace(/'/g, "\\'")}', ${p.price_per_piece}, '${p.unit || 'Piece'}', '${p.image_url || ''}', ${p.min_order_qty || 1})" 
                                        class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center mobile-add-btn glow-on-hover" 
                                        style="width: 40px; height: 40px; padding: 0; min-width: 40px; transition: all 0.2s;"
                                        title="Add to Cart">
                                    🛒
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
            
            renderPagination(response.data.page, response.data.total_pages);
            
            // Animation trigger
            document.querySelectorAll('.animate-in').forEach(el => {
                el.style.opacity = '0'; el.style.transform = 'translateY(20px)';
                requestAnimationFrame(() => {
                    el.style.transition = 'all 0.5s ease'; el.style.opacity = '1'; el.style.transform = 'translateY(0)';
                });
            });

        } else {
            container.innerHTML = `
                <div style="grid-column: 1 / -1; text-align: center; padding: 5rem 1rem; color: #999;">
                    <div style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.5;">🚫</div>
                    <h3 class="font-weight-bold text-dark">No products found</h3>
                    <p class="mb-4">Try adjusting your filters.</p>
                    <button onclick="clearFilters()" class="btn btn-primary px-4 rounded-pill">Clear All Filters</button>
                </div>`;
        }
    } catch (err) {
        console.error(err);
        container.innerHTML = '<p class="text-center text-error" style="grid-column: 1 / -1;">Failed to load products.</p>';
    }
}

function quickAddToCart(e, id, name, price, unit, image, minQty = 1) {
    if(e) e.preventDefault();
    if (!window.IS_LOGGED_IN) {
        openAuthModal('login');
        showToast('Please login to add to cart 🛒', 'info');
        return;
    }
    
    const qtyInput = document.getElementById(`qty-${id}`);
    const quantity = parseInt(qtyInput ? qtyInput.value : 1);
    
    if(quantity <= 0) { showToast('Invalid quantity', 'error'); return; }

    // FLYING ANIMATION ✈️
    const btn = e.currentTarget;
    const cartIcon = document.getElementById('cart-count-badge');
    
    if(cartIcon && btn) {
        const btnRect = btn.getBoundingClientRect();
        const cartRect = cartIcon.getBoundingClientRect();
        const img = document.getElementById(`img-${id}`) || btn;
        
        const flyer = document.createElement('img');
        flyer.src = img.src || 'assets/img/all/map-placeholder.jpg';
        flyer.className = 'flying-item';
        flyer.style.left = `${btnRect.left}px`;
        flyer.style.top = `${btnRect.top}px`;
        document.body.appendChild(flyer);
        
        requestAnimationFrame(() => {
            flyer.style.transform = `scale(0.1)`;
            flyer.style.left = `${cartRect.left}px`;
            flyer.style.top = `${cartRect.top}px`;
            flyer.style.opacity = '0.5';
        });
        setTimeout(() => flyer.remove(), 800);
    }

    Cart.add({ id, name, price_per_piece: price, image, unit, min_order_qty: minQty }, quantity);
    
    // Feedback
    const originalContent = btn.innerHTML;
    btn.innerHTML = '✅';
    btn.classList.add('btn-success', 'btn-primary');
    setTimeout(() => {
        btn.innerHTML = originalContent;
        btn.classList.remove('btn-success');
        btn.classList.add('btn-primary');
    }, 1500);
}

function renderPagination(current, total) {
    const pagination = document.getElementById('pagination');
    if (total <= 1) { pagination.innerHTML = ''; return; }
    
    let html = '';
    if (current > 1) html += `<button class="btn btn-sm btn-white border" onclick="loadProducts(${current - 1})">← Prev</button>`;
    for (let i = 1; i <= total; i++) {
        if (i === 1 || i === total || (i >= current - 1 && i <= current + 1)) {
            html += `<button class="btn btn-sm ${i === current ? 'btn-primary' : 'btn-white border'}" onclick="loadProducts(${i})">${i}</button>`;
        } else if (i === current - 2 || i === current + 2) { html += '<span class="px-2 text-muted">...</span>'; }
    }
    if (current < total) html += `<button class="btn btn-sm btn-white border" onclick="loadProducts(${current + 1})">Next →</button>`;
    pagination.innerHTML = html;
}

let debounceTimer;
function applyFiltersDebounced() {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => loadProducts(1), 500);
}

function applyFilters() { loadProducts(1); }

function clearFilters() {
    document.getElementById('filter-brand').value = '';
    document.getElementById('filter-type').value = '';
    document.getElementById('filter-min-price').value = '';
    document.getElementById('filter-max-price').value = '';
    document.getElementById('search-input').value = '';
    document.getElementById('sort-select').value = 'default';
    loadProducts(1);
}

function toggleSidebar() {
    const sidebar = document.getElementById('shop-sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    if (sidebar.classList.contains('active')) {
        sidebar.classList.remove('active'); overlay.style.display = 'none'; document.body.style.overflow = '';
    } else {
        sidebar.classList.add('active'); overlay.style.display = 'block'; document.body.style.overflow = 'hidden';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    loadProducts(1);
    // Search Debounce
    document.getElementById('search-input').addEventListener('input', applyFiltersDebounced);
});
</script>

<?php require_once 'includes/bottom-nav.php'; ?>
<?php require_once 'includes/footer.php'; ?>
