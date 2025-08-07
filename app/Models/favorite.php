<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    //
     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function video(): BelongsTo
    {
        return $this->belongsTo(video::class);
    }
    
}
