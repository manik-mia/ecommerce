<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'division_id',
        'district_id',
        'state_id',
        'name',
        'email',
        'phone',
        'post_code',
        'payment_type',
        'payment_method',
        'transaction_id',
        'currency',
        'amount',
        'order_number',
        'invoice_no',
        'order_date',
        'order_month',
        'order_year',
        'confirm_date',
        'processing_date',
        'picked_date',
        'shipped_date',
        'delivered_date',
        'cancel_date',
        'return_date',
        'return_reason',
        'notes',
        'status',
    ];
    public function division(): BelongsTo
    {
        return $this->belongsTo( Division::class, 'division_id' );
    }
    public function district(): BelongsTo
    {
        return $this->belongsTo( District::class, 'district_id' );
    }
    public function state(): BelongsTo
    {
        return $this->belongsTo( State::class, 'state_id' );
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class, 'user_id' );
    }
}
