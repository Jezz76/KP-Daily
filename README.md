# 📝 KP Daily Log

<div align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11.x">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/Livewire-3.x-FB70A9?style=for-the-badge&logo=livewire&logoColor=white" alt="Livewire 3.x">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="TailwindCSS 3.x">
  <img src="https://img.shields.io/badge/Vite-6.x-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite 6.x">
</div>

## 🎯 Overview

**KP Daily Log** adalah aplikasi web modern untuk mengelola dan mendokumentasikan aktivitas harian selama masa Kerja Praktik (KP). Aplikasi ini dibangun dengan Laravel 11, Livewire 3, dan menggunakan desain Glass Morphism yang elegan dengan performa tinggi.

### ✨ Key Features

- 📊 **Dashboard Overview** - Monitoring progress KP secara real-time
- 📝 **Daily Activity Log** - Pencatatan aktivitas harian dengan interface yang intuitif
- 📈 **Activity Recap** - Rekap dan laporan aktivitas dalam format yang rapi
- ⚙️ **KP Period Settings** - Pengaturan periode kerja praktik
- 👤 **Account Management** - Manajemen profil dan keamanan akun
- 🎨 **Modern Glass Morphism UI** - Desain yang modern dan responsif
- 🌙 **Consistent Theme** - Gradient purple/blue/pink yang konsisten

## 🎨 Design System

### Glass Morphism Theme
- **Background**: `backdrop-blur-sm bg-white/10`
- **Borders**: `border border-white/20`
- **Colors**: Purple, Blue, Pink gradient palette
- **Typography**: Modern, readable with proper contrast
- **Shadows**: Optimized `shadow-lg` untuk performa

### Performance Optimizations
- Minimal `backdrop-blur` usage
- Lightweight shadow effects
- Reduced animation duration (0.15s)
- Optimized CSS bundle size (~70KB)

## 🛠️ Tech Stack

### Backend
- **Laravel 11.x** - PHP framework dengan fitur terbaru
- **PHP 8.2+** - Latest PHP features dan performance improvements
- **SQLite** - Lightweight database untuk development
- **Livewire 3.x** - Real-time UI components

### Frontend
- **TailwindCSS 3.x** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Vite 6.x** - Modern frontend build tool
- **Custom Glass Components** - Reusable UI components

### Features & Libraries
- **Authentication** - Laravel Breeze dengan Livewire
- **Real-time Updates** - Livewire reactive components
- **Form Validation** - Laravel validation rules
- **Session Management** - Secure session handling
- **Responsive Design** - Mobile-first approach

## 📋 Prerequisites

Pastikan sistem Anda memiliki requirements berikut:

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x
- **NPM** >= 9.x
- **SQLite** extension enabled

## 🚀 Installation

### 1. Clone Repository

```bash
git clone https://github.com/Jezz76/KP-Daily.git
cd KP-Daily
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup

```bash
# Run database migrations
php artisan migrate

# (Optional) Seed database with sample data
php artisan db:seed
```

### 5. Build Assets

```bash
# Development build
npm run dev

# Production build
npm run build
```

### 6. Start Development Server

```bash
# Start Laravel development server
php artisan serve

# In another terminal, start Vite dev server (if using npm run dev)
npm run dev
```

Aplikasi akan tersedia di `http://localhost:8000`

## 📁 Project Structure

```
KP-Daily/
├── app/
│   ├── Http/Controllers/          # Application controllers
│   ├── Livewire/                  # Livewire components
│   └── Models/                    # Eloquent models
├── database/
│   ├── migrations/                # Database migrations
│   └── seeders/                   # Database seeders
├── resources/
│   ├── css/
│   │   └── app.css               # Main CSS with glass-container
│   ├── js/
│   │   └── app.js                # JavaScript entry point
│   └── views/
│       ├── components/           # Blade components
│       ├── layouts/              # Layout templates
│       ├── livewire/             # Livewire views
│       └── profile.blade.php     # Profile management
├── routes/
│   └── web.php                   # Web routes
├── public/
│   └── build/                    # Compiled assets (generated)
├── package.json                  # Node.js dependencies
├── composer.json                 # PHP dependencies
├── vite.config.js                # Vite configuration
└── tailwind.config.js            # Tailwind CSS configuration
```

## 🔧 Configuration

### Environment Variables

Key environment variables dalam `.env`:

```env
APP_NAME="KP Daily Log"
APP_ENV=local
APP_KEY=base64:your-generated-key
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite

MAIL_MAILER=log
```

### Vite Configuration

Aplikasi menggunakan Vite untuk asset bundling dengan konfigurasi optimized:

```javascript
// vite.config.js
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks: undefined,
            },
        },
    },
});
```

## 📱 Features Documentation

### 1. Dashboard
- **Progress Monitoring**: Real-time KP progress tracking
- **Activity Summary**: Quick overview of recent activities
- **Quick Actions**: Fast access to common tasks
- **Widgets**: Weather, motivation, and location widgets

### 2. Activity Log
- **Daily Entry**: Form untuk input aktivitas harian
- **Date Selection**: Calendar picker untuk memilih tanggal
- **Activity List**: List aktivitas dengan filter dan search
- **Holiday Checker**: Automatic holiday detection

### 3. Activity Recap
- **Export Options**: PDF dan Excel export functionality
- **Date Range**: Filter aktivitas berdasarkan periode
- **Summary Statistics**: Statistik ringkasan aktivitas

### 4. Settings
- **KP Period**: Set start dan end date untuk periode KP
- **Account Management**: Update profile, password, delete account
- **Preferences**: User preferences dan kustomisasi

## 🎨 Customization

### Theme Colors

Primary color palette:
```css
/* Purple Gradient */
from-purple-500 to-pink-500

/* Blue Gradient */
from-blue-500 to-cyan-500

/* Green Gradient */
from-green-400 to-emerald-500

/* Glass Effect */
backdrop-blur-sm bg-white/10 border-white/20
```

### Custom Components

Aplikasi menggunakan custom glass components:

```css
.glass-container {
    @apply backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl;
}
```

## 🚀 Deployment

### Production Build

```bash
# Install dependencies
composer install --optimize-autoloader --no-dev

# Build assets
npm run build

# Clear and cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Server Requirements

- **PHP** >= 8.2 dengan extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML
- **Web Server**: Apache/Nginx dengan URL rewriting
- **Database**: SQLite/MySQL/PostgreSQL
- **SSL Certificate** (recommended untuk production)

## 🧪 Testing

```bash
# Run PHP tests
php artisan test

# Run with coverage
php artisan test --coverage
```

## 🤝 Contributing

1. Fork repository ini
2. Buat feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

### Development Guidelines

- Follow PSR-12 coding standards
- Write descriptive commit messages
- Add tests untuk new features
- Update documentation jika diperlukan
- Maintain konsistensi glass morphism theme

## 📝 License

Distributed under the MIT License. See `LICENSE` for more information.

## �‍💻 Author

**Jeskris**
- GitHub: [@Jezz76](https://github.com/Jezz76)
- Project: [KP-Daily](https://github.com/Jezz76/KP-Daily)

## �🙏 Acknowledgments

- [Laravel](https://laravel.com/) - The PHP framework for web artisans
- [Livewire](https://livewire.laravel.com/) - Full-stack framework for Laravel
- [TailwindCSS](https://tailwindcss.com/) - Utility-first CSS framework
- [Alpine.js](https://alpinejs.dev/) - Lightweight JavaScript framework
- [Heroicons](https://heroicons.com/) - Beautiful hand-crafted SVG icons

## 📞 Support

Jika Anda mengalami masalah atau memiliki pertanyaan:

1. Check [Issues](https://github.com/Jezz76/KP-Daily/issues) untuk masalah yang serupa
2. Buat issue baru dengan detail yang lengkap
3. Atau hubungi melalui GitHub: [@Jezz76](https://github.com/Jezz76)

---

<div align="center">
  <p>Made with ❤️ for KP students by <strong>Jeskris</strong></p>
  <p>© 2025 KP Daily Log. All rights reserved.</p>
</div>

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

---

<div align="center">
  <p>Made with ❤️ for KP students</p>
  <p>© 2025 KP Daily Log. All rights reserved.</p>
</div>
