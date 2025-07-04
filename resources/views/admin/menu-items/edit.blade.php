@extends('admin.layout')

@section('title', app()->getLocale() === 'ar' ? 'تعديل عنصر القائمة' : 'Edit Menu Item')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>{{ app()->getLocale() === 'ar' ? 'تعديل عنصر القائمة:' : 'Edit Menu Item:' }} {{ $menuItem->attributes['name'] }}</h2>
    <div>
        <a href="{{ route('admin.menu-items.show', $menuItem) }}" class="btn btn-info me-2">
            <i class="fas fa-eye me-2"></i>{{ app()->getLocale() === 'ar' ? 'عرض' : 'View' }}
        </a>
        <a href="{{ route('admin.menu-items.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>{{ app()->getLocale() === 'ar' ? 'العودة إلى عناصر القائمة' : 'Back to Menu Items' }}
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.menu-items.update', $menuItem) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ app()->getLocale() === 'ar' ? 'الاسم (الإنجليزي)' : 'Name (English)' }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $menuItem->attributes['name']) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_ar" class="form-label">{{ app()->getLocale() === 'ar' ? 'الاسم (العربي)' : 'Name (Arabic)' }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name_ar') is-invalid @enderror" 
                                       id="name_ar" name="name_ar" value="{{ old('name_ar', $menuItem->name_ar) }}" 
                                       style="direction: rtl; text-align: right;" required>
                                @error('name_ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ app()->getLocale() === 'ar' ? 'الوصف (الإنجليزي)' : 'Description (English)' }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="3">{{ old('description', $menuItem->attributes['description']) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description_ar" class="form-label">{{ app()->getLocale() === 'ar' ? 'الوصف (العربي)' : 'Description (Arabic)' }}</label>
                                <textarea class="form-control @error('description_ar') is-invalid @enderror" 
                                          id="description_ar" name="description_ar" rows="3"
                                          style="direction: rtl; text-align: right;">{{ old('description_ar', $menuItem->description_ar) }}</textarea>
                                @error('description_ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price" class="form-label">{{ app()->getLocale() === 'ar' ? 'السعر' : 'Price' }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                           id="price" name="price" value="{{ old('price', $menuItem->price) }}" 
                                           step="0.01" min="0" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category_id" class="form-label">{{ app()->getLocale() === 'ar' ? 'الفئة' : 'Category' }} <span class="text-danger">*</span></label>
                                <select class="form-select @error('category_id') is-invalid @enderror" 
                                        id="category_id" name="category_id" required>
                                    <option value="">{{ app()->getLocale() === 'ar' ? 'اختر فئة' : 'Select a category' }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                                {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->getNameInLanguage('en') }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">{{ app()->getLocale() === 'ar' ? 'الصورة' : 'Image' }}</label>
                        @if($menuItem->image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($menuItem->image) }}" alt="Current image" 
                                     style="width: 120px; height: 120px; object-fit: cover; border-radius: 5px;">
                                <small class="text-muted d-block">{{ app()->getLocale() === 'ar' ? 'الصورة الحالية' : 'Current image' }}</small>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">{{ app()->getLocale() === 'ar' ? 'رفع صورة جديدة لاستبدال الحالية (JPG, PNG, GIF - حد أقصى 2 ميجابايت)' : 'Upload a new image to replace the current one (JPG, PNG, GIF - Max 2MB)' }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="order" class="form-label">{{ app()->getLocale() === 'ar' ? 'ترتيب العرض' : 'Display Order' }}</label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                       id="order" name="order" value="{{ old('order', $menuItem->order) }}" min="0">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">{{ app()->getLocale() === 'ar' ? 'الأرقام الأقل تظهر أولاً في الفئة' : 'Lower numbers appear first in the category' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ app()->getLocale() === 'ar' ? 'الحالة' : 'Status' }}</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                           value="1" {{ old('is_active', $menuItem->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        {{ app()->getLocale() === 'ar' ? 'نشط' : 'Active' }}
                                    </label>
                                </div>
                                <div class="form-text">{{ app()->getLocale() === 'ar' ? 'عناصر القائمة النشطة فقط ستظهر في القائمة' : 'Only active menu items will be displayed on the menu' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>{{ app()->getLocale() === 'ar' ? 'تحديث عنصر القائمة' : 'Update Menu Item' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'دعم متعدد اللغات' : 'Multi-Language Support' }}</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-globe text-info me-2"></i>
                        {{ app()->getLocale() === 'ar' ? 'الاسم باللغتين الإنجليزية والعربية مطلوب' : 'Both English and Arabic names are required' }}
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-language text-info me-2"></i>
                        {{ app()->getLocale() === 'ar' ? 'النص العربي سيظهر من اليمين إلى اليسار' : 'Arabic text will appear RTL (Right-to-Left)' }}
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-eye text-info me-2"></i>
                        {{ app()->getLocale() === 'ar' ? 'يمكن للمستخدمين التبديل بين اللغات في الواجهة الأمامية' : 'Users can switch between languages on the frontend' }}
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        {{ app()->getLocale() === 'ar' ? 'التغييرات ستظهر فوراً في الواجهة الأمامية' : 'Changes will be immediately visible on the frontend' }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection 