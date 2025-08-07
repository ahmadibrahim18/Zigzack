<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class playlist_video extends Model
{
    //
    public function video(): BelongsTo
    {
        return $this->belongsTo(video::class);
    }
    public function playlist(): BelongsTo
    {
        return $this->belongsTo(playlist::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function video(): BelongsTo
    {
        return $this->belongsTo(video::class);
    }


}
