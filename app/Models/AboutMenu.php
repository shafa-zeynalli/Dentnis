<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMenu extends Model
{
    use HasFactory;
    public function translations()
    {
        return $this->hasMany(AboutMenuTranslation::class);
    }
}
