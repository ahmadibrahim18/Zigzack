<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Video;
class Favorite extends Model
{
    protected $fillable = ['user_id', 'video_id', 'favorited_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }
    
}
