<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestProducts extends Model
{
    use HasFactory;

    protected $table = 'request_products';
    protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'product_name',
        'product_desc',
        'src',
        'price',
        'user_id',
        'product_id',
        'status',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id', 'product_name', 'product_desc');
    }
}
