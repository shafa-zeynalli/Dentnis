<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
//    private fillable=

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function translations()
    {
        return $this->hasMany(BlogTranslation::class);
    }

    public function slider()
    {
        return $this->belongsTo(Slider::class, 'slider_id');
    }

}
