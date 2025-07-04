<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\MenuItem;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories
        $categories = [
            [
                'name' => 'Breakfast',
                'description' => 'Start your day with our delicious breakfast options',
                'order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'Appetizers',
                'description' => 'Perfect starters to begin your meal',
                'order' => 2,
                'is_active' => true
            ],
            [
                'name' => 'Soups & Salads',
                'description' => 'Fresh and healthy options',
                'order' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Sandwiches',
                'description' => 'Gourmet sandwiches and burgers',
                'order' => 4,
                'is_active' => true
            ],
            [
                'name' => 'Pizza',
                'description' => 'Wood-fired authentic pizzas',
                'order' => 5,
                'is_active' => true
            ],
            [
                'name' => 'Pasta',
                'description' => 'Traditional Italian pasta dishes',
                'order' => 6,
                'is_active' => true
            ],
            [
                'name' => 'Main Course',
                'description' => 'Hearty main dishes',
                'order' => 7,
                'is_active' => true
            ],
            [
                'name' => 'Desserts',
                'description' => 'Sweet endings to your meal',
                'order' => 8,
                'is_active' => true
            ],
            [
                'name' => 'Beverages',
                'description' => 'Refreshing drinks and specialty coffees',
                'order' => 9,
                'is_active' => true
            ]
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create($categoryData);
            
            // Add menu items for each category
            $this->createMenuItemsForCategory($category);
        }
    }

    private function createMenuItemsForCategory(Category $category)
    {
        $menuItems = [];

        switch ($category->name) {
            case 'Breakfast':
                $menuItems = [
                    ['name' => 'Classic Eggs Benedict', 'description' => 'Poached eggs on English muffin with hollandaise sauce', 'price' => 14.99],
                    ['name' => 'Avocado Toast', 'description' => 'Smashed avocado on sourdough with feta and cherry tomatoes', 'price' => 12.99],
                    ['name' => 'Pancake Stack', 'description' => 'Fluffy pancakes with maple syrup and fresh berries', 'price' => 11.99],
                    ['name' => 'French Toast', 'description' => 'Brioche French toast with vanilla and cinnamon', 'price' => 13.99],
                ];
                break;

            case 'Appetizers':
                $menuItems = [
                    ['name' => 'Bruschetta Trio', 'description' => 'Three varieties: tomato basil, mushroom, and olive tapenade', 'price' => 9.99],
                    ['name' => 'Calamari Rings', 'description' => 'Crispy squid rings with marinara sauce', 'price' => 12.99],
                    ['name' => 'Cheese Board', 'description' => 'Selection of artisan cheeses with crackers and fruit', 'price' => 16.99],
                    ['name' => 'Chicken Wings', 'description' => 'Buffalo wings with blue cheese dip', 'price' => 11.99],
                ];
                break;

            case 'Soups & Salads':
                $menuItems = [
                    ['name' => 'Caesar Salad', 'description' => 'Romaine lettuce with parmesan, croutons, and Caesar dressing', 'price' => 10.99],
                    ['name' => 'Mediterranean Salad', 'description' => 'Mixed greens with feta, olives, and balsamic vinaigrette', 'price' => 12.99],
                    ['name' => 'Tomato Basil Soup', 'description' => 'Creamy tomato soup with fresh basil', 'price' => 7.99],
                    ['name' => 'Minestrone Soup', 'description' => 'Traditional Italian vegetable soup', 'price' => 8.99],
                ];
                break;

            case 'Sandwiches':
                $menuItems = [
                    ['name' => 'Classic Burger', 'description' => 'Beef patty with lettuce, tomato, and fries', 'price' => 15.99],
                    ['name' => 'Grilled Chicken Sandwich', 'description' => 'Marinated chicken breast with avocado and bacon', 'price' => 14.99],
                    ['name' => 'Club Sandwich', 'description' => 'Triple-decker with turkey, bacon, and vegetables', 'price' => 13.99],
                    ['name' => 'Veggie Wrap', 'description' => 'Hummus, vegetables, and greens in a spinach tortilla', 'price' => 11.99],
                ];
                break;

            case 'Pizza':
                $menuItems = [
                    ['name' => 'Margherita Pizza', 'description' => 'Tomato sauce, mozzarella, and fresh basil', 'price' => 16.99],
                    ['name' => 'Pepperoni Pizza', 'description' => 'Classic pepperoni with mozzarella cheese', 'price' => 18.99],
                    ['name' => 'Quattro Stagioni', 'description' => 'Four seasons pizza with ham, mushrooms, artichokes, and olives', 'price' => 21.99],
                    ['name' => 'Vegetarian Pizza', 'description' => 'Bell peppers, mushrooms, onions, and olives', 'price' => 19.99],
                ];
                break;

            case 'Pasta':
                $menuItems = [
                    ['name' => 'Spaghetti Carbonara', 'description' => 'Eggs, pancetta, parmesan, and black pepper', 'price' => 17.99],
                    ['name' => 'Fettuccine Alfredo', 'description' => 'Creamy parmesan sauce with fettuccine pasta', 'price' => 16.99],
                    ['name' => 'Penne Arrabbiata', 'description' => 'Spicy tomato sauce with garlic and chili', 'price' => 15.99],
                    ['name' => 'Lasagna', 'description' => 'Layered pasta with meat sauce and cheese', 'price' => 19.99],
                ];
                break;

            case 'Main Course':
                $menuItems = [
                    ['name' => 'Grilled Salmon', 'description' => 'Atlantic salmon with lemon herb butter', 'price' => 24.99],
                    ['name' => 'Ribeye Steak', 'description' => '12oz ribeye with garlic mashed potatoes', 'price' => 32.99],
                    ['name' => 'Chicken Parmesan', 'description' => 'Breaded chicken with marinara and mozzarella', 'price' => 21.99],
                    ['name' => 'Lamb Chops', 'description' => 'Herb-crusted lamb with rosemary jus', 'price' => 28.99],
                ];
                break;

            case 'Desserts':
                $menuItems = [
                    ['name' => 'Tiramisu', 'description' => 'Classic Italian coffee-flavored dessert', 'price' => 8.99],
                    ['name' => 'Chocolate Lava Cake', 'description' => 'Warm chocolate cake with molten center', 'price' => 9.99],
                    ['name' => 'Cheesecake', 'description' => 'New York style cheesecake with berry compote', 'price' => 7.99],
                    ['name' => 'Gelato Trio', 'description' => 'Three scoops of artisan gelato', 'price' => 6.99],
                ];
                break;

            case 'Beverages':
                $menuItems = [
                    ['name' => 'Espresso', 'description' => 'Rich Italian espresso', 'price' => 3.99],
                    ['name' => 'Cappuccino', 'description' => 'Espresso with steamed milk foam', 'price' => 4.99],
                    ['name' => 'Fresh Orange Juice', 'description' => 'Freshly squeezed orange juice', 'price' => 4.99],
                    ['name' => 'Italian Soda', 'description' => 'Sparkling water with fruit syrup', 'price' => 3.99],
                ];
                break;
        }

        foreach ($menuItems as $index => $itemData) {
            MenuItem::create([
                'name' => $itemData['name'],
                'description' => $itemData['description'],
                'price' => $itemData['price'],
                'category_id' => $category->id,
                'order' => $index + 1,
                'is_active' => true
            ]);
        }
    }
}
