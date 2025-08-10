<?php

// app/Models/Subscription.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model {
    protected $fillable = ['user_id', 'creator_id', 'start_date', 'end_date'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function creator(): BelongsTo {
        return $this->belongsTo(ContentCreator::class, 'creator_id');
    }
    }

    

