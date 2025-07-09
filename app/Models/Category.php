<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        "category_name"
    ];

    public function getTranslated($field)
    {
        $locale = app()->getLocale();
        $fieldName = $field . '_' . $locale;
        return $this->$fieldName ?? $this->$field . '_en'; // fallback to English if not set
    }
}
