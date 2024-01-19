<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamTranslation extends Model
{
    use HasFactory;

    public function language()
    {
        return $this->hasMany(Language::class, 'id', 'language_id');
    }
}
