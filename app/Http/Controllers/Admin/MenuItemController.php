<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menuItems = MenuItem::with('category')->ordered()->get();
        return view('admin.menu-items.index', compact('menuItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.menu-items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menu-items', 'public');
        }

        MenuItem::create($data);

        $message = app()->getLocale() === 'ar' ? 'تم إنشاء عنصر القائمة بنجاح.' : 'Menu item created successfully.';
        return redirect()->route('admin.menu-items.index')
            ->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItem $menuItem)
    {
        return view('admin.menu-items.show', compact('menuItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menuItem)
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.menu-items.edit', compact('menuItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($menuItem->image) {
                Storage::disk('public')->delete($menuItem->image);
            }
            $data['image'] = $request->file('image')->store('menu-items', 'public');
        }

        $menuItem->update($data);

        $message = app()->getLocale() === 'ar' ? 'تم تحديث عنصر القائمة بنجاح.' : 'Menu item updated successfully.';
        return redirect()->route('admin.menu-items.index')
            ->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        // Delete image if exists
        if ($menuItem->image) {
            Storage::disk('public')->delete($menuItem->image);
        }

        $menuItem->delete();

        $message = app()->getLocale() === 'ar' ? 'تم حذف عنصر القائمة بنجاح.' : 'Menu item deleted successfully.';
        return redirect()->route('admin.menu-items.index')
            ->with('success', $message);
    }
}
