<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductMultipleImage extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'product_image_name',
    ];
    /**
     * The roles that belong to the ProductMultipleImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product(): BelongsToMany
    {
        return $this->belongsToMany( Product::class );
    }
}
