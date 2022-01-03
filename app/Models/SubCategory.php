<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'subcategory_name_en',
        'subcategory_slug_en',
        'subcategory_name_bn',
        'subcategory_slug_bn',
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo( Category::class );
    }
}
