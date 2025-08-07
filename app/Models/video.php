<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    //
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function history(): BelongsTo
    {
        return $this->belongsTo(history::class);
    }
    public function favorite(): hasone
    {
        return $this->hasOne(favorite::class);
    }
    public function playlist_video(): hasone
    {
        return $this->hasOne(playlist_video::class);
    }
}
