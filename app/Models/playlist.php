<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    //
     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(videos::class);
    }
    
}
