<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OB LA DI Café - Menu</title>
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

        .cafe-header {
            text-align: center;
            padding: 4rem 0 2rem;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7));
        }

        .cafe-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .cafe-title-ar {
            font-family: 'Noto Sans Arabic', sans-serif;
            font-size: 2.5rem;
            font-weight: 600;
            color: #d4af37;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .menu-subtitle {
            font-size: 1.2rem;
            letter-spacing: 0.3em;
            color: #cccccc;
            font-weight: 300;
            margin-bottom: 0;
        }

        .menu-subtitle::before,
        .menu-subtitle::after {
            content: "—";
            margin: 0 20px;
            color: #d4af37;
        }

        .categories-grid {
            padding: 3rem 0;
        }

        .category-card {
            position: relative;
            height: 300px;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s ease;
            margin-bottom: 2rem;
            background: #222;
            border: 2px solid transparent;
        }

        .category-card:hover {
            transform: translateY(-10px);
            border-color: #d4af37;
            box-shadow: 0 15px 30px rgba(212, 175, 55, 0.3);
        }

        .category-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .category-card:hover .category-image {
            transform: scale(1.1);
        }

        .category-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.6), rgba(0,0,0,0.4));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            transition: all 0.4s ease;
        }

        .category-card:hover .category-overlay {
            background: linear-gradient(135deg, rgba(212,175,55,0.8), rgba(0,0,0,0.6));
        }

        .category-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
        }

        .category-title-ar {
            font-family: 'Noto Sans Arabic', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: #d4af37;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
        }

        .category-btn {
            background: transparent;
            border: 2px solid white;
            color: white;
            padding: 12px 30px;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            border-radius: 25px;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .category-card:hover .category-btn {
            background: white;
            color: #000;
            transform: scale(1.05);
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

        .no-categories {
            text-align: center;
            padding: 5rem 0;
            color: #ccc;
        }

        .no-categories i {
            font-size: 4rem;
            color: #d4af37;
            margin-bottom: 2rem;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .cafe-title {
                font-size: 2.5rem;
            }
            
            .cafe-title-ar {
                font-size: 2rem;
            }
            
            .category-title {
                font-size: 1.5rem;
            }
            
            .category-title-ar {
                font-size: 1.2rem;
            }
            
            .cafe-logo {
                width: 80px;
                height: 80px;
                bottom: 20px;
                left: 20px;
            }
            
            .contact-info {
                display: none;
            }
        }

        /* Grid layout */
        .categories-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        @media (max-width: 500px) {
            .categories-container {
                grid-template-columns: 1fr;
                padding: 0 1rem;
            }
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

    <div class="container-fluid">
        <!-- Header -->
        <div class="cafe-header">
            <h1 class="cafe-title-ar">مرحباً بكم في مقهى أوب لا دي</h1>
            <h1 class="cafe-title">Welcome to OB LA DI Café</h1>
            <p class="menu-subtitle">قائمة الطعام - M E N U S</p>
        </div>

        @if($categories->count() > 0)
            <div class="categories-grid">
                <div class="categories-container">
                    @foreach($categories as $category)
                        <div class="category-card" onclick="window.location.href='{{ route('menu.category', $category->id) }}'">
                            @if($category->icon)
                                <img src="{{ asset($category->icon) }}" 
                                     alt="{{ $category->getNameInLanguage('ar') }}" 
                                     class="category-image">
                            @else
                                <div class="category-image" style="background: linear-gradient(135deg, #333, #666);"></div>
                            @endif
                            
                            <div class="category-overlay">
                                <h2 class="category-title-ar">{{ $category->getNameInLanguage('ar') }}</h2>
                                <h2 class="category-title">{{ $category->getNameInLanguage('en') }}</h2>
                                <button class="category-btn">اذهب للقائمة - GO TO MENU</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="no-categories">
                <div class="container">
                    <i class="fas fa-coffee"></i>
                    <h3>قائمة الطعام قريباً</h3>
                    <h3>Menu Coming Soon</h3>
                    <p>ستكون قائمة الطعام اللذيذة متاحة قريباً.</p>
                    <p>Our delicious menu categories will be available shortly.</p>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 