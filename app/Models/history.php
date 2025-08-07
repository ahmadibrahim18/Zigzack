<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
