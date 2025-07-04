# Restaurant Menu Management System

A Laravel-based restaurant menu management system with admin panel and public-facing menu display.

## Features

### Frontend (Public Menu)
- Beautiful, responsive menu display
- Category-based organization
- Mobile-friendly design
- Animated UI elements
- Production-ready (admin links hidden in production)

### Admin Panel (Protected)
- **Authentication Required** - Laravel Breeze integration
- Dashboard with statistics and quick actions
- Category Management (CRUD operations)
- Menu Item Management (CRUD operations)
- File upload support for category icons and menu item images
- Order management for display priorities
- Active/Inactive status toggles
- User profile management

## Installation & Setup

1. **Clone and Install Dependencies**
   ```bash
   composer install
   npm install && npm run build
   ```

2. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database Setup**
   ```bash
   # Configure your database in .env file
   php artisan migrate
   php artisan db:seed
   ```

4. **Storage Link** (for file uploads)
   ```bash
   php artisan storage:link
   ```

5. **Start the Server**
   ```bash
   php artisan serve
   ```

## Default Admin Credentials

After running the seeder, you can log in with:
- **Email:** `admin@restaurant.com`
- **Password:** `password123`

## URLs

- **Frontend Menu:** `http://localhost:8000`
- **Admin Login:** `http://localhost:8000/login`
- **Admin Dashboard:** `http://localhost:8000/admin` (requires authentication)

## Sample Data

The system comes with pre-seeded sample data including:
- 9 food categories (Breakfast, Appetizers, Soups & Salads, etc.)
- 36 menu items with realistic names, descriptions, and prices
- 1 admin user for testing

## Environment-Based Features

### Development Mode
- Admin panel links visible on frontend
- All debugging features enabled

### Production Mode
- Admin panel links automatically hidden from frontend
- Optimized for public use
- Set `APP_ENV=production` in `.env` file

## File Uploads

The system supports file uploads for:
- **Category Icons:** JPG, PNG, GIF (max 2MB)
- **Menu Item Images:** JPG, PNG, GIF (max 2MB)

Files are stored in `storage/app/public/` and accessible via the storage link.

## Database Structure

### Categories Table
- `id`, `name`, `description`, `icon`, `order`, `is_active`, `timestamps`

### Menu Items Table
- `id`, `name`, `description`, `price`, `image`, `category_id`, `order`, `is_active`, `timestamps`

### Users Table
- Standard Laravel authentication fields

## Key Routes

### Frontend
- `GET /` - Menu homepage
- `GET /menu/category/{id}` - Category detail page

### Admin (Protected)
- `GET /admin` - Dashboard
- `/admin/categories` - Category management
- `/admin/menu-items` - Menu item management
- `/profile` - User profile management

## Authentication Middleware

All admin routes are protected with:
- `auth` - Requires user login
- `verified` - Requires email verification (optional)

## Technology Stack

- **Backend:** Laravel 11
- **Frontend:** Blade templates with Bootstrap 5
- **Authentication:** Laravel Breeze
- **Database:** MySQL/SQLite
- **File Storage:** Laravel Storage with public disk
- **Icons:** Font Awesome 6
- **Styling:** Custom CSS with gradient designs

## Customization

### Styling
- Main colors: Purple gradient (`#667eea` to `#764ba2`)
- Modify CSS in blade templates for custom branding
- Bootstrap classes for responsive design

### Sample Data
- Edit `database/seeders/MenuSeeder.php` to customize menu items
- Run `php artisan db:seed --class=MenuSeeder` to refresh menu data

### Admin User
- Edit `database/seeders/UserSeeder.php` to change default admin credentials
- Run `php artisan db:seed --class=UserSeeder` to create additional users

## Production Deployment

1. Set environment to production:
   ```bash
   APP_ENV=production
   APP_DEBUG=false
   ```

2. Optimize for production:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   composer install --optimize-autoloader --no-dev
   ```

3. Ensure proper file permissions for storage and bootstrap/cache directories

4. Configure web server (Apache/Nginx) to point to `public/` directory

## Support

For issues or questions:
1. Check Laravel documentation
2. Verify file permissions
3. Check error logs in `storage/logs/`
4. Ensure database connection is properly configured

---

**Happy Restaurant Management! 🍽️**
