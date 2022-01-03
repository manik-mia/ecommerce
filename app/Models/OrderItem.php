<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'product_name',
        'color',
        'size',
        'qty',
        'price',
    ];

    /**
     * The roles that belong to user can add multiple product in his/her wishlist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo( Product::class, 'product_id' );
    }
}
