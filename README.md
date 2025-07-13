## Full Stack Developer Assessment

This project is a secure authentication module built with Laravel. It includes:
- Web login and password reset (HTML + Bootstrap + Blade)
- REST API login and reset endpoints (JSON)
- Token-based authentication using Laravel Sanctum
- Login tracking (IP address and user agent logging)

## Technologies Used

- Laravel 11: Backend framework
- PHP 8.2+: Runtime environment
- Bootstrap 5: UI framework (via CDN)
- Laravel Sanctum: API token authentication
- Gmail SMTP: For sending password reset emails
- MySQL: Database

## Key Features
### Web Authentication
- Session-based login & logout
- Forgot password & reset password via email link
- CSRF protection & validation

### API Endpoints
- POST /api/login — Login and return Bearer token
- POST /api/logout — Logout and revoke token
- POST /api/forgot-password — Send reset password email
- POST /api/reset-password — Verify token & reset password

# Reusable UI Components
- Blade layouts & components for consistent UI: 
    `layouts/layout.blade.php`
    `partials/alert.blade.php`
    `components/form.blade.php`
    `components/button.blade.php`
- Layout theme customized with light yellow

# Login Tracking
- Tracks each login event (timestamp, IP, browser, device)
- Stored in `login_logs` table and displayed with pagination

# Developer Utilities
- Custom Artisan command: `php artisan user:create` - Quick user creation via CLI

# Security Highlights
- Passwords are hashed using Bcrypt
- CSRF tokens and input validation
- Token-based API authentication via Sanctum (separates web & API)

## Get Started

# Clone the repository
git clone https://github.com/your-repo.git
cd your-repo

# Install dependencies
composer install

# Setup .env and generate app key
cp .env.example .env
php artisan key:generate

# Configure your database settings in .env
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_pass

# Setup database
php artisan migrate

# Run dev server
php artisan serve

## Set Up Gmail App Password (SMTP Email Testing)
If you use Gmail for sending emails, you need to generate an App Password instead of using your real Gmail password.
Steps:
1. Go to Google Account Security Settings
2. Ensure 2-Step Verification is enabled
3. Scroll to "App Passwords" and click it
4. Select app type: Mail, and device: Other (Custom name) — e.g., Laravel
5. Generate and copy the 16-character app password
6. Update .env file:
    MAIL_USERNAME=your_email@gmail.com
    MAIL_PASSWORD=your_app_password

## API Testing
1. Call POST /api/login with JSON body:
{
  "email": "user@example.com",
  "password": "your_password"
}
2. After login, a Bearer token will be returned. Use this token to authorize further requests via header:
Authorization: Bearer {token}

## Technical Design Decisions
Frontend (HTML & Blade)
- Blade templates used for layout
- UI built with Bootstrap 5 and custom light yellow theme
- Components (form, alert, buttons) are reusable and clean

Backend (Laravel PHP)
- Laravel Events + Listeners used to log user login details
- Laravel Sanctum used to separate session-based and token-based auth
- Form request validation ensures all fields are properly validated

Database
- users: stores user credentials
- login_logs: tracks login activity (IP, user agent)
- sessions: tracks active user sessions
