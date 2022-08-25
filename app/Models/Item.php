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
        return $this->hasOne(Brand::class, 'id');

    }
    public function Image()
    {
        return $this->belongsTo(Image::class, 'mainimage_id');

    }
    public function ItemImages()
    {
        return $this->hasMany(Image::class, 'imageone_id');

    }
    public function Category()
    {
        return $this->hasOne(Category::class, 'id');

    }
}
