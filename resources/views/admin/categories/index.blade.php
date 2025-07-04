@extends('admin.layout')

@section('title', app()->getLocale() === 'ar' ? 'الفئات' : 'Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>{{ app()->getLocale() === 'ar' ? 'الفئات' : 'Categories' }}</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>{{ app()->getLocale() === 'ar' ? 'إضافة فئة جديدة' : 'Add New Category' }}
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($categories->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ app()->getLocale() === 'ar' ? 'الأيقونة' : 'Icon' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'الاسم' : 'Name' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'الوصف' : 'Description' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'العناصر' : 'Items' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'الترتيب' : 'Order' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'الحالة' : 'Status' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'الإجراءات' : 'Actions' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    @if($category->icon)
                                        <img src="{{ Storage::url($category->icon) }}" 
                                             alt="{{ $category->name }}" 
                                             style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                    @else
                                        <i class="fas fa-utensils fa-2x text-muted"></i>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $category->name }}</strong>
                                </td>
                                <td>
                                    {{ $category->description ? Str::limit($category->description, 50) : (app()->getLocale() === 'ar' ? 'لا يوجد وصف' : 'No description') }}
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $category->menuItems->count() }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ $category->order }}</span>
                                </td>
                                <td>
                                    @if($category->is_active)
                                        <span class="badge bg-success">{{ app()->getLocale() === 'ar' ? 'نشط' : 'Active' }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ app()->getLocale() === 'ar' ? 'غير نشط' : 'Inactive' }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.categories.show', $category) }}" 
                                           class="btn btn-sm btn-outline-info"
                                           title="{{ app()->getLocale() === 'ar' ? 'عرض' : 'View' }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.categories.edit', $category) }}" 
                                           class="btn btn-sm btn-outline-primary"
                                           title="{{ app()->getLocale() === 'ar' ? 'تعديل' : 'Edit' }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category) }}" 
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد؟ سيتم حذف جميع عناصر القائمة في هذه الفئة أيضاً.' : 'Are you sure? This will also delete all menu items in this category.' }}')">
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
                <i class="fas fa-tags fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">{{ app()->getLocale() === 'ar' ? 'لم يتم العثور على فئات' : 'No Categories Found' }}</h4>
                <p class="text-muted">{{ app()->getLocale() === 'ar' ? 'ابدأ بإنشاء فئتك الأولى لتنظيم عناصر القائمة.' : 'Start by creating your first category to organize your menu items.' }}</p>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>{{ app()->getLocale() === 'ar' ? 'إنشاء الفئة الأولى' : 'Create First Category' }}
                </a>
            </div>
        @endif
    </div>
</div>
@endsection 