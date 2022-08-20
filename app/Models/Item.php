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
        return $this->belongsTo(Brand::class, 'id');

    }
    public function Category()
    {
        return $this->belongsTo(Category::class, 'id');

    }
}
