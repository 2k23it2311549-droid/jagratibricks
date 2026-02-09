<?php
require_once 'config/config.php';
header("Location: " . SITE_URL . "/shop.php", true, 301);
exit;
?>

<div class="shop-page" style="background: #fafafa; min-height: 100vh; padding-bottom: 4rem;">
    <!-- Shop Header -->
    <div class="shop-header animate-on-scroll" style="position: relative; background: #222; padding: 4rem 0; color: white; text-align: center; margin-bottom: 2rem; overflow: hidden;">
        <!-- Background Image Parallax -->
        <div style="position: absolute; inset: 0; background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('<?= SITE_URL ?>/assets/img/hero/hero-indian-bricks.jpg') center/cover; z-index: 0;"></div>
        
        <div class="container" style="position: relative; z-index: 1;">
            <h1 style="font-size: 3rem; font-weight: 800; text-shadow: 0 4px 15px rgba(0,0,0,0.5); margin-bottom: 0.5rem; letter-spacing: 1px;">Browse Collection</h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">Premium Quality Bricks for Every Project. Direct from Factory.</p>
        </div>
    </div>

    <div class="container">
        <!-- Mobile Filter Toggle -->
        <button class="btn btn-primary mb-md d-md-none" onclick="toggleSidebar()" style="width: 100%; display: none; position: sticky; top: 80px; z-index: 90; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            🔍 Filter & Calculate Bricks
        </button>

        <div class="shop-layout">
            
            <!-- Sidebar Filter (Desktop Sticky / Mobile Drawer) -->
            <aside class="sidebar-filter" id="shop-sidebar">
                <div class="sidebar-header d-md-none">
                    <h3>Filters & Calculator</h3>
                    <button onclick="toggleSidebar()" class="btn-close">×</button>
                </div>
                
                <div class="sidebar-content">
                    <!-- Filters -->
                    <div class="filter-card mb-lg animate-on-scroll">
                        <div class="flex justify-between items-center mb-md border-bottom pb-sm">
                            <h3 class="m-0" style="font-size: 1.1rem; font-weight: 700;">Filters</h3>
                            <button onclick="clearFilters()" class="text-primary" style="background: none; border: none; cursor: pointer; font-size: 0.85rem; font-weight: 600;">Reset All</button>
                        </div>

                        <div class="form-group mb-md">
                            <label class="form-label text-sm text-muted font-weight-bold">Brick Type</label>
                            <select id="filter-type" class="form-select w-100" onchange="applyFilters()">
                                <option value="">All Types</option>
                                <option value="Clay">🧱 Clay</option>
                                <option value="Fly Ash">🌫️ Fly Ash</option>
                                <option value="Concrete">🏗️ Concrete</option>
                                <option value="Engineering">⚙️ Engineering</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-md">
                            <label class="form-label text-sm text-muted font-weight-bold">Price Range</label>
                            <div class="flex gap-sm items-center">
                                <input type="number" id="filter-min-price" class="form-input text-center" placeholder="Min" onchange="applyFilters()">
                                <span class="text-muted">-</span>
                                <input type="number" id="filter-max-price" class="form-input text-center" placeholder="Max" onchange="applyFilters()">
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <label class="flex items-center gap-sm cursor-pointer hover-bg-light p-2 rounded">
                                <input type="checkbox" id="filter-stock" onchange="applyFilters()" style="width: 16px; height: 16px;">
                                <span class="font-weight-500">In Stock Only</span>
                            </label>
                        </div>
                    </div>

                    <!-- Brick Calculator Widget -->
                    <div class="filter-card calculator-widget animate-on-scroll" style="animation-delay: 0.2s; background: linear-gradient(135deg, #fff, #f8f9fa); border: 1px solid #e0e0e0;">
                        <div class="flex items-center gap-sm mb-md border-bottom pb-sm">
                            <span style="font-size: 1.2rem;">🧮</span>
                            <h3 class="m-0" style="font-size: 1.1rem; font-weight: 700;">Brick Calculator</h3>
                        </div>
                        
                        <div class="flex justify-center gap-sm mb-md bg-light p-1 rounded">
                            <button id="btn-mode-std" onclick="setCalcMode('std')" class="btn btn-sm btn-white shadow-sm flex-1">Wall Area</button>
                            <button id="btn-mode-room" onclick="setCalcMode('room')" class="btn btn-sm btn-text flex-1" style="color:#666;">Room Size</button>
                        </div>

                        <!-- Standard Mode: Wall Area -->
                        <div id="calc-std-inputs">
                            <div class="form-group mb-sm">
                                <label class="text-xs text-muted font-weight-bold uppercase">Wall Area (Sq. Ft)</label>
                                <input type="number" id="calc-area" class="form-input w-100" placeholder="e.g. 100">
                            </div>
                        </div>

                        <!-- Room Mode: Dimensions -->
                        <div id="calc-room-inputs" style="display: none;">
                            <div class="grid grid-2 gap-xs mb-sm">
                                <div>
                                    <label class="text-xs text-muted font-weight-bold uppercase">Length (Ft)</label>
                                    <input type="number" id="calc-len" class="form-input w-100" placeholder="L">
                                </div>
                                <div>
                                    <label class="text-xs text-muted font-weight-bold uppercase">Width (Ft)</label>
                                    <input type="number" id="calc-wid" class="form-input w-100" placeholder="W">
                                </div>
                            </div>
                            <div class="grid grid-2 gap-xs mb-sm">
                                <div>
                                    <label class="text-xs text-muted font-weight-bold uppercase">Height (Ft)</label>
                                    <input type="number" id="calc-hgt" class="form-input w-100" placeholder="H">
                                </div>
                                <div>
                                    <label class="text-xs text-muted font-weight-bold uppercase">Door/Win (Sq.Ft)</label>
                                    <input type="number" id="calc-open" class="form-input w-100" value="0">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-md">
                            <label class="text-xs text-muted font-weight-bold uppercase">Wall Thickness</label>
                            <select id="calc-thickness" class="form-select w-100">
                                <option value="4">4 inch (Single Brick)</option>
                                <option value="9">9 inch (Double Brick)</option>
                            </select>
                        </div>
                        
                        <button onclick="calculateBricks()" class="btn btn-primary btn-sm btn-block mb-md">Calculate</button>
                        
                        <div id="calc-result" style="display: none; background: #e8f5e9; padding: 10px; border-radius: 8px; text-align: center;">
                            <span class="text-success font-weight-bold d-block" style="font-size: 1.1rem;">~<span id="calc-count">0</span> Bricks</span>
                            <small class="text-muted" style="font-size: 0.75rem;">(Incl. 5% Wastage)</small>
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
                       <input type="text" id="search-input" class="form-input search-input border-0 bg-light" placeholder="Search bricks..." autocomplete="off">
                       <span class="search-icon text-muted">🔍</span>
                    </div>

                    <!-- Sort -->
                    <div class="flex items-center gap-sm">
                        <span class="text-muted text-sm d-none d-md-inline">Sort by:</span>
                        <select id="sort-select" class="form-select border-0 bg-light py-2" onchange="applyFilters()">
                            <option value="default">Default</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                            <option value="name_asc">Name: A-Z</option>
                        </select>
                    </div>
                </div>

                <!-- Active Tags -->
                <div id="active-filters" class="flex gap-sm mb-md flex-wrap"></div>

                <div id="bricks-container" class="brick-grid">
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
    grid-template-columns: 300px 1fr;
    gap: 2.5rem;
    align-items: start;
}

/* Sidebar Sticky on Desktop */
@media (min-width: 901px) {
    .sidebar-filter {
        position: sticky;
        top: 100px;
        height: fit-content;
        max-height: calc(100vh - 120px);
        overflow-y: auto;
        padding-right: 5px; /* For scrollbar */
    }
    
    .sidebar-filter::-webkit-scrollbar { width: 4px; }
    .sidebar-filter::-webkit-scrollbar-thumb { background: #ddd; border-radius: 4px; }
}

@media (max-width: 900px) {
    .shop-layout { grid-template-columns: 1fr; }
    
    /* Mobile Drawer Styles */
    .sidebar-filter {
        position: fixed;
        top: 0;
        left: -300px; /* Hidden */
        width: 280px;
        height: 100vh;
        background: white;
        z-index: 99;
        transition: left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0;
        box-shadow: 2px 0 20px rgba(0,0,0,0.1);
        overflow-y: auto;
    }
    
    .sidebar-filter.active { left: 0; }
    
    .sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem;
        border-bottom: 1px solid #eee;
        background: var(--primary);
        color: white;
    }
    
    .sidebar-content { padding: 1.5rem; }
    
    .btn-close {
        background: none; border: none; font-size: 2rem; color: white; cursor: pointer; line-height: 1;
    }
    
    .d-md-none { display: block !important; }
    .d-none { display: none !important; }
}

.filter-card {
    background: white;
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    border: 1px solid rgba(0,0,0,0.04);
}

/* Inputs */
.form-select, .form-input {
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    padding: 10px 15px;
    transition: all 0.2s;
    font-size: 0.95rem;
}
.form-select:focus, .form-input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(229, 57, 53, 0.1);
    outline: none;
}
.bg-light { background: #f8f9fa !important; }
.hover-bg-light:hover { background: #f8f9fa; }

/* Search Bar */
.search-bar-wrapper { position: relative; }
.search-input {
    padding-left: 40px;
    height: 45px;
    border-radius: 50px; /* Pill shape */
}
.search-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
}

/* Grid */
.brick-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 1.5rem;
}

/* Card Styles & Quick Action */
.quick-action-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 15px;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    transform: translateY(100%);
    transition: transform 0.3s ease;
    display: flex;
    justify-content: center;
}
.product-card:hover .quick-action-overlay { transform: translateY(0); }

.price-tag {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--primary);
}

/* Flying Animation */
.flying-brick {
    position: fixed;
    z-index: 9999;
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    transition: all 0.8s cubic-bezier(0.19, 1, 0.22, 1);
    pointer-events: none;
}
</style>

<script>
let currentPage = 1;

async function loadBricks(page = 1) {
    const container = document.getElementById('bricks-container');
    currentPage = page;
    
    // Smooth scroll only on pagination click
    if(page > 1) document.querySelector('.product-content').scrollIntoView({behavior: 'smooth'});
    
    container.innerHTML = '<div class="spinner" style="grid-column: 1 / -1; margin: 3rem auto;"></div>';
    
    const type = document.getElementById('filter-type').value;
    const minPrice = document.getElementById('filter-min-price').value;
    const maxPrice = document.getElementById('filter-max-price').value;
    const search = document.getElementById('search-input').value;
    const sort = document.getElementById('sort-select').value;
    
    const params = new URLSearchParams({
        page,
        ...(type && { type }),
        ...(minPrice && { min_price: minPrice }),
        ...(maxPrice && { max_price: maxPrice }),
        ...(search && { search }),
        ...(sort && sort !== 'default' && { sort })
    });
    
    try {
        const response = await API.get('/bricks/list.php?' + params.toString());
        
        if (response.success && response.data.bricks.length > 0) {
            let bricks = response.data.bricks;
            if(sort === 'price_asc') bricks.sort((a,b) => a.price_per_piece - b.price_per_piece);
            if(sort === 'price_desc') bricks.sort((a,b) => b.price_per_piece - a.price_per_piece);
            if(sort === 'name_asc') bricks.sort((a,b) => a.name.localeCompare(b.name));

            container.innerHTML = bricks.map((brick, index) => `
                <div class="product-card animate-in" style="animation-delay: ${index * 0.05}s">
                    <div class="product-image">
                        ${brick.image_url ? 
                            `<img src="${brick.image_url ? window.SITE_URL + '/' + brick.image_url : window.SITE_URL + '/assets/img/all/map-placeholder.jpg'}" 
                                  alt="${brick.name}" 
                                  id="img-${brick.id}"
                                  loading="lazy" 
                                  style="width:100%;height:100%;object-fit:cover;"
                                  onerror="this.src='${window.SITE_URL}/assets/img/all/map-placeholder.jpg'">` : 
                            '<div class="flex items-center justify-center h-full text-2xl" style="background:#eee;color:#ccc;">🧱</div>'}
                        
                        <div style="position:absolute; top:10px; right:10px;">
                            <span class="badge ${brick.stock_quantity > 0 ? 'badge-success' : 'badge-danger'}" style="box-shadow: 0 4px 10px rgba(0,0,0,0.1); backdrop-filter: blur(4px);">
                                ${brick.stock_quantity > 0 ? 'In Stock' : 'Out Stock'}
                            </span>
                        </div>
                        
                        <div class="quick-action-overlay">
                             <a href="${window.SITE_URL}/shop-brick-detail.php?id=${brick.id}" class="btn btn-sm btn-white rounded-full shadow-sm">
                                View Details 👁️
                            </a>
                        </div>
                    </div>
                    <div class="product-body">
                        <span class="product-category-badge">${brick.type}</span>
                        <h3 class="product-title">${brick.name}</h3>
                        
                        <div class="flex justify-between items-end mt-auto pt-3 border-top" style="border-color: #f5f5f5 !important;">
                            <div>
                                <div class="price-tag">${formatCurrency(brick.price_per_piece)}</div>
                                <div class="text-xs text-muted font-weight-500">per piece</div>
                            </div>
                            <div class="flex gap-sm mobile-qty-row" style="align-items: center; width: 100%;">
                                <input type="number" id="qty-${brick.id}" class="form-input text-center p-1 mobile-qty-input" value="500" min="500" step="500" style="width: 70px; height: 40px; border-radius: 20px;" placeholder="Qty">
                                
                                <button onclick="quickAddToCart(event, ${brick.id}, '${brick.name.replace(/'/g, "\\'")}', ${brick.price_per_piece}, '${brick.image_url || ''}')" 
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
            
            // Trigger animations
            document.querySelectorAll('.animate-in').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                requestAnimationFrame(() => {
                    el.style.transition = 'all 0.5s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                });
            });

        } else {
            container.innerHTML = `
                <div style="grid-column: 1 / -1; text-align: center; padding: 5rem 1rem; color: #999;">
                    <div style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.5;">📦</div>
                    <h3 class="font-weight-bold text-dark">No bricks found</h3>
                    <p class="mb-4">We couldn't find any bricks matching your search.</p>
                    <button onclick="clearFilters()" class="btn btn-primary px-4 rounded-pill">Clear All Filters</button>
                </div>`;
        }
    } catch (err) {
        console.error(err);
        container.innerHTML = '<p class="text-center text-error" style="grid-column: 1 / -1;">Failed to load products.</p>';
    }
}

function quickAddToCart(e, id, name, price, image) {
    if(e) e.preventDefault();
    if (!window.IS_LOGGED_IN) {
        openAuthModal('login');
        showToast('Please login to add to cart 🛒', 'info');
        return;
    }
    
    // Get quantity from input
    const qtyInput = document.getElementById(`qty-${id}`);
    const quantity = parseInt(qtyInput ? qtyInput.value : 500);
    
    if(quantity <= 0) {
        showToast('Please enter a valid quantity', 'error');
        return;
    }

    // FLYING ANIMATION ✈️
    const btn = e.currentTarget;
    const cartIcon = document.getElementById('cart-count-badge'); // Target in header
    
    if(cartIcon && btn) {
        const btnRect = btn.getBoundingClientRect();
        const cartRect = cartIcon.getBoundingClientRect();
        
        // Clone image
        const img = document.getElementById(`img-${id}`) || btn;
        const flyer = document.createElement('img');
        flyer.src = img.src || 'assets/img/all/map-placeholder.jpg';
        flyer.className = 'flying-brick';
        flyer.style.left = `${btnRect.left}px`;
        flyer.style.top = `${btnRect.top}px`;
        document.body.appendChild(flyer);
        
        // Fly
        requestAnimationFrame(() => {
            flyer.style.transform = `scale(0.1)`;
            flyer.style.left = `${cartRect.left}px`;
            flyer.style.top = `${cartRect.top}px`;
            flyer.style.opacity = '0.5';
        });
        
        setTimeout(() => flyer.remove(), 800);
    }

    // Create temp object to match Cart.add expectation
    const brick = { id, name, price_per_piece: price, image };
    Cart.add(brick, quantity);
    
    // Visual feedback on button
    const originalContent = btn.innerHTML;
    btn.innerHTML = '✅';
    btn.classList.add('btn-success');
    btn.classList.remove('btn-primary');
    setTimeout(() => {
        btn.innerHTML = originalContent;
        btn.classList.remove('btn-success');
        btn.classList.add('btn-primary');
    }, 1500);
}

function setCalcMode(mode) {
    const stdBtn = document.getElementById('btn-mode-std');
    const roomBtn = document.getElementById('btn-mode-room');
    const stdInputs = document.getElementById('calc-std-inputs');
    const roomInputs = document.getElementById('calc-room-inputs');
    
    if(mode === 'std') {
        stdBtn.className = 'btn btn-sm btn-white shadow-sm flex-1';
        roomBtn.className = 'btn btn-sm btn-text flex-1';
        stdBtn.style.color = ''; roomBtn.style.color = '#666';
        stdInputs.style.display = 'block';
        roomInputs.style.display = 'none';
        document.getElementById('calc-area').dataset.active = 'true';
    } else {
        roomBtn.className = 'btn btn-sm btn-white shadow-sm flex-1';
        stdBtn.className = 'btn btn-sm btn-text flex-1';
        roomBtn.style.color = ''; stdBtn.style.color = '#666';
        stdInputs.style.display = 'none';
        roomInputs.style.display = 'block';
        document.getElementById('calc-area').dataset.active = 'false';
    }
    // Reset result
    document.getElementById('calc-result').style.display = 'none';
}

function calculateBricks() {
    const isStd = document.getElementById('calc-std-inputs').style.display !== 'none';
    const thickness = document.getElementById('calc-thickness').value;
    const resultBox = document.getElementById('calc-result');
    const countSpan = document.getElementById('calc-count');
    
    let area = 0;
    
    if (isStd) {
        area = parseFloat(document.getElementById('calc-area').value);
        if(!area || area <= 0) {
            showToast('Please enter a valid wall area', 'error');
            return;
        }
    } else {
        const l = parseFloat(document.getElementById('calc-len').value) || 0;
        const w = parseFloat(document.getElementById('calc-wid').value) || 0;
        const h = parseFloat(document.getElementById('calc-hgt').value) || 0;
        const open = parseFloat(document.getElementById('calc-open').value) || 0;
        
        if(l <= 0 || w <= 0 || h <= 0) {
            showToast('Please enter valid room dimensions', 'error');
            return;
        }
        
        // Perimeter * Height = Total Wall Area (Approx for 4 walls)
        // Accurate: 2 * (L + W) * H
        area = 2 * (l + w) * h;
        area -= open; // Subtract Usage
        
        if(area <= 0) {
             showToast('Door/Window area cannot exceed wall area', 'error');
             return;
        }
    }
    
    // Formula: (Area * Thickness Factor) + 5% Wastage
    // 4 inch wall (half brick) ~= 5 bricks per sq ft
    // 9 inch wall (full brick) ~= 10 bricks per sq ft
    
    let factor = (thickness === '4') ? 5 : 10;
    let count = Math.ceil(area * factor * 1.05); // +5% wastage
    
    countSpan.innerText = count.toLocaleString(); // Add commas
    resultBox.style.display = 'block';
    resultBox.classList.add('animate-in'); // Simple fade in
}

function renderPagination(current, total) {
    const pagination = document.getElementById('pagination');
    if (total <= 1) { pagination.innerHTML = ''; return; }
    
    let html = '';
    if (current > 1) html += `<button class="btn btn-sm btn-white border" onclick="loadBricks(${current - 1})">← Prev</button>`;
    
    for (let i = 1; i <= total; i++) {
        if (i === 1 || i === total || (i >= current - 1 && i <= current + 1)) {
            html += `<button class="btn btn-sm ${i === current ? 'btn-primary' : 'btn-white border'}" onclick="loadBricks(${i})">${i}</button>`;
        } else if (i === current - 2 || i === current + 2) {
            html += '<span class="px-2 text-muted">...</span>';
        }
    }
    
    if (current < total) html += `<button class="btn btn-sm btn-white border" onclick="loadBricks(${current + 1})">Next →</button>`;
    pagination.innerHTML = html;
}

function applyFilters() { loadBricks(1); }

function clearFilters() {
    document.getElementById('filter-type').value = '';
    document.getElementById('filter-min-price').value = '';
    document.getElementById('filter-max-price').value = '';
    document.getElementById('search-input').value = '';
    document.getElementById('sort-select').value = 'default';
    loadBricks(1);
}

function toggleSidebar() {
    const sidebar = document.getElementById('shop-sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    
    if (sidebar.classList.contains('active')) {
        sidebar.classList.remove('active');
        overlay.style.display = 'none';
        document.body.style.overflow = '';
    } else {
        sidebar.classList.add('active');
        overlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
}

// Init
document.addEventListener('DOMContentLoaded', () => {
    loadBricks(1);
    
    // URL Params
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.get('type')) {
        document.getElementById('filter-type').value = urlParams.get('type');
        loadBricks(1);
    }
    
    // Search Debounce
    let timeout;
    document.getElementById('search-input').addEventListener('input', (e) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => loadBricks(1), 500);
    });
});
</script>

<?php require_once 'includes/bottom-nav.php'; ?>
<?php require_once 'includes/footer.php'; ?>
