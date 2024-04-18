<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'product_name',
        'product_desc',
        'src',
        'price',
        'status',
        'user_id',
        'product_id',
        'order_pin',
    ];

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
