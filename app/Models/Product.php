<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    
    protected $fillable = [
        'name',
        'code',
        'categoryId',
        'barcode',
        'active',
        'minimumOrder',
        'picUrl',
        'inStock',
        'isAddOn',
        'reasonToLove',
        'description',
        'olFactoryNotes',
        'ingredients',
        'howToUse',
        'claims',
        'origin',
        'volume',
        'shipmentTime',
        'personnel',
        'dateCreated'
    ];
}
