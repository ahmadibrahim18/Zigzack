<?php

// app/Models/Review.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model {
    protected $fillable = ['user_id', 'video_id', 'rating', 'comment'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function video(): BelongsTo {
        return $this->belongsTo(Video::class);
    }
}
