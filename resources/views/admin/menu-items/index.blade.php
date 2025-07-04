@extends('admin.layout')

@section('title', app()->getLocale() === 'ar' ? 'عناصر القائمة' : 'Menu Items')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>{{ app()->getLocale() === 'ar' ? 'عناصر القائمة' : 'Menu Items' }}</h2>
    <a href="{{ route('admin.menu-items.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>{{ app()->getLocale() === 'ar' ? 'إضافة عنصر جديد' : 'Add New Menu Item' }}
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($menuItems->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ app()->getLocale() === 'ar' ? 'الصورة' : 'Image' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'الاسم' : 'Name' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'الفئة' : 'Category' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'السعر' : 'Price' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'الترتيب' : 'Order' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'الحالة' : 'Status' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'الإجراءات' : 'Actions' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menuItems as $item)
                            <tr>
                                <td>
                                    @if($item->image)
                                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" 
                                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-utensils text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $item->name }}</strong>
                                    @if($item->description)
                                        <br><small class="text-muted">{{ Str::limit($item->description, 50) }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $item->category->name ?? (app()->getLocale() === 'ar' ? 'بدون فئة' : 'No Category') }}</span>
                                </td>
                                <td>
                                    <strong class="text-success">${{ number_format($item->price, 2) }}</strong>
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
                                        <form action="{{ route('admin.menu-items.destroy', $item) }}" 
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد من حذف هذا العنصر؟' : 'Are you sure you want to delete this menu item?' }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    title="{{ app()->getLocale() === 'ar' ? 'حذف' : 'Delete' }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-utensils fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">{{ app()->getLocale() === 'ar' ? 'لم يتم العثور على عناصر' : 'No Menu Items Found' }}</h4>
                <p class="text-muted">{{ app()->getLocale() === 'ar' ? 'ابدأ بإضافة عناصر لقائمة طعامك.' : 'Start by adding items to your menu.' }}</p>
                <a href="{{ route('admin.menu-items.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>{{ app()->getLocale() === 'ar' ? 'إضافة عنصر أول' : 'Add First Item' }}
                </a>
            </div>
        @endif
    </div>
</div>

@if($menuItems->count() > 0)
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'الإحصائيات' : 'Statistics' }}</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-3">
                            <h4 class="text-primary">{{ $menuItems->count() }}</h4>
                            <small class="text-muted">{{ app()->getLocale() === 'ar' ? 'إجمالي العناصر' : 'Total Items' }}</small>
                        </div>
                        <div class="col-3">
                            <h4 class="text-success">{{ $menuItems->where('is_active', true)->count() }}</h4>
                            <small class="text-muted">{{ app()->getLocale() === 'ar' ? 'نشط' : 'Active' }}</small>
                        </div>
                        <div class="col-3">
                            <h4 class="text-danger">{{ $menuItems->where('is_active', false)->count() }}</h4>
                            <small class="text-muted">{{ app()->getLocale() === 'ar' ? 'غير نشط' : 'Inactive' }}</small>
                        </div>
                        <div class="col-3">
                            <h4 class="text-info">${{ number_format($menuItems->avg('price'), 2) }}</h4>
                            <small class="text-muted">{{ app()->getLocale() === 'ar' ? 'متوسط السعر' : 'Avg Price' }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'الإجراءات السريعة' : 'Quick Actions' }}</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.menu-items.create') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-plus me-2"></i>{{ app()->getLocale() === 'ar' ? 'إضافة عنصر جديد' : 'Add New Menu Item' }}
                        </a>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-tags me-2"></i>{{ app()->getLocale() === 'ar' ? 'إدارة الفئات' : 'Manage Categories' }}
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-success btn-sm" target="_blank">
                            <i class="fas fa-external-link-alt me-2"></i>{{ app()->getLocale() === 'ar' ? 'عرض القائمة' : 'View Menu' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection 