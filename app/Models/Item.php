<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');

    }
    public function Image()
    {
        return $this->belongsTo(Image::class, 'mainimage_id');

    }
    public function ItemImages()
    {
        return $this->hasMany(ItemImage::class);

    }
    public function Category()
    {
        return $this->belongsTo(Category::class, 'cat_id');

    }
    protected $fillable = ["isFavourite"];
}
