<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'toppings_id',
        'orders_id',
        'price',
        'toppings_price',
        'products_quantity',
        'sugar_quantity',
    ];
    public $timestamps = false;
}
