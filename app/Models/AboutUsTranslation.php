<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsTranslation extends Model
{
    use HasFactory;
//    protected $fillable = [
//        'about_us_id',
//        'language_id',
//        'description'
//    ];
    protected $guarded=[];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
