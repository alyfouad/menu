@extends('admin.layout')

@section('title', app()->getLocale() === 'ar' ? 'لوحة التحكم' : 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ App\Models\Category::count() }}</h4>
                        <p class="card-text">{{ app()->getLocale() === 'ar' ? 'إجمالي الفئات' : 'Total Categories' }}</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-tags fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ App\Models\MenuItem::count() }}</h4>
                        <p class="card-text">{{ app()->getLocale() === 'ar' ? 'إجمالي عناصر القائمة' : 'Total Menu Items' }}</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-utensils fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ App\Models\Category::active()->count() }}</h4>
                        <p class="card-text">{{ app()->getLocale() === 'ar' ? 'الفئات النشطة' : 'Active Categories' }}</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ App\Models\MenuItem::active()->count() }}</h4>
                        <p class="card-text">{{ app()->getLocale() === 'ar' ? 'عناصر القائمة النشطة' : 'Active Menu Items' }}</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-star fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'الإجراءات السريعة' : 'Quick Actions' }}</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>{{ app()->getLocale() === 'ar' ? 'إضافة فئة جديدة' : 'Add New Category' }}
                    </a>
                    <a href="{{ route('admin.menu-items.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>{{ app()->getLocale() === 'ar' ? 'إضافة عنصر جديد للقائمة' : 'Add New Menu Item' }}
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-info" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i>{{ app()->getLocale() === 'ar' ? 'عرض واجهة القائمة' : 'View Menu Frontend' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'النشاط الحديث' : 'Recent Activity' }}</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @php
                        $recentItems = App\Models\MenuItem::with('category')->latest()->take(5)->get();
                    @endphp
                    @forelse($recentItems as $item)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $item->name }}</strong>
                                <br>
                                <small class="text-muted">{{ $item->category->name ?? (app()->getLocale() === 'ar' ? 'بدون فئة' : 'No Category') }}</small>
                            </div>
                            <span class="badge bg-primary rounded-pill">${{ number_format($item->price, 2) }}</span>
                        </div>
                    @empty
                        <div class="list-group-item">
                            <p class="text-muted mb-0">
                                {{ app()->getLocale() === 'ar' ? 'لا توجد عناصر في القائمة بعد.' : 'No menu items yet.' }}
                                <a href="{{ route('admin.menu-items.create') }}">{{ app()->getLocale() === 'ar' ? 'أنشئ واحد الآن!' : 'Create one now!' }}</a>
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'نظرة عامة على الفئات' : 'Categories Overview' }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ app()->getLocale() === 'ar' ? 'الفئة' : 'Category' }}</th>
                                <th>{{ app()->getLocale() === 'ar' ? 'عدد العناصر' : 'Items Count' }}</th>
                                <th>{{ app()->getLocale() === 'ar' ? 'الحالة' : 'Status' }}</th>
                                <th>{{ app()->getLocale() === 'ar' ? 'الإجراءات' : 'Actions' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $categories = App\Models\Category::withCount('menuItems')->ordered()->get();
                            @endphp
                            @forelse($categories as $category)
                                <tr>
                                    <td>
                                        <strong>{{ $category->name }}</strong>
                                        @if($category->description)
                                            <br><small class="text-muted">{{ Str::limit($category->description, 50) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $category->menu_items_count }} {{ app()->getLocale() === 'ar' ? 'عناصر' : 'items' }}</span>
                                    </td>
                                    <td>
                                        @if($category->is_active)
                                            <span class="badge bg-success">{{ app()->getLocale() === 'ar' ? 'نشط' : 'Active' }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ app()->getLocale() === 'ar' ? 'غير نشط' : 'Inactive' }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">{{ app()->getLocale() === 'ar' ? 'تعديل' : 'Edit' }}</a>
                                        <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-sm btn-outline-info">{{ app()->getLocale() === 'ar' ? 'عرض' : 'View' }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        {{ app()->getLocale() === 'ar' ? 'لم يتم العثور على أي فئات.' : 'No categories found.' }}
                                        <a href="{{ route('admin.categories.create') }}">{{ app()->getLocale() === 'ar' ? 'أنشئ فئتك الأولى!' : 'Create your first category!' }}</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 