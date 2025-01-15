<?php

namespace App\Models;

use App\Enums\ImageType;
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
        return $this->hasOne(Image::class)->where('type', ImageType::FEATURED);
    }

    public function galleryImages()
    {
        return $this->hasMany(Image::class)->where('type', ImageType::GALLERY);
    }

    public function galleryImage()
    {
        return $this->hasOne(Image::class)->where('type', ImageType::GALLERY);
    }
}
