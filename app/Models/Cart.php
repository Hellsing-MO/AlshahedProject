<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
