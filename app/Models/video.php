<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    //
    protected $fillable = ['title', 'description', 'url', 'duration', 'user_id', 'category_id'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function playlist(): BelongsToMany
{
    return $this->belongsToMany(Playlist::class, 'playlist_video')->withTimestamps();
}


    public function history(): hasmany
    {
        return $this->hasMany(history::class);
    }
    
    public function favorite(): belongsTo
    {
        return $this->belongsTo(Favorite::class);
    }
    public function playlist_video(): hasMany
    {
        return $this->hasMany(PlaylistVideo::class);
    }
    public function favoritedBy(): BelongsToMany
{
    return $this->belongsToMany(User::class, 'favorite')->withTimestamps();
}
}
