<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\MenuItem;

class ObLaDiMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate existing data
        MenuItem::truncate();
        Category::truncate();

        // Categories from the HTML file
        $categories = [
            [
                'name' => 'Hot Drinks',
                'name_ar' => 'المشروبات الساخنة',
                'description' => 'Hot coffee, tea, and warm beverages',
                'description_ar' => 'قهوة ساخنة وشاي ومشروبات دافئة',
                'order' => 1,
                'is_active' => true,
                'icon' => 'images/categories/hotdrinks.jpeg'
            ],
            [
                'name' => 'Smoothies',
                'name_ar' => 'السموذي',
                'description' => 'Fresh fruit smoothies blended to perfection',
                'description_ar' => 'سموذي الفواكه الطازجة المخلوطة بالكمال',
                'order' => 2,
                'is_active' => true,
                'icon' => 'images/categories/smoothies.jpeg'
            ],
            [
                'name' => 'Fresh Juice',
                'name_ar' => 'العصائر الطازجة',
                'description' => 'Freshly squeezed natural fruit juices',
                'description_ar' => 'عصائر الفواكه الطبيعية المعصورة طازجة',
                'order' => 3,
                'is_active' => true,
                'icon' => 'images/categories/freshjuice.jpeg'
            ],
            [
                'name' => 'Milk Shake',
                'name_ar' => 'الميلك شيك',
                'description' => 'Creamy milkshakes with various flavors',
                'description_ar' => 'ميلك شيك كريمي بنكهات مختلفة',
                'order' => 4,
                'is_active' => true,
                'icon' => 'images/categories/milkshake.jpeg'
            ],
            [
                'name' => 'Frappes',
                'name_ar' => 'الفرابيه',
                'description' => 'Iced coffee drinks with various flavors',
                'description_ar' => 'مشروبات القهوة المثلجة بنكهات مختلفة',
                'order' => 5,
                'is_active' => true,
                'icon' => 'images/categories/frappes.jpeg'
            ],
            [
                'name' => 'Desserts',
                'name_ar' => 'الحلويات',
                'description' => 'Sweet treats and delicious desserts',
                'description_ar' => 'حلويات لذيذة ومعجنات حلوة',
                'order' => 6,
                'is_active' => true,
                'icon' => 'images/categories/dessert.jpeg'
            ],
            [
                'name' => 'Breakfast',
                'name_ar' => 'الفطار',
                'description' => 'Morning breakfast options',
                'description_ar' => 'خيارات الفطار الصباحي',
                'order' => 7,
                'is_active' => true,
                'icon' => 'images/categories/breakfast.jpeg'
            ],
            [
                'name' => 'Sandwiches',
                'name_ar' => 'الساندويتشات',
                'description' => 'Delicious sandwiches and burgers',
                'description_ar' => 'ساندويتشات وبرجر لذيذ',
                'order' => 8,
                'is_active' => true,
                'icon' => 'images/categories/sandwiches.jpeg'
            ],
            [
                'name' => 'Chocolate',
                'name_ar' => 'الشوكولاتة',
                'description' => 'Premium chocolate bars and treats',
                'description_ar' => 'ألواح شوكولاتة فاخرة وحلويات',
                'order' => 9,
                'is_active' => true,
                'icon' => 'images/categories/chocolate.jpeg'
            ],
            [
                'name' => 'Cocktails',
                'name_ar' => 'الكوكتيلات',
                'description' => 'Refreshing fruit cocktails',
                'description_ar' => 'كوكتيلات الفواكه المنعشة',
                'order' => 10,
                'is_active' => true,
                'icon' => 'images/categories/cocktails.jpeg'
            ],
            [
                'name' => 'Soft Drinks',
                'name_ar' => 'المشروبات الغازية',
                'description' => 'Carbonated drinks and beverages',
                'description_ar' => 'مشروبات غازية ومشروبات منعشة',
                'order' => 11,
                'is_active' => true,
                'icon' => 'images/categories/softdrinks.jpeg'
            ],
            [
                'name' => 'Ice',
                'name_ar' => 'المشروبات المثلجة',
                'description' => 'Iced drinks and cold beverages',
                'description_ar' => 'مشروبات مثلجة وباردة',
                'order' => 12,
                'is_active' => true,
                'icon' => 'images/categories/ice.jpeg'
            ],
            [
                'name' => 'Add Ons',
                'name_ar' => 'الإضافات',
                'description' => 'Extra toppings and add-ons',
                'description_ar' => 'إضافات وتوابل إضافية',
                'order' => 13,
                'is_active' => true,
                'icon' => 'images/categories/addons.jpeg'
            ]
        ];

        // Create categories
        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Get created categories
        $hotDrinks = Category::where('name', 'Hot Drinks')->first();
        $smoothies = Category::where('name', 'Smoothies')->first();
        $freshJuice = Category::where('name', 'Fresh Juice')->first();
        $milkShake = Category::where('name', 'Milk Shake')->first();
        $frappes = Category::where('name', 'Frappes')->first();
        $desserts = Category::where('name', 'Desserts')->first();
        $breakfast = Category::where('name', 'Breakfast')->first();
        $sandwiches = Category::where('name', 'Sandwiches')->first();
        $chocolate = Category::where('name', 'Chocolate')->first();
        $cocktails = Category::where('name', 'Cocktails')->first();
        $softDrinks = Category::where('name', 'Soft Drinks')->first();
        $ice = Category::where('name', 'Ice')->first();
        $addOns = Category::where('name', 'Add Ons')->first();

        // Hot Drinks Menu Items
        $hotDrinksItems = [
            ['name' => 'Hot Chocolate', 'name_ar' => 'هوت شوكليت', 'price' => 25],
            ['name' => 'Hot Chocolate Marshmello', 'name_ar' => 'هوت شوكليت مارشميلو', 'price' => 30],
            ['name' => 'Hot Oreo', 'name_ar' => 'هوت اوريو', 'price' => 30],
            ['name' => 'Hot Oreo Marshmello', 'name_ar' => 'هوت اوريو مارشميلو', 'price' => 35],
            ['name' => 'Hot Chocolate Sudanese', 'name_ar' => 'هوت شوكليت سوداني', 'price' => 25],
            ['name' => 'Hot Sidar', 'name_ar' => 'هوت سيدر', 'price' => 25],
            ['name' => 'Sahlap Nuts', 'name_ar' => 'سحلب مكسرات', 'price' => 35],
            ['name' => 'Sahlap Fruit', 'name_ar' => 'سحلب فواكه', 'price' => 40],
            ['name' => 'Sahlap Chocolate', 'name_ar' => 'سحلب شكولاته', 'price' => 30],
            ['name' => 'Sahlap Oreo', 'name_ar' => 'سحلب اوريو', 'price' => 35],
            ['name' => 'Homs El Sham', 'name_ar' => 'حمص الشام', 'price' => 25],
            ['name' => 'Cinnamon Milk', 'name_ar' => 'قرفة بالحليب', 'price' => 25],
            ['name' => 'Cinnamon Nutella', 'name_ar' => 'قرفه بالنوتيلا', 'price' => 30],
            ['name' => 'Tea', 'name_ar' => 'شاي', 'price' => 12],
            ['name' => 'Tea Flavors', 'name_ar' => 'شاي نكهات', 'price' => 17],
            ['name' => 'Herbal Cocktail', 'name_ar' => 'كوكتيل اعشاب', 'price' => 25],
            ['name' => 'Hot Lemon', 'name_ar' => 'ليمون ساخن', 'price' => 12],
            ['name' => 'Espresso S', 'name_ar' => 'اسبرسو S', 'price' => 20],
            ['name' => 'Espresso D', 'name_ar' => 'اسبرسو D', 'price' => 25],
            ['name' => 'Cappuccino', 'name_ar' => 'كابتشينو', 'price' => 30],
            ['name' => 'Latte', 'name_ar' => 'لاتيه', 'price' => 30],
            ['name' => 'Mocha', 'name_ar' => 'موكا', 'price' => 32],
            ['name' => 'Macchiato S', 'name_ar' => 'ميكاتو S', 'price' => 30],
            ['name' => 'Macchiato D', 'name_ar' => 'ميكاتو D', 'price' => 35],
            ['name' => 'White Mocha', 'name_ar' => 'وايت موكا', 'price' => 30],
            ['name' => 'American Coffee', 'name_ar' => 'اميركان كوفي', 'price' => 30],
            ['name' => 'Nescafe', 'name_ar' => 'نيسكافيه', 'price' => 35],
            ['name' => 'Ristretto', 'name_ar' => 'ريسترتو', 'price' => 25],
            ['name' => 'Turkish Coffee S', 'name_ar' => 'قهوة تركي S', 'price' => 15],
            ['name' => 'Turkish Coffee D', 'name_ar' => 'قهوة تركي D', 'price' => 20],
            ['name' => 'French Coffee', 'name_ar' => 'قهوة فرنساوي', 'price' => 30],
            ['name' => 'Hazelnut Coffee', 'name_ar' => 'قهوة بندق', 'price' => 25],
            ['name' => 'Nutella Coffee', 'name_ar' => 'قهوة نوتيلا', 'price' => 25],
        ];

        // Smoothies Menu Items
        $smoothiesItems = [
            ['name' => 'Mango Smoothie', 'name_ar' => 'سموزي مانجو', 'price' => 35],
            ['name' => 'Guava Smoothie', 'name_ar' => 'سموزي جوافه', 'price' => 35],
            ['name' => 'Orange Smoothie', 'name_ar' => 'سموزي برتقال', 'price' => 35],
            ['name' => 'Strawberry Smoothie', 'name_ar' => 'فراوله سموزي', 'price' => 35],
            ['name' => 'Watermelon Smoothie', 'name_ar' => 'سموزي بطيخ', 'price' => 35],
            ['name' => 'Lemon Mint Smoothie', 'name_ar' => 'سموزي ليمون بالنعناع', 'price' => 35],
            ['name' => 'Kiwi Smoothie', 'name_ar' => 'سموزي كيوي', 'price' => 35],
            ['name' => 'Watermelon Mint Smoothie', 'name_ar' => 'سموزي بطيخ بالنعناع', 'price' => 35],
            ['name' => 'Blue berry Smoothie', 'name_ar' => 'سموزي بلوبيري', 'price' => 35],
            ['name' => 'Passion fruit Smoothie', 'name_ar' => 'سموزي بلوباشون', 'price' => 35],
            ['name' => 'Pineapple Smoothie', 'name_ar' => 'سموزي اناناس', 'price' => 35],
        ];

        // Fresh Juice Menu Items
        $freshJuiceItems = [
            ['name' => 'Mango', 'name_ar' => 'مانجو', 'price' => 32],
            ['name' => 'Guava', 'name_ar' => 'جوافة', 'price' => 30],
            ['name' => 'Orange', 'name_ar' => 'برتقال', 'price' => 30],
            ['name' => 'Strawberry', 'name_ar' => 'فراولة', 'price' => 30],
            ['name' => 'Watermelon', 'name_ar' => 'بطيخ', 'price' => 30],
            ['name' => 'Kiwi', 'name_ar' => 'كيوي', 'price' => 30],
            ['name' => 'Avocado', 'name_ar' => 'أفوكادو', 'price' => 32],
            ['name' => 'Banana with Milk', 'name_ar' => 'موز باللبن', 'price' => 32],
            ['name' => 'Lemon', 'name_ar' => 'ليمون', 'price' => 30],
            ['name' => 'Lemon Mint', 'name_ar' => 'ليمون بالنعناع', 'price' => 28],
            ['name' => 'Watermelon mint', 'name_ar' => 'بطيخ بالنعناع', 'price' => 32],
            ['name' => 'Guava Mint', 'name_ar' => 'جوافة بالنعناع', 'price' => 32],
            ['name' => 'Yogurt with Honey', 'name_ar' => 'زبادي بالعسل', 'price' => 25],
            ['name' => 'Fruit Yogurt', 'name_ar' => 'زبادي فواكه', 'price' => 30],
        ];

        // Milk Shake Menu Items
        $milkShakeItems = [
            ['name' => 'Vanilla', 'name_ar' => 'فانيلا', 'price' => 30],
            ['name' => 'Chocolate', 'name_ar' => 'شوكليت', 'price' => 32],
            ['name' => 'Caramel', 'name_ar' => 'كاراميل', 'price' => 32],
            ['name' => 'Strawberry', 'name_ar' => 'فراوله', 'price' => 32],
            ['name' => 'Mango', 'name_ar' => 'مانجو', 'price' => 32],
            ['name' => 'Blue berry', 'name_ar' => 'بلوبيري', 'price' => 32],
            ['name' => 'Oreo', 'name_ar' => 'اوريو', 'price' => 32],
            ['name' => 'KitKat', 'name_ar' => 'كيتكات', 'price' => 32],
            ['name' => 'Snickers', 'name_ar' => 'سنيكرز', 'price' => 32],
            ['name' => 'Lotus', 'name_ar' => 'لوتس', 'price' => 32],
            ['name' => 'Nutella', 'name_ar' => 'نوتيلا', 'price' => 32],
        ];

        // Frappes Menu Items
        $frappesItems = [
            ['name' => 'Caramel Frappe', 'name_ar' => 'فراپيه كراميل', 'price' => 30],
            ['name' => 'Chocolate Frappe', 'name_ar' => 'فراپيه شوكولاتة', 'price' => 30],
            ['name' => 'Oreo Frappe', 'name_ar' => 'فراپيه أوريو', 'price' => 35],
            ['name' => 'Mocha Frappe', 'name_ar' => 'فراپيه موكا', 'price' => 35],
            ['name' => 'Maltesers Frappe', 'name_ar' => 'فراپيه مالتيزرز', 'price' => 35],
            ['name' => 'Snickers Frappe', 'name_ar' => 'فراپيه سنيكرز', 'price' => 40],
            ['name' => 'Kit Kat Frappe', 'name_ar' => 'فراپيه كيت كات', 'price' => 40],
            ['name' => 'Peanut Butter Frappe', 'name_ar' => 'فراپيه زبدة فول سوداني', 'price' => 40],
        ];

        // Desserts Menu Items
        $dessertsItems = [
            ['name' => 'Molten Cake', 'name_ar' => 'مولتن كيك', 'price' => 40],
            ['name' => 'Molten Cake Lotus', 'name_ar' => 'مولتن كيك لوتس', 'price' => 45],
            ['name' => 'Cheese Cake', 'name_ar' => 'تشيز كيك', 'price' => 30],
            ['name' => 'Chocolate Cake', 'name_ar' => 'كيكة شوكولاتة', 'price' => 30],
            ['name' => 'Brownies Cake', 'name_ar' => 'براونيز', 'price' => 30],
            ['name' => 'Red Velvet', 'name_ar' => 'ريد فلفت', 'price' => 30],
            ['name' => 'Nutella Jar', 'name_ar' => ' نوتيلا جار', 'price' => 45],
            ['name' => 'Ob La Di Ice Cream', 'name_ar' => 'ob la di ايسكريم', 'price' => 30],
            ['name' => 'Fruit Salad', 'name_ar' => 'سلطة فواكه', 'price' => 35],
            ['name' => 'Fruit Salad Ice', 'name_ar' => 'سلطة فواكه مثلجة', 'price' => 40],
        ];

        // Breakfast Menu Items
        $breakfastItems = [
            ['name' => 'Croissant', 'name_ar' => 'كرواسون', 'price' => 10],
            ['name' => 'Croissant Cheese', 'name_ar' => 'كرواسون جبنه', 'price' => 15],
            ['name' => 'Croissant Beef', 'name_ar' => 'كرواسون لحمه', 'price' => 20],
        ];

        // Sandwiches Menu Items
        $sandwichesItems = [
            ['name' => 'Burger', 'name_ar' => 'برجر', 'price' => 48],
            ['name' => 'Kofta', 'name_ar' => 'كفتة', 'price' => 45],
            ['name' => 'Pane', 'name_ar' => 'بانيه', 'price' => 30],
            ['name' => 'Strips', 'name_ar' => 'ستريبس', 'price' => 35],
            ['name' => 'Crispy', 'name_ar' => 'كرسبي', 'price' => 35],
            ['name' => 'Potatos', 'name_ar' => 'بطاطس', 'price' => 15],
        ];

        // Chocolate Menu Items
        $chocolateItems = [
            ['name' => 'Kit Kat', 'name_ar' => 'كيت كات', 'price' => 15],
            ['name' => 'Snickers', 'name_ar' => 'سنيكرز', 'price' => 15],
            ['name' => 'Moro', 'name_ar' => 'مورو', 'price' => 15],
            ['name' => 'Mars', 'name_ar' => 'مارس', 'price' => 15],
            ['name' => 'Galaxy', 'name_ar' => 'جالكسي', 'price' => 15],
            ['name' => 'Ferrero', 'name_ar' => 'فيريرو', 'price' => 30],
        ];

        // Cocktails Menu Items (no prices in original data)
        $cocktailsItems = [
            ['name' => 'Mango Banana', 'name_ar' => 'مانجو بالموز', 'price' => 40],
            ['name' => 'Blue Passion', 'name_ar' => 'بلو باشن', 'price' => 40],
            ['name' => 'Electric Soda', 'name_ar' => 'إلكتريك صودا', 'price' => 40],
            ['name' => 'Pina Colada', 'name_ar' => 'بينا كولادا', 'price' => 40],
            ['name' => 'Sun Shine', 'name_ar' => 'صن شاين', 'price' => 40],
            ['name' => 'Florida', 'name_ar' => 'فلوريدا', 'price' => 40],
        ];

        // Soft Drinks Menu Items
        $softDrinksItems = [
            ['name' => 'Water', 'name_ar' => 'مياه', 'price' => 7],
            ['name' => 'Soft Drinks', 'name_ar' => 'مشروبات غازية', 'price' => 15],
            ['name' => 'Schweppes Gold', 'name_ar' => 'شويبس جولد', 'price' => 18],
            ['name' => 'Fayrouz', 'name_ar' => 'فيروز', 'price' => 18],
            ['name' => 'Red Bull', 'name_ar' => 'ريد بول', 'price' => 40],
            ['name' => 'Power Horse', 'name_ar' => 'باور هورس', 'price' => 35],
            ['name' => 'Freez', 'name_ar' => 'فريز', 'price' => 35],
            ['name' => 'Cherry Cola', 'name_ar' => 'شيري كولا', 'price' => 25],
            ['name' => 'Mehtio 7 Up', 'name_ar' => 'مهيتيو 7 أب', 'price' => 25],
            ['name' => 'Mehtio Red Bull', 'name_ar' => 'مهيتيو ريد بول', 'price' => 45],
        ];

        // Ice Menu Items
        $iceItems = [
            ['name' => 'Ice Latte', 'name_ar' => 'آيس لاتيه', 'price' => 35],
            ['name' => 'Ice Mocha', 'name_ar' => 'آيس موكا', 'price' => 38],
            ['name' => 'Ice Chocolate', 'name_ar' => 'آيس شوكولاتة', 'price' => 30],
            ['name' => 'Ice Tea', 'name_ar' => 'آيس تي', 'price' => 25],
        ];

        // Add Ons Menu Items
        $addOnsItems = [
            ['name' => 'Whipped Cream', 'name_ar' => 'كريمة مخفوقة', 'price' => 5],
            ['name' => 'Nutella', 'name_ar' => 'نوتيلا', 'price' => 10],
            ['name' => 'Sauce', 'name_ar' => 'صوص', 'price' => 5],
            ['name' => 'Milk', 'name_ar' => 'حليب', 'price' => 5],
            ['name' => 'Nuts', 'name_ar' => 'مكسرات', 'price' => 10],
            ['name' => 'Ice Cream', 'name_ar' => 'آيس كريم', 'price' => 7],
            ['name' => 'Lotus', 'name_ar' => 'لوتس', 'price' => 7],
            ['name' => 'Lemon', 'name_ar' => 'ليمون', 'price' => 3],
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

        foreach ($frappesItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $frappes->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($dessertsItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $desserts->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($breakfastItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $breakfast->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($sandwichesItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $sandwiches->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($chocolateItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $chocolate->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($cocktailsItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $cocktails->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($softDrinksItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $softDrinks->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($iceItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $ice->id, 'is_active' => true, 'order' => 0]));
        }

        foreach ($addOnsItems as $item) {
            MenuItem::create(array_merge($item, ['category_id' => $addOns->id, 'is_active' => true, 'order' => 0]));
        }
    }
} 