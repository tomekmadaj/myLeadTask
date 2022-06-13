<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function price()
    {
        return $this->hasMany(Price::class);
    }

    public function scopeOrderByPrice(Builder $query, $direction = 'asc')
    {
        $query->orderBy(
            Price::select('price')
                ->whereColumn('prices.product_id', 'products.id')
                ->orderBy('price', $direction)
                ->take(1),
            $direction
        );
    }

    public function getImage()
    {
        return $this->image;
    }
}
