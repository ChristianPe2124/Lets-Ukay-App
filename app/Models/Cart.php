<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_name',
        'product_desc',
        'status',
        'user_id',
        'name',
        'email',
        'src',
        'productID',
        'order_date',
    ];
    public function request_products()
    {
        return $this->belongsTo(RequestProducts::class);

    }
}
