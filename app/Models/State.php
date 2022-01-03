<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'district_id',
        'division_id',
    ];
    public function division(): BelongsTo
    {
        return $this->belongsTo( Division::class, 'division_id' );
    }
    public function district(): BelongsTo
    {
        return $this->belongsTo( District::class );
    }
}
