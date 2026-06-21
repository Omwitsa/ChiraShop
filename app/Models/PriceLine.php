<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class PriceLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'productId',
        'price',
        'notes',
    ];

    public function priceHeader(): BelongsTo
    {
        return $this->belongsTo(PriceHeader::class);
    }
}