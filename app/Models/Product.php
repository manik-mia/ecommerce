<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'brand_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'product_name_en',
        'product_name_bn',
        'product_slug_en',
        'product_slug_bn',
        'product_code',
        'product_quantity_en',
        'product_quantity_bn',
        'product_tags_en',
        'product_tags_bn',
        'product_color_en',
        'product_color_bn',
        'product_size_en',
        'product_size_bn',
        'product_weight_en',
        'product_weight_bn',
        'selling_price',
        'discount',
        'discount_price',
        'product_thumbnail',
        'hot_deals',
        'featured',
        'special_offer',
        'special_deals',
        'short_desc_en',
        'short_desc_bn',
        'full_desc_en',
        'full_desc_bn',
        'status',
    ];

    //Active Scopre
    public function scopeActive( $query )
    {
        return $query->where( 'status', 1 );
    }
    /**
     * Get all of the multiple images for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany( ProductMultipleImage::class );
    }
    /**
     * Get all of the multiple images for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany( Review::class );
    }

}
