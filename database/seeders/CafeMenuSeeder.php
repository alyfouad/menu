<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\MenuItem;

class CafeMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Categories
        $categories = [
            [
                'name' => 'Hot Drinks',
                'name_ar' => 'المشروبات الساخنة',
                'description' => 'Fresh brewed coffee, tea, and hot beverages',
                'description_ar' => 'قهوة طازجة مخمرة وشاي ومشروبات ساخنة',
                'order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'Smoothies',
                'name_ar' => 'السموذي',
                'description' => 'Fresh fruit smoothies blended to perfection',
                'description_ar' => 'سموذي الفواكه الطازجة المخلوطة بالكمال',
                'order' => 2,
                'is_active' => true
            ],
            [
                'name' => 'Fresh Juice',
                'name_ar' => 'العصائر الطازجة',
                'description' => 'Freshly squeezed natural fruit juices',
                'description_ar' => 'عصائر الفواكه الطبيعية المعصورة طازجة',
                'order' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Milk Shake',
                'name_ar' => 'الميلك شيك',
                'description' => 'Creamy milkshakes with various flavors',
                'description_ar' => 'ميلك شيك كريمي بنكهات مختلفة',
                'order' => 4,
                'is_active' => true
            ],
            [
                'name' => 'Desserts',
                'name_ar' => 'الحلويات',
                'description' => 'Sweet treats and delicious desserts',
                'description_ar' => 'حلويات لذيذة ومعجنات حلوة',
                'order' => 5,
                'is_active' => true
            ],
            [
                'name' => 'Breakfast',
                'name_ar' => 'الفطار',
                'description' => 'Healthy breakfast options to start your day',
                'description_ar' => 'خيارات فطار صحية لبداية يومك',
                'order' => 6,
                'is_active' => true
            ]
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Get created categories
        $hotDrinks = Category::where('name', 'Hot Drinks')->first();
        $smoothies = Category::where('name', 'Smoothies')->first();
        $freshJuice = Category::where('name', 'Fresh Juice')->first();
        $milkShake = Category::where('name', 'Milk Shake')->first();
        $desserts = Category::where('name', 'Desserts')->first();
        $breakfast = Category::where('name', 'Breakfast')->first();

        // Hot Drinks Menu Items
        $hotDrinksItems = [
            ['name' => 'Espresso', 'name_ar' => 'إسبريسو', 'price' => 25, 'description' => 'Strong black coffee shot', 'description_ar' => 'قهوة سوداء قوية'],
            ['name' => 'Cappuccino', 'name_ar' => 'كابتشينو', 'price' => 30, 'description' => 'Espresso with steamed milk foam', 'description_ar' => 'إسبريسو مع رغوة الحليب المبخر'],
            ['name' => 'Latte', 'name_ar' => 'لاتيه', 'price' => 32, 'description' => 'Espresso with steamed milk', 'description_ar' => 'إسبريسو مع الحليب المبخر'],
            ['name' => 'Mocha', 'name_ar' => 'موكا', 'price' => 35, 'description' => 'Espresso with chocolate and steamed milk', 'description_ar' => 'إسبريسو مع الشوكولاتة والحليب المبخر'],
            ['name' => 'Turkish Coffee', 'name_ar' => 'قهوة تركية', 'price' => 20, 'description' => 'Traditional Turkish coffee', 'description_ar' => 'قهوة تركية تقليدية'],
            ['name' => 'Hot Chocolate', 'name_ar' => 'شوكولاتة ساخنة', 'price' => 28, 'description' => 'Rich hot chocolate drink', 'description_ar' => 'مشروب شوكولاتة ساخنة غني'],
            ['name' => 'Green Tea', 'name_ar' => 'شاي أخضر', 'price' => 18, 'description' => 'Healthy green tea', 'description_ar' => 'شاي أخضر صحي'],
            ['name' => 'Earl Grey Tea', 'name_ar' => 'شاي إيرل جراي', 'price' => 20, 'description' => 'Classic Earl Grey black tea', 'description_ar' => 'شاي إيرل جراي الأسود الكلاسيكي']
        ];

        // Smoothies Menu Items
        $smoothiesItems = [
            ['name' => 'Mango Smoothie', 'name_ar' => 'سموذي مانجو', 'price' => 35, 'description' => 'Fresh mango blended smoothie', 'description_ar' => 'سموذي مانجو طازج مخلوط'],
            ['name' => 'Guava Smoothie', 'name_ar' => 'سموذي جوافة', 'price' => 35, 'description' => 'Tropical guava smoothie', 'description_ar' => 'سموذي جوافة استوائي'],
            ['name' => 'Orange Smoothie', 'name_ar' => 'سموذي برتقال', 'price' => 35, 'description' => 'Vitamin C rich orange smoothie', 'description_ar' => 'سموذي برتقال غني بفيتامين سي'],
            ['name' => 'Strawberry Smoothie', 'name_ar' => 'فراولة سموذي', 'price' => 35, 'description' => 'Sweet strawberry smoothie', 'description_ar' => 'سموذي فراولة حلو'],
            ['name' => 'Watermelon Smoothie', 'name_ar' => 'سموذي بطيخ', 'price' => 35, 'description' => 'Refreshing watermelon smoothie', 'description_ar' => 'سموذي بطيخ منعش'],
            ['name' => 'Lemon Mint Smoothie', 'name_ar' => 'سموذي ليمون بالنعناع', 'price' => 35, 'description' => 'Zesty lemon mint smoothie', 'description_ar' => 'سموذي ليمون بالنعناع منعش'],
            ['name' => 'Kiwi Smoothie', 'name_ar' => 'سموذي كيوي', 'price' => 35, 'description' => 'Exotic kiwi fruit smoothie', 'description_ar' => 'سموذي فاكهة الكيوي الاستوائية'],
            ['name' => 'Watermelon Mint Smoothie', 'name_ar' => 'سموذي بطيخ بالنعناع', 'price' => 35, 'description' => 'Watermelon with fresh mint', 'description_ar' => 'بطيخ مع النعناع الطازج'],
            ['name' => 'Blue berry Smoothie', 'name_ar' => 'سموذي بلوبيري', 'price' => 35, 'description' => 'Antioxidant rich blueberry smoothie', 'description_ar' => 'سموذي التوت الأزرق الغني بمضادات الأكسدة']
        ];

        // Fresh Juice Menu Items
        $freshJuiceItems = [
            ['name' => 'Orange Juice', 'name_ar' => 'عصير برتقال', 'price' => 30, 'description' => 'Freshly squeezed orange juice', 'description_ar' => 'عصير برتقال طازج معصور'],
            ['name' => 'Apple Juice', 'name_ar' => 'عصير تفاح', 'price' => 28, 'description' => 'Pure apple juice', 'description_ar' => 'عصير تفاح خالص'],
            ['name' => 'Carrot Juice', 'name_ar' => 'عصير جزر', 'price' => 25, 'description' => 'Healthy carrot juice', 'description_ar' => 'عصير جزر صحي'],
            ['name' => 'Pomegranate Juice', 'name_ar' => 'عصير رمان', 'price' => 40, 'description' => 'Antioxidant rich pomegranate juice', 'description_ar' => 'عصير رمان غني بمضادات الأكسدة'],
            ['name' => 'Lemon Juice', 'name_ar' => 'عصير ليمون', 'price' => 22, 'description' => 'Fresh lemon juice', 'description_ar' => 'عصير ليمون طازج'],
            ['name' => 'Watermelon Juice', 'name_ar' => 'عصير بطيخ', 'price' => 26, 'description' => 'Refreshing watermelon juice', 'description_ar' => 'عصير بطيخ منعش'],
            ['name' => 'Guava Juice', 'name_ar' => 'عصير جوافة', 'price' => 32, 'description' => 'Tropical guava juice', 'description_ar' => 'عصير جوافة استوائي'],
            ['name' => 'Mango Juice', 'name_ar' => 'عصير مانجو', 'price' => 35, 'description' => 'Sweet mango juice', 'description_ar' => 'عصير مانجو حلو']
        ];

        // Milk Shake Menu Items
        $milkShakeItems = [
            ['name' => 'Vanilla Milk Shake', 'name_ar' => 'ميلك شيك فانيليا', 'price' => 40, 'description' => 'Classic vanilla milkshake', 'description_ar' => 'ميلك شيك فانيليا كلاسيكي'],
            ['name' => 'Chocolate Milk Shake', 'name_ar' => 'ميلك شيك شوكولاتة', 'price' => 42, 'description' => 'Rich chocolate milkshake', 'description_ar' => 'ميلك شيك شوكولاتة غني'],
            ['name' => 'Strawberry Milk Shake', 'name_ar' => 'ميلك شيك فراولة', 'price' => 45, 'description' => 'Fresh strawberry milkshake', 'description_ar' => 'ميلك شيك فراولة طازج'],
            ['name' => 'Banana Milk Shake', 'name_ar' => 'ميلك شيك موز', 'price' => 38, 'description' => 'Creamy banana milkshake', 'description_ar' => 'ميلك شيك موز كريمي'],
            ['name' => 'Oreo Milk Shake', 'name_ar' => 'ميلك شيك أوريو', 'price' => 50, 'description' => 'Cookies and cream milkshake', 'description_ar' => 'ميلك شيك بسكويت وكريمة'],
            ['name' => 'Nutella Milk Shake', 'name_ar' => 'ميلك شيك نوتيلا', 'price' => 55, 'description' => 'Hazelnut chocolate milkshake', 'description_ar' => 'ميلك شيك شوكولاتة بالبندق']
        ];

        // Desserts Menu Items
        $dessertsItems = [
            ['name' => 'Chocolate Cake', 'name_ar' => 'كيك شوكولاتة', 'price' => 45, 'description' => 'Rich chocolate layer cake', 'description_ar' => 'كيك شوكولاتة طبقات غني'],
            ['name' => 'Cheesecake', 'name_ar' => 'تشيز كيك', 'price' => 50, 'description' => 'New York style cheesecake', 'description_ar' => 'تشيز كيك على طراز نيويورك'],
            ['name' => 'Tiramisu', 'name_ar' => 'تيراميسو', 'price' => 55, 'description' => 'Italian coffee-flavored dessert', 'description_ar' => 'حلوى إيطالية بطعم القهوة'],
            ['name' => 'Brownies', 'name_ar' => 'براونيز', 'price' => 35, 'description' => 'Fudgy chocolate brownies', 'description_ar' => 'براونيز شوكولاتة فدجي'],
            ['name' => 'Ice Cream Scoop', 'name_ar' => 'كرة آيس كريم', 'price' => 20, 'description' => 'Single scoop of ice cream', 'description_ar' => 'كرة واحدة من الآيس كريم'],
            ['name' => 'Fruit Salad', 'name_ar' => 'سلطة فواكه', 'price' => 30, 'description' => 'Fresh mixed fruit salad', 'description_ar' => 'سلطة فواكه مشكلة طازجة']
        ];

        // Breakfast Menu Items
        $breakfastItems = [
            ['name' => 'Pancakes', 'name_ar' => 'بان كيك', 'price' => 45, 'description' => 'Fluffy pancakes with syrup', 'description_ar' => 'بان كيك رقيق مع الشراب'],
            ['name' => 'French Toast', 'name_ar' => 'توست فرنسي', 'price' => 40, 'description' => 'Classic French toast', 'description_ar' => 'توست فرنسي كلاسيكي'],
            ['name' => 'Eggs Benedict', 'name_ar' => 'بيض بنديكت', 'price' => 55, 'description' => 'Poached eggs with hollandaise sauce', 'description_ar' => 'بيض مسلوق مع صوص هولنديز'],
            ['name' => 'Avocado Toast', 'name_ar' => 'توست أفوكادو', 'price' => 38, 'description' => 'Toasted bread with fresh avocado', 'description_ar' => 'خبز محمص مع أفوكادو طازج'],
            ['name' => 'Granola Bowl', 'name_ar' => 'بول جرانولا', 'price' => 35, 'description' => 'Healthy granola with yogurt and fruits', 'description_ar' => 'جرانولا صحية مع الزبادي والفواكه'],
            ['name' => 'Croissant', 'name_ar' => 'كرواسون', 'price' => 25, 'description' => 'Buttery French croissant', 'description_ar' => 'كرواسون فرنسي بالزبدة']
        ];

        // Create menu items for each category
        foreach ($hotDrinksItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $hotDrinks->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($smoothiesItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $smoothies->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($freshJuiceItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $freshJuice->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($milkShakeItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $milkShake->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($dessertsItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $desserts->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($breakfastItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $breakfast->id, 'is_active' => true, 'order' => 0]));
        }
    }
} 