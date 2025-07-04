<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::ordered()->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('categories', 'public');
        }

        Category::create($data);

        $message = app()->getLocale() === 'ar' ? 'تم إنشاء الفئة بنجاح.' : 'Category created successfully.';
        return redirect()->route('admin.categories.index')
            ->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($category->icon) {
                Storage::disk('public')->delete($category->icon);
            }
            $data['icon'] = $request->file('icon')->store('categories', 'public');
        }

        $category->update($data);

        $message = app()->getLocale() === 'ar' ? 'تم تحديث الفئة بنجاح.' : 'Category updated successfully.';
        return redirect()->route('admin.categories.index')
            ->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Delete icon if exists
        if ($category->icon) {
            Storage::disk('public')->delete($category->icon);
        }

        $category->delete();

        $message = app()->getLocale() === 'ar' ? 'تم حذف الفئة بنجاح.' : 'Category deleted successfully.';
        return redirect()->route('admin.categories.index')
            ->with('success', $message);
    }
}
