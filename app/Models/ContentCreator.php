<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentCreator extends Model
{
    //
    public function subscriptions()
{
    return $this->hasMany(Subscription::class);
}

public function reviews()
{
    return $this->hasMany(Review::class);
}

class ContentCreator extends Model {
    protected $fillable = ['user_id', 'channel_name', 'bio'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subscriptions() {
        return $this->hasMany(Subscription::class, 'creator_id');
    }
}}