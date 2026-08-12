<?php

namespace App\Constants\Enums;

enum OrderStatus: string
{
    case PENDING= 'Pending';
    case PROCESSING= 'Processing';
    case APPROVED= 'Approved';
    case DECLINED= 'Declined';
    case CANCELLED= 'Cancelled';
}
