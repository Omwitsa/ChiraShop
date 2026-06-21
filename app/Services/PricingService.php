<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Product;
use App\Models\PriceHeader;
use Carbon\Carbon;

class PricingService
{
    public function getPrice(Product $product, Client $client, ?Carbon $date = null): ?float
    {
        $date ??= now();

        return PriceHeader::where('id', $product->id)
            ->where('client_category_id', $client->client_category_id)
            ->where('effective_from', '<=', $date)
            ->where(function ($query) use ($date) {
                $query->whereNull('effective_to')
                      ->orWhere('effective_to', '>=', $date);
            })
            ->latest('effective_from')
            ->value('price');
    }
}
