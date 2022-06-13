<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'price'
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
