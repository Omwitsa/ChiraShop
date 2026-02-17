<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PackRateLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'variety',
        'len35',
        'len40',
        'len50',
        'len60',
        'len70',
        'len80',
        'len90',
        'len100',
    ];

    public function packRateHeader(): BelongsTo
    {
        return $this->belongsTo(PackRateHeader::class);
    }
}
