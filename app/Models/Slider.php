<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title_en',
        'title_bn',
        'sub_title_en',
        'sub_title_bn',
        'description_en',
        'description_bn',
        'status',
    ];
    //Active Scopre
    public function scopeActive( $query )
    {
        return $query->where( 'status', 1 );
    }
}
