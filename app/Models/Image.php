<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;


class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'product_id',
        'type'
    ];

    public function getUrlAttribute()
    {
        return Storage::disk('public')->url($this->path);
    }
}
