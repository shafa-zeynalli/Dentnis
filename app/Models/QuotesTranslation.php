<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotesTranslation extends Model
{
    use HasFactory;

//    protected $fillable = [
//        'quote_id',
//        'language_id',
//        'title',
//        'description'
//    ];
    protected $guarded=[];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
