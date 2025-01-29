<?php

namespace App\Enums;

enum ShippingStatusType: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';
}
