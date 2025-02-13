<?php

namespace App\Models;

use App\Enums\ImageType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Money\Currency;
use Money\Money;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    protected function price(): Attribute
    {
        return Attribute::make(
            get: function (int $value) {
                return new Money($value, new Currency('UAH'));
            }
        );
    }

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

    public function galleryImage(): HasOne
    {
        return $this->hasOne(Image::class)->where('type', ImageType::GALLERY);
    }
}
