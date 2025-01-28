<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'name',
        'status',
        'shipping_method',
        'shipping_address',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
