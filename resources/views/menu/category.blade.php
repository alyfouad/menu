<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->getNameInLanguage('ar') }} - {{ $category->getNameInLanguage('en') }} - OB LA DI Café</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&family=Noto+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #000000;
            min-height: 100vh;
            font-family: 'Inter', 'Noto Sans Arabic', sans-serif;
            color: white;
            overflow-x: hidden;
            direction: rtl;
        }

        .category-header {
            text-align: center;
            padding: 2rem 0;
        }

        .category-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .category-title-ar {
            font-family: 'Noto Sans Arabic', sans-serif;
            font-size: 2rem;
            font-weight: 600;
            color: #d4af37;
            margin-bottom: 2rem;
        }

        .category-nav {
            padding: 2rem 0;
            overflow-x: auto;
            white-space: nowrap;
        }

        .category-nav::-webkit-scrollbar {
            height: 6px;
        }

        .category-nav::-webkit-scrollbar-track {
            background: #333;
        }

        .category-nav::-webkit-scrollbar-thumb {
            background: #d4af37;
            border-radius: 3px;
        }

        .nav-pills {
            justify-content: center;
            gap: 0.5rem;
            flex-wrap: nowrap;
        }

        .nav-pill {
            background: transparent;
            border: 1px solid #666;
            color: #ccc;
            padding: 8px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 400;
            transition: all 0.3s ease;
            white-space: nowrap;
            display: inline-block;
        }

        .nav-pill:hover,
        .nav-pill.active {
            background: #d4af37;
            color: #000;
            border-color: #d4af37;
            text-decoration: none;
        }

        .menu-items-section {
            padding: 2rem 0;
            max-width: 900px;
            margin: 0 auto;
        }

        .menu-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #d4af37;
            transform: translateX(-5px);
        }

        .item-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .item-name-ar {
            font-family: 'Noto Sans Arabic', sans-serif;
            font-size: 1.1rem;
            color: #d4af37;
            direction: rtl;
            text-align: right;
            font-weight: 500;
            flex: 1;
            min-width: 0;
        }

        .item-price {
            font-size: 1.1rem;
            font-weight: 600;
            color: #d4af37;
            flex-shrink: 0;
            text-align: center;
            min-width: 80px;
        }

        .item-name-en {
            font-size: 1rem;
            font-weight: 500;
            color: #ffffff;
            direction: ltr;
            text-align: left;
            flex: 1;
            min-width: 0;
        }

        .contact-info {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: rgba(0, 0, 0, 0.8);
            border: 1px solid #d4af37;
            border-radius: 10px;
            padding: 15px 20px;
            backdrop-filter: blur(10px);
            z-index: 1000;
        }

        .contact-info h6 {
            color: #d4af37;
            font-size: 0.8rem;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .contact-info p {
            color: #ccc;
            font-size: 0.75rem;
            margin: 2px 0;
            direction: rtl;
            text-align: right;
        }

        .contact-phone {
            color: #d4af37;
            font-weight: 600;
        }

        .cafe-logo {
            position: fixed;
            bottom: 30px;
            left: 30px;
            width: 120px;
            height: 120px;
            z-index: 1000;
            background: rgba(212, 175, 55, 0.1);
            border: 2px solid #d4af37;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .cafe-logo:hover {
            transform: scale(1.1);
            background: rgba(212, 175, 55, 0.2);
        }

        .cafe-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .admin-link {
            position: fixed;
            top: 20px;
            left: 20px;
            background: rgba(212, 175, 55, 0.9);
            color: #000;
            padding: 10px 15px;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
            z-index: 1000;
            font-weight: 500;
        }

        .admin-link:hover {
            background: #d4af37;
            color: #000;
            text-decoration: none;
            transform: scale(1.05);
        }

        .back-button {
            background: rgba(212, 175, 55, 0.2);
            border: 1px solid #d4af37;
            color: #d4af37;
            border-radius: 25px;
            padding: 10px 20px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            margin: 2rem 0;
            font-weight: 500;
        }

        .back-button:hover {
            background: #d4af37;
            color: #000;
            text-decoration: none;
        }

        .no-items {
            text-align: center;
            padding: 5rem 0;
            color: #ccc;
        }

        .no-items i {
            font-size: 4rem;
            color: #d4af37;
            margin-bottom: 2rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .category-title {
                font-size: 2rem;
            }
            
            .category-title-ar {
                font-size: 1.5rem;
            }
            
            .contact-info {
                display: none;
            }
            
            .cafe-logo {
                width: 80px;
                height: 80px;
                bottom: 20px;
                left: 20px;
            }

            .item-content {
                flex-direction: column;
                gap: 0.5rem;
                align-items: stretch;
            }

            .item-name-ar,
            .item-name-en {
                text-align: center;
                flex: none;
            }

            .item-price {
                text-align: center;
                flex: none;
            }

            .nav-pills {
                justify-content: flex-start;
            }

            .menu-items-section {
                padding: 1rem;
            }
        }

        /* EGP styling */
        .egp-suffix {
            font-size: 0.9rem;
            color: #d4af37;
            margin-right: 5px;
        }

        /* RTL adjustments */
        .nav-pills {
            direction: rtl;
        }

        .back-button i {
            margin-left: 8px;
            margin-right: 0;
        }
    </style>
</head>
<body>
    @if(!app()->environment('production'))
        <a href="{{ route('admin.dashboard') }}" class="admin-link">
            <i class="fas fa-cogs me-2"></i>لوحة التحكم
        </a>
    @endif

    <!-- Café Logo -->
    <div class="cafe-logo">
        <img src="{{ asset('images/ob-la-di-logo.png') }}" alt="OB LA DI Logo">
    </div>

    <!-- Contact Info -->
    <div class="contact-info">
        <h6><i class="fas fa-map-marker-alt me-1"></i> 116 شارع جمال عبد الناصر، الفيوم</h6>
        <p><i class="fas fa-clock me-1"></i> 24/7</p>
        <p><i class="fas fa-phone me-1"></i> <span class="contact-phone">0114 768 9271</span></p>
    </div>

    <div class="container py-4">
        <a href="{{ route('menu.index') }}" class="back-button">
            <i class="fas fa-arrow-right"></i>العودة للقائمة - Back to Menu
        </a>

        <div class="category-header">
            <h1 class="category-title-ar">{{ $category->getNameInLanguage('ar') }}</h1>
            <h1 class="category-title">{{ $category->getNameInLanguage('en') }}</h1>
        </div>

        <!-- Category Navigation -->
        <div class="category-nav">
            <div class="nav-pills d-flex">
                @php
                    $allCategories = App\Models\Category::active()->ordered()->get();
                @endphp
                @foreach($allCategories as $cat)
                    <a href="{{ route('menu.category', $cat->id) }}" 
                       class="nav-pill {{ $cat->id == $category->id ? 'active' : '' }}">
                        {{ $cat->getNameInLanguage('ar') }}
                    </a>
                @endforeach
            </div>
        </div>

        @if($category->activeMenuItems->count() > 0)
            <div class="menu-items-section">
                @foreach($category->activeMenuItems as $item)
                    <div class="menu-item">
                        <div class="item-content">
                            <div class="item-name-ar">{{ $item->name_ar ?: $item->getNameInLanguage('ar') }}</div>
                            <div class="item-price"><span class="egp-suffix">جنيه</span>{{ number_format($item->price, 0) }}<span class="egp-suffix">EGP</span></div>
                            <div class="item-name-en">{{ $item->getNameInLanguage('en') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-items">
                <i class="fas fa-coffee"></i>
                <h3>لا توجد عناصر متاحة</h3>
                <h4 style="color: #d4af37;">No Items Available</h4>
                <p>هذه الفئة لا تحتوي على أي عناصر متاحة في الوقت الحالي.</p>
                <p>This category doesn't have any available items at the moment.</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 