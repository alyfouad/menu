<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', app()->getLocale() === 'ar' ? 'لوحة التحكم' : 'Admin Panel') - {{ app()->getLocale() === 'ar' ? 'قائمة المطعم' : 'Restaurant Menu' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            margin: 5px 0;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.1);
        }
        .user-info {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            color: white;
            text-align: center;
        }
        .logout-btn {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            width: 100%;
            margin-top: 10px;
        }
        .logout-btn:hover {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        .language-switcher {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        .language-switcher .btn {
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            margin: 2px;
            font-size: 12px;
            padding: 5px 10px;
        }
        .language-switcher .btn.active {
            background: rgba(255,255,255,0.3);
            font-weight: bold;
        }
        .language-switcher .btn:hover {
            background: rgba(255,255,255,0.4);
            color: white;
        }
        
        /* RTL Support */
        [dir="rtl"] .sidebar {
            {{ app()->getLocale() === 'ar' ? 'right: 0; left: auto;' : '' }}
        }
        [dir="rtl"] .me-2 {
            margin-left: 0.5rem !important;
            margin-right: 0 !important;
        }
        [dir="rtl"] .ms-sm-auto {
            margin-right: auto !important;
            margin-left: 0 !important;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h4 class="text-white">{{ app()->getLocale() === 'ar' ? 'قائمة المطعم' : 'Restaurant Menu' }}</h4>
                        <small class="text-white-50">{{ app()->getLocale() === 'ar' ? 'لوحة التحكم' : 'Admin Panel' }}</small>
                    </div>

                    <!-- Language Switcher -->
                    <div class="language-switcher">
                        <div class="mb-2">
                            <i class="fas fa-globe text-white"></i>
                            <small class="text-white d-block">{{ app()->getLocale() === 'ar' ? 'اللغة' : 'Language' }}</small>
                        </div>
                        <div>
                            <a href="{{ url('locale/en') }}" class="btn btn-sm {{ app()->getLocale() === 'en' ? 'active' : '' }}">
                                <i class="fas fa-flag-usa me-1"></i>EN
                            </a>
                            <a href="{{ url('locale/ar') }}" class="btn btn-sm {{ app()->getLocale() === 'ar' ? 'active' : '' }}">
                                <i class="fas fa-flag me-1"></i>عربي
                            </a>
                        </div>
                    </div>

                    <!-- User Info -->
                    <div class="user-info">
                        <div class="mb-2">
                            <i class="fas fa-user-circle fa-2x"></i>
                        </div>
                        <div class="fw-bold">{{ Auth::user()->name }}</div>
                        <small class="text-white-50">{{ Auth::user()->email }}</small>
                        
                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn logout-btn">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                {{ app()->getLocale() === 'ar' ? 'تسجيل خروج' : 'Logout' }}
                            </button>
                        </form>
                    </div>
                    
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                {{ app()->getLocale() === 'ar' ? 'لوحة التحكم' : 'Dashboard' }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif" href="{{ route('admin.categories.index') }}">
                                <i class="fas fa-tags me-2"></i>
                                {{ app()->getLocale() === 'ar' ? 'الفئات' : 'Categories' }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('admin.menu-items.*')) active @endif" href="{{ route('admin.menu-items.index') }}">
                                <i class="fas fa-utensils me-2"></i>
                                {{ app()->getLocale() === 'ar' ? 'عناصر القائمة' : 'Menu Items' }}
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user-cog me-2"></i>
                                {{ app()->getLocale() === 'ar' ? 'إعدادات الملف الشخصي' : 'Profile Settings' }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}" target="_blank">
                                <i class="fas fa-external-link-alt me-2"></i>
                                {{ app()->getLocale() === 'ar' ? 'عرض الواجهة الأمامية' : 'View Frontend' }}
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('title', 'Dashboard')</h1>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html> 