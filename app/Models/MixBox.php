<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MixBox extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'Category',
        'length',
        'active',
    ];

    public function mixBoxLines(): HasMany
    {
        return $this->hasMany(MixBoxLine::class);
    }
}
