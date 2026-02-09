# 🧱 JagritiBricks - Brick Buying & Selling Website

A complete, production-ready brick e-commerce platform built with PHP and MySQL, featuring a mobile-first responsive design, admin dashboard, and Hostinger deployment compatibility.

## ✨ Features

### User Features
- 🏠 **Responsive Landing Page** - Mobile-first design with hero section and category cards
- 🧱 **Brick Catalog** - Browse bricks with filters (type, price), search, and pagination
- 📦 **Shopping Cart** - Add/remove items, update quantities, persistent localStorage
- 💳 **Checkout** - Order placement with delivery details and payment method selection
- 👤 **User Authentication** - Signup, login, profile management
- 📋 **Order History** - View past orders with status tracking
- 📞 **Contact Form** - Get in touch with FAQ section
- 🌓 **Light/Dark Mode** - Theme toggle with localStorage persistence

### Admin Features
- 📊 **Dashboard** - Stats overview and recent orders
- 🧱 **Brick Management** - Add, edit, delete, activate/deactivate bricks
- 📦 **Order Management** - View all orders, update status, filter by date/status
- 👥 **User Management** - View registered users and their order history
- ⚙️ **Settings** - Configure site name, contact info, delivery area

### Technical Features
- 📱 **Mobile-First Design** - Bottom navigation, touch-friendly UI
- 🎨 **Modern CSS** - Custom properties, smooth animations, responsive grid
- 🔒 **Secure** - Password hashing, SQL injection protection, CSRF prevention
- 🚀 **Performance** - GZIP compression, browser caching, optimized queries
- 📦 **No Tax/GST** - Simple pricing as per requirements

## 🛠️ Tech Stack

- **Frontend**: HTML5, CSS3 (Mobile-first), Vanilla JavaScript
- **Backend**: PHP 8.x
- **Database**: MySQL 5.7+ / MariaDB 10.2+
- **Server**: Apache (Hostinger compatible)

## 📁 Project Structure

```
patharbrick/
├── api/                    # Backend API endpoints
│   ├── admin/             # Admin-only APIs
│   │   ├── auth/          # Admin authentication
│   │   ├── bricks/        # Brick CRUD operations
│   │   └── orders/        # Order management
│   ├── auth/              # User authentication
│   ├── bricks/            # Brick listing & details
│   ├── contact/           # Contact form
│   ├── orders/            # Order placement & history
│   └── user/              # User profile management
├── admin/                 # Admin panel pages
│   ├── dashboard.php      # Admin dashboard
│   ├── login.php          # Admin login
│   ├── bricks.php         # Brick management
│   └── orders.php         # Order management
├── assets/                # Static assets
│   ├── css/               # Stylesheets
│   │   ├── style.css      # Main styles
│   │   ├── mobile.css     # Mobile-specific styles
│   │   └── admin.css      # Admin panel styles
│   └── js/                # JavaScript files
│       ├── main.js        # Main utilities
│       └── admin.js       # Admin utilities
├── config/                # Configuration files
│   ├── config.php         # Global configuration
│   └── database.php       # Database connection
├── database/              # Database files
│   └── schema.sql         # Database schema & sample data
├── includes/              # Reusable PHP components
│   ├── header.php         # Header component
│   ├── footer.php         # Footer component
│   ├── bottom-nav.php     # Mobile bottom navigation
│   └── functions.php      # Utility functions
├── uploads/               # User uploads directory
├── index.php              # Landing page
├── shop-bricks.php        # Brick listing
├── shop-brick-detail.php  # Brick details
├── shop-cart.php          # Shopping cart
├── shop-checkout.php      # Checkout page
├── user-orders.php        # Order history
├── user-profile.php       # User profile
├── contact.php            # Contact page
├── auth-login.php         # User login
├── auth-signup.php        # User registration
├── .htaccess              # Apache configuration
├── DEPLOYMENT.md          # Deployment guide
└── README.md              # This file
```

## 🚀 Quick Start

### Local Development

1. **Prerequisites**
   - PHP 7.4+ (recommended: PHP 8.x)
   - MySQL 5.7+ or MariaDB 10.2+
   - Apache/Nginx web server

2. **Database Setup**
   ```bash
   # Create database
   mysql -u root -p -e "CREATE DATABASE jagritibricks"
   
   # Import schema
   mysql -u root -p jagritibricks < database/schema.sql
   ```

3. **Configuration**
   - Edit `config/database.php` with your database credentials
   - Update `SITE_URL` in `config/config.php`

4. **Start Server**
   ```bash
   # Using PHP built-in server
   php -S localhost:8000
   
   # Or use XAMPP/WAMP/MAMP
   ```

5. **Access Application**
   - User Site: `http://localhost:8000`
   - Admin Panel: `http://localhost:8000/admin/login.php`

### Default Credentials

**Admin:**
- Username: `admin`
- Password: `admin123`

**Test User:**
- Mobile: `9999999999`
- Password: `user123`

## 📦 Deployment to Hostinger

See [DEPLOYMENT.md](DEPLOYMENT.md) for detailed deployment instructions.

## 🎨 Design Features

### Mobile-First Approach
- Bottom navigation bar for easy thumb access
- Touch-friendly buttons (min 44px)
- Swipeable card layouts
- Full-width mobile cards
- App-like experience

### Responsive Design
- Mobile: < 768px (vertical layout, bottom nav)
- Tablet: 768px - 1024px (2-column grid)
- Desktop: > 1024px (full grid, top navigation)

### Theme Support
- Light mode (default)
- Dark mode with smooth transitions
- Persistent theme selection via localStorage

## 🔒 Security Features

- Password hashing with `bcrypt`
- Prepared statements (SQL injection prevention)
- Input sanitization
- Session-based authentication
- CSRF protection
- Secure headers via `.htaccess`
- File upload validation

## 📊 Database Schema

### Tables
- `users` - Customer accounts
- `admins` - Admin accounts
- `bricks` - Brick inventory
- `orders` - Customer orders
- `order_items` - Order line items
- `contacts` - Contact form submissions
- `settings` - Website configuration

## 🎯 Key Functionalities

### Cart Management
- Add/remove items
- Update quantities
- Persistent storage (localStorage)
- Real-time total calculation

### Order Flow
1. Browse bricks → Add to cart
2. Review cart → Proceed to checkout
3. Enter delivery details
4. Select payment method (COD/Online)
5. Place order
6. View in order history

### Admin Workflow
1. Login to admin panel
2. Manage brick inventory
3. Process orders (Pending → Confirmed → Delivered)
4. View customer information
5. Update site settings

## 🌐 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 📝 API Endpoints

### User APIs
- `POST /api/auth/signup.php` - User registration
- `POST /api/auth/login.php` - User login
- `GET /api/bricks/list.php` - List bricks
- `GET /api/bricks/detail.php` - Brick details
- `POST /api/orders/create.php` - Place order
- `GET /api/orders/my-orders.php` - Order history

### Admin APIs
- `POST /api/admin/auth/login.php` - Admin login
- `POST /api/admin/bricks/create.php` - Add brick
- `POST /api/admin/bricks/update.php` - Update brick
- `POST /api/admin/bricks/delete.php` - Delete brick
- `GET /api/admin/orders/list.php` - List all orders
- `POST /api/admin/orders/update-status.php` - Update order status

## 🐛 Troubleshooting

### Common Issues

**Database Connection Error**
- Check credentials in `config/database.php`
- Verify database exists
- Ensure MySQL service is running

**Session Issues**
- Check PHP session configuration
- Verify `session_start()` is called
- Clear browser cookies

**File Upload Issues**
- Check `uploads/` directory permissions (755)
- Verify `upload_max_filesize` in PHP config

## 📄 License

This project is created for educational and commercial use.

## 👨‍💻 Author

Built with ❤️ for JagritiBricks

## 🙏 Acknowledgments

- Mobile-first design principles
- Modern PHP best practices
- Hostinger deployment optimization

---

**Ready to build something great!** 🧱
