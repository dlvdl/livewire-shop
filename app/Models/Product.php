<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function featuredImage()
    {
        return $this->hasOne(Image::class)->where('type', 'featured');
    }

    public function galleryImages()
    {
        return $this->hasMany(Image::class)->where('type', 'gallery');
    }
}
