<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderLine extends Model
{
    use HasFactory;
    protected $table = 'orderline';
    protected $primaryKey = 'OrderLineId';

    protected $fillable = [
        'order_header_id',
        'productCode',
        'productName',
    ];

    public function orderHeader(): BelongsTo
    {
        return $this->belongsTo(OrderHeader::class);
    }
}