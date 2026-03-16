<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderHeader extends Model
{
    use HasFactory;
    protected $table = 'orderheader';
    protected $fillable = [
        'clientId',
        'orderDate',
        'receivingDate',
        'confirmDate',
        'status',
        'lpo',
        'autoConfirm',
        'dropOff',
        'amount',
        'lineTotal',
        'currency',
        'sendEmail',
        'transferred',
        'personnel',
        'dateCreated',
    ];

    public function orderLines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }
}