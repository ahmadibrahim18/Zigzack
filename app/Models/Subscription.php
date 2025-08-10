<?php

// app/Models/Subscription.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model {
  protected $fillable = ['user_id', 'content_creator_id', 'plan', 'price', 'starts_at', 'ends_at'];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function creator() {
        return $this->belongsTo(ContentCreator::class, 'creator_id');
    }
}

