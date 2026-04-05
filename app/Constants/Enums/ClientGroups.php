<?php

namespace App\Constants\Enums;

enum ClientGroups: string
{
    case GENERAL= 'General';
    case GOLFERS= 'Golfers';
    case FEARLESS= 'Fearless';

	public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}

enum OrderStatus: string
{
    case PENDING= 'Pending';
    case PROCESSING= 'Processing';
    case APPROVED= 'Approved';

	public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
