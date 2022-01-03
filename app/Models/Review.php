<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'comment',
        'rating',
        'status',
    ];

    public function scopeApprove( $query )
    {
        return $query->where( 'status', 'approve' );
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo( Product::class );
    }
}
