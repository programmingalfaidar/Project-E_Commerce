<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;

    protected $fillable = ['photos', 'products_id'];


    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}
