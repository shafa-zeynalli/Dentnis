<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
