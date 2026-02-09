# JagritiBricks - Deployment Guide

## Prerequisites
- Hostinger shared hosting account
- PHP 7.4+ (preferably PHP 8.x)
- MySQL 5.7+ or MariaDB 10.2+
- FTP/SFTP access or File Manager

## Step 1: Database Setup

1. **Create MySQL Database**
   - Login to Hostinger control panel (hPanel)
   - Go to "MySQL Databases"
   - Create a new database (e.g., `u123456789_jagritibricks`)
   - Create a database user with a strong password
   - Grant all privileges to the user

2. **Import Database Schema**
   - Go to phpMyAdmin
   - Select your database
   - Click "Import" tab
   - Upload `database/schema.sql`
   - Click "Go" to execute

3. **Verify Data**
   - Check that all tables are created
   - Verify sample bricks and default admin account exist

## Step 2: Upload Files

### Option A: Using File Manager
1. Login to hPanel
2. Go to "File Manager"
3. Navigate to `public_html` directory
4. Upload all project files (or extract from ZIP)
5. Ensure folder structure is maintained

### Option B: Using FTP/SFTP
1. Use FileZilla or similar FTP client
2. Connect using credentials from hPanel
3. Navigate to `public_html`
4. Upload all files maintaining structure

## Step 3: Configuration

1. **Update Database Credentials**
   - Edit `config/database.php`
   - Update the following:
     ```php
     private $host = 'localhost';
     private $database = 'u123456789_jagritibricks';  // Your database name
     private $username = 'u123456789_user';            // Your database user
     private $password = 'your_strong_password';       // Your database password
     ```

2. **Update Site URL**
   - Edit `config/config.php`
   - Change `SITE_URL` to your domain:
     ```php
     define('SITE_URL', 'https://yourdomain.com');
     ```

3. **Enable Production Mode**
   - In `config/config.php`, set:
     ```php
     error_reporting(0);
     ini_set('display_errors', 0);
     ```

## Step 4: File Permissions

Set correct permissions:
- Directories: `755`
- Files: `644`
- `uploads/` directory: `755` (writable)

```bash
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;
chmod 755 uploads/
```

## Step 5: SSL Certificate

1. Go to hPanel → SSL
2. Install free Let's Encrypt SSL certificate
3. Enable "Force HTTPS" in .htaccess (uncomment lines)

## Step 6: Testing

1. **Test User Flow**
   - Visit your site
   - Register a new account
   - Browse bricks
   - Add to cart
   - Place an order

2. **Test Admin Panel**
   - Go to `/admin/login.php`
   - Login with: `admin` / `admin123`
   - **IMPORTANT**: Change admin password immediately!
   - Test brick management
   - Test order management

## Step 7: Post-Deployment

1. **Change Admin Password**
   - You'll need to update it directly in database
   - Use password_hash() in PHP or update via custom script

2. **Update Settings**
   - Go to Admin → Settings
   - Update contact number
   - Update WhatsApp number
   - Update delivery area
   - Upload logo (if needed)

3. **Add Real Bricks**
   - Remove sample bricks or update them
   - Add your actual brick inventory

4. **Test Payment Integration** (if using online payment)
   - Configure Razorpay credentials
   - Test in sandbox mode first

## Troubleshooting

### Database Connection Error
- Verify database credentials in `config/database.php`
- Check if database user has proper privileges
- Ensure database exists

### 500 Internal Server Error
- Check file permissions
- Review error logs in hPanel
- Verify PHP version compatibility

### Images Not Loading
- Check `uploads/` directory permissions
- Verify file paths are correct

### Session Issues
- Ensure `session_start()` is called
- Check PHP session configuration

## Security Checklist

- [ ] Changed default admin password
- [ ] Enabled HTTPS
- [ ] Set proper file permissions
- [ ] Disabled error display in production
- [ ] Protected sensitive files via .htaccess
- [ ] Regular database backups enabled

## Backup Strategy

1. **Database Backup**
   - Use phpMyAdmin export feature
   - Schedule automatic backups via hPanel

2. **File Backup**
   - Download entire `public_html` directory
   - Store backups securely

## Support

For issues:
1. Check error logs in hPanel
2. Review PHP error logs
3. Test locally first
4. Contact Hostinger support for hosting-related issues

## Default Credentials

**Admin Panel:**
- URL: `https://yourdomain.com/admin/login.php`
- Username: `admin`
- Password: `admin123` (CHANGE THIS!)

**Test User:**
- Mobile: `9999999999`
- Password: `user123`

---

**Deployment Complete!** 🎉

Your JagritiBricks website is now live and ready to accept orders.
