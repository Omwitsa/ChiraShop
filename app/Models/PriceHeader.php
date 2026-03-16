<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PriceHeader extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'currency',
        'active',
        'startDate',
        'endDate',
        'notes',
        'personnel',
        'dateCreated',
    ];

    public function priceLines(): HasMany
    {
        return $this->hasMany(PriceLine::class);
    }
}