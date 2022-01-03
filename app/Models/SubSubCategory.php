<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubSubCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name_en',
        'subsubcategory_slug_en',
        'subsubcategory_name_bn',
        'subsubcategory_slug_bn',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo( Category::class );
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo( SubCategory::class, 'subcategory_id' );
    }
}
