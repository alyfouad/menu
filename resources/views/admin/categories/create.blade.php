@extends('admin.layout')

@section('title', app()->getLocale() === 'ar' ? 'إنشاء فئة' : 'Create Category')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>{{ app()->getLocale() === 'ar' ? 'إنشاء فئة جديدة' : 'Create New Category' }}</h2>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>{{ app()->getLocale() === 'ar' ? 'العودة إلى الفئات' : 'Back to Categories' }}
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ app()->getLocale() === 'ar' ? 'الاسم (الإنجليزي)' : 'Name (English)' }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_ar" class="form-label">{{ app()->getLocale() === 'ar' ? 'الاسم (العربي)' : 'Name (Arabic)' }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name_ar') is-invalid @enderror" 
                                       id="name_ar" name="name_ar" value="{{ old('name_ar') }}" 
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
                                          id="description" name="description" rows="3">{{ old('description') }}</textarea>
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
                                          style="direction: rtl; text-align: right;">{{ old('description_ar') }}</textarea>
                                @error('description_ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="form-label">{{ app()->getLocale() === 'ar' ? 'الأيقونة' : 'Icon' }}</label>
                        <input type="file" class="form-control @error('icon') is-invalid @enderror" 
                               id="icon" name="icon" accept="image/*">
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">{{ app()->getLocale() === 'ar' ? 'رفع أيقونة لهذه الفئة (JPG, PNG, GIF - حد أقصى 2 ميجابايت)' : 'Upload an icon for this category (JPG, PNG, GIF - Max 2MB)' }}</div>
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">{{ app()->getLocale() === 'ar' ? 'ترتيب العرض' : 'Display Order' }}</label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror" 
                               id="order" name="order" value="{{ old('order', 0) }}" min="0">
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">{{ app()->getLocale() === 'ar' ? 'الأرقام الأقل تظهر أولاً في القائمة' : 'Lower numbers appear first in the menu' }}</div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                   value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                {{ app()->getLocale() === 'ar' ? 'نشط' : 'Active' }}
                            </label>
                        </div>
                        <div class="form-text">{{ app()->getLocale() === 'ar' ? 'الفئات النشطة فقط ستظهر في القائمة' : 'Only active categories will be displayed on the menu' }}</div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>{{ app()->getLocale() === 'ar' ? 'إنشاء الفئة' : 'Create Category' }}
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
                        {{ app()->getLocale() === 'ar' ? 'املأ الاسم باللغتين الإنجليزية والعربية' : 'Fill in both English and Arabic names' }}
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
                        {{ app()->getLocale() === 'ar' ? 'إذا كان الاسم العربي فارغاً، سيتم استخدام الاسم الإنجليزي' : 'If Arabic name is empty, English name will be used' }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title mb-0">{{ app()->getLocale() === 'ar' ? 'نصائح' : 'Tips' }}</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        {{ app()->getLocale() === 'ar' ? 'اختر أسماء وصفية يتعرف عليها العملاء' : 'Choose descriptive names that customers will recognize' }}
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        {{ app()->getLocale() === 'ar' ? 'أضف أوصافاً واضحة لمساعدة العملاء على فهم الفئة' : 'Add clear descriptions to help customers understand the category' }}
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        {{ app()->getLocale() === 'ar' ? 'استخدم ترتيب العرض لتنظيم قائمتك بشكل منطقي' : 'Use display order to organize your menu logically' }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection 