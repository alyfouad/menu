<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with('activeMenuItems')->active()->ordered()->get();
        return view('menu.index', compact('categories'));
    }

    public function category($id)
    {
        $category = Category::with('activeMenuItems')->active()->findOrFail($id);
        return view('menu.category', compact('category'));
    }

    public function item($id)
    {
        $menuItem = MenuItem::with('category')->active()->findOrFail($id);
        return view('menu.item', compact('menuItem'));
    }
}
