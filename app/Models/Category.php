<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_ar',
        'description',
        'description_ar',
        'icon',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class)->orderBy('order');
    }

    public function activeMenuItems()
    {
        return $this->hasMany(MenuItem::class)->where('is_active', true)->orderBy('order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
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
