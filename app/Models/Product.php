<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'quantity',
        'image',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTranslated($field)
    {
        $locale = session('locale', 'en');
        $fieldName = $field . '_' . $locale;
        if (!empty($this->$fieldName)) {
            return $this->$fieldName;
        }
        // fallback to English
        $fallbackField = $field . '_en';
        return $this->$fallbackField ?? '';
    }
}
