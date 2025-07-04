<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_ar',
        'description',
        'description_ar',
        'price',
        'image',
        'category_id',
        'order',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    // Multi-language helper methods
    public function getNameAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'ar' && $this->name_ar) {
            return $this->name_ar;
        }
        return $value;
    }

    public function getDescriptionAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'ar' && $this->description_ar) {
            return $this->description_ar;
        }
        return $value;
    }

    public function getOriginalNameAttribute()
    {
        return $this->attributes['name'];
    }

    public function getOriginalDescriptionAttribute()
    {
        return $this->attributes['description'];
    }

    public function getNameInLanguage($lang)
    {
        if ($lang === 'ar' && $this->name_ar) {
            return $this->name_ar;
        }
        return $this->attributes['name'];
    }

    public function getDescriptionInLanguage($lang)
    {
        if ($lang === 'ar' && $this->description_ar) {
            return $this->description_ar;
        }
        return $this->attributes['description'];
    }
}
