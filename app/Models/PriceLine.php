<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class PriceLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'price',
    ];

    public function priceHeader(): BelongsTo
    {
        return $this->belongsTo(PriceHeader::class);
    }
}