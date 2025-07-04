@extends('admin.layout')

@section('title', app()->getLocale() === 'ar' ? 'تفاصيل عنصر القائمة' : 'Menu Item Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>{{ app()->getLocale() === 'ar' ? 'عنصر القائمة: ' . $menuItem->name : 'Menu Item: ' . $menuItem->name }}</h2>
    <div>
        <a href="{{ route('admin.menu-items.edit', $menuItem) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-2"></i>{{ app()->getLocale() === 'ar' ? 'تعديل' : 'Edit' }}
        </a>
        <a href="{{ route('admin.menu-items.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>{{ app()->getLocale() === 'ar' ? 'العودة لعناصر القائمة' : 'Back to Menu Items' }}
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'معلومات العنصر' : 'Item Information' }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if($menuItem->image)
                            <img src="{{ Storage::url($menuItem->image) }}" alt="{{ $menuItem->name }}" 
                                 class="img-fluid rounded shadow-sm">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center shadow-sm" 
                                 style="aspect-ratio: 1; min-height: 200px;">
                                <div class="text-center">
                                    <i class="fas fa-utensils fa-3x text-muted mb-2"></i>
                                    <p class="text-muted mb-0">{{ app()->getLocale() === 'ar' ? 'لا توجد صورة' : 'No Image' }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">{{ app()->getLocale() === 'ar' ? 'الاسم:' : 'Name:' }}</th>
                                <td><h5 class="mb-0">{{ $menuItem->name }}</h5></td>
                            </tr>
                            <tr>
                                <th>{{ app()->getLocale() === 'ar' ? 'الوصف:' : 'Description:' }}</th>
                                <td>{{ $menuItem->description ?: (app()->getLocale() === 'ar' ? 'لا يوجد وصف' : 'No description provided') }}</td>
                            </tr>
                            <tr>
                                <th>{{ app()->getLocale() === 'ar' ? 'السعر:' : 'Price:' }}</th>
                                <td><h4 class="text-success mb-0">${{ number_format($menuItem->price, 2) }}</h4></td>
                            </tr>
                            <tr>
                                <th>{{ app()->getLocale() === 'ar' ? 'الفئة:' : 'Category:' }}</th>
                                <td>
                                    @if($menuItem->category)
                                        <a href="{{ route('admin.categories.show', $menuItem->category) }}" 
                                           class="badge bg-info text-decoration-none fs-6">
                                            {{ $menuItem->category->name }}
                                        </a>
                                    @else
                                        <span class="badge bg-warning fs-6">{{ app()->getLocale() === 'ar' ? 'لا توجد فئة مخصصة' : 'No Category Assigned' }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>{{ app()->getLocale() === 'ar' ? 'ترتيب العرض:' : 'Display Order:' }}</th>
                                <td><span class="badge bg-secondary fs-6">{{ $menuItem->order }}</span></td>
                            </tr>
                            <tr>
                                <th>{{ app()->getLocale() === 'ar' ? 'الحالة:' : 'Status:' }}</th>
                                <td>
                                    @if($menuItem->is_active)
                                        <span class="badge bg-success fs-6">{{ app()->getLocale() === 'ar' ? 'نشط' : 'Active' }}</span>
                                    @else
                                        <span class="badge bg-danger fs-6">{{ app()->getLocale() === 'ar' ? 'غير نشط' : 'Inactive' }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>{{ app()->getLocale() === 'ar' ? 'تاريخ الإنشاء:' : 'Created:' }}</th>
                                <td>{{ $menuItem->created_at->format('F d, Y \a\t g:i A') }}</td>
                            </tr>
                            <tr>
                                <th>{{ app()->getLocale() === 'ar' ? 'آخر تحديث:' : 'Last Updated:' }}</th>
                                <td>{{ $menuItem->updated_at->format('F d, Y \a\t g:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'الإجراءات السريعة' : 'Quick Actions' }}</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.menu-items.edit', $menuItem) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit me-2"></i>{{ app()->getLocale() === 'ar' ? 'تعديل العنصر' : 'Edit Item' }}
                    </a>
                    
                    @if($menuItem->category)
                        <a href="{{ route('admin.categories.show', $menuItem->category) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-tags me-2"></i>{{ app()->getLocale() === 'ar' ? 'عرض الفئة' : 'View Category' }}
                        </a>
                    @endif
                    
                    <a href="{{ route('admin.menu-items.create') }}?category={{ $menuItem->category_id }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus me-2"></i>{{ app()->getLocale() === 'ar' ? 'إضافة عنصر مشابه' : 'Add Similar Item' }}
                    </a>
                    
                    <hr class="my-2">
                    
                    <form action="{{ route('admin.menu-items.destroy', $menuItem) }}" method="POST" 
                          onsubmit="return confirm('{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد من حذف هذا العنصر؟' : 'Are you sure you want to delete this menu item?' }}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm w-100">
                            <i class="fas fa-trash me-2"></i>{{ app()->getLocale() === 'ar' ? 'حذف العنصر' : 'Delete Item' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'معاينة العنصر' : 'Item Preview' }}</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <p class="text-muted small mb-2">{{ app()->getLocale() === 'ar' ? 'كيف يظهر هذا العنصر في القائمة:' : 'How this item appears on the menu:' }}</p>
                    <div class="border rounded p-3 bg-light">
                        @if($menuItem->image)
                            <img src="{{ Storage::url($menuItem->image) }}" alt="{{ $menuItem->name }}" 
                                 class="img-fluid rounded mb-2" style="max-height: 100px;">
                        @endif
                        <h6 class="mb-1">{{ $menuItem->name }}</h6>
                        @if($menuItem->description)
                            <p class="small text-muted mb-2">{{ Str::limit($menuItem->description, 60) }}</p>
                        @endif
                        <strong class="text-success">${{ number_format($menuItem->price, 2) }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($menuItem->category && $menuItem->category->menuItems->count() > 1)
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'عناصر أخرى في ' . $menuItem->category->name : 'Other Items in ' . $menuItem->category->name }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($menuItem->category->menuItems->where('id', '!=', $menuItem->id)->take(6) as $relatedItem)
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card h-100">
                            @if($relatedItem->image)
                                <img src="{{ Storage::url($relatedItem->image) }}" class="card-img-top" 
                                     style="height: 100px; object-fit: cover;" alt="{{ $relatedItem->name }}">
                            @endif
                            <div class="card-body p-2">
                                <h6 class="card-title small mb-1">{{ Str::limit($relatedItem->name, 20) }}</h6>
                                <p class="card-text small text-success mb-1">${{ number_format($relatedItem->price, 2) }}</p>
                                <a href="{{ route('admin.menu-items.show', $relatedItem) }}" 
                                   class="btn btn-outline-primary btn-sm">{{ app()->getLocale() === 'ar' ? 'عرض' : 'View' }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@endsection 