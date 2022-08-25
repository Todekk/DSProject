<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    public function Item()
    {
        return $this->hasOne((Item::class));

    }
    public function product()
    {
        return $this->belongsTo((Image::class));
    }
}
