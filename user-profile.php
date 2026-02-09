<?php
require_once 'config/config.php';
require_once 'includes/functions.php';

if (!isLoggedIn()) {
    header('Location: auth-login.php?redirect=user-profile.php');
    exit;
}

$pageTitle = 'Profile - JagritiBricks';
require_once 'includes/header.php';
?>

<section class="section">
    <div class="container" style="max-width: 800px;">
        <h1 class="mb-lg" style="font-size: 2.5rem; font-weight: 800;">👤 My Profile</h1>
        
        <div class="grid grid-2" style="gap: var(--spacing-xl);">
            <!-- Personal Information -->
            <div class="card mb-lg" style="height: fit-content;">
                <h3 class="mb-lg" style="font-size: 1.5rem; font-weight: 700;">Personal Information</h3>
                
                <form id="profile-form" onsubmit="updateProfile(event)">
                    <div class="form-group">
                        <label class="form-label" style="font-weight: 600;">Full Name</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 12px; top: 12px; font-size: 1.2rem;">👤</span>
                            <input type="text" name="name" id="profile-name" class="form-input" required 
                                   value="<?= htmlspecialchars($_SESSION['user_name']) ?>" style="padding-left: 40px;">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" style="font-weight: 600;">Mobile Number</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 12px; top: 12px; font-size: 1.2rem;">📱</span>
                            <input type="tel" name="mobile" id="profile-mobile" class="form-input" required 
                                   value="<?= htmlspecialchars($_SESSION['user_mobile']) ?>" pattern="[6-9][0-9]{9}" style="padding-left: 40px;">
                        </div>
                    </div>
                    
                    <button type="submit" id="update-profile-btn" class="btn btn-primary btn-block">
                        Update Profile
                    </button>
                </form>
            </div>
            
            <!-- Security & Actions -->
            <div style="display: flex; flex-direction: column; gap: var(--spacing-lg);">
                <div class="card">
                    <h3 class="mb-lg" style="font-size: 1.5rem; font-weight: 700;">Change Password</h3>
                    
                    <form id="password-form" onsubmit="changePassword(event)">
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 600;">Current Password</label>
                            <input type="password" name="current_password" class="form-input" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" style="font-weight: 600;">New Password</label>
                            <input type="password" name="new_password" class="form-input" required minlength="6">
                        </div>
                        
                        <button type="submit" id="change-password-btn" class="btn btn-secondary btn-block">
                            Change Password
                        </button>
                    </form>
                </div>
                
    <a href="<?= SITE_URL ?>/api/auth/logout.php" class="btn btn-outline btn-block" style="border-color: var(--error); color: var(--error); border-width: 2px; font-weight: 700;">
        🚪 Logout
    </a>
            </div>
        </div>
    </div>
</section>

<!-- Address Section -->
<section class="section" style="padding-top: 0;">
    <div class="container" style="max-width: 800px;">
        <div class="card">
            <div class="flex justify-between items-center mb-lg">
                <h3 style="font-size: 1.5rem; font-weight: 700;">📍 My Addresses</h3>
                <button onclick="openAddressModal()" class="btn btn-sm btn-outline">
                    + Add New Address
                </button>
            </div>
            
            <div id="address-list" class="grid grid-2" style="gap: var(--spacing-md);">
                <!-- Addresses will be loaded here -->
                <div class="text-center p-xl" style="grid-column: 1/-1; color: var(--text-secondary);">
                    Loading addresses...
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Address Modal -->
<div id="address-modal" class="modal">
    <div class="modal-content" style="max-width: 500px;">
        <div class="modal-header">
            <h3 class="modal-title" id="address-modal-title">Add New Address</h3>
            <button class="modal-close" onclick="closeAddressModal()">&times;</button>
        </div>
        <div class="modal-body">
            <form id="address-form" onsubmit="saveAddress(event)">
                <input type="hidden" name="id" id="addr-id">
                
                <div class="form-group">
                    <label class="form-label">Address Type</label>
                    <div class="flex gap-md">
                        <label class="radio-label">
                            <input type="radio" name="address_type" value="Home" checked> Home
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="address_type" value="Work"> Work
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="address_type" value="Other"> Other
                        </label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Flat / House No / Building</label>
                    <input type="text" name="address_line1" id="addr-line1" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Area / Street / Sector</label>
                    <input type="text" name="address_line2" id="addr-line2" class="form-input">
                </div>
                
                <div class="grid grid-2 gap-sm">
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" name="city" id="addr-city" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Pincode</label>
                        <input type="text" name="pincode" id="addr-pincode" class="form-input" required pattern="[0-9]{6}" maxlength="6">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">State</label>
                    <select name="state" id="addr-state" class="form-input" required>
                        <option value="">Select State</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <!-- Add more states as needed -->
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="is_default" id="addr-default"> Make this my default address
                    </label>
                </div>
                
                <button type="submit" id="save-address-btn" class="btn btn-primary btn-block">
                    Save Address
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Load addresses on page load
document.addEventListener('DOMContentLoaded', fetchAddresses);

async function fetchAddresses() {
    const list = document.getElementById('address-list');
    
    try {
        const response = await API.get('/user/address.php');
        
        if (response.success && response.data.length > 0) {
            list.innerHTML = response.data.map(addr => `
                <div class="card p-md ${addr.is_default == 1 ? 'border-primary' : ''}" style="position: relative;">
                    ${addr.is_default == 1 ? '<span class="badge badge-primary" style="position: absolute; top: 10px; right: 10px;">Default</span>' : ''}
                    <div class="flex items-center gap-xs mb-xs">
                        <span style="font-size: 1.2rem;">${addr.address_type === 'Home' ? '🏠' : (addr.address_type === 'Work' ? '🏢' : '📍')}</span>
                        <strong>${addr.address_type}</strong>
                    </div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.5; margin-bottom: var(--spacing-sm);">
                        ${addr.address_line1}<br>
                        ${addr.address_line2 ? addr.address_line2 + '<br>' : ''}
                        ${addr.city}, ${addr.state} - ${addr.pincode}
                    </p>
                    <div class="flex gap-sm">
                        <button onclick='editAddress(${JSON.stringify(addr)})' class="btn btn-xs btn-outline">Edit</button>
                        <button onclick="deleteAddress(${addr.id})" class="btn btn-xs btn-outline" style="color: var(--error); border-color: var(--error);">Delete</button>
                    </div>
                </div>
            `).join('');
        } else {
            list.innerHTML = `
                <div class="text-center p-xl" style="grid-column: 1/-1; background: var(--bg-secondary); border-radius: 8px;">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">📍</div>
                    <p style="color: var(--text-secondary);">No addresses found. Add one now!</p>
                </div>
            `;
        }
    } catch (error) {
        console.error(error);
        list.innerHTML = '<div class="text-error">Failed to load addresses</div>';
    }
}

function openAddressModal(reset = true) {
    const modal = document.getElementById('address-modal');
    const form = document.getElementById('address-form');
    const title = document.getElementById('address-modal-title');
    
    if (reset) {
        form.reset();
        document.getElementById('addr-id').value = '';
        title.textContent = 'Add New Address';
    }
    
    modal.style.display = 'flex';
}

function closeAddressModal() {
    document.getElementById('address-modal').style.display = 'none';
}

function editAddress(addr) {
    openAddressModal(false);
    
    document.getElementById('address-modal-title').textContent = 'Edit Address';
    document.getElementById('addr-id').value = addr.id;
    document.getElementById('addr-line1').value = addr.address_line1;
    document.getElementById('addr-line2').value = addr.address_line2 || '';
    document.getElementById('addr-city').value = addr.city;
    document.getElementById('addr-pincode').value = addr.pincode;
    document.getElementById('addr-state').value = addr.state;
    document.getElementById('addr-default').checked = addr.is_default == 1;
    
    // Select radio button
    const radios = document.getElementsByName('address_type');
    for(const radio of radios) {
        if(radio.value === addr.address_type) radio.checked = true;
    }
}

async function saveAddress(event) {
    event.preventDefault();
    
    const form = event.target;
    const btn = document.getElementById('save-address-btn');
    const formData = new FormData(form);
    
    const addressData = {};
    formData.forEach((value, key) => addressData[key] = value);
    // Handle checkbox
    addressData.is_default = document.getElementById('addr-default').checked;
    
    setLoading(btn, true);
    
    try {
        const response = await API.post('/user/address.php', addressData);
        if (response.success) {
            showToast(response.message, 'success');
            closeAddressModal();
            fetchAddresses(); // Reload list
        } else {
            showToast(response.message || 'Failed to save address', 'error');
        }
    } catch (error) {
        showToast('Something went wrong', 'error');
    } finally {
        setLoading(btn, false);
    }
}

async function deleteAddress(id) {
    if(!confirm('Are you sure you want to delete this address?')) return;
    
    try {
        const response = await API.delete(`/user/address.php?id=${id}`);
        if(response.success) {
            showToast('Address deleted', 'success');
            fetchAddresses();
        } else {
            showToast(response.message, 'error');
        }
    } catch (error) {
        showToast('Failed to delete address', 'error');
    }
}

// Keep existing Profile functions...
async function updateProfile(event) {
    event.preventDefault();
    
    const form = event.target;
    const btn = document.getElementById('update-profile-btn');
    const formData = new FormData(form);
    
    const profileData = {
        name: formData.get('name'),
        mobile: formData.get('mobile')
    };
    
    setLoading(btn, true);
    
    const response = await API.post('/user/profile.php', profileData);
    
    setLoading(btn, false);
    
    if (response.success) {
        showToast('Profile updated successfully!', 'success');
    } else {
        showToast(response.message || 'Update failed', 'error');
    }
}

async function changePassword(event) {
    event.preventDefault();
    
    const form = event.target;
    const btn = document.getElementById('change-password-btn');
    const formData = new FormData(form);
    
    const passwordData = {
        current_password: formData.get('current_password'),
        new_password: formData.get('new_password')
    };
    
    setLoading(btn, true);
    
    const response = await API.post('/user/profile.php', passwordData);
    
    setLoading(btn, false);
    
    if (response.success) {
        showToast('Password changed successfully!', 'success');
        form.reset();
    } else {
        showToast(response.message || 'Password change failed', 'error');
    }
}
</script>

<?php require_once 'includes/bottom-nav.php'; ?>
<?php require_once 'includes/footer.php'; ?>
