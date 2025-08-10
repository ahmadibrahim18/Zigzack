<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    protected $fillable = ['user_id', 'video_id', 'watched_at'];
     public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function video()
    {
        return $this->belongsTo(Video::class);
    }
    
    
}
