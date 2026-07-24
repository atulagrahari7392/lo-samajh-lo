# Lo Samajh Lo — Installation Guide

## 📋 Prerequisites

Before installation, ensure you have:

| Requirement | Version | Notes |
|-------------|---------|-------|
| PHP | 8.3+ | With extensions: BCMath, Ctype, cURL, DOM, Fileinfo, JSON, Mbstring, OpenSSL, PCRE, PDO, Tokenizer, XML |
| Composer | 2.7+ | [getcomposer.org](https://getcomposer.org) |
| MySQL | 8.0+ | Or MariaDB 10.6+ |
| Redis | 7.0+ | For caching, sessions, queues |
| Node.js | 20+ | For frontend asset compilation |
| NPM | 10+ | Comes with Node.js |

### PHP Extensions Required:
```bash
# Check extensions
php -m | grep -E "bcmath|ctype|curl|dom|fileinfo|json|mbstring|openssl|pcre|pdo|pdo_mysql|tokenizer|xml|zip|gd|imagick"
```

---

## 🚀 Installation Steps

### Step 1: Clone the Repository

```bash
git clone https://github.com/yourusername/lo-samajh-lo.git
cd lo-samajh-lo
```

### Step 2: Install PHP Dependencies

```bash
composer install --optimize-autoloader
```

### Step 3: Install Node Dependencies

```bash
npm install
```

### Step 4: Configure Environment

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

Now edit `.env` with your configuration:

```env
# Application
APP_NAME="Lo Samajh Lo"
APP_URL=http://localhost:8000  # Your domain in production

# Database
DB_HOST=127.0.0.1
DB_DATABASE=lo_samajh_lo
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

# Redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# OpenAI (Primary AI Provider)
OPENAI_API_KEY=sk-...
AI_PROVIDER=openai

# Razorpay (Payments)
RAZORPAY_KEY_ID=rzp_...
RAZORPAY_KEY_SECRET=...

# Google OAuth
GOOGLE_CLIENT_ID=...
GOOGLE_CLIENT_SECRET=...
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback

# MSG91 (SMS + WhatsApp)
MSG91_API_KEY=...
MSG91_SENDER_ID=LSAMLO

# Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=...
MAIL_PASSWORD=...
MAIL_FROM_ADDRESS=noreply@losamajhlo.com
```

### Step 5: Create Database

```sql
CREATE DATABASE lo_samajh_lo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Step 6: Run Migrations & Seeders

```bash
# Run all migrations (creates 40 tables)
php artisan migrate

# Seed with initial data (admin user, categories, achievements, settings)
php artisan db:seed

# OR run together
php artisan migrate --seed
```

**Default Admin Credentials:**
- Email: `admin@losamajhlo.com`
- Password: `Admin@123`

> ⚠️ **IMPORTANT**: Change the admin password immediately after first login!

### Step 7: Create Storage Link

```bash
php artisan storage:link
```

### Step 8: Build Frontend Assets

```bash
# Development (with hot reload)
npm run dev

# Production build
npm run build
```

### Step 9: Configure Queue Worker

```bash
# Start queue worker (keep running in background)
php artisan queue:work --queue=high,default,low --tries=3

# For production, use Supervisor or Laravel Horizon
php artisan horizon
```

### Step 10: Set Up Scheduled Tasks

Add to your system cron (`crontab -e`):

```cron
* * * * * cd /path/to/lo-samajh-lo && php artisan schedule:run >> /dev/null 2>&1
```

### Step 11: Start the Application

```bash
php artisan serve
# Visit: http://localhost:8000
```

---

## ⚙️ Scheduled Tasks

The platform includes these scheduled commands:

| Command | Schedule | Description |
|---------|----------|-------------|
| `send:class-reminders` | Every 30 min | Notify students about upcoming live classes |
| `leaderboard:update` | Daily at midnight | Update weekly/monthly leaderboard ranks |
| `generate:daily-quiz` | Daily at 6 AM | Auto-generate daily quiz from question bank |
| `prune:expired-enrollments` | Daily at 2 AM | Mark expired enrollments as inactive |

---

## 🔧 Production Setup

### Web Server (Nginx)

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name losamajhlo.com www.losamajhlo.com;
    root /var/www/lo-samajh-lo/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # Increase upload size for video/PDF uploads
    client_max_body_size 512M;
}
```

### Redis Configuration

```bash
# Install Redis
sudo apt install redis-server
sudo systemctl enable redis
sudo systemctl start redis
```

### Supervisor (Queue Workers)

```ini
# /etc/supervisor/conf.d/lo-samajh-lo-worker.conf

[program:lo-samajh-lo-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/lo-samajh-lo/artisan queue:work redis --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=4
redirect_stderr=true
stdout_logfile=/var/www/lo-samajh-lo/storage/logs/worker.log
stopwaitsecs=3600
```

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start "lo-samajh-lo-worker:*"
```

### SSL (Let's Encrypt)

```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d losamajhlo.com -d www.losamajhlo.com
```

### Production Optimizations

```bash
# Clear and cache all
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
php artisan icons:cache

# For production .env:
APP_ENV=production
APP_DEBUG=false
LOG_LEVEL=error
```

---

## 🌐 Third-Party Service Setup

### OpenAI (AI Features)

1. Create account at [platform.openai.com](https://platform.openai.com)
2. Generate API key
3. Add to `.env`: `OPENAI_API_KEY=sk-...`
4. Set model: `OPENAI_MODEL=gpt-4o`

### Razorpay (Payments)

1. Create account at [razorpay.com](https://razorpay.com)
2. Get Key ID and Key Secret from Dashboard → Settings → API Keys
3. Add to `.env`: `RAZORPAY_KEY_ID=rzp_...`, `RAZORPAY_KEY_SECRET=...`
4. Set Webhook URL: `https://yourdomain.com/api/v1/payment/razorpay/webhook`

### Google OAuth (Social Login)

1. Go to [Google Cloud Console](https://console.cloud.google.com)
2. Create OAuth 2.0 credentials
3. Set authorized redirect URI: `https://yourdomain.com/auth/google/callback`
4. Add to `.env`: `GOOGLE_CLIENT_ID=...`, `GOOGLE_CLIENT_SECRET=...`

### MSG91 (SMS + WhatsApp)

1. Register at [msg91.com](https://msg91.com)
2. Get API key from dashboard
3. Create SMS template (get template ID)
4. Add to `.env`: `MSG91_API_KEY=...`, `MSG91_SENDER_ID=LSAMLO`

### Firebase (Push Notifications)

1. Create project at [Firebase Console](https://console.firebase.google.com)
2. Get Server Key from Project Settings → Cloud Messaging
3. Add to `.env`: `FIREBASE_SERVER_KEY=...`, `FIREBASE_PROJECT_ID=...`

### Zoom (Live Classes)

1. Create app at [Zoom Marketplace](https://marketplace.zoom.us)
2. Get Account ID, Client ID, Client Secret
3. Add to `.env`: `ZOOM_ACCOUNT_ID=...`, `ZOOM_CLIENT_ID=...`, `ZOOM_CLIENT_SECRET=...`

---

## 🗄️ Database Management

### Backup

```bash
# Create backup
mysqldump -u root -p lo_samajh_lo > backup_$(date +%Y%m%d_%H%M%S).sql

# Restore
mysql -u root -p lo_samajh_lo < backup_file.sql
```

### Running New Migrations

```bash
php artisan migrate
php artisan migrate:status
```

---

## 📊 MeiliSearch Setup (Full-Text Search)

```bash
# Install MeiliSearch
curl -L https://install.meilisearch.com | sh

# Start
./meilisearch --master-key="your_master_key"

# Configure .env
SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://localhost:7700
MEILISEARCH_KEY=your_master_key

# Index all searchable models
php artisan scout:import "App\Models\Course"
php artisan scout:import "App\Models\Test"
php artisan scout:import "App\Models\Blog"
php artisan scout:import "App\Models\Note"
```

---

## 🐛 Troubleshooting

### Common Issues

**1. Storage permission errors:**
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

**2. Queue not processing:**
```bash
php artisan queue:restart
# Check logs
tail -f storage/logs/laravel.log
```

**3. Cache issues:**
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

**4. Composer memory limit:**
```bash
COMPOSER_MEMORY_LIMIT=-1 composer install
```

**5. File upload size:**
Edit `php.ini`:
```ini
upload_max_filesize = 512M
post_max_size = 512M
max_execution_time = 300
memory_limit = 512M
```

---

## 📞 Support

- **Documentation**: [docs/](docs/)
- **API Reference**: [docs/API.md](docs/API.md)
- **Database Schema**: [docs/DATABASE.md](docs/DATABASE.md)
- **Issues**: Create GitHub issue

---

*Lo Samajh Lo — Empowering Every Indian Student* 🇮🇳
