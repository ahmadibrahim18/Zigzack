<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subscription;
use App\Models\Review;
use App\Models\User;    
 

class ContentCreator extends Model
{
      protected $fillable = [
        'user_id',
        'name',
        'channel_name',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subscriptions() {
        return $this->hasMany(Subscription::class, 'creator_id');
    }
}