<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'video_id', 'favorited_at'];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function video(): hasMany
    {
        return $this->hasMany(Video::class);
    }
    
}
