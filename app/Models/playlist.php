<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    //
    protected $fillable = ['user_id', 'name'];
     public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Videos::class);
    }

     public function playlist_video(): hasMany
    {
        return $this->hasMany(PlaylistVideo::class);
    }
    
}
