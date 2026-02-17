<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderLineMixedBox extends Model
{
    use HasFactory;
    protected $table = 'orderlinemixedbox';

    protected $fillable = [
        'order_line_id',
        'VarietyId',
        'StemLength',
        'StemQty',
    ];

    public function orderLine(): BelongsTo
    {
        return $this->belongsTo(OrderLine::class);
    }
}
