<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PackRateHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'active',
    ];

    public function packRateLines(): HasMany
    {
        return $this->hasMany(PackRateLine::class);
    }
}
