<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    public function video():hasmany
    {
        return $this->hasMany(video::class);
    }
    

}
