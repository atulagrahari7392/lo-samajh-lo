# Lo Samajh Lo 🎓
### India's Next Generation Learning Platform

<div align="center">

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20.svg?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4.svg?logo=php)
![License](https://img.shields.io/badge/license-Proprietary-red.svg)
![Status](https://img.shields.io/badge/status-Production%20Ready-brightgreen.svg)

**स्मार्ट पढ़ें, ऊंचा स्कोर करें | Learn Smarter, Score Higher**

*A full-stack educational platform competing with Unacademy, Physics Wallah, and Testbook — built with original premium UI/UX and enterprise-grade architecture.*

</div>

---

## 🚀 Platform Overview

**Lo Samajh Lo** is India's next-generation learning management system targeting:

| Segment | Courses |
|---------|---------|
| 🎓 **Graduation** | BA, B.Sc, B.Com, B.Ed, D.El.Ed |
| 🏛️ **Post Graduation** | MA, M.Sc, M.Com, M.Ed |
| 📝 **Competitive Exams** | UGC NET/JRF, SSC CGL/CHSL, IBPS/SBI, RRB, CTET/UPTET, UPPSC/BPSC, Police, CUET |

---

## ✨ Key Features

### 👨‍🎓 Student Experience
- **AI-Powered Tutor** — Chat with GPT-4o in English or Hindi
- **Professional Test Engine** — Full-screen, timer, palette, auto-save, anti-cheat
- **Detailed Analytics** — Subject-wise, topic-wise, time analysis, predicted rank
- **Live Classes** — Zoom + YouTube integration with live chat, polls, attendance
- **Bilingual Content** — English + Hindi throughout the platform
- **Gamification** — Badges, achievements, streaks, leaderboard
- **AI Doubt Solver** — Upload question image, get step-by-step solution
- **Personalized Study Plan** — AI-generated based on exam date and weak areas

### 👩‍🏫 Teacher Panel
- Upload video lessons, PDFs, notes
- Create tests with multi-type questions (MCQ, MSQ, Numerical, Assertion-Reason, etc.)
- Schedule and host live classes
- View student progress and engagement
- Earnings dashboard with commission breakdown

### 👨‍💼 Admin Panel
- Complete student, teacher, course management
- Question bank with CSV/Excel import
- Payment management with refund support
- Coupon system with GST-compliant invoices
- Push notifications (Email, SMS, WhatsApp, Push)
- Analytics and reporting dashboard

---

## 🏗️ Tech Stack

| Layer | Technology |
|-------|-----------|
| **Backend** | PHP 8.3, Laravel 11 |
| **Database** | MySQL 8.0 + Redis |
| **Frontend** | Blade + TailwindCSS 3 + Alpine.js |
| **Search** | Laravel Scout + MeiliSearch |
| **Queue** | Laravel Horizon + Redis |
| **AI** | OpenAI GPT-4o (modular: Gemini-ready) |
| **Payments** | Razorpay + PhonePe |
| **Live Classes** | Zoom SDK + YouTube Live |
| **Notifications** | MSG91 (SMS+WhatsApp) + Firebase FCM |
| **Storage** | AWS S3 / Cloudflare R2 |
| **Auth** | Laravel Sanctum + Socialite (Google) |

---

## 📁 Project Structure

```
lo-samajh-lo/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/         # Login, Register, OTP, Google, ForgotPassword
│   │   │   ├── Student/      # Dashboard, Test, Course, Notes, AI, Analytics
│   │   │   ├── Teacher/      # Dashboard, Course, Lesson, Test, Question, Live
│   │   │   ├── Admin/        # All admin CRUD controllers
│   │   │   └── API/V1/       # REST API controllers (v1)
│   │   ├── Middleware/       # Admin, Teacher, Student, Bilingual, AntiCheat
│   │   ├── Requests/         # Form validation classes
│   │   └── Resources/        # API Resource transformers
│   ├── Models/               # 35+ Eloquent models with relationships
│   ├── Services/
│   │   ├── AI/               # OpenAIProvider, GeminiProvider, AIService (factory)
│   │   ├── Payment/          # RazorpayProvider, PhonePeProvider, PaymentService
│   │   └── Notification/     # Email, SMS, WhatsApp, Push, NotificationService
│   ├── Events/ + Listeners/  # StudentEnrolled, TestCompleted events
│   ├── Observers/            # EnrollmentObserver, TestAttemptObserver
│   └── Console/Commands/     # Scheduled tasks
├── database/
│   ├── migrations/           # 40+ migration files
│   └── seeders/              # Admin, categories, achievements, settings
├── resources/
│   ├── views/
│   │   ├── layouts/          # app, dashboard, admin, teacher
│   │   ├── home/             # Premium landing page
│   │   ├── auth/             # Login, register, OTP, forgot-password
│   │   ├── student/          # All student panel views
│   │   ├── teacher/          # All teacher panel views
│   │   ├── admin/            # All admin panel views
│   │   ├── courses/          # Public course pages
│   │   ├── blog/             # Blog views
│   │   ├── payment/          # Checkout, success, failed, invoice
│   │   └── ...               # Discussions, search, about, contact
│   └── js/ + css/
├── routes/
│   ├── web.php               # Public routes
│   ├── api.php               # API v1 routes
│   ├── student.php           # Student panel routes
│   ├── teacher.php           # Teacher panel routes
│   └── admin.php             # Admin panel routes
├── lang/
│   ├── en/                   # English translations
│   └── hi/                   # Hindi translations
├── public/
│   ├── css/app.css           # Custom design system CSS
│   └── js/                   # app.js, test-engine.js, dashboard.js
├── config/
│   └── lsl.php               # Platform configuration
├── docs/
│   ├── API.md                # Complete API documentation
│   └── DATABASE.md           # Database schema docs
├── INSTALLATION.md           # Setup guide
└── README.md                 # This file
```

---

## 🗄️ Database Schema (40 Tables)

| # | Table | Description |
|---|-------|-------------|
| 1 | users | All users (student/teacher/admin) |
| 2 | user_profiles | Extended profile data |
| 3 | courses | Course master table |
| 4 | course_categories | Course categories with hierarchy |
| 5 | course_subjects | Subjects within courses |
| 6 | lessons | Video/PDF/Quiz lessons |
| 7 | lesson_progress | Per-student lesson completion |
| 8 | enrollments | Student course enrollments |
| 9 | tests | Test configurations |
| 10 | test_sections | Sections within tests |
| 11 | questions | Question bank (8 types) |
| 12 | question_options | MCQ/MSQ options |
| 13 | test_attempts | Student test attempts |
| 14 | attempt_answers | Per-question answers |
| 15 | live_classes | Scheduled live sessions |
| 16 | live_class_attendance | Attendance records |
| 17 | notes | PDF/PPT/Mindmap files |
| 18 | note_bookmarks | Bookmarked notes |
| 19 | current_affairs | Daily/weekly/monthly CA |
| 20 | blog_categories | Blog categories |
| 21 | blogs | Blog posts |
| 22 | teachers | Teacher-specific metadata |
| 23 | coupons | Discount coupons |
| 24 | orders | Purchase orders |
| 25 | payments | Payment transactions |
| 26 | certificates | Generated certificates |
| 27 | achievements | Achievement definitions |
| 28 | user_achievements | Earned achievements |
| 29 | discussions | Forum threads |
| 30 | discussion_replies | Forum replies |
| 31 | notifications | In-app notifications |
| 32 | announcements | Platform announcements |
| 33 | referrals | Referral tracking |
| 34 | leaderboard_entries | Ranking data |
| 35 | study_plans | AI-generated study plans |
| 36 | bookmarks | Polymorphic bookmarks |
| 37 | downloads | Download history |
| 38 | settings | Platform settings KV |

---

## 🤖 AI Features

All AI features are powered by **OpenAI GPT-4o** with modular architecture (swap to Gemini via `.env`):

| Feature | Description |
|---------|-------------|
| **AI Tutor** | Bilingual chat tutor, subject-aware, with history |
| **Doubt Solver** | Upload question image or type, get step-by-step solution |
| **Study Planner** | Personalized plan based on exam date and weak areas |
| **Performance Coach** | Analyzes test history, predicts score, recommends focus areas |
| **Quiz Generator** | Auto-generate MCQs on any topic in EN/HI |
| **Notes Generator** | AI-generated markdown notes for any topic |
| **Question Explainer** | Detailed explanation for any question |

---

## 💳 Payment Flow

```
Student → Checkout Page → Apply Coupon (AJAX) → 
  Razorpay Order Created → Razorpay Popup → 
    Payment Success → Signature Verified → 
      Order Updated → Enrollment Created → 
        Certificate Queued → Notification Sent
```

**Supported**: Razorpay (UPI, Cards, Net Banking, Wallets) + PhonePe

---

## 🔐 Security Features

- ✅ CSRF Protection (Laravel default)
- ✅ XSS Protection (Blade auto-escaping)
- ✅ SQL Injection Protection (Eloquent ORM)
- ✅ Rate Limiting (Auth endpoints: 5 attempts/min)
- ✅ OTP Verification (Phone login + Registration)
- ✅ Google reCAPTCHA / Cloudflare Turnstile
- ✅ Role-Based Access Control (Spatie Permissions)
- ✅ Activity Logging (Spatie Activity Log)
- ✅ Payment Signature Verification
- ✅ Anti-Cheat: Tab switch detection in test engine
- ✅ JWT/Sanctum API Authentication

---

## 🌐 Supported Languages

| Language | Status |
|----------|--------|
| English | ✅ Primary |
| Hindi (हिंदी) | ✅ Full support |

All course titles, descriptions, questions, and explanations support bilingual content.

---

## 📱 Responsive Design

| Breakpoint | Status |
|-----------|--------|
| Mobile (375px+) | ✅ |
| Tablet (768px+) | ✅ |
| Laptop (1024px+) | ✅ |
| Desktop (1440px+) | ✅ |

---

## 🚀 Getting Started

See [INSTALLATION.md](INSTALLATION.md) for complete setup instructions.

**Quick Start:**
```bash
git clone https://github.com/yourusername/lo-samajh-lo.git
cd lo-samajh-lo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

**Admin Login:** `admin@losamajhlo.com` / `Admin@123`

---

## 📖 API Documentation

See [docs/API.md](docs/API.md) for complete REST API reference.

**Base URL:** `https://yourdomain.com/api/v1`

**Auth:** Bearer token (Laravel Sanctum)

---

## 🏆 Platform Statistics Architecture

The platform is designed to scale to:
- **5M+ students**
- **10M+ test attempts**
- **100K+ questions**
- **CDN-ready** static assets
- **Redis caching** for all hot data
- **Queue-based** heavy operations (PDF generation, bulk notifications)

---

## 📄 License

Proprietary. All rights reserved.

**Lo Samajh Lo** © 2024–2025. Unauthorized distribution or copying is strictly prohibited.

---

<div align="center">

Built with ❤️ for Indian Students

**[Website](https://losamajhlo.com)** • **[API Docs](docs/API.md)** • **[Installation](INSTALLATION.md)**

</div>
