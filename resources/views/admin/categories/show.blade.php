@extends('admin.layout')

@section('title', app()->getLocale() === 'ar' ? 'تفاصيل الفئة' : 'Category Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>{{ app()->getLocale() === 'ar' ? 'الفئة: ' . $category->name : 'Category: ' . $category->name }}</h2>
    <div>
        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-2"></i>{{ app()->getLocale() === 'ar' ? 'تعديل' : 'Edit' }}
        </a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>{{ app()->getLocale() === 'ar' ? 'العودة للفئات' : 'Back to Categories' }}
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'معلومات الفئة' : 'Category Information' }}</h5>
            </div>
            <div class="card-body">
                @if($category->icon)
                    <div class="text-center mb-3">
                        <img src="{{ Storage::url($category->icon) }}" alt="{{ $category->name }}" 
                             class="img-fluid rounded" style="max-width: 150px;">
                    </div>
                @endif
                
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">{{ app()->getLocale() === 'ar' ? 'الاسم:' : 'Name:' }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ app()->getLocale() === 'ar' ? 'الوصف:' : 'Description:' }}</th>
                        <td>{{ $category->description ?: (app()->getLocale() === 'ar' ? 'لا يوجد وصف' : 'No description') }}</td>
                    </tr>
                    <tr>
                        <th>{{ app()->getLocale() === 'ar' ? 'ترتيب العرض:' : 'Display Order:' }}</th>
                        <td><span class="badge bg-secondary">{{ $category->order }}</span></td>
                    </tr>
                    <tr>
                        <th>{{ app()->getLocale() === 'ar' ? 'الحالة:' : 'Status:' }}</th>
                        <td>
                            @if($category->is_active)
                                <span class="badge bg-success">{{ app()->getLocale() === 'ar' ? 'نشط' : 'Active' }}</span>
                            @else
                                <span class="badge bg-danger">{{ app()->getLocale() === 'ar' ? 'غير نشط' : 'Inactive' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{ app()->getLocale() === 'ar' ? 'إجمالي العناصر:' : 'Total Items:' }}</th>
                        <td><span class="badge bg-info">{{ $category->menuItems->count() }}</span></td>
                    </tr>
                    <tr>
                        <th>{{ app()->getLocale() === 'ar' ? 'العناصر النشطة:' : 'Active Items:' }}</th>
                        <td><span class="badge bg-success">{{ $category->menuItems->where('is_active', true)->count() }}</span></td>
                    </tr>
                    <tr>
                        <th>{{ app()->getLocale() === 'ar' ? 'تاريخ الإنشاء:' : 'Created:' }}</th>
                        <td>{{ $category->created_at->format('M d, Y') }}</td>
                    </tr>
                    <tr>
                        <th>{{ app()->getLocale() === 'ar' ? 'تاريخ التحديث:' : 'Updated:' }}</th>
                        <td>{{ $category->updated_at->format('M d, Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'عناصر القائمة (' . $category->menuItems->count() . ')' : 'Menu Items (' . $category->menuItems->count() . ')' }}</h5>
                <a href="{{ route('admin.menu-items.create') }}?category={{ $category->id }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i>{{ app()->getLocale() === 'ar' ? 'إضافة عنصر' : 'Add Item' }}
                </a>
            </div>
            <div class="card-body">
                @if($category->menuItems->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ app()->getLocale() === 'ar' ? 'الصورة' : 'Image' }}</th>
                                    <th>{{ app()->getLocale() === 'ar' ? 'الاسم' : 'Name' }}</th>
                                    <th>{{ app()->getLocale() === 'ar' ? 'السعر' : 'Price' }}</th>
                                    <th>{{ app()->getLocale() === 'ar' ? 'الترتيب' : 'Order' }}</th>
                                    <th>{{ app()->getLocale() === 'ar' ? 'الحالة' : 'Status' }}</th>
                                    <th>{{ app()->getLocale() === 'ar' ? 'الإجراءات' : 'Actions' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category->menuItems->sortBy('order') as $item)
                                    <tr>
                                        <td>
                                            @if($item->image)
                                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" 
                                                     class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                            @else
                                                <div class="bg-secondary rounded d-flex align-items-center justify-content-center" 
                                                     style="width: 40px; height: 40px;">
                                                    <i class="fas fa-utensils text-white"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $item->name }}</strong>
                                            @if($item->description)
                                                <br><small class="text-muted">{{ Str::limit($item->description, 40) }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="fw-bold text-success">${{ number_format($item->price, 2) }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $item->order }}</span>
                                        </td>
                                        <td>
                                            @if($item->is_active)
                                                <span class="badge bg-success">{{ app()->getLocale() === 'ar' ? 'نشط' : 'Active' }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ app()->getLocale() === 'ar' ? 'غير نشط' : 'Inactive' }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.menu-items.show', $item) }}" 
                                                   class="btn btn-sm btn-outline-info"
                                                   title="{{ app()->getLocale() === 'ar' ? 'عرض' : 'View' }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.menu-items.edit', $item) }}" 
                                                   class="btn btn-sm btn-outline-primary"
                                                   title="{{ app()->getLocale() === 'ar' ? 'تعديل' : 'Edit' }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-utensils fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">{{ app()->getLocale() === 'ar' ? 'لا توجد عناصر في القائمة' : 'No Menu Items' }}</h5>
                        <p class="text-muted">{{ app()->getLocale() === 'ar' ? 'هذه الفئة لا تحتوي على أي عناصر في القائمة بعد.' : 'This category doesn\'t have any menu items yet.' }}</p>
                        <a href="{{ route('admin.menu-items.create') }}?category={{ $category->id }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>{{ app()->getLocale() === 'ar' ? 'إضافة أول عنصر' : 'Add First Item' }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 